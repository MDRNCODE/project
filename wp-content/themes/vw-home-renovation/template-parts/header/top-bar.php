<?php

/**
 * The template part for Top Header
 *
 * @package VW Home Renovation 
 * @subpackage vw-home-renovation
 * @since vw-home-renovation 1.0
 */
?>
<?php if( get_theme_mod( 'vw_home_renovation_topbar_hide_show', true) == 1 || get_theme_mod( 'vw_home_renovation_resp_topbar_hide_show', false) == 1) { ?>
  <div class="topbar-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-2">
          <div class="logo">
            <?php if (has_custom_logo()) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo('name'); ?>
            <?php if (!empty($blog_info)) : ?>
              <?php if (is_front_page() && is_home()) : ?>
                <?php if (get_theme_mod('vw_home_renovation_logo_title_hide_show', true) == 1) { ?>
                  <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if (get_theme_mod('vw_home_renovation_logo_title_hide_show', true) == 1) { ?>
                  <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
            ?>
              <?php if (get_theme_mod('vw_home_renovation_tagline_hide_show', false) == 1) { ?>
                <p class="site-description mb-0">
                  <?php echo esc_html($description); ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-10 col-md-12 align-self-center">
          <div class="row py-4 top-bar-sec">
            <div class="col-lg-3 col-md-2 social-media align-self-center text-lg-start text-md-start text-center mt-lg-0 mt-md-3 mt-2">
              <?php if (is_active_sidebar('social-links')) : ?>
                <?php dynamic_sidebar('social-links'); ?>
              <?php else : ?>
                <!-- Default Social Icons Widgets -->
                  <div class="widget">
                      <ul class="custom-social-icons" >
                        <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li> 
                        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li> 
                        <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li> 
                        <li><a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>                     
                      </ul>
                  </div>
              <?php endif; ?>  
            </div>
            <div class="col-md-4 col-md-4 align-self-center text-center topbar-location1 mt-lg-0 mt-md-3 mt-2">
              <?php if (get_theme_mod('vw_home_renovation_location') != '') { ?>
                <p class="topbar-location mb-0"><i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_location_icon','fas fa-map-marker-alt')); ?> mx-2"></i><?php echo esc_html(get_theme_mod('vw_home_renovation_location')); ?></p>
              <?php } ?>
            </div>
            <div class="col-lg-2 col-md-3 align-self-center text-center phone-number1 mt-lg-0 mt-md-3 mt-2">
              <?php if (get_theme_mod('vw_home_renovation_phone_number') != '') { ?>
                <span class="phone-number">
                  <i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_phone_number_icon','fa fa-phone')); ?> me-2"></i>
                <a href="tel:<?php echo esc_attr(get_theme_mod('vw_home_renovation_phone_number', '')); ?>">
                  <?php echo esc_html(get_theme_mod('vw_home_renovation_phone_number', '')); ?>
                </a>
                </span>
              <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 align-self-center text-lg-end text-md-end text-center email1 text-center mt-lg-0 mt-md-3 mt-2">
              <?php if (get_theme_mod('vw_home_renovation_lite_email', '') != '') { ?>
                <div class="email"><i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_email_icon','fas fa-envelope')); ?> mx-2"></i>
                  <a href="mailto:<?php echo esc_attr(get_theme_mod('vw_home_renovation_lite_email', '')); ?>">
                    <?php echo esc_html(get_theme_mod('vw_home_renovation_lite_email', '')); ?>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="row menu-section">
            <div class="col-lg-9 col-md-6 align-self-center text-center text-md-center text-lg-start">
              <?php get_template_part('template-parts/header/navigation'); ?>
            </div>
            <div class="col-lg-3 col-md-6 align-self-center text-lg-end text-md-center text-center button-border">
              <?php if (get_theme_mod('vw_home_renovation_topbar_button_label') != '') { ?>
                <div class="topbar-button">
                  <a class="me-2" href="<?php echo esc_url(get_theme_mod('vw_home_renovation_topbar_button_url', false)); ?>">
                    <?php echo esc_html(get_theme_mod('vw_home_renovation_topbar_button_label')); ?>
                    <span class="screen-reader-text">
                      <?php esc_html_e('Book A Consultation', 'vw-home-renovation'); ?>
                    </span>
                  </a>
                  <i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_button_icon','fas fa-angle-right')); ?>"></i>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }?>  

