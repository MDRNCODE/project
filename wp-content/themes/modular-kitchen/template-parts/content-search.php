<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Modular Kitchen
 */
?>

<div class="<?php if(get_theme_mod('modular_kitchen_blog_post_columns','Two') == 'Two'){?>col-lg-6 col-md-6<?php } elseif(get_theme_mod('modular_kitchen_blog_post_columns','Two') == 'Three'){?>col-lg-4 col-md-6<?php }?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
        <?php if ( has_post_thumbnail() ) { ?><?php modular_kitchen_post_thumbnail(); ?><?php }?>
        <div class="meta-info-box my-2">
            <span class="entry-author"><?php esc_html_e('BY','modular-kitchen'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <span class="ms-2"></i><?php echo esc_html(get_the_date()); ?></span>
        </div>
        <div class="post-summary m-0">
            <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?><?php echo esc_html(get_theme_mod('modular_kitchen_post_page_excerpt_suffix','[...]')); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','modular-kitchen'); ?></a>
        </div>
    </article>
</div>