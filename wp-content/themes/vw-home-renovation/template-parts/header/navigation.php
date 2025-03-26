<?php
/**
 * The template part for header
 *
 * @package VW Home Renovation
 * @subpackage vw-home-renovation
 * @since vw-home-renovation 1.0
 */
?>

<div id="header">
  <div class="toggle-nav mobile-menu">
    <button role="tab" onclick="vw_home_renovation_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','vw-home-renovation'); ?></span></button>
  </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'vw-home-renovation' ); ?>">
      <?php 
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'main-menu clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="vw_home_renovation_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('vw_home_renovation_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','vw-home-renovation'); ?></span></a>
    </nav>
  </div>
</div>