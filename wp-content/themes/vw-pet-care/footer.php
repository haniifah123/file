<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Pet Care 
 */
?>

    <footer role="contentinfo">
        <?php if (get_theme_mod('vw_pet_care_footer_hide_show', true)){ ?>
            <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'vw-pet-care' ); ?>">
                <div class="container">
                    <?php
                        $vw_pet_care_count = 0;
                        
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            $vw_pet_care_count++;
                        }
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            $vw_pet_care_count++;
                        }
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            $vw_pet_care_count++;
                        }
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            $vw_pet_care_count++;
                        }
                        // $vw_pet_care_count == 0 none
                        if ( $vw_pet_care_count == 1 ) {
                            $vw_pet_care_colmd = 'col-md-12 col-sm-12';
                        } elseif ( $vw_pet_care_count == 2 ) {
                            $vw_pet_care_colmd = 'col-md-6 col-sm-6';
                        } elseif ( $vw_pet_care_count == 3 ) {
                            $vw_pet_care_colmd = 'col-md-4 col-sm-4';
                        } else {
                            $vw_pet_care_colmd = 'col-md-3 col-sm-3';
                        }
                    ?>
                    <div class="row">
                        <div class="<?php if ( !is_active_sidebar( 'footer-1' ) ){ echo "footer_hide"; }else{ echo "$vw_pet_care_colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-2' ) ){ echo "$vw_pet_care_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                        <div class="<?php if ( is_active_sidebar( 'footer-3' ) ){ echo "$vw_pet_care_colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                        <div class="<?php if ( !is_active_sidebar( 'footer-4' ) ){ echo "footer_hide"; }else{ echo "$vw_pet_care_colmd"; } ?> col-xs-12 footer-block">
                            <?php dynamic_sidebar('footer-4'); ?>
                        </div>
                    </div>
                </div>
            </aside>
        <?php }?>
        <?php if (get_theme_mod('vw_pet_care_copyright_hide_show', true)) {?>
            <div id="footer-2" class="pt-3 pb-3 text-center">
              	<div class="copyright container">
                    <p class="mb-0"><?php vw_pet_care_credit(); ?> <?php echo esc_html(get_theme_mod('vw_pet_care_footer_text',__('By VWThemes','vw-pet-care'))); ?></p>
                    <?php if ( ! dynamic_sidebar( 'footer-icon' ) ) : ?> 
                        <?php dynamic_sidebar('footer-icon'); ?>
                    <?php endif; ?>
                    <?php if( get_theme_mod( 'vw_pet_care_hide_show_scroll',true) == 1 || get_theme_mod( 'vw_pet_care_resp_scroll_top_hide_show',true) == 1) { ?>
                        <?php $vw_pet_care_theme_lay = get_theme_mod( 'vw_pet_care_scroll_top_alignment','Right');
                        if($vw_pet_care_theme_lay == 'Left'){ ?>
                            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'vw-pet-care' ); ?></span></a>
                        <?php }else if($vw_pet_care_theme_lay == 'Center'){ ?>
                            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'vw-pet-care' ); ?></span></a>
                        <?php }else{ ?>
                            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('vw_pet_care_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'vw-pet-care' ); ?></span></a>
                        <?php }?>
                    <?php }?>
              	</div>
              	<div class="clear"></div>
            </div>
        <?php }?>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>