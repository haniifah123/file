<?php
/**
 * The template part for Top Header
 *
 * @package VW Pet Care
 * @subpackage vw-pet-care
 * @since vw-pet-care 1.0
 */
?>
<!-- Top Header -->
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-6 col-xl-9 align-self-center text-lg-start text-md-start text-center">
        <?php if(get_theme_mod('vw_pet_care_total_order') != ''){ ?>
          <p class="topbar-text mb-lg-0 mb-md-0 mb-2 mt-2 mt-md-0">
            <?php echo esc_html(get_theme_mod('vw_pet_care_total_order')); ?>
          </p>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-6 col-xl-3 align-self-center text-lg-end text-md-center text-center d-flex gap-4">
        <?php if(get_theme_mod('vw_pet_care_phone_number') != ''){ ?>
          <span class="phone-number me-3 me-md-0 md-lg-0 align-self-center">
            <i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_phone_icon','fas fa-phone')); ?> me-2"></i>
            <a href="tel:<?php echo esc_attr( get_theme_mod('vw_pet_care_phone_number','') ); ?>">
              <?php echo esc_html(get_theme_mod('vw_pet_care_phone_number_text','Phone:'));?>
              <?php echo esc_html(get_theme_mod('vw_pet_care_phone_number',''));?>
            </a>
          </span>
        <?php }?>
        <div class="topbar-social-icon mt-2 mt-lg-0 mt-md-0">
          <?php dynamic_sidebar('social-widget'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
