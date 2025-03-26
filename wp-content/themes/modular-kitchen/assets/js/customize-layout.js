/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-modular_kitchen_options-';
		
		// Label
		function modular_kitchen_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'modular_kitchen_scroll_hide' || id === 'modular_kitchen_preloader_hide' || id === 'modular_kitchen_sticky_header' || id === 'modular_kitchen_products_per_row' || id === 'modular_kitchen_woocommerce_product_sale' || id === 'modular_kitchen_woo_product_border_radius')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'modular_kitchen_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header

			if ( id === 'modular_kitchen_header_btn_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Types Of Kitchen

			if ( id === 'modular_kitchen_kitchen_types_section_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'modular_kitchen_banner_section_main_heading' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider Porduct

			if ( id === 'modular_kitchen_banner_left_product_category' || id === 'modular_kitchen_banner_right_product_category' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'modular_kitchen_show_hide_footer' || id === 'modular_kitchen_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'modular_kitchen_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'modular_kitchen_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'modular_kitchen_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'modular_kitchen_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-modular_kitchen_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

	    // Site Identity
		modular_kitchen_customizer_label( 'custom_logo', 'Logo Setup' );
		modular_kitchen_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		modular_kitchen_customizer_label( 'modular_kitchen_scroll_hide', 'Scroll To Top' );
		modular_kitchen_customizer_label( 'modular_kitchen_preloader_hide', 'Preloader' );
		modular_kitchen_customizer_label( 'modular_kitchen_sticky_header', 'Sticky Header' );
		modular_kitchen_customizer_label( 'modular_kitchen_products_per_row', 'Woocommerce Setting' );
		modular_kitchen_customizer_label( 'modular_kitchen_woocommerce_product_sale', 'Woocommerce Product Sale' );
		modular_kitchen_customizer_label( 'modular_kitchen_woo_product_border_radius', 'Woocommerce Product Border Radius' );

		// Colors
		modular_kitchen_customizer_label( 'modular_kitchen_theme_color', 'Theme Color' );
		modular_kitchen_customizer_label( 'background_color', 'Colors' );
		modular_kitchen_customizer_label( 'background_image', 'Image' );

		//Header Image
		modular_kitchen_customizer_label( 'header_image', 'Header Image' );

		// Header
		modular_kitchen_customizer_label( 'modular_kitchen_header_btn_text', 'Header Button' );

		// Types Of Kitchen
		modular_kitchen_customizer_label( 'modular_kitchen_kitchen_types_section_heading', 'Types Of Kitchen' );

		//Slider
		modular_kitchen_customizer_label( 'modular_kitchen_banner_section_main_heading', 'Slider' );
		
		// Slider Porduct
		modular_kitchen_customizer_label( 'modular_kitchen_banner_left_product_category', 'Left Product Category' );
		modular_kitchen_customizer_label( 'modular_kitchen_banner_right_product_category', 'Right Product Category' );

		//Footer
		modular_kitchen_customizer_label( 'modular_kitchen_show_hide_footer', 'Footer' );
		modular_kitchen_customizer_label( 'modular_kitchen_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		modular_kitchen_customizer_label( 'modular_kitchen_single_post_thumb', 'Single Post Setting' );
		modular_kitchen_customizer_label( 'modular_kitchen_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		modular_kitchen_customizer_label( 'modular_kitchen_post_page_title', 'Post Setting' );

		// Page Setting
		modular_kitchen_customizer_label( 'modular_kitchen_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
