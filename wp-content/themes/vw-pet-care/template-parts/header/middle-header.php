<?php
/**
 * The template part for Middle Header
 *
 * @package VW Pet Care
 * @subpackage vw-pet-care
 * @since vw-pet-care 1.0
 */
?>
<!-- middle header -->
<div class="middle-header">
  <div class="container">
    <div class="row middle-header1">
      <div class="col-lg-2 col-md-2 align-self-center text-center text-lg-start text-md-start mb-lg-0 mb-md-0 mb-3">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('vw_pet_care_logo_title_hide_show',true) == 1){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('vw_pet_care_logo_title_hide_show',true) == 1){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('vw_pet_care_tagline_hide_show',false) == 1){ ?>
                  <p class="site-description mb-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-2 col-6 align-self-center">
        <div class="menu-section">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
      </div>
      <div class="col-lg-1 col-md-4 col-6 align-self-center text-center text-md-center d-flex gap-2 justify-content-center search-cart">
          <?php if( get_theme_mod( 'vw_pet_care_header_search',true) == 1) { ?>
            <div class="search-box">
              <span><a href="#"><i class='<?php echo esc_attr(get_theme_mod('vw_pet_care_search_topbar_icon','fas fa-search')); ?> mx-2'></i></a></span>
            </div>
          <?php }?>
        <div class="serach_outer align-self-center text-center text-lg-end text-md-start py-lg-0 py-md-0 py-3">
          <div class="closepop"><a href="#maincontent"><i class='fa fa-window-close me-2'></i></a></div>
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
        <?php if( get_theme_mod( 'vw_pet_care_cart_hide_show', true) == 1) { ?>
          <?php if(class_exists('woocommerce')){ ?>
            <span class="cart_no">
              <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'Shopping Cart','vw-pet-care' ); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_cart_topbar_icon','fas fa-shopping-cart')); ?> me-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Shopping Cart','vw-pet-care' );?></span></a>
            </span>
          <?php } ?>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-4 align-self-center text-lg-end text-md-end text-center">
        <?php if ( get_theme_mod('vw_pet_care_topbar_button_label','Join Rescue Team') != '' ) {?>
          <div class ="topbar-button">
            <a href="<?php echo esc_url(get_theme_mod('vw_pet_care_topbar_button_url',false));?>"><?php echo esc_html(get_theme_mod('vw_pet_care_topbar_button_label','Join Rescue Team'));?><span class="screen-reader-text"><?php esc_html_e( 'Join Rescue Team','vw-pet-care');?></span></a><span class="top-icon"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_topbar_icon','fas fa-long-arrow-alt-right')); ?>"></i></span>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>

