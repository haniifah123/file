<?php

/**
 * Template Name: Custom Home Page
 */

get_header();

?>
<main id="maincontent" role="main">

<?php do_action('vw_pet_care_before_slider'); ?>

<?php 
  $vw_pet_care_number = get_theme_mod('vw_pet_care_slide_number');
  if($vw_pet_care_number != ''){
?>
  <?php if( get_theme_mod( 'vw_pet_care_slider_hide_show', false) == 1 || get_theme_mod( 'vw_pet_care_resp_slider_hide_show', true) == 1) { ?>
    <section id="slider" class="position-relative">
      <div id="carouselExampleIndicators" class="carousel slide <?php if ( get_theme_mod('vw_pet_care_slide_remove_fade',true) == 1 ) { ?> carousel-fade <?php } ?>" data-bs-ride="carousel" data-type="multi" data-interval="false">
        <div class="carousel-inner" role="listbox">
          <?php for ($vw_pet_care_i=1; $vw_pet_care_i<=$vw_pet_care_number; $vw_pet_care_i++) {?>
            <div <?php if($vw_pet_care_i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                  <div class="carousel-caption">
                    <div class="inner_carousel">
                        <?php if(get_theme_mod('vw_pet_care_designation_small_text'.$vw_pet_care_i) != ''){ ?>
                          <h4 class="slider-small-text"><?php echo esc_html(get_theme_mod('vw_pet_care_designation_small_text'.$vw_pet_care_i)); ?></h4>
                        <?php } ?>
                        <?php if(get_theme_mod('vw_pet_care_tagline_title'.$vw_pet_care_i) != ''){ ?>
                          <h1 class="slide_splice" class=""><?php echo esc_html(get_theme_mod('vw_pet_care_tagline_title'.$vw_pet_care_i)); ?></h1>
                        <?php } ?>
                         <?php if(get_theme_mod('vw_pet_care_designation_text'.$vw_pet_care_i) != ''){ ?>
                          <p class="slide_desc"><?php echo esc_html(get_theme_mod('vw_pet_care_designation_text'.$vw_pet_care_i)); ?></p>
                        <?php } ?>
                        <?php if( get_theme_mod('vw_pet_care_banner_button_label'.$vw_pet_care_i, true) != '' && get_theme_mod('vw_pet_care_top_button_url'.$vw_pet_care_i, true)){ ?>
                        <a class="slider-btn" href="<?php echo esc_html(get_theme_mod('vw_pet_care_top_button_url'.$vw_pet_care_i)); ?>"><?php echo esc_html(get_theme_mod('vw_pet_care_banner_button_label'.$vw_pet_care_i)); ?><span class="top-icon"><i class="fas fa-long-arrow-alt-right"></i></span></a>
                        <?php } ?>
                        <span class="dog-img"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/pet-image.png" alt="" /></span>
                    </div>
                  </div>

                </div>
                <div class="col-xl-6 col-lg-7 col-12 slider-carousel">
                  <?php if ( get_theme_mod('vw_pet_care_banner_background_image_sec',true) != "" ) {?>
                    <img class="slider-carousel-img" src="<?php echo esc_url(get_theme_mod('vw_pet_care_banner_background_image_sec'.$vw_pet_care_i)); ?>" alt="<?php echo esc_attr(get_theme_mod('vw_pet_care_slide_title'.$vw_pet_care_i, true)); ?>" title="#slidecaption<?php echo esc_html($vw_pet_care_i); ?>">
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <?php if( get_theme_mod('vw_pet_care_slider_arrow_hide_show', true) != ''){ ?>
          <a class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_slider_next_icon','fas fa-arrow-right')); ?>"></i></span>
            <span class="sr-only"><?php esc_html_e('Previous','vw-pet-care'); ?></span>
          </a>
          <a class="carousel-control-next" data-bs-target="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_slider_prev_icon','fas fa-arrow-left')); ?>"></i></span>
            <span class="sr-only"><?php esc_html_e('Next','vw-pet-care'); ?></span>
          </a>  
        <?php }?>
        <div class="slider-indicator carousel-indicators text-center carousel slide"  class="carousel slide" data-bs-ride="carousel">
          <?php for ($vw_pet_care_i=1; $vw_pet_care_i<=$vw_pet_care_number; $vw_pet_care_i++) {?>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo esc_html($vw_pet_care_i-1); ?>" <?php if ($vw_pet_care_i == 1) { echo 'class="indicator active"'; } ?> >
                <img src="<?php echo esc_url(get_theme_mod('vw_pet_care_banner_background_image_sec'.$vw_pet_care_i)); ?>" alt="Slider Image">
             </button>
           <?php }?>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }}?>
<?php do_action('vw_pet_care_after_slider'); ?>


<!-- our services section -->
<?php if (get_theme_mod('vw_pet_care_services_heading') || get_theme_mod('vw_pet_care_services_small_title') || get_theme_mod('vw_pet_care_services_category') || get_theme_mod('vw_pet_care_services_category1') || get_theme_mod('vw_pet_care_services_category2') || get_theme_mod('vw_pet_care_services_category3') || get_theme_mod('vw_pet_care_services_category4')) { ?>
  <section id="our-services-sec" class="our-services-sec py-5 position-relative">
      <div class="container">
        <div class="heading-para position-relative mb-4">
          <?php if (get_theme_mod('vw_pet_care_services_small_title') != '') { ?>
            <p class="small-text text-center mb-1"><?php echo esc_html(get_theme_mod('vw_pet_care_services_small_title', '')); ?></p>
          <?php } ?>
          <?php if (get_theme_mod('vw_pet_care_services_heading') != '') { ?>
            <h2 class="heading-text text-center"><?php echo esc_html(get_theme_mod('vw_pet_care_services_heading', '')); ?></h2>
          <?php } ?>
          <span class="text-center"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_service_background_icon','fas fa-paw')); ?>"></i></span>
        </div>
          <div class="row">
            <?php
             for ($vw_pet_care_count=1; $vw_pet_care_count < 5; $vw_pet_care_count++) { 
              $vw_pet_care_postData=  get_theme_mod('vw_pet_care_services_category'.$vw_pet_care_count);
              if($vw_pet_care_postData){
                $args = array( 'name' => esc_html($vw_pet_care_postData ,'vw-pet-care'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-lg-3 col-md-6">
                      <div class="inner-box">
                        <div class="post-icon pb-4">
                          <?php if(get_theme_mod('vw_pet_care_service_service_top_icon'.$vw_pet_care_count)!= '' ) {?>
                            <i class=" <?php echo esc_attr(get_theme_mod('vw_pet_care_service_service_top_icon'.$vw_pet_care_count,'')); ?>"></i>
                          <?php }?>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                        <hr class="border-bottom">
                        <p class="service-para"><?php $vw_pet_care_excerpt = get_the_excerpt();
                          echo esc_html(vw_pet_care_string_limit_words($vw_pet_care_excerpt, esc_attr(get_theme_mod('vw_pet_care_services_excerpt_number', '20')))); ?></p>
                        <div class="read-more-arrow">
                          <a class="p-3" href="<?php the_permalink(); ?>">
                            <?php echo esc_html(get_theme_mod('vw_pet_care_service_button_label'.$vw_pet_care_count, __('Know More', 'vw-pet-care'))); ?>
                            <span class="screen-reader-text">
                              <?php echo esc_html(get_theme_mod('vw_pet_care_service_button_label'.$vw_pet_care_count, __('Know More', 'vw-pet-care'))); ?>
                            </span><span class="top-icon"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_service_button_arrow_icon'.$vw_pet_care_count,'fas fa-long-arrow-alt-right')); ?>"></i></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php endwhile;
                  wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                    <div class="clearfix"></div>
                  <?php
              endif; }?>
            <?php }?>
          </div>
      </div>
    <div class="small-img"></div>
  </section>
<?php } ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. 
      ?>
    </div>
  </div>
  
</main>

<?php get_footer(); ?>