<?php

    $modular_kitchen_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $modular_kitchen_scroll_position = get_theme_mod( 'modular_kitchen_scroll_top_position','Right');
    if($modular_kitchen_scroll_position == 'Right'){
        $modular_kitchen_theme_css .='#button{';
            $modular_kitchen_theme_css .='right: 20px;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_scroll_position == 'Left'){
        $modular_kitchen_theme_css .='#button{';
            $modular_kitchen_theme_css .='left: 20px;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_scroll_position == 'Center'){
        $modular_kitchen_theme_css .='#button{';
            $modular_kitchen_theme_css .='right: 50%;left: 50%;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $modular_kitchen_scroll_to_top_border_radius = get_theme_mod('modular_kitchen_scroll_to_top_border_radius');
    $modular_kitchen_scroll_bg_color = get_theme_mod('modular_kitchen_scroll_bg_color');
    $modular_kitchen_scroll_color = get_theme_mod('modular_kitchen_scroll_color');
    $modular_kitchen_scroll_font_size = get_theme_mod('modular_kitchen_scroll_font_size');
    if($modular_kitchen_scroll_to_top_border_radius != false || $modular_kitchen_scroll_bg_color != false || $modular_kitchen_scroll_color != false || $modular_kitchen_scroll_font_size != false){
        $modular_kitchen_theme_css .='#colophon a#button{';
            $modular_kitchen_theme_css .='border-radius: '.esc_attr($modular_kitchen_scroll_to_top_border_radius).'px; background-color: '.esc_attr($modular_kitchen_scroll_bg_color).'; color: '.esc_attr($modular_kitchen_scroll_color).' !important; font-size: '.esc_attr($modular_kitchen_scroll_font_size).'px;';
        $modular_kitchen_theme_css .='}';
    }

    /*---------------------------Slider Height ------------*/

    $modular_kitchen_slider_img_height = get_theme_mod('modular_kitchen_slider_img_height');
    if($modular_kitchen_slider_img_height != false){
        $modular_kitchen_theme_css .='.banner-video-image img{';
            $modular_kitchen_theme_css .='height: '.esc_attr($modular_kitchen_slider_img_height).';';
        $modular_kitchen_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $modular_kitchen_single_post_navigation_show_hide = get_theme_mod('modular_kitchen_single_post_navigation_show_hide',true);
    if($modular_kitchen_single_post_navigation_show_hide != true){
        $modular_kitchen_theme_css .='.nav-links{';
            $modular_kitchen_theme_css .='display: none;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------- Woocommerce Product Border Radius -------------------*/

    $modular_kitchen_woo_product_border_radius = get_theme_mod('modular_kitchen_woo_product_border_radius', 0);
    if($modular_kitchen_woo_product_border_radius != false){
        $modular_kitchen_theme_css .='.woocommerce ul.products li.product a img{';
            $modular_kitchen_theme_css .='border-radius: '.esc_attr($modular_kitchen_woo_product_border_radius).'px;';
        $modular_kitchen_theme_css .='}';
    }

    /*----------------- Woocommerce Product Sale Positions -------------------*/

    $modular_kitchen_product_sale = get_theme_mod( 'modular_kitchen_woocommerce_product_sale','Right');
    if($modular_kitchen_product_sale == 'Right'){
        $modular_kitchen_theme_css .='.woocommerce ul.products li.product .onsale{';
            $modular_kitchen_theme_css .='left: auto; right: 15px;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_product_sale == 'Left'){
        $modular_kitchen_theme_css .='.woocommerce ul.products li.product .onsale{';
            $modular_kitchen_theme_css .='left: 15px; right: auto;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_product_sale == 'Center'){
        $modular_kitchen_theme_css .='.woocommerce ul.products li.product .onsale{';
            $modular_kitchen_theme_css .='right: 50%;left: 50%;';
        $modular_kitchen_theme_css .='}';
    }

    /*------------- Woocommerce Product Sale Border Radius -------------------*/

    $modular_kitchen_woo_product_sale_border_radius = get_theme_mod('modular_kitchen_woo_product_sale_border_radius');
    if($modular_kitchen_woo_product_sale_border_radius != false){
        $modular_kitchen_theme_css .='.woocommerce ul.products li.product .onsale{';
            $modular_kitchen_theme_css .='border-radius: '.esc_attr($modular_kitchen_woo_product_sale_border_radius).'px;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $modular_kitchen_footer_bg_image = get_theme_mod('modular_kitchen_footer_bg_image');
    if($modular_kitchen_footer_bg_image != false){
        $modular_kitchen_theme_css .='#colophon{';
            $modular_kitchen_theme_css .='background: url('.esc_attr($modular_kitchen_footer_bg_image).')!important;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $modular_kitchen_copyright_background_color = get_theme_mod('modular_kitchen_copyright_background_color');
    if($modular_kitchen_copyright_background_color != false){
        $modular_kitchen_theme_css .='.footer_info{';
            $modular_kitchen_theme_css .='background-color: '.esc_attr($modular_kitchen_copyright_background_color).' !important;';
        $modular_kitchen_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $modular_kitchen_logo_title_color = get_theme_mod('modular_kitchen_logo_title_color');
    if($modular_kitchen_logo_title_color != false){
        $modular_kitchen_theme_css .='p.site-title a, .navbar-brand a{';
            $modular_kitchen_theme_css .='color: '.esc_attr($modular_kitchen_logo_title_color).' !important;';
        $modular_kitchen_theme_css .='}';
    }

    $modular_kitchen_logo_tagline_color = get_theme_mod('modular_kitchen_logo_tagline_color');
    if($modular_kitchen_logo_tagline_color != false){
        $modular_kitchen_theme_css .='.logo p.site-description, .navbar-brand p{';
            $modular_kitchen_theme_css .='color: '.esc_attr($modular_kitchen_logo_tagline_color).'  !important;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $modular_kitchen_footer_widget_content_alignment = get_theme_mod( 'modular_kitchen_footer_widget_content_alignment','Left');
    if($modular_kitchen_footer_widget_content_alignment == 'Left'){
        $modular_kitchen_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $modular_kitchen_theme_css .='text-align: left;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_footer_widget_content_alignment == 'Center'){
        $modular_kitchen_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $modular_kitchen_theme_css .='text-align: center;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_footer_widget_content_alignment == 'Right'){
        $modular_kitchen_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $modular_kitchen_theme_css .='text-align: right;';
        $modular_kitchen_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $modular_kitchen_copyright_content_alignment = get_theme_mod( 'modular_kitchen_copyright_content_alignment','Right');
    if($modular_kitchen_copyright_content_alignment == 'Left'){
        $modular_kitchen_theme_css .='.footer-menu-left{';
        $modular_kitchen_theme_css .='text-align: left;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_copyright_content_alignment == 'Center'){
        $modular_kitchen_theme_css .='.footer-menu-left{';
            $modular_kitchen_theme_css .='text-align: center;';
        $modular_kitchen_theme_css .='}';
    }else if($modular_kitchen_copyright_content_alignment == 'Right'){
        $modular_kitchen_theme_css .='.footer-menu-left{';
            $modular_kitchen_theme_css .='text-align: right;';
        $modular_kitchen_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $modular_kitchen_nav_menu = get_theme_mod( 'modular_kitchen_nav_menu_text_transform','Capitalize');
    if($modular_kitchen_nav_menu == 'Capitalize'){
        $modular_kitchen_theme_css .='.main-navigation .menu > li > a{';
            $modular_kitchen_theme_css .='text-transform:Capitalize;';
        $modular_kitchen_theme_css .='}';
    }
    if($modular_kitchen_nav_menu == 'Lowercase'){
        $modular_kitchen_theme_css .='.main-navigation .menu > li > a{';
            $modular_kitchen_theme_css .='text-transform:Lowercase;';
        $modular_kitchen_theme_css .='}';
    }
    if($modular_kitchen_nav_menu == 'Uppercase'){
        $modular_kitchen_theme_css .='.main-navigation .menu > li > a{';
            $modular_kitchen_theme_css .='text-transform:Uppercase;';
        $modular_kitchen_theme_css .='}';
    }

    $modular_kitchen_menu_font_size = get_theme_mod( 'modular_kitchen_menu_font_size');
    if($modular_kitchen_menu_font_size != ''){
        $modular_kitchen_theme_css .='.main-navigation .menu > li > a{';
            $modular_kitchen_theme_css .='font-size: '.esc_attr($modular_kitchen_menu_font_size).'px;';
        $modular_kitchen_theme_css .='}';
    }

    $modular_kitchen_nav_menu_font_weight = get_theme_mod( 'modular_kitchen_nav_menu_font_weight',400);
    if($modular_kitchen_menu_font_size != ''){
        $modular_kitchen_theme_css .='.main-navigation .menu > li > a{';
            $modular_kitchen_theme_css .='font-weight: '.esc_attr($modular_kitchen_nav_menu_font_weight).';';
        $modular_kitchen_theme_css .='}';
    }