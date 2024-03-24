<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'cosmetic_shop_above_slider' ); ?>

	<?php if( get_theme_mod('cosmetic_shop_slider_hide_show') != ''){ ?>
		<div id="slider">
			<div class="slider-content row row-eq-height  mr-0">
				<div class="col-lg-6 col-md-6 col-sm-12 pd-0">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<?php $cosmetic_shop_slider_pages = array();
						for ( $count = 1; $count <= 4; $count++ ) {
							$mod = intval( get_theme_mod( 'cosmetic_shop_slider'. $count ));
							if ( 'page-none-selected' != $mod ) {
							$cosmetic_shop_slider_pages[] = $mod;
							}
						}
						if( !empty($cosmetic_shop_slider_pages) ) :
							$args = array(
								'post_type' => 'page',
								'post__in' => $cosmetic_shop_slider_pages,
								'orderby' => 'post__in'
							);
							$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							$i = 1;
						?>     
							<div class="carousel-inner" role="listbox">
								<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
									<div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
										<!-- <div class="row"> -->
											<!-- <div class="col-lg-7 col-md-7 align-self-center"> -->
												<div class="sliderimg">
													<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
												</div>
											<!-- </div> -->
											<!-- <div class="col-lg-5 col-md-5 align-self-center"> -->
												<!-- <div class="carousel-caption"> -->
													<div class="inner-carousel">
														<div class="contenbx"></div>
														<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?>
															<div class="sld-brd"></div>
														</h2></a>
														<p class="mb-0"><?php $cosmetic_shop_excerpt = get_the_excerpt(); echo esc_html( cosmetic_shop_string_limit_words( $cosmetic_shop_excerpt, esc_attr(get_theme_mod('cosmetic_shop_slider_excerpt_length','15') ) )); ?></p>
														<a href="<?php the_permalink(); ?>" class="read-btn"><span><?php esc_html_e('View Collection','cosmetic-shop'); ?></span><span class="screen-reader-text"><?php esc_html_e('View Collection','cosmetic-shop'); ?></span></a>
													</div>
												<!-- </div> -->
											<!-- </div> -->
										<!-- </div> -->
									</div>
								<?php $i++; endwhile; 
								wp_reset_postdata();?>
							</div>
						<?php else : ?>
							<div class="no-postfound"></div>
						<?php endif;
						endif;?>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
							<span class="screen-reader-text"><?php esc_html_e( 'Prev','cosmetic-shop' );?></span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
							<span class="screen-reader-text"><?php esc_html_e( 'Next','cosmetic-shop' );?></span>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php
					$slider_image1 = get_theme_mod('slider_image1');
					$slider_image2 = get_theme_mod('slider_image2');
					$slider_image3 = get_theme_mod('slider_image3');
				?>
				<div class="col-lg-3 col-md-3 col-sm-12 sld-middle">
					<div class="slider-imgone">
						<?php 
							if(!empty($slider_image1)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($slider_image1).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="Slider1" src="'.get_template_directory_uri().'/assets/images/default.png" class="img-responsive" />';
							}
						?>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 sld-rghtbx pd-0" >
					<div class="slider-imgtwo sld-img">
						<?php 
							if(!empty($slider_image2)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($slider_image2).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="Slider2" src="'.get_template_directory_uri().'/assets/images/default.png" class="img-responsive" />';
							}
						?>
					</div>
					<div class="slider-imgthree sld-img">
						<?php 
							if(!empty($slider_image3)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($slider_image3).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="Slider3" src="'.get_template_directory_uri().'/assets/images/default.png" class="img-responsive" />';
							}
						?>
					</div>
				</div>
			
			</div>
		</div>
	<?php }?>
	
	<?php do_action('cosmetic_shop_below_slider'); ?>


	<section id="productcategory-section">
		<div class="container"> 
			<div class="productcategory-head text-center mb-5">
				
				<?php if(get_theme_mod('cosmetic_shop_productcategorysection_title') != ''){?>
					<h3><?php echo esc_html(get_theme_mod('cosmetic_shop_productcategorysection_title')); ?></h3>
				<?php }?>

				<?php if(get_theme_mod('cosmetic_shop_productcategorysection_subtitle') != ''){?>
					<p><?php echo esc_html(get_theme_mod('cosmetic_shop_productcategorysection_subtitle')); ?></p>
				<?php }?>
			</div>
			<div class="category">
				<div class="row mr-0">  
					<?php
					$args = array(
						'number'     => 0,
						'orderby'    => 'title',
						'order'      => 'ASC',
						'hide_empty' => false
					);
					$product_categories = get_terms( 'product_cat', $args );

					$count = count($product_categories);
					if ( $count > 0 ){
						foreach ( $product_categories as $product_category ) {

						if(function_exists('get_term_meta')){
							if( isset( $product_category->term_id ) ){
								//show parent categories
									$thumbnail_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);
									}
								// get the image URL for parent category
									$image = wp_get_attachment_url($thumbnail_id);
								}else{
									$image = esc_html(get_template_directory_uri()).'/images/default.png';
								}
							if( isset( $product_category->name ) ){
							echo '<div class="item cat-product hvr-float-shadow"> ';

								echo' <div class="pro-cat-img">   
								<a href="' . get_term_link( $product_category ) . '" target="_blank" data-hover="' . $product_category->name . '" ><img src="'.$image.'" alt="" width="270" height="377" />
									<div class="p-olay"></div></a>
								</div>  ';

								echo ' <div class="pro-cat-content"> ';

							echo '<h5><a href="' . get_term_link( $product_category ) . '" target="_blank" data-hover="' . $product_category->name . '" >
								<span> ' . $product_category->name . '</span>
								</a>
							</h5>';

								echo'
								</div>
							</div>';
						}
						}
					}?>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</section>


	<?php do_action('cosmetic_shop_below_productcategory_section'); ?>

	<section id="featureproduct-section">
		<div class="container"> 
			<div class="featureproduct-head text-center mb-5">
				
				<?php if(get_theme_mod('cosmetic_shop_section_title') != ''){?>
					<h3><?php echo esc_html(get_theme_mod('cosmetic_shop_section_title')); ?></h3>
				<?php }?>

				<?php if(get_theme_mod('cosmetic_shop_section_subtitle') != ''){?>
					<p><?php echo esc_html(get_theme_mod('cosmetic_shop_section_subtitle')); ?></p>
				<?php }?>
			</div>
			<div class="row">  
					<?php
					if(function_exists('woocommerce_template_loop_add_to_cart') && function_exists('WC')){
						$meta_query   = WC()->query->get_meta_query();
						$tax_query   = WC()->query->get_tax_query();
						$tax_query[] = array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
							'operator' => 'IN',
						);
						$args = array(
							'post_type'   =>  'product',
							'stock'       =>  1,
							'posts_per_page' => 8, 
							'orderby'     =>  'date',
							'order'       =>  'DESC',
							'meta_query'  =>  $meta_query,
							'tax_query'   => $tax_query,
						);
						$loop = new WP_Query( $args );
						if($loop->post_count > 0){
							while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					<div class="item col-lg-3 col-md-6 col-sm-12 pd-1">  
						<div class="product-grid ">
							<!-- <div class="probg"></div> -->
							<div class="product-image">
								<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php if (has_post_thumbnail( $loop->post->ID )) 
									echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
									else
										echo '<img class="pic-1" src="'.get_template_directory_uri().'/assets/images/default.png" alt="Placeholder" />'; ?>
									
								</a>
							</div>
							<div class="productcontent-wrap">
								<?php
									$productbutton = get_theme_mod('product_txt', 'Add to cart'); 
								?>

								<div class="pcontent">
									
									<a class="add-to-cart" id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">	
										<h3><?php the_title(); ?></h3>
									</a>
									<span class="price"><?php echo $product->get_price_html(); ?></span>
									<?php if( get_theme_mod('product_button_display','show' ) == 'show') :
										?>	
										<div class="add-to-cart">
											<a href="<?php echo esc_url(get_permalink()); ?>" class="more-button"><span></span><?php echo ($productbutton );  ?></a>
										</div>
									<?php endif ?>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div> 
					<?php
						endwhile; 
							}else{ ?>
						<div class="alert alert-warning text-center">
							<strong>You haven't Star Marked Feature Products.</strong>
						</div>
						<?php
								}
								?>
						<?php
							wp_reset_query(); 
						}else{ ?>
						<div class="alert alert-warning text-center">
							Please Install or Activate the WooCommerce plugin.
						</div>
					<?php
					}?>
				</div> 
		</div>
	</section>

	<!-- <div class="container">
	  	<//?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content py-5">
	        	<//?php the_content(); ?>
	        </div>
	    <//?php endwhile; // end of the loop. ?>
	</div> -->
</main>

<?php get_footer(); ?>