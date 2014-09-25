<?php
/**
 * Request Call Back Widget Class
 */
class CallBack_Widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function CallBack_Widget() {
        parent::WP_Widget(false, $name = 'Request Call Back Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
                    <div class="callback-box">
                        <div class="request-text">
                            <h2>
                                <?php _e('<strong>Request a call back</strong><br>Speak to our tutors'); ?>
                            </h2>
                        </div>
                        <div class="call-us">
                              <i class="call-icon"></i>           
                              <p class="number">Call Free: <span class="rTapNumber74358">0800 917 1118</span></p>
                              <p class="number">From Mobiles: <span class="rTapNumber74358">03303 320 030</span></p>
                              <p class="number">International: <span class="rTapNumber74357">+44(0) 1875 320 597</span></p>
                        </div>    
                        <a href="#" class="button">Request call back</a>                  
                        <!-- script type="text/javascript" id="cloudiq_callme">(function(){function e(){var e=document.createElement("script");e.id="cloudiqCallme";e.type="text/javascript";e.async=true;e.src="https://platform.cloud-iq.com/widgets/callme/callme_25098/javascript/cloudiq_callme.js";var t=document.getElementById("cloudiq_callme");t.parentNode.insertBefore(e,t)}if(window.attachEvent)window.attachEvent("onload",e);else window.addEventListener("load",e,false)})()
                        </script -->
                        
                    </div>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }
 
 
} // end class CallBack_Widget
add_action('widgets_init', create_function('', 'return register_widget("CallBack_Widget");'));
?>