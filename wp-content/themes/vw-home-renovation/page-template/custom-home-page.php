<?php

/**
 * Template Name: Custom Home Page
 */

get_header();
?>

<main id="maincontent" role="main">

  <?php do_action('vw_home_renovation_before_slider'); ?>

  <?php if (get_theme_mod('vw_home_renovation_show_hide_banner', true) == 1 || get_theme_mod( 'vw_home_renovation_resp_slider_hide_show', true)) { ?>
    <section id="banner" class="position-relative wow bounceInLeft delay-1000" data-wow-duration="3s">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 banner-main-text">
          <div class="container">
            <div class="banner-caption">
              <?php if (get_theme_mod('vw_home_renovation_designation_small_text') != '') { ?>
                <span><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_small_text')) ?></span>
              <?php } ?>
              <?php if (get_theme_mod('vw_home_renovation_tagline_title') != '') { ?>
                <h1><?php echo esc_html(get_theme_mod('vw_home_renovation_tagline_title')) ?></h1>
              <?php } ?>
              <?php if (get_theme_mod('vw_home_renovation_designation_text') != '') { ?>
                <p><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_text')) ?></p>
              <?php } ?>
              <?php if (get_theme_mod('vw_home_renovation_banner_button_label', 'Browse Services') != '') { ?>
                <div class="read-more-btn ">
                  <a class="me-2" href="<?php echo esc_url(get_theme_mod('vw_home_renovation_top_button_url', false)); ?>"><?php echo esc_html(get_theme_mod('vw_home_renovation_banner_button_label', 'Browse Services')); ?>
                    <span class="screen-reader-text"><?php esc_html_e('Browse Services', 'vw-home-renovation'); ?>
                    </span>
                  </a>
                  <i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_banner_icon','fas fa-angle-right')); ?>"></i>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="progressBarContainer">
            <div class="item">
              <h3><?php esc_html_e('01', 'vw-home-renovation'); ?></h3>
              <span data-slick-index="0" class="progressBar"></span>
            </div>
            <div class="item">
              <h3><?php esc_html_e('02', 'vw-home-renovation'); ?></h3>
              <span data-slick-index="1" class="progressBar"></span>
            </div>
            <div class="item">
              <h3><?php esc_html_e('03', 'vw-home-renovation'); ?></h3>
              <span data-slick-index="2" class="progressBar"></span>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 banner-main-image">
          <div class="sliderContainer">
            <div class="slider single-item">
              <?php for ($vw_home_renovation_i = 1; $vw_home_renovation_i <= 3; $vw_home_renovation_i++) { ?>
                <div class="banner-slide">
                  <?php if (get_theme_mod('vw_home_renovation_banner_background_image_sec' . $vw_home_renovation_i) != '') { ?>
                    <img src="<?php echo esc_url(get_theme_mod('vw_home_renovation_banner_background_image_sec' . $vw_home_renovation_i)); ?>" alt="banner slider Img">
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="next-viewer">
          <div class="next-image next_slide">
            <img src="<?php echo esc_url(get_theme_mod('vw_home_renovation_banner_background_image_sec2')); ?>" title="Next Slide">
          </div>
          <div class="next-title">
            <div class="slider-tag">
              <?php if (get_theme_mod('vw_home_renovation_designation_text3') != '') { ?>
                <span><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_text3')) ?></span>
              <?php } ?>
              <?php if (get_theme_mod('vw_home_renovation_designation_text4') != '') { ?>
                <p><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_text4')) ?></p>
              <?php } ?>
            </div>
            <span class="title-holder"></span>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action('vw_home_renovation_after_slider'); ?>

  <!-- Our Services Section -->
  <?php if( get_theme_mod('vw_home_renovation_services_number') != ''){ ?>
    <section id="our-services" class="wow bounceInRight delay-1000 mt-md-5 mt-3" data-wow-duration="3s">
      <div class="container">
        <div class="heding-title">
          <?php if (get_theme_mod('vw_home_renovation_our_services_heading') != '') { ?>
            <h2 class="text-center"><?php echo esc_html(get_theme_mod('vw_home_renovation_our_services_heading')); ?></h2>
          <?php } ?>
          <p class="text-center"><?php echo esc_html(get_theme_mod('vw_home_renovation_our_services_small_title', '')); ?></p>
        </div>
        <div class="tab-section position-relative">
          <div class="tab  align-self-center d-flex gap-4">
            <?php
            $vw_home_renovation_featured_post = get_theme_mod('vw_home_renovation_services_number', '');
            for ($vw_home_renovation_j = 1; $vw_home_renovation_j <= $vw_home_renovation_featured_post; $vw_home_renovation_j++) { ?>
              <div class="icon-tab">
                <button class="tablinks" onclick="vw_home_renovation_services_tab(event, '<?php $vw_home_renovation_main_id = get_theme_mod('vw_home_renovation_services_text' . $vw_home_renovation_j);
                    $tab_id = str_replace(' ', '-', $vw_home_renovation_main_id);
                      echo $tab_id; ?> ')">
                  <div class="d-flex align-items-center"> <i class=" me-3 <?php echo esc_attr(get_theme_mod('vw_home_renovation_about_list_icon' . $vw_home_renovation_j)); ?>"></i>
                    <span><?php echo esc_html(get_theme_mod('vw_home_renovation_services_text' . $vw_home_renovation_j)); ?></span>
                  </div>
                </button>
              </div>
            <?php } ?>
          </div>
        </div>
        <?php for ($vw_home_renovation_j = 1; $vw_home_renovation_j <= $vw_home_renovation_featured_post; $vw_home_renovation_j++) { ?>
          <div id="<?php $vw_home_renovation_main_id = get_theme_mod('vw_home_renovation_services_text' . $vw_home_renovation_j);
            $tab_id = str_replace(' ', '-', $vw_home_renovation_main_id);
            echo $tab_id; ?>" class="tabcontent">
            <div class="row">
              <div class="col-lg-7 col-md-6 col-12 image-left mb-lg-0 mb-md-0 mb-4 align-self-center">
                <div class="services-content text-start ps-2">
                  <?php if (get_theme_mod('vw_home_renovation_our_services_text1' . $vw_home_renovation_j) != '') { ?>
                    <h2><?php echo esc_html(get_theme_mod('vw_home_renovation_our_services_text1' . $vw_home_renovation_j)); ?></h2>
                  <?php } ?>
                  <?php if (get_theme_mod('vw_home_renovation_designation_our_services_text' . $vw_home_renovation_j) != '') { ?>
                    <p><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_our_services_text' . $vw_home_renovation_j)) ?></p>
                  <?php } ?>
                  <?php if (get_theme_mod('vw_home_renovation_banner_button_our_services_label' . $vw_home_renovation_j, 'Learn More') != '' || get_theme_mod('vw_home_renovation_top_button_our_services_url' . $vw_home_renovation_j) != '') { ?>
                    <div class="read-more-btn mt-0">
                      <a class="me-2" href="<?php echo esc_url(get_theme_mod('vw_home_renovation_top_button_our_services_url' . $vw_home_renovation_j, false)); ?>"><?php echo esc_html(get_theme_mod('vw_home_renovation_banner_button_our_services_label' . $vw_home_renovation_j, 'Learn More')); ?>
                        <span class="screen-reader-text"><?php esc_html_e('Learn More', 'vw-home-renovation'); ?>
                        </span>
                      </a>
                      <i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_service_icon'.$vw_home_renovation_j,'fas fa-angle-right')); ?>"></i>
                    </div>
                  <?php } ?>
                </div>
              </div>
              
              <div class="col-lg-5 col-md-6 col-12 about-content align-self-center">
                <?php if( get_theme_mod('vw_home_renovation_our_services_background_image' . $vw_home_renovation_j) != '' || get_theme_mod('vw_home_renovation_our_services_background_image1' . $vw_home_renovation_j) != '' ) { ?>
                  <figure class="bridgeContainer position-relative">
                    <div class="scratch-container">
                      <div class="before"><?php echo esc_html(get_theme_mod('vw_home_renovation_designation_our_services_before_after_text' . $vw_home_renovation_j, 'Before')); ?></div>
                      
                      <img class="bottomImage" style="display: none;" src="<?php echo esc_url(get_theme_mod('vw_home_renovation_our_services_background_image' . $vw_home_renovation_j)); ?>" width="400" height="300" alt="Bottom Image">
                      <canvas class="bridge" width="517" height="320"></canvas>
                      
                      <img class="topImage" style="display: none;" src="<?php echo esc_url(get_theme_mod('vw_home_renovation_our_services_background_image1' . $vw_home_renovation_j)); ?>" width="400" height="300" alt="Top Image">
                      
                      <div class="scratch-wrap">
                        <div class="scratch-insutuction">
                          <?php echo esc_html(get_theme_mod('vw_home_renovation_designation_our_services_scratch_before_after_text' . $vw_home_renovation_j, 'If you want after please scratch')); ?>
                        </div>
                      </div>
                    </div>
                  </figure>
                <?php } ?>
              </div>

            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  <?php }?>

  <?php do_action('vw_home_renovation_after_our_services_section'); ?>
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