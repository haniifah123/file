<?php
/**
 * Custom About us Widget
 */

class VW_Pet_Care_About_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'VW_Pet_Care_About_Widget',
			__('VW About us', 'vw-pet-care'),
			array( 'description' => __( 'Widget for about us section in sidebar', 'vw-pet-care' ), ) 
		);
	}
	
	public function widget( $vw_pet_care_args, $vw_pet_care_instance ) {
		?>
		<aside class="widget">
			<?php
			$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
			$vw_pet_care_author = isset( $vw_pet_care_instance['author'] ) ? $vw_pet_care_instance['author'] : '';
			$vw_pet_care_designation = isset( $vw_pet_care_instance['designation'] ) ? $vw_pet_care_instance['designation'] : '';
			$vw_pet_care_description = isset( $vw_pet_care_instance['description'] ) ? $vw_pet_care_instance['description'] : '';
			$vw_pet_care_read_more_url = isset( $vw_pet_care_instance['read_more_url'] ) ? $vw_pet_care_instance['read_more_url'] : '';
			$vw_pet_care_read_more_text = isset( $vw_pet_care_instance['read_more_text'] ) ? $vw_pet_care_instance['read_more_text'] : '';
			$vw_pet_care_upload_image = isset( $vw_pet_care_instance['upload_image'] ) ? $vw_pet_care_instance['upload_image'] : '';

	        echo '<div class="custom-about-us">';
	        if(!empty($vw_pet_care_title) ){ ?><h3 class="custom_title"><?php echo esc_html($vw_pet_care_title); ?></h3><?php } ?>
		        <?php if($vw_pet_care_upload_image): ?>
	      			<img src="<?php echo esc_url($vw_pet_care_upload_image); ?>" alt="">
				<?php endif; ?>
				<?php if(!empty($vw_pet_care_author) ){ ?><p class="custom_author"><?php echo esc_html($vw_pet_care_author); ?></p><?php } ?>
				<?php if(!empty($vw_pet_care_designation) ){ ?><p class="custom_designation"><?php echo esc_html($vw_pet_care_designation); ?></p><?php } ?>
		        <?php if(!empty($vw_pet_care_description) ){ ?><p class="custom_desc"><?php echo esc_html($vw_pet_care_description); ?></p><?php } ?>
		        <?php if(!empty($vw_pet_care_read_more_url) ){ ?><div class="more-button"><a class="custom_read_more" href="<?php echo esc_url($vw_pet_care_read_more_url); ?>"><?php if(!empty($vw_pet_care_read_more_text) ){ ?><?php echo esc_html($vw_pet_care_read_more_text); ?><?php } ?></a></div><?php } ?>
	        <?php echo '</div>';
			?>
		</aside>
		<?php
	}
	
	// Widget Backend 
	public function form( $vw_pet_care_instance ) {	

		$vw_pet_care_title= ''; $vw_pet_care_author = ''; $vw_pet_care_designation = ''; $vw_pet_care_description= ''; $vw_pet_care_read_more_text = ''; $vw_pet_care_read_more_url = ''; $vw_pet_care_upload_image = '';

		$vw_pet_care_title = isset( $vw_pet_care_instance['title'] ) ? $vw_pet_care_instance['title'] : '';
		$vw_pet_care_author = isset( $vw_pet_care_instance['author'] ) ? $vw_pet_care_instance['author'] : '';
		$vw_pet_care_designation = isset( $vw_pet_care_instance['designation'] ) ? $vw_pet_care_instance['designation'] : '';
		$vw_pet_care_description = isset( $vw_pet_care_instance['description'] ) ? $vw_pet_care_instance['description'] : '';
		$vw_pet_care_read_more_url = isset( $vw_pet_care_instance['read_more_url'] ) ? $vw_pet_care_instance['read_more_url'] : '';
		$vw_pet_care_read_more_text = isset( $vw_pet_care_instance['read_more_text'] ) ? $vw_pet_care_instance['read_more_text'] : '';
		$vw_pet_care_upload_image = isset( $vw_pet_care_instance['upload_image'] ) ? $vw_pet_care_instance['upload_image'] : '';
	?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','vw-pet-care'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_title); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','vw-pet-care'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('designation')); ?>"><?php esc_html_e('Designation:','vw-pet-care'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('designation')); ?>" name="<?php echo esc_attr($this->get_field_name('designation')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_designation); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','vw-pet-care'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','vw-pet-care'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($vw_pet_care_read_more_url); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','vw-pet-care'); ?></label>
		<?php
			if ( $vw_pet_care_upload_image != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($vw_pet_care_upload_image) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $vw_pet_care_upload_image ); ?>" />
	   	</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $vw_pet_care_new_instance, $vw_pet_care_old_instance ) {
		$vw_pet_care_instance = array();	
		$vw_pet_care_instance['title'] = (!empty($vw_pet_care_new_instance['title']) ) ? strip_tags($vw_pet_care_new_instance['title']) : '';
		$vw_pet_care_instance['author'] = ( ! empty( $vw_pet_care_new_instance['author'] ) ) ? strip_tags($vw_pet_care_new_instance['author']) : '';
		$vw_pet_care_instance['designation'] = ( ! empty( $vw_pet_care_new_instance['designation'] ) ) ? strip_tags($vw_pet_care_new_instance['designation']) : '';
		$vw_pet_care_instance['description'] = (!empty($vw_pet_care_new_instance['description']) ) ? strip_tags($vw_pet_care_new_instance['description']) : '';
        $vw_pet_care_instance['read_more_text'] = (!empty($vw_pet_care_new_instance['read_more_text']) ) ? strip_tags($vw_pet_care_new_instance['read_more_text']) : '';
        $vw_pet_care_instance['read_more_url'] = (!empty($vw_pet_care_new_instance['read_more_url']) ) ? esc_url_raw($vw_pet_care_new_instance['read_more_url']) : '';
        $vw_pet_care_instance['upload_image'] = ( ! empty( $vw_pet_care_new_instance['upload_image'] ) ) ? strip_tags($vw_pet_care_new_instance['upload_image']) : '';

		return $vw_pet_care_instance;
	}
}
// Register and load the widget
function vw_pet_care_about_custom_load_widget() {
	register_widget( 'VW_Pet_Care_About_Widget' );
}
add_action( 'widgets_init', 'vw_pet_care_about_custom_load_widget' );