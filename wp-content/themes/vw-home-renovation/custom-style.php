<?php

	$vw_home_renovation_custom_css= "";

	/*-------------------- First Highlight Color -------------------*/

	$vw_home_renovation_first_color = get_theme_mod('vw_home_renovation_first_color');

	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='.principle-box:hover .principle-box-inner-img,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar .widget_block h3, #sidebar h2, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading,.breadcrumbs a, .post-categories li a,.breadcrumbs span,.wp-block-button__link,#sidebar .wp-block-tag-cloud a:hover,#footer .wp-block-tag-cloud a:hover,#footer-2,.read-more a,#banner .slider-nav .slick-slide.slick-current.slick-active,.compare-btn a, .compare-btn-banner a, .topbar-btn a, .list-item-button a, .tutor-course-list-btn a, #slider .more-btn a,#slider .carousel-control-next i, #slider .carousel-control-prev i,.toggle-nav i, .logo::after, .next-title,.progressBarContainer div span.progressBar .inProgress,.progressBarContainer div span.progressBar .inProgress,.topbar-button a:hover, .read-more-btn a:hover,.before,#our-services .icon-tab button.tablinks.active,.topbar-button a:hover, .read-more-btn a:hover, .woocommerce-cart .wc-block-grid .wc-block-grid__product-onsale,.woocommerce-account .addresses .title .edit{';
			$vw_home_renovation_custom_css .='background: '.esc_attr($vw_home_renovation_first_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='#sidebar ul li::before,#footer-2,.more-btn a:hover, #comments a.comment-reply-link:hover, .pagination a:hover, #footer .tagcloud a:hover, .pro-button a:hover, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover, input[type="submit"]:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .pro-button:hover, .woocommerce a.added_to_cart.wc-forward:hover,.wc-block-components-order-summary-item__quantity,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.topbar-button a:hover, .read-more-btn a:hover{';
			$vw_home_renovation_custom_css .='background: '.esc_attr($vw_home_renovation_first_color).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='a, .main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item, .main-navigation li a:hover,.main-navigation ul li.current_page_item a, .main-navigation li a:hover, .main-navigation ul ul li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover,p.site-title a:hover, .logo h1 a:hover,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .grid-post-main-box:hover h2 a, .grid-post-main-box:hover .post-info span a,#best-product-section .product-box:hover .product-box-content h3 a, #degree-courses .small-text, .small-text2,.sticky .post-main-box h2:before{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_first_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='.home-page-header,.main-navigation ul ul, .main-navigation ul li.current_page_item a{';
			$vw_home_renovation_custom_css .='border-color: '.esc_attr($vw_home_renovation_first_color).';';
		$vw_home_renovation_custom_css .='}';
	}


	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='.logo::before{';
			$vw_home_renovation_custom_css .='border-bottom:44px solid '.esc_attr($vw_home_renovation_first_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	if($vw_home_renovation_first_color != false){
		$vw_home_renovation_custom_css .='.main-navigation ul ul{';
			$vw_home_renovation_custom_css .='border-bottom:2px solid '.esc_attr($vw_home_renovation_first_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_width_option','Full Width');
    if($vw_home_renovation_theme_lay == 'Boxed'){
		$vw_home_renovation_custom_css .='body{';
			$vw_home_renovation_custom_css .='max-width: 1140px; width: 100%; margin-right: auto; margin-left: auto;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='right: 100px;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.row.outer-logo{';
			$vw_home_renovation_custom_css .='margin-left: 0px;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_theme_lay == 'Wide Width'){
		$vw_home_renovation_custom_css .='body{';
			$vw_home_renovation_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='right: 30px;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.row.outer-logo{';
			$vw_home_renovation_custom_css .='margin-left: 0px;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_theme_lay == 'Full Width'){
		$vw_home_renovation_custom_css .='body{';
			$vw_home_renovation_custom_css .='max-width: 100%;';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_home_renovation_resp_slider = get_theme_mod( 'vw_home_renovation_resp_slider_hide_show',true);
	if($vw_home_renovation_resp_slider == true && get_theme_mod( 'vw_home_renovation_show_hide_banner', true) == false){
    	$vw_home_renovation_custom_css .='#banner{';
			$vw_home_renovation_custom_css .='display:none;';
		$vw_home_renovation_custom_css .='} ';
	}
    if($vw_home_renovation_resp_slider == true){
    	$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='#banner{';
			$vw_home_renovation_custom_css .='display:block;';
		$vw_home_renovation_custom_css .='} }';
	}else if($vw_home_renovation_resp_slider == false){
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='#banner{';
			$vw_home_renovation_custom_css .='display:none;';
		$vw_home_renovation_custom_css .='} }';
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px){';
		$vw_home_renovation_custom_css .='.page-template-custom-home-page .topbar-section{';
			$vw_home_renovation_custom_css .='margin-top: 45px;';
		$vw_home_renovation_custom_css .='} }';
	}

	$vw_home_renovation_resp_sidebar = get_theme_mod( 'vw_home_renovation_sidebar_hide_show',true);
    if($vw_home_renovation_resp_sidebar == true){
    	$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='#sidebar{';
			$vw_home_renovation_custom_css .='display:block;margin-top:30px;';
		$vw_home_renovation_custom_css .='} }';
	}else if($vw_home_renovation_resp_sidebar == false){
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='#sidebar{';
			$vw_home_renovation_custom_css .='display:none;';
		$vw_home_renovation_custom_css .='} }';
	}

	$vw_home_renovation_responsive_preloader_hide = get_theme_mod('vw_home_renovation_responsive_preloader_hide',false);
	if($vw_home_renovation_responsive_preloader_hide == true && get_theme_mod('vw_home_renovation_loader_enable',false) == false){
		$vw_home_renovation_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$vw_home_renovation_custom_css .='display:none !important;';
		$vw_home_renovation_custom_css .='} }';
	}

	if($vw_home_renovation_responsive_preloader_hide == false){
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$vw_home_renovation_custom_css .='display:none !important;';
		$vw_home_renovation_custom_css .='} }';
	}


	$vw_home_renovation_resp_scroll_top = get_theme_mod( 'vw_home_renovation_resp_scroll_top_hide_show',true);
	if($vw_home_renovation_resp_scroll_top == true && get_theme_mod( 'vw_home_renovation_hide_show_scroll',true) == false){
    	$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='visibility:hidden !important;';
		$vw_home_renovation_custom_css .='} ';
	}
    if($vw_home_renovation_resp_scroll_top == true){
    	$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='visibility:visible !important;';
		$vw_home_renovation_custom_css .='} }';
	}else if($vw_home_renovation_resp_scroll_top == false){
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px){';
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='visibility:hidden !important;';
		$vw_home_renovation_custom_css .='} }';
	}

	/*---------------------------Slider Height ------------*/

	$vw_home_renovation_slider_height = get_theme_mod('vw_home_renovation_slider_height');
	if($vw_home_renovation_slider_height != false){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='height: '.esc_attr($vw_home_renovation_slider_height).';';
		$vw_home_renovation_custom_css .='}';
	}

/*------------------ Slider Opacity -------------------*/

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_slider_opacity_color','');
	if($vw_home_renovation_theme_lay == '0'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.1'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.1';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.2'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.2';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.3'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.3';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.4'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.4';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.5'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.5';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.6'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.6';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.7'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.7';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.8'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.8';
		$vw_home_renovation_custom_css .='}';
		}else if($vw_home_renovation_theme_lay == '0.9'){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:0.9';
		$vw_home_renovation_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_home_renovation_slider_image_overlay = get_theme_mod('vw_home_renovation_slider_image_overlay', true);
	if($vw_home_renovation_slider_image_overlay == false){
		$vw_home_renovation_custom_css .='#slider img{';
			$vw_home_renovation_custom_css .='opacity:1;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_slider_image_overlay_color = get_theme_mod('vw_home_renovation_slider_image_overlay_color', true);
	if($vw_home_renovation_slider_image_overlay_color != false){
		$vw_home_renovation_custom_css .='#slider{';
			$vw_home_renovation_custom_css .='background-color: '.esc_attr($vw_home_renovation_slider_image_overlay_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_home_renovation_slider_content_padding_top_bottom = get_theme_mod('vw_home_renovation_slider_content_padding_top_bottom');
	$vw_home_renovation_slider_content_padding_left_right = get_theme_mod('vw_home_renovation_slider_content_padding_left_right');
	if($vw_home_renovation_slider_content_padding_top_bottom != false || $vw_home_renovation_slider_content_padding_left_right != false){
		$vw_home_renovation_custom_css .='#slider .carousel-caption{';
			$vw_home_renovation_custom_css .='top: '.esc_attr($vw_home_renovation_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_home_renovation_slider_content_padding_top_bottom).';left: '.esc_attr($vw_home_renovation_slider_content_padding_left_right).';right: '.esc_attr($vw_home_renovation_slider_content_padding_left_right).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_home_renovation_copyright_alingment = get_theme_mod('vw_home_renovation_copyright_alingment');
	if($vw_home_renovation_copyright_alingment != false){
		$vw_home_renovation_custom_css .='.copyright p{';
			$vw_home_renovation_custom_css .='text-align: '.esc_attr($vw_home_renovation_copyright_alingment).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$vw_home_renovation_preloader_bg_color = get_theme_mod('vw_home_renovation_preloader_bg_color');
	if($vw_home_renovation_preloader_bg_color != false){
		$vw_home_renovation_custom_css .='#preloader{';
			$vw_home_renovation_custom_css .='background-color: '.esc_attr($vw_home_renovation_preloader_bg_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_preloader_border_color = get_theme_mod('vw_home_renovation_preloader_border_color');
	if($vw_home_renovation_preloader_border_color != false){
		$vw_home_renovation_custom_css .='.loader-line{';
			$vw_home_renovation_custom_css .='border-color: '.esc_attr($vw_home_renovation_preloader_border_color).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_preloader_bg_img = get_theme_mod('vw_home_renovation_preloader_bg_img');
	if($vw_home_renovation_preloader_bg_img != false){
		$vw_home_renovation_custom_css .='#preloader{';
			$vw_home_renovation_custom_css .='background: url('.esc_attr($vw_home_renovation_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_home_renovation_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_home_renovation_copyright_alingment = get_theme_mod('vw_home_renovation_copyright_alingment');
	if($vw_home_renovation_copyright_alingment != false){
		$vw_home_renovation_custom_css .='.copyright p{';
			$vw_home_renovation_custom_css .='text-align: '.esc_attr($vw_home_renovation_copyright_alingment).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_copyright_background_color = get_theme_mod('vw_home_renovation_copyright_background_color');
	if($vw_home_renovation_copyright_background_color != false){
		$vw_home_renovation_custom_css .='#footer-2{';
			$vw_home_renovation_custom_css .='background-color: '.esc_attr($vw_home_renovation_copyright_background_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_footer_background_color = get_theme_mod('vw_home_renovation_footer_background_color');
	if($vw_home_renovation_footer_background_color != false){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='background-color: '.esc_attr($vw_home_renovation_footer_background_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_footer_widgets_heading = get_theme_mod( 'vw_home_renovation_footer_widgets_heading','Left');
    if($vw_home_renovation_footer_widgets_heading == 'Left'){
		$vw_home_renovation_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_home_renovation_custom_css .='text-align: left;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_footer_widgets_heading == 'Center'){
		$vw_home_renovation_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_home_renovation_custom_css .='text-align: center;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_footer_widgets_heading == 'Right'){
		$vw_home_renovation_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_home_renovation_custom_css .='text-align: right;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_footer_widgets_content = get_theme_mod( 'vw_home_renovation_footer_widgets_content','Left');
    if($vw_home_renovation_footer_widgets_content == 'Left'){
		$vw_home_renovation_custom_css .='#footer .widget{';
		$vw_home_renovation_custom_css .='text-align: left;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_footer_widgets_content == 'Center'){
		$vw_home_renovation_custom_css .='#footer .widget{';
			$vw_home_renovation_custom_css .='text-align: center;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_footer_widgets_content == 'Right'){
		$vw_home_renovation_custom_css .='#footer .widget{';
			$vw_home_renovation_custom_css .='text-align: right;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_copyright_font_size = get_theme_mod('vw_home_renovation_copyright_font_size');
	if($vw_home_renovation_copyright_font_size != false){
		$vw_home_renovation_custom_css .='#footer-2 a, #footer-2 p{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_copyright_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_copyright_alingment = get_theme_mod('vw_home_renovation_copyright_alingment');
	if($vw_home_renovation_copyright_alingment != false){
		$vw_home_renovation_custom_css .='#footer-2 p{';
			$vw_home_renovation_custom_css .='text-align: '.esc_attr($vw_home_renovation_copyright_alingment).';';
		$vw_home_renovation_custom_css .='}';
	}
	$vw_home_renovation_copyright_padding_top_bottom = get_theme_mod('vw_home_renovation_copyright_padding_top_bottom');
	if($vw_home_renovation_copyright_padding_top_bottom != false){
		$vw_home_renovation_custom_css .='#footer-2{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_home_renovation_copyright_padding_top_bottom).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_footer_padding = get_theme_mod('vw_home_renovation_footer_padding');
	if($vw_home_renovation_footer_padding != false){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='padding: '.esc_attr($vw_home_renovation_footer_padding).' 0;';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------Scroll to top Settings ------------------*/

	$vw_home_renovation_scroll_to_top_font_size = get_theme_mod('vw_home_renovation_scroll_to_top_font_size');
	if($vw_home_renovation_scroll_to_top_font_size != false){
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_scroll_to_top_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_scroll_to_top_padding = get_theme_mod('vw_home_renovation_scroll_to_top_padding');
	$vw_home_renovation_scroll_to_top_padding = get_theme_mod('vw_home_renovation_scroll_to_top_padding');
	if($vw_home_renovation_scroll_to_top_padding != false){
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_home_renovation_scroll_to_top_padding).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_scroll_to_top_width = get_theme_mod('vw_home_renovation_scroll_to_top_width');
	if($vw_home_renovation_scroll_to_top_width != false){
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='width: '.esc_attr($vw_home_renovation_scroll_to_top_width).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_scroll_to_top_height = get_theme_mod('vw_home_renovation_scroll_to_top_height');
	if($vw_home_renovation_scroll_to_top_height != false){
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='height: '.esc_attr($vw_home_renovation_scroll_to_top_height).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_scroll_to_top_border_radius = get_theme_mod('vw_home_renovation_scroll_to_top_border_radius');
	if($vw_home_renovation_scroll_to_top_border_radius != false){
		$vw_home_renovation_custom_css .='.scrollup i{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_scroll_to_top_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_home_renovation_logo_padding = get_theme_mod('vw_home_renovation_logo_padding');
	if($vw_home_renovation_logo_padding != false){
		$vw_home_renovation_custom_css .='.logo{';
			$vw_home_renovation_custom_css .='padding: '.esc_attr($vw_home_renovation_logo_padding).' !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_logo_margin = get_theme_mod('vw_home_renovation_logo_margin');
	if($vw_home_renovation_logo_margin != false){
		$vw_home_renovation_custom_css .='.logo{';
			$vw_home_renovation_custom_css .='margin: '.esc_attr($vw_home_renovation_logo_margin).';';
		$vw_home_renovation_custom_css .='}';
	}

	// Site title Font Size
	$vw_home_renovation_site_title_font_size = get_theme_mod('vw_home_renovation_site_title_font_size');
	if($vw_home_renovation_site_title_font_size != false){
		$vw_home_renovation_custom_css .='.logo p.site-title, .logo h1{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_site_title_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_home_renovation_site_tagline_font_size = get_theme_mod('vw_home_renovation_site_tagline_font_size');
	if($vw_home_renovation_site_tagline_font_size != false){
		$vw_home_renovation_custom_css .='.logo p.site-description{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_site_tagline_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_site_title_color = get_theme_mod('vw_home_renovation_site_title_color');
	if($vw_home_renovation_site_title_color != false){
		$vw_home_renovation_custom_css .='p.site-title a, .logo h1 a{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_site_title_color).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_site_tagline_color = get_theme_mod('vw_home_renovation_site_tagline_color');
	if($vw_home_renovation_site_tagline_color != false){
		$vw_home_renovation_custom_css .='.logo p.site-description{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_site_tagline_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_logo_width = get_theme_mod('vw_home_renovation_logo_width');
	if($vw_home_renovation_logo_width != false){
		$vw_home_renovation_custom_css .='.logo img{';
			$vw_home_renovation_custom_css .='width: '.esc_attr($vw_home_renovation_logo_width).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_logo_height = get_theme_mod('vw_home_renovation_logo_height');
	if($vw_home_renovation_logo_height != false){
		$vw_home_renovation_custom_css .='.logo img{';
			$vw_home_renovation_custom_css .='height: '.esc_attr($vw_home_renovation_logo_height).';';
		$vw_home_renovation_custom_css .='}';
	}

	// Header Background Color
	$vw_home_renovation_header_background_color = get_theme_mod('vw_home_renovation_header_background_color');
	if($vw_home_renovation_header_background_color != false){
		$vw_home_renovation_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_home_renovation_custom_css .='background-color: '.esc_attr($vw_home_renovation_header_background_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_header_img_position = get_theme_mod('vw_home_renovation_header_img_position','center top');
	if($vw_home_renovation_header_img_position != false){
		$vw_home_renovation_custom_css .='.page-template-custom-home-page .home-page-header, .home-page-header{';
			$vw_home_renovation_custom_css .='background-position: '.esc_attr($vw_home_renovation_header_img_position).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_blog_layout_option','Default');
    if($vw_home_renovation_theme_lay == 'Default'){
		$vw_home_renovation_custom_css .='.post-main-box{';
			$vw_home_renovation_custom_css .='';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_theme_lay == 'Center'){
		$vw_home_renovation_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_home_renovation_custom_css .='text-align:center;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.post-info{';
			$vw_home_renovation_custom_css .='margin-top:10px;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.post-info hr{';
			$vw_home_renovation_custom_css .='margin:15px auto;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_theme_lay == 'Left'){
		$vw_home_renovation_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_home_renovation_custom_css .='text-align:Left;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.post-info hr{';
			$vw_home_renovation_custom_css .='margin-bottom:10px;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.post-main-box h2{';
			$vw_home_renovation_custom_css .='margin-top:10px;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='.service-text .more-btn{';
			$vw_home_renovation_custom_css .='display:inline-block;';
		$vw_home_renovation_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_home_renovation_blog_page_posts_settings = get_theme_mod( 'vw_home_renovation_blog_page_posts_settings','Into Blocks');
    if($vw_home_renovation_blog_page_posts_settings == 'Without Blocks'){
		$vw_home_renovation_custom_css .='.post-main-box{';
			$vw_home_renovation_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_home_renovation_custom_css .='}';
	}

	// featured image dimention
	$vw_home_renovation_blog_post_featured_image_dimension = get_theme_mod('vw_home_renovation_blog_post_featured_image_dimension', 'default');
	$vw_home_renovation_blog_post_featured_image_custom_width = get_theme_mod('vw_home_renovation_blog_post_featured_image_custom_width',250);
	$vw_home_renovation_blog_post_featured_image_custom_height = get_theme_mod('vw_home_renovation_blog_post_featured_image_custom_height',250);
	if($vw_home_renovation_blog_post_featured_image_dimension == 'custom'){
		$vw_home_renovation_custom_css .='.post-main-box img{';
			$vw_home_renovation_custom_css .='width: '.esc_attr($vw_home_renovation_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($vw_home_renovation_blog_post_featured_image_custom_height).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$vw_home_renovation_featured_image_border_radius = get_theme_mod('vw_home_renovation_featured_image_border_radius', 0);
	if($vw_home_renovation_featured_image_border_radius != false){
		$vw_home_renovation_custom_css .='.box-image img, .feature-box img{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_featured_image_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_featured_image_box_shadow = get_theme_mod('vw_home_renovation_featured_image_box_shadow',0);
	if($vw_home_renovation_featured_image_box_shadow != false){
		$vw_home_renovation_custom_css .='.box-image img, #content-vw img{';
			$vw_home_renovation_custom_css .='box-shadow: '.esc_attr($vw_home_renovation_featured_image_box_shadow).'px '.esc_attr($vw_home_renovation_featured_image_box_shadow).'px '.esc_attr($vw_home_renovation_featured_image_box_shadow).'px #cccccc;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_singlepost_image_box_shadow = get_theme_mod('vw_home_renovation_singlepost_image_box_shadow',0);
	if($vw_home_renovation_singlepost_image_box_shadow != false){
		$vw_home_renovation_custom_css .='.feature-box img{';
			$vw_home_renovation_custom_css .='box-shadow: '.esc_attr($vw_home_renovation_singlepost_image_box_shadow).'px '.esc_attr($vw_home_renovation_singlepost_image_box_shadow).'px '.esc_attr($vw_home_renovation_singlepost_image_box_shadow).'px #cccccc;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_related_image_box_shadow = get_theme_mod('vw_home_renovation_related_image_box_shadow',0);
	if($vw_home_renovation_related_image_box_shadow != false){
		$vw_home_renovation_custom_css .='.related-post .box-image img{';
			$vw_home_renovation_custom_css .='box-shadow: '.esc_attr($vw_home_renovation_related_image_box_shadow).'px '.esc_attr($vw_home_renovation_related_image_box_shadow).'px '.esc_attr($vw_home_renovation_related_image_box_shadow).'px #cccccc;';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_home_renovation_button_letter_spacing = get_theme_mod('vw_home_renovation_button_letter_spacing',14);
	$vw_home_renovation_custom_css .='.post-main-box .more-btn{';
		$vw_home_renovation_custom_css .='letter-spacing: '.esc_attr($vw_home_renovation_button_letter_spacing).';';
	$vw_home_renovation_custom_css .='}';

	$vw_home_renovation_button_border_radius = get_theme_mod('vw_home_renovation_button_border_radius');
	if($vw_home_renovation_button_border_radius != false){
		$vw_home_renovation_custom_css .='.post-main-box .more-btn a{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_button_border_radius).'px !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_button_top_bottom_padding = get_theme_mod('vw_home_renovation_button_top_bottom_padding');
	$vw_home_renovation_button_left_right_padding = get_theme_mod('vw_home_renovation_button_left_right_padding');
	if($vw_home_renovation_button_top_bottom_padding != false || $vw_home_renovation_button_left_right_padding != false){
		$vw_home_renovation_custom_css .='.post-main-box .more-btn{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_button_top_bottom_padding).'!important; padding-bottom: '.esc_attr($vw_home_renovation_button_top_bottom_padding).'!important;padding-left: '.esc_attr($vw_home_renovation_button_left_right_padding).'!important;padding-right: '.esc_attr($vw_home_renovation_button_left_right_padding).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_button_font_size = get_theme_mod('vw_home_renovation_button_font_size',14);
	$vw_home_renovation_custom_css .='.post-main-box .more-btn a{';
		$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_button_font_size).';';
	$vw_home_renovation_custom_css .='}';

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_button_text_transform','Capitalize');
	if($vw_home_renovation_theme_lay == 'Capitalize'){
		$vw_home_renovation_custom_css .='.post-main-box .more-btn a{';
			$vw_home_renovation_custom_css .='text-transform:Capitalize;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Lowercase'){
		$vw_home_renovation_custom_css .='.post-main-box .more-btn a{';
			$vw_home_renovation_custom_css .='text-transform:Lowercase;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Uppercase'){
		$vw_home_renovation_custom_css .='.post-main-box .more-btn a{';
			$vw_home_renovation_custom_css .='text-transform:Uppercase;';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$vw_home_renovation_single_blog_comment_button_text = get_theme_mod('vw_home_renovation_single_blog_comment_button_text', 'Post Comment');
	if($vw_home_renovation_single_blog_comment_button_text == ''){
		$vw_home_renovation_custom_css .='#comments p.form-submit {';
			$vw_home_renovation_custom_css .='display: none;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_comment_width = get_theme_mod('vw_home_renovation_single_blog_comment_width');
	if($vw_home_renovation_comment_width != false){
		$vw_home_renovation_custom_css .='#comments textarea{';
			$vw_home_renovation_custom_css .='width: '.esc_attr($vw_home_renovation_comment_width).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_single_blog_post_navigation_show_hide = get_theme_mod('vw_home_renovation_single_blog_post_navigation_show_hide',true);
	if($vw_home_renovation_single_blog_post_navigation_show_hide != true){
		$vw_home_renovation_custom_css .='.post-navigation{';
			$vw_home_renovation_custom_css .='display: none;';
		$vw_home_renovation_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_home_renovation_display_grid_posts_settings = get_theme_mod( 'vw_home_renovation_display_grid_posts_settings','Into Blocks');
    if($vw_home_renovation_display_grid_posts_settings == 'Without Blocks'){
		$vw_home_renovation_custom_css .='.grid-post-main-box{';
			$vw_home_renovation_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_home_renovation_related_product_show_hide = get_theme_mod('vw_home_renovation_related_product_show_hide',true);
	if($vw_home_renovation_related_product_show_hide != true){
		$vw_home_renovation_custom_css .='.related.products{';
			$vw_home_renovation_custom_css .='display: none;';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_home_renovation_products_padding_top_bottom = get_theme_mod('vw_home_renovation_products_padding_top_bottom');
	if($vw_home_renovation_products_padding_top_bottom != false){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_home_renovation_products_padding_top_bottom).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_padding_left_right = get_theme_mod('vw_home_renovation_products_padding_left_right');
	if($vw_home_renovation_products_padding_left_right != false){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_home_renovation_custom_css .='padding-left: '.esc_attr($vw_home_renovation_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_home_renovation_products_padding_left_right).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_box_shadow = get_theme_mod('vw_home_renovation_products_box_shadow');
	if($vw_home_renovation_products_box_shadow != false){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_home_renovation_custom_css .='box-shadow: '.esc_attr($vw_home_renovation_products_box_shadow).'px '.esc_attr($vw_home_renovation_products_box_shadow).'px '.esc_attr($vw_home_renovation_products_box_shadow).'px #ddd;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_border_radius = get_theme_mod('vw_home_renovation_products_border_radius');
	if($vw_home_renovation_products_border_radius != false){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_products_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_btn_padding_top_bottom = get_theme_mod('vw_home_renovation_products_btn_padding_top_bottom');
	if($vw_home_renovation_products_btn_padding_top_bottom != false){
		$vw_home_renovation_custom_css .='.woocommerce a.button{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_home_renovation_products_btn_padding_top_bottom).' !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_btn_padding_left_right = get_theme_mod('vw_home_renovation_products_btn_padding_left_right');
	if($vw_home_renovation_products_btn_padding_left_right != false){
		$vw_home_renovation_custom_css .='.woocommerce a.button{';
			$vw_home_renovation_custom_css .='padding-left: '.esc_attr($vw_home_renovation_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_home_renovation_products_btn_padding_left_right).' !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_products_button_border_radius = get_theme_mod('vw_home_renovation_products_button_border_radius', 0);
	if($vw_home_renovation_products_button_border_radius != false){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce a.button{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_products_button_border_radius).'px !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_woocommerce_sale_position = get_theme_mod( 'vw_home_renovation_woocommerce_sale_position','right');
    if($vw_home_renovation_woocommerce_sale_position == 'left'){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_home_renovation_custom_css .='left: 12px !important; right: auto !important;';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_woocommerce_sale_position == 'right'){
		$vw_home_renovation_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_home_renovation_custom_css .='left: auto!important; right: 0 !important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_woocommerce_sale_font_size = get_theme_mod('vw_home_renovation_woocommerce_sale_font_size');
	if($vw_home_renovation_woocommerce_sale_font_size != false){
		$vw_home_renovation_custom_css .='.woocommerce span.onsale{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_woocommerce_sale_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_home_renovation_woocommerce_sale_padding_top_bottom');
	if($vw_home_renovation_woocommerce_sale_padding_top_bottom != false){
		$vw_home_renovation_custom_css .='.woocommerce span.onsale{';
			$vw_home_renovation_custom_css .='padding-top: '.esc_attr($vw_home_renovation_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_home_renovation_woocommerce_sale_padding_top_bottom).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_woocommerce_sale_padding_left_right = get_theme_mod('vw_home_renovation_woocommerce_sale_padding_left_right');
	if($vw_home_renovation_woocommerce_sale_padding_left_right != false){
		$vw_home_renovation_custom_css .='.woocommerce span.onsale{';
			$vw_home_renovation_custom_css .='padding-left: '.esc_attr($vw_home_renovation_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_home_renovation_woocommerce_sale_padding_left_right).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_woocommerce_sale_border_radius = get_theme_mod('vw_home_renovation_woocommerce_sale_border_radius', 0);
	if($vw_home_renovation_woocommerce_sale_border_radius != false){
		$vw_home_renovation_custom_css .='.woocommerce span.onsale{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_woocommerce_sale_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_home_renovation_social_icon_font_size = get_theme_mod('vw_home_renovation_social_icon_font_size');
	if($vw_home_renovation_social_icon_font_size != false){
		$vw_home_renovation_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_social_icon_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_social_icon_padding = get_theme_mod('vw_home_renovation_social_icon_padding');
	if($vw_home_renovation_social_icon_padding != false){
		$vw_home_renovation_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_home_renovation_custom_css .='padding: '.esc_attr($vw_home_renovation_social_icon_padding).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_social_icon_width = get_theme_mod('vw_home_renovation_social_icon_width');
	if($vw_home_renovation_social_icon_width != false){
		$vw_home_renovation_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_home_renovation_custom_css .='width: '.esc_attr($vw_home_renovation_social_icon_width).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_social_icon_height = get_theme_mod('vw_home_renovation_social_icon_height');
	if($vw_home_renovation_social_icon_height != false){
		$vw_home_renovation_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_home_renovation_custom_css .='height: '.esc_attr($vw_home_renovation_social_icon_height).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_social_icon_border_radius = get_theme_mod('vw_home_renovation_social_icon_border_radius');
	if($vw_home_renovation_social_icon_border_radius != false){
		$vw_home_renovation_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_social_icon_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_home_renovation_resp_menu_toggle_btn_bg_color');
	if($vw_home_renovation_resp_menu_toggle_btn_bg_color != false){
		$vw_home_renovation_custom_css .='.toggle-nav i,.sidenav .closebtn, .left-menu .closebtn{';
			$vw_home_renovation_custom_css .='background: '.esc_attr($vw_home_renovation_resp_menu_toggle_btn_bg_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_grid_featured_image_border_radius = get_theme_mod('vw_home_renovation_grid_featured_image_border_radius', 0);
	if($vw_home_renovation_grid_featured_image_border_radius != false){
		$vw_home_renovation_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$vw_home_renovation_custom_css .='border-radius: '.esc_attr($vw_home_renovation_grid_featured_image_border_radius).'px;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_grid_featured_image_box_shadow = get_theme_mod('vw_home_renovation_grid_featured_image_box_shadow',0);
	if($vw_home_renovation_grid_featured_image_box_shadow != false){
		$vw_home_renovation_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$vw_home_renovation_custom_css .='box-shadow: '.esc_attr($vw_home_renovation_grid_featured_image_box_shadow).'px '.esc_attr($vw_home_renovation_grid_featured_image_box_shadow).'px '.esc_attr($vw_home_renovation_grid_featured_image_box_shadow).'px #cccccc;';
		$vw_home_renovation_custom_css .='}';
	}

	// banner background color

	$vw_home_renovation_banner_color = get_theme_mod('vw_home_renovation_banner_color');
	if($vw_home_renovation_banner_color != false){
		$vw_home_renovation_custom_css .='#banner{';
			$vw_home_renovation_custom_css .='background: '.esc_attr($vw_home_renovation_banner_color).';';
		$vw_home_renovation_custom_css .='}';
	}


	// banner background img

	$vw_home_renovation_banner_background_image = get_theme_mod('vw_home_renovation_banner_background_image');
	if($vw_home_renovation_banner_background_image != false){
		$vw_home_renovation_custom_css .='#banner{';
			$vw_home_renovation_custom_css .='background: '.esc_attr($vw_home_renovation_banner_background_image).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*----------------- Banner -----------------*/

	// $vw_home_renovation_show_hide_banner = get_theme_mod('vw_home_renovation_show_hide_banner');
	// if($vw_home_renovation_show_hide_banner == true){
	// 	$vw_home_renovation_custom_css .='.page-template-custom-home-page .topbar-section{';
	// 		$vw_home_renovation_custom_css .='position: static;';
	// 	$vw_home_renovation_custom_css .='}';
	// }

	/*-------------- Menus Setings ----------------*/

	$vw_home_renovation_navigation_menu_font_size = get_theme_mod('vw_home_renovation_navigation_menu_font_size');
	if($vw_home_renovation_navigation_menu_font_size != false){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_navigation_menu_font_size).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_navigation_menu_font_weight = get_theme_mod('vw_home_renovation_navigation_menu_font_weight','700');
	if($vw_home_renovation_navigation_menu_font_weight != false){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='font-weight: '.esc_attr($vw_home_renovation_navigation_menu_font_weight).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_menu_text_transform','Capitalize');
	if($vw_home_renovation_theme_lay == 'Capitalize'){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='text-transform:Capitalize;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Lowercase'){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='text-transform:Lowercase;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Uppercase'){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='text-transform:Uppercase;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_header_menus_color = get_theme_mod('vw_home_renovation_header_menus_color');
	if($vw_home_renovation_header_menus_color != false){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_header_menus_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_header_menus_hover_color = get_theme_mod('vw_home_renovation_header_menus_hover_color');
	if($vw_home_renovation_header_menus_hover_color != false){
		$vw_home_renovation_custom_css .='.main-navigation a:hover{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_header_menus_hover_color).';';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_header_submenus_color = get_theme_mod('vw_home_renovation_header_submenus_color');
	if($vw_home_renovation_header_submenus_color != false){
		$vw_home_renovation_custom_css .='.main-navigation ul ul a{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_header_submenus_color).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_header_submenus_hover_color = get_theme_mod('vw_home_renovation_header_submenus_hover_color');
	if($vw_home_renovation_header_submenus_hover_color != false){
		$vw_home_renovation_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_home_renovation_custom_css .='color: '.esc_attr($vw_home_renovation_header_submenus_hover_color).'!important;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_menus_item = get_theme_mod( 'vw_home_renovation_menus_item_style','None');
    if($vw_home_renovation_menus_item == 'None'){
		$vw_home_renovation_custom_css .='.main-navigation a{';
			$vw_home_renovation_custom_css .='';
		$vw_home_renovation_custom_css .='}';
	}else if($vw_home_renovation_menus_item == 'Zoom In'){
		$vw_home_renovation_custom_css .='.main-navigation a:hover{';
			$vw_home_renovation_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------- Footer Settings ------------------*/

	$vw_home_renovation_button_footer_heading_letter_spacing = get_theme_mod('vw_home_renovation_button_footer_heading_letter_spacing','');
	$vw_home_renovation_custom_css .='#footer h3{';
		$vw_home_renovation_custom_css .='letter-spacing: '.esc_attr($vw_home_renovation_button_footer_heading_letter_spacing).';';
	$vw_home_renovation_custom_css .='}';

	$vw_home_renovation_button_footer_font_size = get_theme_mod('vw_home_renovation_button_footer_font_size','');
	$vw_home_renovation_custom_css .='#footer h3{';
		$vw_home_renovation_custom_css .='font-size: '.esc_attr($vw_home_renovation_button_footer_font_size).';';
	$vw_home_renovation_custom_css .='}';

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_button_footer_text_transform','Capitalize');
	if($vw_home_renovation_theme_lay == 'Capitalize'){
		$vw_home_renovation_custom_css .='#footer h3{';
			$vw_home_renovation_custom_css .='text-transform:Capitalize;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Lowercase'){
		$vw_home_renovation_custom_css .='#footer h3{';
			$vw_home_renovation_custom_css .='text-transform:Lowercase;';
		$vw_home_renovation_custom_css .='}';
	}
	if($vw_home_renovation_theme_lay == 'Uppercase'){
		$vw_home_renovation_custom_css .='#footer h3{';
			$vw_home_renovation_custom_css .='text-transform:Uppercase;';
		$vw_home_renovation_custom_css .='}';
	}

	$vw_home_renovation_footer_heading_weight = get_theme_mod('vw_home_renovation_footer_heading_weight','600');
	if($vw_home_renovation_footer_heading_weight != false){
		$vw_home_renovation_custom_css .='#footer h3{';
			$vw_home_renovation_custom_css .='font-weight: '.esc_attr($vw_home_renovation_footer_heading_weight).';';
		$vw_home_renovation_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$vw_home_renovation_theme_lay = get_theme_mod( 'vw_home_renovation_footer_template','vw_home_renovation-footer-one');
    if($vw_home_renovation_theme_lay == 'vw_home_renovation-footer-one'){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='';
		$vw_home_renovation_custom_css .='}';

	}else if($vw_home_renovation_theme_lay == 'vw_home_renovation-footer-two'){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_home_renovation_custom_css .='color:#000;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer ul li::before{';
			$vw_home_renovation_custom_css .='background:#000;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_home_renovation_custom_css .='border: 1px solid #000;';
		$vw_home_renovation_custom_css .='}';

	}else if($vw_home_renovation_theme_lay == 'vw_home_renovation-footer-three'){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='background: #232524;';
		$vw_home_renovation_custom_css .='}';
	}
	else if($vw_home_renovation_theme_lay == 'vw_home_renovation-footer-four'){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='background: #f7f7f7;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$vw_home_renovation_custom_css .='color:#000;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer ul li::before{';
			$vw_home_renovation_custom_css .='background:#000;';
		$vw_home_renovation_custom_css .='}';
		$vw_home_renovation_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_home_renovation_custom_css .='border: 1px solid #000;';
		$vw_home_renovation_custom_css .='}';
	}
	else if($vw_home_renovation_theme_lay == 'vw_home_renovation-footer-five'){
		$vw_home_renovation_custom_css .='#footer{';
			$vw_home_renovation_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$vw_home_renovation_custom_css .='}';
	}


	$vw_home_renovation_resp_topbar = get_theme_mod( 'vw_home_renovation_resp_topbar_hide_show',false);
	if($vw_home_renovation_resp_topbar == true && get_theme_mod( 'vw_home_renovation_topbar_hide_show', true) == false){
    	$vw_home_renovation_custom_css .='.top-bar-sec{';
			$vw_home_renovation_custom_css .='display:none;';
		$vw_home_renovation_custom_css .='} ';
	}
    if($vw_home_renovation_resp_topbar == true){
    	$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='.top-bar-sec{';
			$vw_home_renovation_custom_css .='display:block;';
		$vw_home_renovation_custom_css .='} }';
	}else if($vw_home_renovation_resp_topbar == false){
		$vw_home_renovation_custom_css .='@media screen and (max-width:575px) {';
		$vw_home_renovation_custom_css .='.top-bar-sec{';
			$vw_home_renovation_custom_css .='display:none;';
		$vw_home_renovation_custom_css .='} }';
	}

	$vw_home_renovation_breadcrumbs_alignment = get_theme_mod( 'vw_home_renovation_breadcrumbs_alignment','Left');
    if($vw_home_renovation_breadcrumbs_alignment == 'Left'){
    	$vw_home_renovation_custom_css .='@media screen and (min-width:768px) {';
		$vw_home_renovation_custom_css .='.breadcrumbs{';
			$vw_home_renovation_custom_css .='text-align:start;';
		$vw_home_renovation_custom_css .='}}';
	}else if($vw_home_renovation_breadcrumbs_alignment == 'Center'){
		$vw_home_renovation_custom_css .='@media screen and (min-width:768px) {';
		$vw_home_renovation_custom_css .='.breadcrumbs{';
			$vw_home_renovation_custom_css .='text-align:center;';
		$vw_home_renovation_custom_css .='}}';
	}else if($vw_home_renovation_breadcrumbs_alignment == 'Right'){
		$vw_home_renovation_custom_css .='@media screen and (min-width:768px) {';
		$vw_home_renovation_custom_css .='.breadcrumbs{';
			$vw_home_renovation_custom_css .='text-align:end;';
		$vw_home_renovation_custom_css .='}}';
	}

