<?php
/**
 * IDI theme functions and definitions
 *
 * @package IDI
 * @since IDI 1.0
 */

require( get_template_directory() . '/inc/widgets/callback.php' );

if ( ! function_exists( 'idi_setup' ) ):

function idi_setup() {

	require( get_template_directory() . '/inc/options.php' );
	require( get_template_directory() . '/inc/widgets/social-login.php' );

	register_nav_menus( array(
		'primary_header' => __( 'Primary Header Menu', 'idi' ),
		'primary_footer' => __( 'Primary Footer Menu', 'idi' )
	) );	

	add_theme_support( 'post-thumbnails' ); 

	add_editor_style('css/editor-styles.css');

	add_filter('widget_text', 'do_shortcode');

	add_image_size( 'student-gal', 240, 150, true);
	add_image_size( 'header-slide', 818, 529, true);
}
endif; // idi_setup

add_shortcode('call', 'call_function');
function call_function() {
	return '<div id="call-now">
		<h1>Call Now:</h1> <p class="number">0800-XXX-XXX</p>
		<p>International Toll-free</p>
		<a href="#" class="button">Click To Call</a>
	</div>';
}


add_action( 'after_setup_theme', 'idi_setup' );

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=> 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="offscreen">',
		'after_title' => '</h2>',
	));	
}

add_action('tiny_mce_before_init', 'custom_tinymce_options');
if ( ! function_exists( 'custom_tinymce_options' )) {
	function custom_tinymce_options($init){
		$init['apply_source_formatting'] = true;
		return $init;
	}
}


add_action('init', 'set_custom_post_types');

if(!function_exists('set_custom_post_types')) {
	function set_custom_post_types(){
		require( get_template_directory() . '/inc/custom_post_type.php' );
	   	
	   	$student_gallery = new Custom_Post_Type( 'Student Galleries', 
	 		array(
	 			'rewrite' => array( 'with_front' => false, 'slug' => 'student-gallery' ),
	 			'capability_type' => 'post',
	 		 	'publicly_queryable' => true,
	   			'has_archive' => true, 
	    		'hierarchical' => true,
	    		'exclude_from_search' => false,
	    		'menu_position' => null,
	    		'supports' => array('title', 'thumbnail', 'editor'),
	    		'plural' => 'Student Galleries'
	   		)
	   	);			   	

	 	// global $wp_rewrite;
		// $wp_rewrite->flush_rules();
}}


add_action("gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}
// disable gforms tabindex
add_filter("gform_tabindex", "gform_tabindexer");
function gform_tabindexer() {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

add_action('gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);
function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}

if ( ! function_exists( 'get_queried_page' )) {
	function get_queried_page(){
		$curr_url = get_current_url();
		$curr_uri = str_replace(get_bloginfo('url'), '', $curr_url);
		$page = get_page_by_path($curr_uri);
		if($page) return $page;
		return null;
	}
}
if ( ! function_exists( 'get_current_url' )) {
	function get_current_url() {
		$url = 'http';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') $url .= 's';
			$url .= '://';

		if ($_SERVER['SERVER_PORT'] != '80') {
			$url .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		} else {
			$url .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
		return $url;
	}
}

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['phone'] = 'Phone Number';
	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');



add_filter("gform_submit_button", "form_submit_button", 10, 2);
	function form_submit_button($button, $form){
	    return "<button class='gform_button' id='gform_submit_button_{$form["id"]}'><span>Submit</span></button>";
}
