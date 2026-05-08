<?php

/*

Plugin Name: Flickr
Plugin URI: http://themeforest.net/user/Tauris/
Description: Display images from Flickr.
Version: 1.0
Author: Tauris
Author URI: http://themeforest.net/user/Tauris/

*/


/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'waxom_widget_contact_details' );

/* Function that registers our widget. */
function waxom_widget_contact_details() {
	register_widget( 'Waxom_Widget_Contact_Details' );
}

// Widget class.
class Waxom_Widget_Contact_Details extends WP_Widget {


	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'pr_widget_contact_details', 'description' => 'Display your contact details.' );

		/* Create the widget. */

		parent::__construct( 'waxom_widget_contact_details', 'Veented Contact Details', $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$address = $instance['address'];
		$phone = $instance['phone'];
		$phone2 = $instance['phone2'];
		$phone3 = $instance['phone3'];
		$email = $instance['email'];
		$mobile = $instance['mobile'];
		$website = $instance['website'];
		$showmap = $instance['showmap'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display name from widget settings. */
		$extra_class = '';
		if($showmap) $extra_class = 'contact-details-map';
		?>
        
        <div class="widget-contact-details <?php echo esc_attr($extra_class); ?>">
        	<?php
        	
        	if($address) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-map-marker"></i><span>'.esc_textarea($address).'</span></div>';
        	}
        	
        	if($phone) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-phone"></i><span>'.esc_textarea($phone).'</span></div>';
        	}
        	
        	if($phone2) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-phone"></i><span>'.esc_textarea($phone2).'</span></div>';
        	}
        	
        	if($phone3) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-phone"></i><span>'.esc_textarea($phone3).'</span></div>';
        	}
        	
        	if($mobile) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-mobile"></i><span>'.esc_textarea($mobile).'</span></div>';
        	}
        	
        	if($email) {
        		echo '<div class="widget-contact-details-item"><i class="fa fa-envelope"></i><span><a href="mailto:' . esc_html( $email ). '" class="accent-hover">'.$email.'</a></span></div>';
        	}
        	
        	if($website) {
        		$website_url = $website;
        		if (strpos($website_url,'http://') !== false) { } else { $website_url = 'http://'.$website_url; }
        		echo '<div class="widget-contact-details-item"><i class="fa fa-globe"></i><span><a href="'.esc_url($website_url).'" class="accent-hover">'.esc_url($website).'</a></span></div>';
        	}
        	
        	
        	
        	?>
        </div> 
                 
                        
        <?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		$instance['phone'] = strip_tags( $new_instance['phone'] );
		$instance['phone2'] = strip_tags( $new_instance['phone2'] );
		$instance['phone3'] = strip_tags( $new_instance['phone3'] );
		$instance['mobile'] = strip_tags( $new_instance['mobile'] );
		$instance['email'] = strip_tags( $new_instance['email'] );
		$instance['website'] = strip_tags( $new_instance['website'] );
		$instance['showmap'] = strip_tags( $new_instance['showmap'] );
		return $instance;
	}
	
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Contact Info', 'address' => 'Manchester Road 123-78B, Silictown 7854MD, Great Country', 'phone' => '+46 123 456 789', 'phone2' => '', 'phone3' => '', 'mobile' => '', 'email' => 'hello@sitename.com', 'website' => 'www.sitename.com', 'showmap' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_textarea($instance['title']); ?>" style="width:100%;" />
        </p> 
        
    	<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>">Address:</label>
		<input id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_textarea($instance['address']); ?>" style="width:100%;" />
		</p>  

        <p>
        <label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
		<input id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo esc_textarea($instance['phone']); ?>" style="width:100%;" />
        </p> 
        
        <p>
        <label for="<?php echo $this->get_field_id('phone2'); ?>">Phone 2:</label>
        <input id="<?php echo $this->get_field_id('phone2'); ?>" name="<?php echo $this->get_field_name('phone2'); ?>" type="text" value="<?php echo esc_textarea($instance['phone2']); ?>" style="width:100%;" />
        </p> 
        
        <p>
        <label for="<?php echo $this->get_field_id('phone3'); ?>">Phone 3:</label>
        <input id="<?php echo $this->get_field_id('phone3'); ?>" name="<?php echo $this->get_field_name('phone3'); ?>" type="text" value="<?php echo esc_textarea($instance['phone3']); ?>" style="width:100%;" />
        </p> 
        
        <p>
        <label for="<?php echo $this->get_field_id('mobile'); ?>">Mobile Phone:</label>
        <input id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" type="text" value="<?php echo esc_textarea($instance['mobile']); ?>" style="width:100%;" />
        </p> 
        
        <p>
        <label for="<?php echo $this->get_field_id('email'); ?>">E-mail:</label>
		<input id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $instance['email']; ?>" style="width:100%;" />
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id('website'); ?>">Website:</label>
        <input id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo esc_url($instance['website']); ?>" style="width:100%;" />
        </p>
        
        <p>
        	<label for="<?php echo $this->get_field_id( 'showmap' ); ?>">Background Map Image?</label>
        	<input type="checkbox" id="<?php echo $this->get_field_id( 'showmap' ); ?>" name="<?php echo $this->get_field_name( 'showmap' ); ?>" <?php echo ($instance['showmap']) ? 'checked="checked" ' : ''; ?>>
        </p>
        
        <?php
	}
}

	
