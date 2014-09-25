<?php
/**
 * Social Login
 */
class SocialLogin extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function SocialLogin() {
        parent::WP_Widget(false, $name = 'Social Login Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
      <?php echo $before_widget; ?>
      	<?php if ( $title ) echo $before_title . $title . $after_title; ?>

       	<?php if ( is_user_logged_in() ): ?>
          <div class="loggedin">

          <?php if (current_user_can( 'manage_options' )): ?>
                <h3><?php _e('You are logged in as Administrator ') ?></h3>
                <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="button">Logout</a>    
          <?php else: ?>
              <h3><?php _e('You are logged in with social account. ') ?></h3>
              <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="button">Logout</a>            
          <?php endif; ?>          
          </div>
		    <?php else: ?>
          <div class="loggedout">
            <div class="description">
     			    <?php echo $message; ?>
            </div>
    		    <?php echo do_shortcode('[wordpress_social_login]'); ?>
          </div>
		<?php endif; ?>

		<?php echo $after_widget; ?>

        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Description'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo $message; ?>" />
        </p>
        <?php 
    }
 
 
} // end class SocialLogin
add_action('widgets_init', create_function('', 'return register_widget("SocialLogin");'));
?>