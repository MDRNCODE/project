<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Home Renovation 
 */

get_header(); ?>

<?php do_action( 'vw_home_renovation_page_top' ); ?>

<main id="maincontent" class="middle-align pt-5" role="main"> 
    <div class="container">
        <?php $vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_page_layout','One_Column');
            if($vw_home_renovation_theme_lay == 'One_Column'){ ?>
                <?php if(get_theme_mod('vw_home_renovation_single_page_breadcrumb1',true) == 1){ ?>
                    <div class="breadcrumbs">
                        <?php vw_home_renovation_the_breadcrumb(); ?>
                    </div>
                <?php }?>
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content-page'); 
                endwhile; ?>
        <?php }else if($vw_home_renovation_theme_lay == 'Right_Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php if(get_theme_mod('vw_home_renovation_single_page_breadcrumb1',true) == 1){ ?>
                        <div class="breadcrumbs">
                            <?php vw_home_renovation_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
                <div id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php }else if($vw_home_renovation_theme_lay == 'Left_Sidebar'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
                <div class="col-lg-8 col-md-8">
                    <?php if(get_theme_mod('vw_home_renovation_single_page_breadcrumb1',true) == 1){ ?>
                        <div class="breadcrumbs">
                            <?php vw_home_renovation_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
            </div>
        <?php }else {?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php if(get_theme_mod('vw_home_renovation_single_page_breadcrumb1',true) == 1){ ?>
                        <div class="breadcrumbs">
                            <?php vw_home_renovation_the_breadcrumb(); ?>
                        </div>
                    <?php }?>
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-page'); 
                    endwhile; ?>
                </div>
                <div id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-2'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<?php do_action( 'vw_home_renovation_page_bottom' ); ?>

<?php get_footer(); ?>