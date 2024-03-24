<?php
/**
 * Custom Social Widget
 */

class VW_Pet_Care_Social_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(
			'VW_Pet_Care_Social_Widget',
			__('VW Social Icon', 'vw-pet-care'),
			array( 'description' => __( 'Widget for Social icons section', 'vw-pet-care' ), ) 
		);
	}

	public function widget( $vw_pet_care_args, $vw_pet_care_instance ) { ?>
		<div class="widget">
			<?php
			$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
			$vw_pet_care_facebook = isset( $vw_pet_care_instance['facebook'] ) ? $vw_pet_care_instance['facebook'] : '';
			$vw_pet_care_instagram = isset( $vw_pet_care_instance['instagram'] ) ? $vw_pet_care_instance['instagram'] : '';
			$vw_pet_care_twitter = isset( $vw_pet_care_instance['twitter'] ) ? $vw_pet_care_instance['twitter'] : '';
			$vw_pet_care_linkedin = isset( $vw_pet_care_instance['linkedin'] ) ? $vw_pet_care_instance['linkedin'] : '';
			$vw_pet_care_pinterest = isset( $vw_pet_care_instance['pinterest'] ) ? $vw_pet_care_instance['pinterest'] : '';
			$vw_pet_care_tumblr = isset( $vw_pet_care_instance['tumblr'] ) ? $vw_pet_care_instance['tumblr'] : '';
			$vw_pet_care_youtube = isset( $vw_pet_care_instance['youtube'] ) ? $vw_pet_care_instance['youtube'] : '';

	        echo '<div class="custom-social-icons">';
	        if(!empty($vw_pet_care_title) ){ ?><h3 class="custom_title"><?php echo esc_html($vw_pet_care_title); ?></h3><?php } ?>
	        <?php if(!empty($vw_pet_care_facebook) ){ ?><a class="custom_facebook fff" href="<?php echo esc_url($vw_pet_care_facebook); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_twitter) ){ ?><a class="custom_twitter" href="<?php echo esc_url($vw_pet_care_twitter); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_linkedin) ){ ?><a class="custom_linkedin" href="<?php echo esc_url($vw_pet_care_linkedin); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_pinterest) ){ ?><a class="custom_pinterest" href="<?php echo esc_url($vw_pet_care_pinterest); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_tumblr) ){ ?><a class="custom_tumblr" href="<?php echo esc_url($vw_pet_care_tumblr); ?>"><i class="fab fa-tumblr"></i><span class="screen-reader-text"><?php esc_html_e( 'Tumblr','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_instagram) ){ ?><a class="custom_instagram" href="<?php echo esc_url($vw_pet_care_instagram); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','vw-pet-care' );?></span></a><?php } ?>
	        <?php if(!empty($vw_pet_care_youtube) ){ ?><a class="custom_youtube" href="<?php echo esc_url($vw_pet_care_youtube); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','vw-pet-care' );?></span></a><?php } ?>
	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	// Widget Backend 
	public function form( $vw_pet_care_instance ) {

		$vw_pet_care_title= ''; $vw_pet_care_facebook = ''; $vw_pet_care_twitter = ''; $vw_pet_care_linkedin = '';  $vw_pet_care_pinterest = '';$vw_pet_care_tumblr = ''; $vw_pet_care_instagram = ''; $vw_pet_care_youtube = ''; 

		$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
		$vw_pet_care_facebook = isset( $vw_pet_care_instance['facebook'] ) ? $vw_pet_care_instance['facebook'] : '';
		$vw_pet_care_instagram = isset( $vw_pet_care_instance['instagram'] ) ? $vw_pet_care_instance['instagram'] : '';
		$vw_pet_care_twitter = isset( $vw_pet_care_instance['twitter'] ) ? $vw_pet_care_instance['twitter'] : '';
		$vw_pet_care_linkedin = isset( $vw_pet_care_instance['linkedin'] ) ? $vw_pet_care_instance['linkedin'] : '';
		$vw_pet_care_pinterest = isset( $vw_pet_care_instance['pinterest'] ) ? $vw_pet_care_instance['pinterest'] : '';
		$vw_pet_care_tumblr = isset( $vw_pet_care_instance['tumblr'] ) ? $vw_pet_care_instance['tumblr'] : '';
		$vw_pet_care_youtube = isset( $vw_pet_care_instance['youtube'] ) ? $vw_pet_care_instance['youtube'] : '';
		?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','vw-pet-care'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_title); ?>">
    	</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_linkedin); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_pinterest); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_tumblr); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_youtube); ?>">
		</p>
		<?php 
	}
	
	public function update( $vw_pet_care_new_instance, $vw_pet_care_old_instance ) {
		$vw_pet_care_instance = array();
		$vw_pet_care_instance['title'] = (!empty($vw_pet_care_new_instance['title']) ) ? strip_tags($vw_pet_care_new_instance['title']) : '';	
        $vw_pet_care_instance['facebook'] = (!empty($vw_pet_care_new_instance['facebook']) ) ? esc_url_raw($vw_pet_care_new_instance['facebook']) : '';
        $vw_pet_care_instance['twitter'] = (!empty($vw_pet_care_new_instance['twitter']) ) ? esc_url_raw($vw_pet_care_new_instance['twitter']) : '';
        $vw_pet_care_instance['instagram'] = (!empty($vw_pet_care_new_instance['instagram']) ) ? esc_url_raw($vw_pet_care_new_instance['instagram']) : '';
        $vw_pet_care_instance['linkedin'] = (!empty($vw_pet_care_new_instance['linkedin']) ) ? esc_url_raw($vw_pet_care_new_instance['linkedin']) : '';
        $vw_pet_care_instance['pinterest'] = (!empty($vw_pet_care_new_instance['pinterest']) ) ? esc_url_raw($vw_pet_care_new_instance['pinterest']) : '';
        $vw_pet_care_instance['tumblr'] = (!empty($vw_pet_care_new_instance['tumblr']) ) ? esc_url_raw($vw_pet_care_new_instance['tumblr']) : '';
     	$vw_pet_care_instance['youtube'] = (!empty($vw_pet_care_new_instance['youtube']) ) ? esc_url_raw($vw_pet_care_new_instance['youtube']) : '';
     	
		return $vw_pet_care_instance;
	}
}

function vw_pet_care_custom_load_widget() {
	register_widget( 'VW_Pet_Care_Social_Widget' );
}
add_action( 'widgets_init', 'vw_pet_care_custom_load_widget' );