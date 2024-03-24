<?php
//about theme info
add_action( 'admin_menu', 'vw_pet_care_gettingstarted' );
function vw_pet_care_gettingstarted() {
	add_theme_page( esc_html__('About VW Pet Care ', 'vw-pet-care'), esc_html__('About VW Pet Care ', 'vw-pet-care'), 'edit_theme_options', 'vw_pet_care_guide', 'vw_pet_care_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_pet_care_admin_theme_style() {
	wp_enqueue_style('vw-pet-care-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-pet-care-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_pet_care_admin_theme_style');

//guidline for about theme
function vw_pet_care_mostrar_guide() { 
	//custom function about theme customizer
	$vw_pet_care_return = add_query_arg( array()) ;
	$vw_pet_care_theme = wp_get_theme( 'vw-pet-care' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Pet Care ', 'vw-pet-care' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-pet-care' ); ?>: <?php echo esc_html($vw_pet_care_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-pet-care'); ?></p>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-pet-care' ); ?></button>
			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-pet-care' ); ?></button>
			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-pet-care' ); ?></button>
			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-pet-care' ); ?></button>
			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-pet-care' ); ?></button>
  			<button class="tablinks" onclick="vw_pet_care_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-pet-care' ); ?></button>
		</div>

		<?php
			$vw_pet_care_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_pet_care_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Pet_Care_Plugin_Activation_Settings::get_instance();
				$vw_pet_care_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-pet-care-recommended-plugins">
				    <div class="vw-pet-care-action-list">
				        <?php if ($vw_pet_care_actions): foreach ($vw_pet_care_actions as $key => $vw_pet_care_actionValue): ?>
				                <div class="vw-pet-care-action" id="<?php echo esc_attr($vw_pet_care_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_pet_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_pet_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_pet_care_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-pet-care'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_pet_care_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-pet-care' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Pet Care is a sophisticated and comprehensive solution designed to elevate pet-related businesses and services. Crafted with precision, this theme offers a visually appealing and user-friendly platform for veterinarians, pet clinics, groomers, and pet care services to showcase their expertise. With a clean and modern design, the Pet Care theme creates an inviting online environment for potential clients. Its intuitive layout ensures easy navigation, allowing visitors to explore services, access important information, and engage with your business effortlessly. This theme not only enhances the aesthetic appeal of your website but also prioritises functionality. It comes equipped with features tailored to the pet care industry, enabling seamless management of services, appointments, and client interactions. The user-friendly interface ensures that pet owners can easily access relevant information, making it a valuable resource for their pet care needs. The Pet Care WordPress Theme is fully responsive, adapting to various devices, including mobile phones and tablets. This ensures that potential clients can connect with your services conveniently, whether they are at home or on the go. In addition to its visual and functional benefits, the Pet Care theme offers customization options to align your website with the unique identity of your pet care business. From color schemes to branding elements, you have the flexibility to create a personalized and cohesive online presence.','vw-pet-care'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-pet-care' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-pet-care' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PET_CARE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-pet-care' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-pet-care'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-pet-care'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-pet-care'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-pet-care'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-pet-care'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PET_CARE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-pet-care'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-pet-care'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-pet-care'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_PET_CARE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-pet-care'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-pet-care' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-pet-care'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_our_services_section') ); ?>" target="_blank"><?php esc_html_e('Our Services Section','vw-pet-care'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-pet-care'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-pet-care'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-pet-care'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-pet-care'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-pet-care'); ?></span><?php esc_html_e(' Go to ','vw-pet-care'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-pet-care'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-pet-care'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-pet-care'); ?></span><?php esc_html_e(' Go to ','vw-pet-care'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-pet-care'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-pet-care'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-pet-care'); ?> <a class="doc-links" href="<?php echo esc_url( VW_PET_CARE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-pet-care'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = vw_pet_care_Plugin_Activation_Settings::get_instance();
			$vw_pet_care_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-pet-care-recommended-plugins">
				    <div class="vw-pet-care-action-list">
				        <?php if ($vw_pet_care_actions): foreach ($vw_pet_care_actions as $key => $vw_pet_care_actionValue): ?>
				                <div class="vw-pet-care-action" id="<?php echo esc_attr($vw_pet_care_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_pet_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_pet_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_pet_care_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-pet-care'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_pet_care_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-pet-care' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-pet-care'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','vw-pet-care'); ?></span></b></p>
	              	<div class="vw-pet-care-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-pet-care'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','vw-pet-care'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-pet-care' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-pet-care'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-pet-care'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-pet-care'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-pet-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-pet-care'); ?></a>
								</div> 
							</div>
						</div>
					</div>			
					
	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Pet_Care_Plugin_Activation_Settings::get_instance();
			$vw_pet_care_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-pet-care-recommended-plugins">
				    <div class="vw-pet-care-action-list">
				        <?php if ($vw_pet_care_actions): foreach ($vw_pet_care_actions as $key => $vw_pet_care_actionValue): ?>
				                <div class="vw-pet-care-action" id="<?php echo esc_attr($vw_pet_care_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_pet_care_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_pet_care_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_pet_care_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-pet-care' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-pet-care-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-pet-care'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-pet-care' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-pet-care'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-pet-care'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-pet-care'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-pet-care'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_care_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-pet-care'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-pet-care'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
			$plugin_ins = VW_Pet_Care_Plugin_Activation_Woo_Products::get_instance();
			$vw_pet_care_actions = $plugin_ins->recommended_actions;
			?>
			<div class="vw-pet-care-recommended-plugins">
			    <div class="vw-pet-care-action-list">
			        <?php if ($vw_pet_care_actions): foreach ($vw_pet_care_actions as $key => $vw_pet_care_actionValue): ?>
			                <div class="vw-pet-care-action" id="<?php echo esc_attr($vw_pet_care_actionValue['id']);?>">
		                        <div class="action-inner plugin-activation-redirect">
		                            <h3 class="action-title"><?php echo esc_html($vw_pet_care_actionValue['title']); ?></h3>
		                            <div class="action-desc"><?php echo esc_html($vw_pet_care_actionValue['desc']); ?></div>
		                            <?php echo wp_kses_post($vw_pet_care_actionValue['link']); ?>
		                        </div>
			                </div>
			            <?php endforeach;
			        endif; ?>
			    </div>
			</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-pet-care' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-pet-care-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-pet-care'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-pet-care'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-pet-care'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-pet-care'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-pet-care'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-pet-care'); ?></b></p>
	              	<div class="vw-pet-care-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-pet-care'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-pet-care'); ?></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-pet-care' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Pet Care is a sophisticated and comprehensive solution designed to elevate pet-related businesses and services. Crafted with precision, this theme offers a visually appealing and user-friendly platform for veterinarians, pet clinics, groomers, and pet care services to showcase their expertise. With a clean and modern design, the Pet Care theme creates an inviting online environment for potential clients. Its intuitive layout ensures easy navigation, allowing visitors to explore services, access important information, and engage with your business effortlessly. This theme not only enhances the aesthetic appeal of your website but also prioritises functionality. It comes equipped with features tailored to the pet care industry, enabling seamless management of services, appointments, and client interactions. The user-friendly interface ensures that pet owners can easily access relevant information, making it a valuable resource for their pet care needs. The Pet Care WordPress Theme is fully responsive, adapting to various devices, including mobile phones and tablets. This ensures that potential clients can connect with your services conveniently, whether they are at home or on the go. In addition to its visual and functional benefits, the Pet Care theme offers customization options to align your website with the unique identity of your pet care business. From color schemes to branding elements, you have the flexibility to create a personalized and cohesive online presence.','vw-pet-care'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_PET_CARE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-pet-care'); ?></a>
					<a href="<?php echo esc_url( VW_PET_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-pet-care'); ?></a>
					<a href="<?php echo esc_url( VW_PET_CARE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-pet-care'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-pet-care' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-pet-care'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-pet-care'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-pet-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-pet-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-pet-care'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'vw-pet-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-pet-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-pet-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-pet-care'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-pet-care'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-pet-care'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-pet-care'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_PET_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-pet-care'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-pet-care'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-pet-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_CARE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-pet-care'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-pet-care'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-pet-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_CARE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-pet-care'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-pet-care'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-pet-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_CARE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-pet-care'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-pet-care'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-pet-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_CARE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-pet-care'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-pet-care'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-pet-care'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_CARE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-pet-care'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>