<?php
/**
 * Displays main header
 *
 * @package Modular Kitchen
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
                <div class="navbar-brand text-center text-md-start">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $modular_kitchen_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $modular_kitchen_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('modular_kitchen_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('modular_kitchen_logo_title_text',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $modular_kitchen_description = get_bloginfo( 'description', 'display' );
                            if ( $modular_kitchen_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('modular_kitchen_theme_description',false) != ''){ ?>
                            <p class="site-description"><?php echo esc_html($modular_kitchen_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-2 col-4 align-self-center">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-8 align-self-center text-center text-md-end">
                <div class="header-btn">  
                    <?php if ( get_theme_mod('modular_kitchen_header_btn_text') != "" ) {?>
                        <a href="<?php echo esc_url(get_theme_mod('modular_kitchen_header_btn_url')); ?>"><?php echo esc_html(get_theme_mod('modular_kitchen_header_btn_text')); ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>