<?php
/**
 * The template part for displaying page content
 *
 * @package VW Home Renovation 
 * @subpackage vw-home-renovation
 * @since vw-home-renovation 1.0
 */
?>

<div id="content-vw">
  <h1 class="vw-page-title"><?php the_title();?></h1>
  <?php if(has_post_thumbnail()) {?>
    <img class="page-image" src="<?php echo the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image">
    <hr>
  <?php }?> 
  <?php the_content();?>

  <div class="clearfix"></div>

  <?php wp_link_pages(); ?>

  <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  ?>
  <?php echo esc_html (vw_home_renovation_edit_link()); ?>
  <div class="clearfix"></div>
</div>