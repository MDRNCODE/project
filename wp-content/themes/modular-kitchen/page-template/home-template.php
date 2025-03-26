<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="banner" class="pb-5">
    <div class="row m-0">
      <div class="col-lg-3 col-md-3 col-sm-12 col-12">
         <div id="slider-product" class="">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
              $modular_kitchen_args = array(
                'post_type' => 'product',
                'posts_per_page' => 2,
                'product_cat' => get_theme_mod('modular_kitchen_banner_left_product_category'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $modular_kitchen_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="product-box text-center mb-5">
                  <div class="product-image mb-3">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                  </div>
                  <p class="product-title"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></p>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            <?php } ?>
          </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="main-heading"> 
          <h2 class="heading text-center mb-4">
            <?php echo esc_html(get_theme_mod('modular_kitchen_banner_section_main_heading')); ?>
          </h2>
          <p class="text text-center mb-3">
            <?php echo esc_html(get_theme_mod('modular_kitchen_banner_section_main_para')); ?>
          </p>
          <div class="banner-video-image">
            <?php if ( get_theme_mod('modular_kitchen_banner_video_image') != "" ) {?>
              <img src="<?php echo esc_url(get_theme_mod('modular_kitchen_banner_video_image')); ?>" alt="v-img">               
              <!-- Button to open the modal -->
              <a id="openModalButton" data-modal-src="<?php echo esc_url(get_theme_mod('modular_kitchen_banner_video_url')); ?>"><i class="fa-solid fa-play">
              </i></a>
              <!-- The modal -->
              <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                  <span id="closeModalButton" class="close">&times;</span>
                  <?php if( get_theme_mod('modular_kitchen_banner_video_url') != ''){ ?>
                  <embed id="videoPlayer" height="369" src="<?php echo esc_url(get_theme_mod('modular_kitchen_banner_video_url')); ?>"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></embed>
                  <?php }else{ ?>
                    <h3><?php esc_html_e('Add Video Url In Customizer To Display Video Here','modular-kitchen'); ?></h3>
                  <?php } ?>
                </div>
              </div> 
            <?php } ?> 
          </div>
        </div>          
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-12">
        <div id="slider-product" class="">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
              $modular_kitchen_args = array(
                'post_type' => 'product',
                'posts_per_page' => 2,
                'product_cat' => get_theme_mod('modular_kitchen_banner_right_product_category'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $modular_kitchen_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="product-box text-center mb-5">
                  <div class="product-image mb-3">
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                  </div>
                  <p class="product-title"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></p>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            <?php } ?>
          </div>
      </div>
    </div>
  </section>

  <section id="kitchen-types" class=" py-5">
    <div class="container-fluid">
      <div class="heading">
        <h3 class="main_heading text-center my-3"><?php echo esc_html(get_theme_mod('modular_kitchen_kitchen_types_section_heading')); ?>
        </h3>
      </div>
      <div class="owl-carousel">
        <?php
        $modular_kitchen_category = get_theme_mod('modular_kitchen_kitchen_type_category','');
        $args = array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'category_name' => esc_html($modular_kitchen_category,'modular-kitchen'),
          'posts_per_page' => get_theme_mod('modular_kitchen_kitchen_number')
        );  
        $query = new WP_Query($args); 
        if ( $query->have_posts() ) :  while ($query->have_posts()) : $query->the_post();
        ?>
          <div class="type-content">
            <?php the_post_thumbnail(); ?>
            <div class="type-image">
              <div class="type-box my-3 text-center">
                <a href="<?php the_permalink(); ?>" class="type-title"><?php the_title(); ?></a>
              </div>
              <div class="type-content text-center">
                <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
              </div>
              <div class="type-read text-center">
                <a class="type-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Explore More','modular-kitchen'); ?></a>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>