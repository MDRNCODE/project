<?php
/**
 * Modular Kitchen Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Modular Kitchen
 */

if ( ! defined( 'MODULAR_KITCHEN_URL' ) ) {
    define( 'MODULAR_KITCHEN_URL', esc_url( 'https://www.themagnifico.net/products/modular-kitchen-wordpress-theme', 'modular-kitchen') );
}
if ( ! defined( 'MODULAR_KITCHEN_TEXT' ) ) {
    define( 'MODULAR_KITCHEN_TEXT', __( 'Modular Kitchen Pro','modular-kitchen' ));
}
if ( ! defined( 'MODULAR_KITCHEN_BUY_TEXT' ) ) {
    define( 'MODULAR_KITCHEN_BUY_TEXT', __( 'Buy Modular Kitchen Pro','modular-kitchen' ));
}

use WPTRT\Customize\Section\Modular_Kitchen_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Modular_Kitchen_Button::class );
    
    $manager->add_section(
        new Modular_Kitchen_Button( $manager, 'modular_kitchen_pro', [
            'title'       => esc_html( MODULAR_KITCHEN_TEXT,'modular-kitchen' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'modular-kitchen' ),
            'button_url'  => esc_url( MODULAR_KITCHEN_URL )
        ] )
    );
} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'modular-kitchen-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'modular-kitchen-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modular_kitchen_customize_register($wp_customize){

    // Pro Version
    class Modular_Kitchen_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( MODULAR_KITCHEN_BUY_TEXT,'modular-kitchen' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Modular_Kitchen_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('modular_kitchen_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'modular_kitchen_sanitize_number_absint'
    ));
    $wp_customize->add_control('modular_kitchen_logo_max_height',array(
        'label' => esc_html__('Logo Width','modular-kitchen'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('modular_kitchen_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'modular-kitchen' ),
        'section'        => 'title_tagline',
        'settings'       => 'modular_kitchen_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('modular_kitchen_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'modular-kitchen' ),
        'section'        => 'title_tagline',
        'settings'       => 'modular_kitchen_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('modular_kitchen_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'modular_kitchen_logo_title_color', array(
        'label'    => __('Site Title Color', 'modular-kitchen'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('modular_kitchen_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'modular_kitchen_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'modular-kitchen'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    // General Settings
     $wp_customize->add_section('modular_kitchen_general_settings',array(
        'title' => esc_html__('General Settings','modular-kitchen'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('modular_kitchen_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','modular-kitchen' ),
        'type' => 'radio',
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','modular-kitchen'),
            'Wide Width' => __('Wide Width','modular-kitchen'),
            'Container Width' => __('Container Width','modular-kitchen')
        ),
    ) );

    $wp_customize->add_setting('modular_kitchen_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'modular-kitchen' ),
        'section'        => 'modular_kitchen_general_settings',
        'settings'       => 'modular_kitchen_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('modular_kitchen_preloader_type',array(
        'default' => 'Preloader 1',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_preloader_type',array(
        'type' => 'radio',
        'label' => esc_html__('Preloader Type','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Preloader 1' => __('Preloader 1','modular-kitchen'),
            'Preloader 2' => __('Preloader 2','modular-kitchen'),
        ),
    ) );

    $wp_customize->add_setting( 'modular_kitchen_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'modular_kitchen_preloader_dot_1_color', array(
        'default' => '#00cbee',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_preloader_dot_1_color',
        'active_callback' => 'modular_kitchen_preloader1'
    )));

    $wp_customize->add_setting( 'modular_kitchen_preloader_dot_2_color', array(
        'default' => '#2a2b31',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_preloader_dot_2_color',
        'active_callback' => 'modular_kitchen_preloader1'
    )));

    $wp_customize->add_setting( 'modular_kitchen_preloader2_dot_color', array(
        'default' => '#01CBEE',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_preloader2_dot_color', array(
        'label' => esc_html__('Preloader Dot Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_preloader2_dot_color',
        'active_callback' => 'modular_kitchen_preloader2'
    )));

    $wp_customize->add_setting('modular_kitchen_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'modular-kitchen' ),
        'section'        => 'modular_kitchen_general_settings',
        'settings'       => 'modular_kitchen_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('modular_kitchen_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','modular-kitchen' ),
        'type' => 'radio',
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Right' => __('Right','modular-kitchen'),
            'Left' => __('Left','modular-kitchen'),
            'Center' => __('Center','modular-kitchen')
        ),
    ) );

    $wp_customize->add_setting( 'modular_kitchen_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'modular_kitchen_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modular_kitchen_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'settings' => 'modular_kitchen_scroll_color'
    )));

    $wp_customize->add_setting('modular_kitchen_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','modular-kitchen'),
        'description' => __('Put in px','modular-kitchen'),
        'section'   => 'modular_kitchen_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'modular_kitchen_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'modular_kitchen_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'modular_kitchen_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','modular-kitchen' ),
        'section'     => 'modular_kitchen_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Product Columns
    $wp_customize->add_setting( 'modular_kitchen_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'modular_kitchen_sanitize_select',
    ) );

    $wp_customize->add_control('modular_kitchen_products_per_row', array(
       'label' => __( 'Product per row', 'modular-kitchen' ),
       'section'  => 'modular_kitchen_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('modular_kitchen_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'modular-kitchen' ),
        'section'        => 'modular_kitchen_general_settings',
        'settings'       => 'modular_kitchen_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('modular_kitchen_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','modular-kitchen'),
            'Right Sidebar' => __('Right Sidebar','modular-kitchen'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('modular_kitchen_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'modular_kitchen_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'modular-kitchen' ),
        'section'        => 'modular_kitchen_general_settings',
        'settings'       => 'modular_kitchen_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('modular_kitchen_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','modular-kitchen'),
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','modular-kitchen'),
            'Right Sidebar' => __('Right Sidebar','modular-kitchen'),
        ),
    ) );

    $wp_customize->add_setting('modular_kitchen_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','modular-kitchen' ),
        'type' => 'radio',
        'section' => 'modular_kitchen_general_settings',
        'choices' => array(
            'Right' => __('Right','modular-kitchen'),
            'Left' => __('Left','modular-kitchen'),
            'Center' => __('Center','modular-kitchen')
        ),
    ) );

    $wp_customize->add_setting( 'modular_kitchen_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'modular_kitchen_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'modular_kitchen_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','modular-kitchen' ),
        'section'     => 'modular_kitchen_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Products border radius
    $wp_customize->add_setting( 'modular_kitchen_woo_product_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'modular_kitchen_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'modular_kitchen_woo_product_border_radius', array(
        'label'       => esc_html__( 'Product Border Radius','modular-kitchen' ),
        'section'     => 'modular_kitchen_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 150,
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'modular_kitchen_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    //Header
    $wp_customize->add_section('modular_kitchen_header',array(
        'title' => esc_html__('Header Option','modular-kitchen')
    ));

    $wp_customize->add_setting('modular_kitchen_header_btn_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_header_btn_text',array(
        'label' => esc_html__('Button Text','modular-kitchen'),
        'section' => 'modular_kitchen_header',
        'setting' => 'modular_kitchen_header_btn_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('modular_kitchen_header_btn_url',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_header_btn_url',array(
        'label' => esc_html__('Button Url','modular-kitchen'),
        'section' => 'modular_kitchen_header',
        'setting' => 'modular_kitchen_header_btn_url',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'modular_kitchen_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('modular_kitchen_menu_settings',array(
        'title' => esc_html__('Menus Settings','modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','modular-kitchen'),
        'section' => 'modular_kitchen_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('modular_kitchen_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','modular-kitchen'),
        'choices' => array(
            'Uppercase' => __('Uppercase','modular-kitchen'),
            'Capitalize' => __('Capitalize','modular-kitchen'),
            'Lowercase' => __('Lowercase','modular-kitchen'),
        ),
        'section'=> 'modular_kitchen_menu_settings',
    ));

    $wp_customize->add_setting('modular_kitchen_nav_menu_font_weight',array(
        'default'=> '400',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','modular-kitchen'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'modular_kitchen_menu_settings',
    ));

    // Slider
    $wp_customize->add_section('modular_kitchen_top_slider',array(
        'title' => esc_html__('Slider Option','modular-kitchen')
    ));

    $wp_customize->add_setting('modular_kitchen_banner_section_main_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_banner_section_main_heading',array(
        'label' => esc_html__('Banner Heading','modular-kitchen'),
        'section' => 'modular_kitchen_top_slider',
        'setting' => 'modular_kitchen_banner_section_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('modular_kitchen_banner_section_main_para',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_banner_section_main_para',array(
        'label' => esc_html__('Banner Text','modular-kitchen'),
        'section' => 'modular_kitchen_top_slider',
        'setting' => 'modular_kitchen_banner_section_main_para',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('modular_kitchen_banner_video_image',array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
      new WP_Customize_Image_Control( $wp_customize,'modular_kitchen_banner_video_image',array(
      'label' => __('Counter Image','modular-kitchen'),
      'description' => __('Image size (800 x 350 px)','modular-kitchen'),
      'section' => 'modular_kitchen_top_slider',
      'settings' => 'modular_kitchen_banner_video_image',
    )));

    $wp_customize->add_setting('modular_kitchen_banner_video_url',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('modular_kitchen_banner_video_url',array(
        'label' => __('Video Url','modular-kitchen'),
        'section' => 'modular_kitchen_top_slider',
        'setting'   => 'modular_kitchen_banner_video_url',
        'type'  => 'url'
    )); 

    //Slider height
    $wp_customize->add_setting('modular_kitchen_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_slider_img_height',array(
        'label' => __('Banner Height','modular-kitchen'),
        'description'   => __('Add the banner height in px(eg. 500px).','modular-kitchen'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'modular-kitchen' ),
        ),
        'section'=> 'modular_kitchen_top_slider',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'modular_kitchen_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    // Slider Product
    $wp_customize->add_section('modular_kitchen_slider_product',array(
        'title' => esc_html__('Slider Porduct Option','modular-kitchen')
    ));

    $modular_kitchen_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $modular_kitchen_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('modular_kitchen_banner_left_product_category',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_select',
    ));
    $wp_customize->add_control('modular_kitchen_banner_left_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Left Product Category','modular-kitchen'),
        'section' => 'modular_kitchen_slider_product',
    ));

     $modular_kitchen_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $modular_kitchen_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('modular_kitchen_banner_right_product_category',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_select',
    ));
    $wp_customize->add_control('modular_kitchen_banner_right_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Right Product Category','modular-kitchen'),
        'section' => 'modular_kitchen_slider_product',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_product_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_slider_product_setting', array(
        'section'     => 'modular_kitchen_slider_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    // Types Of Kitchen Product
    $wp_customize->add_section('modular_kitchen_types_of_kitchen',array(
        'title' => esc_html__('Types Of Kitchen Option','modular-kitchen')
    ));

   $wp_customize->add_setting('modular_kitchen_kitchen_types_section_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_kitchen_types_section_heading',array(
        'label' => __('Section Main Heading','modular-kitchen'),
        'section' => 'modular_kitchen_types_of_kitchen',
        'setting' => 'modular_kitchen_kitchen_types_section_heading',
        'type'    => 'text'
    ));  

    $wp_customize->add_setting('modular_kitchen_kitchen_number',array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('modular_kitchen_kitchen_number',array(
        'label'   => __('Types of Kitchen to show','modular-kitchen'),
        'section' => 'modular_kitchen_types_of_kitchen',
        'setting' => 'modular_kitchen_kitchen_number',
        'type'    => 'number'
    ));

     $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 4;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('modular_kitchen_kitchen_type_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'modular_kitchen_sanitize_select',
    ));
    $wp_customize->add_control('modular_kitchen_kitchen_type_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select category to display Kitchen Types','modular-kitchen'),
        'section' => 'modular_kitchen_types_of_kitchen',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_types_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_types_setting', array(
        'section'     => 'modular_kitchen_types_of_kitchen',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('modular_kitchen_site_footer_section', array(
        'title' => esc_html__('Footer', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control('modular_kitchen_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('modular_kitchen_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'modular_kitchen_footer_bg_image',array(
        'label' => __('Footer Background Image','modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('modular_kitchen_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
        'choices' => array(
            'Left' => __('Left','modular-kitchen'),
            'Center' => __('Center','modular-kitchen'),
            'Right' => __('Right','modular-kitchen')
        ),
    ) );

    $wp_customize->add_setting('modular_kitchen_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control('modular_kitchen_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
    ));

     $wp_customize->add_setting('modular_kitchen_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('modular_kitchen_footer_text_setting', array(
        'label' => __('Replace the footer text', 'modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('modular_kitchen_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control('modular_kitchen_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','modular-kitchen'),
        'section' => 'modular_kitchen_site_footer_section',
        'choices' => array(
            'Left' => __('Left','modular-kitchen'),
            'Center' => __('Center','modular-kitchen'),
            'Right' => __('Right','modular-kitchen')
        ),
    ) );

    $wp_customize->add_setting('modular_kitchen_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'modular_kitchen_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'modular-kitchen'),
        'section'  => 'modular_kitchen_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'modular_kitchen_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('modular_kitchen_post_settings',array(
        'title' => esc_html__('Post Settings','modular-kitchen'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_title',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_meta',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_thumb',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_content',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_excerpt_length',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 30,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_excerpt_length',array(
        'type'        => 'number',
        'label'       => esc_html__('Post Page Content Length', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('modular_kitchen_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_btn',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting( 'modular_kitchen_blog_post_columns', array(
        'default'  => 'Two',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control( 'modular_kitchen_blog_post_columns', array(
        'section' => 'modular_kitchen_post_settings',
        'type' => 'select',
        'label' => __( 'No. of Posts per row', 'modular-kitchen' ),
        'choices' => array(
            'One'  => __( 'One', 'modular-kitchen' ),
            'Two' => __( 'Two', 'modular-kitchen' ),
            'Three' => __( 'Three', 'modular-kitchen' ),
        )
    ));

    $wp_customize->add_setting('modular_kitchen_post_page_pagination',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting( 'modular_kitchen_blog_pagination_type', array(
        'default'           => 'blog-nav-numbers',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control( 'modular_kitchen_blog_pagination_type', array(
        'section' => 'modular_kitchen_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Type', 'modular-kitchen' ),
        'choices' => array(
            'blog-nav-numbers'  => __( 'Numeric', 'modular-kitchen' ),
            'next-prev' => __( 'Older/Newer Posts', 'modular-kitchen' ),
        )
    ));

    $wp_customize->add_setting( 'modular_kitchen_blog_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control( 'modular_kitchen_blog_sidebar_position', array(
        'section' => 'modular_kitchen_post_settings',
        'type' => 'select',
        'label' => __( 'Post Page Sidebar Position', 'modular-kitchen' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'modular-kitchen' ),
            'Left Side' => __( 'Left Side', 'modular-kitchen' ),
        )
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_thumb',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_meta',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_title',array(
            'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_page_content',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_tags',array(
            'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'modular-kitchen'),
        'section'     => 'modular_kitchen_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting( 'modular_kitchen_single_post_sidebar_position', array(
        'default'           => 'Right Side',
        'sanitize_callback' => 'modular_kitchen_sanitize_choices'
    ));
    $wp_customize->add_control( 'modular_kitchen_single_post_sidebar_position', array(
        'section' => 'modular_kitchen_post_settings',
        'type' => 'select',
        'label' => __( 'Single Post Sidebar Position', 'modular-kitchen' ),
        'choices' => array(
            'Right Side' => __( 'Right Side', 'modular-kitchen' ),
            'Left Side' => __( 'Left Side', 'modular-kitchen' ),
        )
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox'
    ));
    $wp_customize->add_control('modular_kitchen_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','modular-kitchen'),
        'section' => 'modular_kitchen_post_settings',
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('modular_kitchen_single_post_comment_title',array(
        'label' => __('Add Comment Title','modular-kitchen'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'modular-kitchen' ),
        ),
        'section'=> 'modular_kitchen_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('modular_kitchen_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('modular_kitchen_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','modular-kitchen'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'modular-kitchen' ),
        ),
        'section'=> 'modular_kitchen_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'modular_kitchen_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('modular_kitchen_page_settings',array(
        'title' => esc_html__('Page Settings','modular-kitchen'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('modular_kitchen_single_page_title',array(
            'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'modular-kitchen'),
        'section'     => 'modular_kitchen_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'modular-kitchen'),
    ));

    $wp_customize->add_setting('modular_kitchen_single_page_thumb',array(
        'sanitize_callback' => 'modular_kitchen_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('modular_kitchen_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'modular-kitchen'),
        'section'     => 'modular_kitchen_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'modular-kitchen'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Modular_Kitchen_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Modular_Kitchen_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'modular_kitchen_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'modular-kitchen' ),
        'description' => esc_url( MODULAR_KITCHEN_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'modular_kitchen_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function modular_kitchen_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function modular_kitchen_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function modular_kitchen_customize_preview_js(){
    wp_enqueue_script('modular-kitchen-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'modular_kitchen_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function modular_kitchen_panels_js() {
    wp_enqueue_style( 'modular-kitchen-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'modular-kitchen-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'modular_kitchen_panels_js' );