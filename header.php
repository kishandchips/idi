<!DOCTYPE html>
<!--[if lt IE 7]>      <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html xmlns:fb="http://ogp.me/ns/fb#" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />     
	<?php 
		function load_assets(){
			wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');

			wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
			wp_enqueue_script('jquery', get_template_directory_uri().'/js/libs/jquery.min.js');
			wp_enqueue_script('scroller', get_template_directory_uri().'/js/plugins/jquery.scroller.js');	
			wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js');
			wp_enqueue_script('cycle', get_template_directory_uri().'/js/plugins/jquery.cycle2.min.js');	
			wp_enqueue_script('selecter', get_template_directory_uri().'/js/plugins/jquery.fs.selecter.min.js');
			wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/js/plugins/jquery.colorbox-min.js');
			wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
		}
		add_action('wp_enqueue_scripts', 'load_assets');
	?>
	<?php wp_head(); ?>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/css/ie7.css"></script> <![endif]-->

    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>	
	<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<link rel="stylesheet" type="text/css" href="http://assets.cookieconsent.silktide.com/current/style.min.css"/>
<script type="text/javascript" src="http://assets.cookieconsent.silktide.com/current/plugin.min.js"></script>
<script type="text/javascript">
// <![CDATA[
cc.initialise({
	cookies: {
		necessary: {}
	},
	settings: {
		consenttype: "implicit",
		bannerPosition: "push",
		style: "monochrome",
		tagPosition: "vertical-left",
		hideprivacysettingstab: true
	}
});
// ]]>
</script>
<!-- End Cookie Consent plugin -->
<script type="text/javascript" class="cc-onconsent-social" src="https://apis.google.com/js/plusone.js"></script>
</head>
<?php 
	global $post;
	$curr_page_id = $post->ID;
?>
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=579639135402354";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<div id="page">
		<header id="header" role="banner">
			<div class="container">
				<div class="logos">
					<a href="<?php bloginfo( 'url' ); ?>" class="logo henley-bus" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
						<img src="<?php bloginfo('template_url')?>/images/logos/idi.png" alt="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
					</a>				
				</div>
				<div id="mobile-navigation-btn">
					<a href="#">Menu</a>
				</div>
				
				<div class="nav">
					<div class="span ten socials">
						<div class="fb-like" data-href="https://www.facebook.com/InteractiveDesignInstitute" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
						<div class="g-plusone" data-size="medium" data-href="<?php bloginfo( 'url' ); ?>"></div>
						<div class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
					</div>
					<div class="span two-third">					
						<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'menu clearfix', 'container' => false ) ); ?>						
					</div>
					<div class="span one-third call-iq">
						<div class="call-us">
							<i class="call-icon"></i>						
							<p class="number">Call Free: <span class="rTapNumber74358">0800 917 1118</span></p>
							<p class="number">From Mobiles: <span class="rTapNumber74358">03303 320 030</span></p>
							<p class="number">International: <span class="rTapNumber74357">+44(0) 1875 320 597</span></p>
						</div>
					</div>
				</div>			
			</div>		
		</header><!-- #masthead -->
		<div id="mobilenav">
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'mobile-navigation clearfix', 'container' => false ) ); ?>	
			</div>
		</div>

		<div id="main" role="main" class="container">
