<?php
/**
 * Custom Contact us Widget
 */

class VW_Pet_Care_Contact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'VW_Pet_Care_Contact_Widget', 
			__('VW Contact us', 'vw-pet-care'),
			array( 'description' => __( 'Widget for contact us section in sidebar', 'vw-pet-care' ), ) 
		);
	}
	
	public function widget( $vw_pet_care_args, $vw_pet_care_instance ) {
		?>
		<aside class="widget">
			<?php
			$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
			$vw_pet_care_phone = isset( $vw_pet_care_instance['phone'] ) ? $vw_pet_care_instance['phone'] : '';
			$vw_pet_care_email = isset( $vw_pet_care_instance['email'] ) ? $vw_pet_care_instance['email'] : '';
			$vw_pet_care_address = isset( $vw_pet_care_instance['address'] ) ? $vw_pet_care_instance['address'] : '';
			$vw_pet_care_timing = isset( $vw_pet_care_instance['timing'] ) ? $vw_pet_care_instance['timing'] : '';
			$vw_pet_care_longitude = isset( $vw_pet_care_instance['longitude'] ) ? $vw_pet_care_instance['longitude'] : '';
			$vw_pet_care_latitude = isset( $vw_pet_care_instance['latitude'] ) ? $vw_pet_care_instance['latitude'] : '';
			$vw_pet_care_contact_form = isset( $vw_pet_care_instance['contact_form'] ) ? $vw_pet_care_instance['contact_form'] : '';

	        echo '<div class="custom-contact-us">';
	        if(!empty($vw_pet_care_title) ){ ?><h3 class="custom_title"><?php echo esc_html($vw_pet_care_title); ?></h3><?php } ?>
		        <?php if(!empty($vw_pet_care_phone) ){ ?><p><span class="custom_details"><?php esc_html_e('Phone Number: ','vw-pet-care'); ?></span><span class="custom_desc"><?php echo esc_html($vw_pet_care_phone); ?></span></p><?php } ?>
		        <?php if(!empty($vw_pet_care_email) ){ ?><p><span class="custom_details"><?php esc_html_e('Email ID: ','vw-pet-care'); ?></span><span class="custom_desc"><?php echo esc_html($vw_pet_care_email); ?></span></p><?php } ?>
		        <?php if(!empty($vw_pet_care_address) ){ ?><p><span class="custom_details"><?php esc_html_e('Address: ','vw-pet-care'); ?></span><span class="custom_desc"><?php echo esc_html($vw_pet_care_address); ?></span></p><?php } ?> 
		        <?php if(!empty($vw_pet_care_timing) ){ ?><p><span class="custom_details"><?php esc_html_e('Opening Time: ','vw-pet-care'); ?></span><span class="custom_desc"><?php echo esc_html($vw_pet_care_timing); ?></span></p><?php } ?>
		        <?php if(!empty($vw_pet_care_longitude) ){ ?><embed width="100%" height="200px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo esc_html($vw_pet_care_longitude); ?>,<?php echo esc_html($vw_pet_care_latitude); ?>&hl=es;z=14&amp;output=embed"></embed><?php } ?>
		        <?php if(!empty($vw_pet_care_contact_form) ){ ?><?php echo do_shortcode($vw_pet_care_contact_form); ?><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $vw_pet_care_instance ) {

		$vw_pet_care_title= ''; $vw_pet_care_phone= ''; $vw_pet_care_email = ''; $vw_pet_care_address = ''; $vw_pet_care_timing = ''; $vw_pet_care_longitude = ''; $vw_pet_care_latitude = ''; $vw_pet_care_contact_form = ''; 
		
		$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
		$vw_pet_care_phone = isset( $vw_pet_care_instance['phone'] ) ? $vw_pet_care_instance['phone'] : '';
		$vw_pet_care_email = isset( $vw_pet_care_instance['email'] ) ? $vw_pet_care_instance['email'] : '';
		$vw_pet_care_address = isset( $vw_pet_care_instance['address'] ) ? $vw_pet_care_instance['address'] : '';
		$vw_pet_care_timing = isset( $vw_pet_care_instance['timing'] ) ? $vw_pet_care_instance['timing'] : '';
		$vw_pet_care_longitude = isset( $vw_pet_care_instance['longitude'] ) ? $vw_pet_care_instance['longitude'] : '';
		$vw_pet_care_latitude = isset( $vw_pet_care_instance['latitude'] ) ? $vw_pet_care_instance['latitude'] : '';
		$vw_pet_care_contact_form = isset( $vw_pet_care_instance['contact_form'] ) ? $vw_pet_care_instance['contact_form'] : '';
		
		?>

		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_title); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_phone); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email id:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_email); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_address); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('timing')); ?>"><?php esc_html_e('Opening Time:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('timing')); ?>" name="<?php echo esc_attr($this->get_field_name('timing')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_timing); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('longitude')); ?>"><?php esc_html_e('Longitude:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('longitude')); ?>" name="<?php echo esc_attr($this->get_field_name('longitude')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_longitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('latitude')); ?>"><?php esc_html_e('Latitude:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('latitude')); ?>" name="<?php echo esc_attr($this->get_field_name('latitude')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_latitude); ?>">
    	</p>
    	<p>
        	<label for="<?php echo esc_attr($this->get_field_id('contact_form')); ?>"><?php esc_html_e('Contact Form Shortcode:','vw-pet-care'); ?></label>
        	<input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_contact_form); ?>">
    	</p>
		
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $vw_pet_care_new_instance, $vw_pet_care_old_instance ) {
		$vw_pet_care_instance = array();	
		$vw_pet_care_instance['title'] = (!empty($vw_pet_care_new_instance['title']) ) ? strip_tags($vw_pet_care_new_instance['title']) : '';
		$vw_pet_care_instance['phone'] = (!empty($vw_pet_care_new_instance['phone']) ) ? vw_pet_care_sanitize_phone_number($vw_pet_care_new_instance['phone']) : '';
		$vw_pet_care_instance['email'] = (!empty($vw_pet_care_new_instance['email']) ) ? sanitize_email($vw_pet_care_new_instance['email']) : '';
		$vw_pet_care_instance['address'] = (!empty($vw_pet_care_new_instance['address']) ) ? strip_tags($vw_pet_care_new_instance['address']) : '';
		$vw_pet_care_instance['timing'] = (!empty($vw_pet_care_new_instance['timing']) ) ? strip_tags($vw_pet_care_new_instance['timing']) : '';
		$vw_pet_care_instance['longitude'] = (!empty($vw_pet_care_new_instance['longitude']) ) ? strip_tags($vw_pet_care_new_instance['longitude']) : '';
		$vw_pet_care_instance['latitude'] = (!empty($vw_pet_care_new_instance['latitude']) ) ? strip_tags($vw_pet_care_new_instance['latitude']) : '';
		$vw_pet_care_instance['contact_form'] = (!empty($vw_pet_care_new_instance['contact_form']) ) ? strip_tags($vw_pet_care_new_instance['contact_form']) : '';
        
		return $vw_pet_care_instance;
	}
}
// Register and load the widget
function vw_pet_care_contact_custom_load_widget() {
	register_widget( 'VW_Pet_Care_Contact_Widget' );
}
add_action( 'widgets_init', 'vw_pet_care_contact_custom_load_widget' );