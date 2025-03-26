<?php
/**
 * VW Home Renovation Theme Customizer
 *
 * @package VW Home Renovation
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_home_renovation_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_home_renovation_custom_controls' );

function vw_home_renovation_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_home_renovation_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_home_renovation_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_home_renovation_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'vw-home-renovation' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('vw_home_renovation_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-home-renovation'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_home_renovation_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-home-renovation'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-home-renovation' ),
			'center top'   => esc_html__( 'Top', 'vw-home-renovation' ),
			'right top'   => esc_html__( 'Top Right', 'vw-home-renovation' ),
			'left center'   => esc_html__( 'Left', 'vw-home-renovation' ),
			'center center'   => esc_html__( 'Center', 'vw-home-renovation' ),
			'right center'   => esc_html__( 'Right', 'vw-home-renovation' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-home-renovation' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-home-renovation' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-home-renovation' ),
		),
		));

	//Topbar
	$wp_customize->add_section('vw_home_renovation_topbar_section' , array(
  		'title' => __( 'Topbar Section', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_panel_id'
	) );

	$wp_customize->add_setting( 'vw_home_renovation_topbar_hide_show',array(
	    'default' =>1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-home-renovation' ),
		'section' => 'vw_home_renovation_topbar_section'
	)));

	$wp_customize->add_setting('vw_home_renovation_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_location',array(
		'label'	=> esc_html__('Add Location','vw-home-renovation'),
		'input_attrs' => array(
    'placeholder' => esc_html__( '745 Adelaide Street, Tokto', 'vw-home-renovation' ),
    ),
		'section'=> 'vw_home_renovation_topbar_section',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_home_renovation_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_location_icon',array(
		'label'	=> __('Add Location Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_topbar_section',
		'setting'	=> 'vw_home_renovation_location_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_home_renovation_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_home_renovation_phone_number',array(
		'label'	=> __('Add Phone number','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_phone_number_icon',array(
		'default'	=> 'fa fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_topbar_section',
		'setting'	=> 'vw_home_renovation_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_home_renovation_lite_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('vw_home_renovation_lite_email',array(
		'label' => __('Add Email','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( 'xyz123@example.com', 'vw-home-renovation' ),
    ),
		'section' => 'vw_home_renovation_topbar_section',
		'setting' => 'vw_home_renovation_lite_email',
		'type'    => 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_email_icon',array(
		'default'	=> 'fas fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_email_icon',array(
		'label'	=> __('Add Email Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_topbar_section',
		'setting'	=> 'vw_home_renovation_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_home_renovation_topbar_button_label',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_topbar_button_label',array(
		'label' => __('Button','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Book A Consultation', 'vw-home-renovation' ),
      ),
		'section' => 'vw_home_renovation_topbar_section',
		'setting' => 'vw_home_renovation_topbar_button_label',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_topbar_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_home_renovation_topbar_button_url',array(
		'label'	=> __('Add Button URL','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_topbar_section',
		'setting'	=> 'vw_home_renovation_topbar_button_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_home_renovation_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_button_icon',array(
		'label'	=> __('Add Button Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_topbar_section',
		'setting'	=> 'vw_home_renovation_button_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'vw_home_renovation_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_panel_id'
	) );

	$wp_customize->add_setting('vw_home_renovation_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-home-renovation'),
        'section' => 'vw_home_renovation_menu_section',
        'choices' => array(
        	'100' => __('100','vw-home-renovation'),
            '200' => __('200','vw-home-renovation'),
            '300' => __('300','vw-home-renovation'),
            '400' => __('400','vw-home-renovation'),
            '500' => __('500','vw-home-renovation'),
            '600' => __('600','vw-home-renovation'),
            '700' => __('700','vw-home-renovation'),
            '800' => __('800','vw-home-renovation'),
            '900' => __('900','vw-home-renovation'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_home_renovation_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-home-renovation'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-home-renovation'),
            'Capitalize' => __('Capitalize','vw-home-renovation'),
            'Lowercase' => __('Lowercase','vw-home-renovation'),
        ),
		'section'=> 'vw_home_renovation_menu_section',
	));

	$wp_customize->add_setting('vw_home_renovation_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_home_renovation_menu_section',
		'label' => __('Menu Item Hover Style','vw-home-renovation'),
		'choices' => array(
            'None' => __('None','vw-home-renovation'),
            'Zoom In' => __('Zoom In','vw-home-renovation'),
        ),
	) );

	$wp_customize->add_setting('vw_home_renovation_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_menu_section',
	)));

	$wp_customize->add_setting('vw_home_renovation_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_menu_section',
	)));

	$wp_customize->add_setting('vw_home_renovation_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_menu_section',
	)));

	$wp_customize->add_setting('vw_home_renovation_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'vw_home_renovation_social_links', array(
			'title'		=>	__('Social Links', 'vw-home-renovation'),
			'priority'	=>	null,
			'panel'		=>	'vw_home_renovation_panel_id'
		));

	$wp_customize->add_setting('vw_home_renovation_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icons',array(
		'label' =>  __('Steps to setup social icons','vw-home-renovation'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Widget area.</p>
			<p>3. Add social icons url and save.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('vw_home_renovation_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'vw_home_renovation_social_links',
		'type'=> 'hidden'
	));

	//Banner section
  	$wp_customize->add_section('vw_home_renovation_banner',array(
		'title' => __('Banner Section','vw-home-renovation'),
		'priority'  => null,
		'panel' => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting( 'vw_home_renovation_show_hide_banner',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_show_hide_banner',array(
      	'label' => esc_html__( 'Show / Hide Banner','vw-home-renovation' ),
      	'section' => 'vw_home_renovation_banner'
    )));

	$wp_customize->add_setting('vw_home_renovation_banner_color', array(
		'default'           => '#F2F2F2',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_banner_color', array(
		'label'    => __('Banner Background Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_banner',
	)));

 	$wp_customize->add_setting('vw_home_renovation_designation_small_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_small_text',array(
		'label'	=> __('Banner Small Text','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'type'		=> 'text',
		'input_attrs' => array(
            'placeholder' => __( 'Premium Quality', 'vw-home-renovation' ),
        ),
	));

   	$wp_customize->add_setting('vw_home_renovation_tagline_title',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_tagline_title',array(
		'label'	=> __('Banner Title','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'input_attrs' => array(
            'placeholder' => __( 'WANT TO KNOW HOW MUCH YOUR HALL INTERIOR WILL COST?', 'vw-home-renovation' ),
        ),
		'type'		=> 'text'
	));

	 $wp_customize->add_setting('vw_home_renovation_designation_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_text',array(
		'label'	=> __('Banner Text','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_banner_button_label',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_banner_button_label',array(
		'label' => __('Button','vw-home-renovation'),
		'section' => 'vw_home_renovation_banner',
		'setting' => 'vw_home_renovation_banner_button_label',
		'type' => 'text'
	));
	$wp_customize->add_setting('vw_home_renovation_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('vw_home_renovation_top_button_url',array(
		'label'	=> __('Add Button URL','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'setting'	=> 'vw_home_renovation_top_button_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_home_renovation_banner_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_banner_icon',array(
		'label'	=> __('Add Button Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_banner',
		'setting'	=> 'vw_home_renovation_banner_icon',
		'type'		=> 'icon'
	)));

	for ( $vw_home_renovation_i=1; $vw_home_renovation_i <= 3 ; $vw_home_renovation_i++ ) {
		$wp_customize->add_setting('vw_home_renovation_banner_background_image_sec'.$vw_home_renovation_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_home_renovation_banner_background_image_sec'.$vw_home_renovation_i,array(
	      'label' => __('Banner Background Image','vw-home-renovation'),
	      'section' => 'vw_home_renovation_banner'
		)));
	}

 	$wp_customize->add_setting('vw_home_renovation_designation_text3',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_text3',array(
		'label'	=> __('Banner Center Text','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'type'		=> 'text'
	));

 	$wp_customize->add_setting('vw_home_renovation_designation_text4',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_text4',array(
		'label'	=> __('Banner Center Small Text','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_banner',
		'type'		=> 'text'
	));

	//About Us
	$wp_customize->add_section('vw_home_renovation_about_us_sec', array(
		'title'       => __('About Us', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_about_us',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_about_us',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_about_us_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_about_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_about_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_about_us_sec',
		'type'=> 'hidden'
	));

	//Partner Slider
	$wp_customize->add_section('vw_home_renovation_partner_slider_sec', array(
		'title'       => __('Partner Slider', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_partner_slider',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_partner_slider',array(
		'description' => __('<p>1. More options for partner slider section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner slider section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_partner_slider_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_partner_slider_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_partner_slider_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_partner_slider_sec',
		'type'=> 'hidden'
	));

	// Our Services Section
	$wp_customize->add_section('vw_home_renovation_our_services_section',array(
		'title'	=> __('Our Services Section','vw-home-renovation'),
		'panel' => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting( 'vw_home_renovation_our_services_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_home_renovation_our_services_heading', array(
		'label'    => __( 'Add Section Heading', 'vw-home-renovation' ),
		'input_attrs' => array(
            'placeholder' => __( 'Our Services', 'vw-home-renovation' ),
        ),
		'section'  => 'vw_home_renovation_our_services_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'vw_home_renovation_our_services_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_home_renovation_our_services_small_title', array(
		'label'    => __( 'Add Section Text', 'vw-home-renovation' ),
		'section'  => 'vw_home_renovation_our_services_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting('vw_home_renovation_services_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_services_number',array(
		'label'	=> esc_html__('No of Tabs to show','vw-home-renovation'),
		'description' => __('Add Count and Refresh Page','vw-home-renovation'),
		'section'=> 'vw_home_renovation_our_services_section',
		'type'=> 'number'
	));

	$vw_home_renovation_featured_post = get_theme_mod('vw_home_renovation_services_number','');
    for ($vw_home_renovation_j = 1;$vw_home_renovation_j <= $vw_home_renovation_featured_post;$vw_home_renovation_j++ ) {
		$wp_customize->add_setting('vw_home_renovation_services_text'.$vw_home_renovation_j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_home_renovation_services_text'.$vw_home_renovation_j,array(
			'label'	=> esc_html__('Tab ','vw-home-renovation').$vw_home_renovation_j,
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'All', 'vw-home-renovation' ),
	        ),
			'section'=> 'vw_home_renovation_our_services_section',
			'type'=> 'text'
		));

    	$wp_customize->add_setting('vw_home_renovation_about_list_icon' .$vw_home_renovation_j,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
	        $wp_customize,'vw_home_renovation_about_list_icon' .$vw_home_renovation_j, array(
			'label'	=> __('Add Tab List Icon','vw-home-renovation'),
			'transport' => 'refresh',
			'section'	=> 'vw_home_renovation_our_services_section',
			'type'		=> 'icon'
		)));

		$wp_customize->add_setting('vw_home_renovation_our_services_text1'.$vw_home_renovation_j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('vw_home_renovation_our_services_text1'.$vw_home_renovation_j,array(
			'label'	=> esc_html__('Heading Text','vw-home-renovation'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'All', 'vw-home-renovation' ),
	        ),
			'section'=> 'vw_home_renovation_our_services_section',
			'type'=> 'text'
		));

        $wp_customize->add_setting('vw_home_renovation_designation_our_services_text'.$vw_home_renovation_j,array(
	      'default' => '',
	      'sanitize_callback' => 'sanitize_text_field'
	    ));
	    $wp_customize->add_control('vw_home_renovation_designation_our_services_text'.$vw_home_renovation_j,array(
	      'label' => __('Our Services Small Text','vw-home-renovation'),
	      'section' => 'vw_home_renovation_our_services_section',
	      'type'    => 'text'
	    ));

	    $wp_customize->add_setting('vw_home_renovation_banner_button_our_services_label'.$vw_home_renovation_j,array(
	      'default' => '',
	      'sanitize_callback' => 'sanitize_text_field'
	    ));
	    $wp_customize->add_control('vw_home_renovation_banner_button_our_services_label'.$vw_home_renovation_j,array(
	      'label' => __('Button','vw-home-renovation'),
	      'section' => 'vw_home_renovation_our_services_section',
	      'setting' => 'vw_home_renovation_banner_button_our_services_label',
	      'type' => 'text'
	    ));
	    $wp_customize->add_setting('vw_home_renovation_top_button_our_services_url'.$vw_home_renovation_j,array(
	      'default' => '',
	      'sanitize_callback' => 'esc_url_raw'
	    ));

	    $wp_customize->add_control('vw_home_renovation_top_button_our_services_url'.$vw_home_renovation_j,array(
	      'label' => __('Add Button URL','vw-home-renovation'),
	      'section' => 'vw_home_renovation_our_services_section',
	      'setting' => 'vw_home_renovation_top_button_our_services_url',
	      'type'  => 'url'
	    ));

    	$wp_customize->add_setting('vw_home_renovation_service_icon'.$vw_home_renovation_j,array(
			'default'	=> 'fas fa-angle-right',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
	        $wp_customize,'vw_home_renovation_service_icon'.$vw_home_renovation_j,array(
			'label'	=> __('Add Button Icon','vw-home-renovation'),
			'transport' => 'refresh',
			'section'	=> 'vw_home_renovation_our_services_section',
			'setting'	=> 'vw_home_renovation_service_icon',
			'type'		=> 'icon'
		)));

 		$wp_customize->add_setting('vw_home_renovation_our_services_background_image'.$vw_home_renovation_j,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_home_renovation_our_services_background_image'.$vw_home_renovation_j,array(
	      'label' => __('Our Services Before Image','vw-home-renovation'),
	      'section' => 'vw_home_renovation_our_services_section'
		)));

		$wp_customize->add_setting('vw_home_renovation_our_services_background_image1'.$vw_home_renovation_j,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_home_renovation_our_services_background_image1'.$vw_home_renovation_j,array(
	      'label' => __('Our Services After Image','vw-home-renovation'),
	      'section' => 'vw_home_renovation_our_services_section'
		)));
	}

	$wp_customize->add_setting('vw_home_renovation_designation_our_services_before_after_text',array(
		'default' => 'Before',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_our_services_before_after_text',array(
		'label' => __('Button','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Before', 'vw-home-renovation' ),
      ),
		'section' => 'vw_home_renovation_our_services_section',
		'setting' => 'vw_home_renovation_designation_our_services_before_after_text',
		'type' => 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_designation_our_services_scratch_before_after_text',array(
		'default' => 'If you want after please scratch',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_designation_our_services_scratch_before_after_text',array(
		'label' => __('Button','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'If you want after please scratch', 'vw-home-renovation' ),
      ),
		'section' => 'vw_home_renovation_our_services_section',
		'setting' => 'vw_home_renovation_designation_our_services_scratch_before_after_text',
		'type' => 'text'
	));

	//Module
	$wp_customize->add_section('vw_home_renovation_module_sec', array(
		'title'       => __('Module', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_module',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_module',array(
		'description' => __('<p>1. More options for module section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for module section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_module_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_module_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_module_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_module_sec',
		'type'=> 'hidden'
	));

	//why Chosse Us
	$wp_customize->add_section('vw_home_renovation_whyChosseUs_sec', array(
		'title'       => __('Why Chosse Us', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_whyChosseUs',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_whyChosseUs',array(
		'description' => __('<p>1. More options for why Chosse Us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for why Chosse Us section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_whyChosseUs_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_whyChosseUs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_whyChosseUs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_whyChosseUs_sec',
		'type'=> 'hidden'
	));

	//Our Projects
	$wp_customize->add_section('vw_home_renovation_ourProjects_sec', array(
		'title'       => __('Our Projects', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_ourProjects',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_ourProjects',array(
		'description' => __('<p>1. More options for our Projects section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our Projects section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_ourProjects_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_ourProjects_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_ourProjects_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_ourProjects_sec',
		'type'=> 'hidden'
	));

	//Pricing Plan
	$wp_customize->add_section('vw_home_renovation_pricing_sec_sec', array(
		'title'       => __('Pricing Plan', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_pricing_sec',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_pricing_sec',array(
		'description' => __('<p>1. More options for pricing Plan section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing Plan section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_pricing_sec_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_pricing_sec_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_pricing_sec_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_pricing_sec_sec',
		'type'=> 'hidden'
	));


	//Renovation Repairing
	$wp_customize->add_section('vw_home_renovation_renovation_repairing_sec', array(
		'title'       => __('Renovation Repairing', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_renovation_repairing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_renovation_repairing',array(
		'description' => __('<p>1. More options for renovation repairing section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for renovation repairing section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_renovation_repairing_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_renovation_repairing_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_renovation_repairing_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_renovation_repairing_sec',
		'type'=> 'hidden'
	));

	//Testimonials
	$wp_customize->add_section('vw_home_renovation_testimonials_sec', array(
		'title'       => __('Testimonials', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_testimonials',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_testimonials',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_testimonials_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_testimonials_sec',
		'type'=> 'hidden'
	));

	//Working Process
	$wp_customize->add_section('vw_home_renovation_working_process_sec', array(
		'title'       => __('Working Process', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_working_process',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_working_process',array(
		'description' => __('<p>1. More options for working process section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for working process section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_working_process_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_working_process_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_working_process_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_working_process_sec',
		'type'=> 'hidden'
	));

	//Our Team
	$wp_customize->add_section('vw_home_renovation_our_team_sec', array(
		'title'       => __('Our Team', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_our_team',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_our_team',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_our_team_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_our_team_sec',
		'type'=> 'hidden'
	));

	//News Letter
	$wp_customize->add_section('vw_home_renovation_news_letter_sec', array(
		'title'       => __('News Letter', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_news_letter',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_news_letter',array(
		'description' => __('<p>1. More options for news letter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for news letter section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_news_letter_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_news_letter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_news_letter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_news_letter_sec',
		'type'=> 'hidden'
	));

	//Blog news
	$wp_customize->add_section('vw_home_renovation_blog_news_sec', array(
		'title'       => __('Blog news', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_blog_news',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_blog_news',array(
		'description' => __('<p>1. More options for blog news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog news section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_blog_news_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_blog_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_blog_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_blog_news_sec',
		'type'=> 'hidden'
	));

	//Renovation Section
	$wp_customize->add_section('vw_home_renovation_renovationsection_sec', array(
		'title'       => __('Renovation Section', 'vw-home-renovation'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-home-renovation'),
		'priority'    => null,
		'panel'       => 'vw_home_renovation_panel_id',
	));

	$wp_customize->add_setting('vw_home_renovation_renovationsection',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_renovationsection',array(
		'description' => __('<p>1. More options for renovation section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for renovation section.</p>','vw-home-renovation'),
		'section'=> 'vw_home_renovation_renovationsection_sec',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_home_renovation_renovationsection_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_renovationsection_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_HOME_RENOVATION_BUY_NOW).">More Info</a>",
		'section'=> 'vw_home_renovation_renovationsection_sec',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_home_renovation_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-home-renovation'),
		'panel' => 'vw_home_renovation_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_home_renovation_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_home_renovation_Customize_partial_vw_home_renovation_footer_text',
	));

  $wp_customize->add_setting( 'vw_home_renovation_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_footer_hide_show',array(
    'label' => esc_html__( 'Show / Hide Footer','vw-home-renovation' ),
    'section' => 'vw_home_renovation_footer'
  )));

	// font size button
	$wp_customize->add_setting('vw_home_renovation_button_footer_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_home_renovation_footer',
	));

	$wp_customize->add_setting('vw_home_renovation_button_footer_heading_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-home-renovation' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_home_renovation_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_home_renovation_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-home-renovation'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-home-renovation'),
      'Capitalize' => __('Capitalize','vw-home-renovation'),
      'Lowercase' => __('Lowercase','vw-home-renovation'),
    ),
		'section'=> 'vw_home_renovation_footer',
	));

	$wp_customize->add_setting('vw_home_renovation_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-home-renovation'),
        'section' => 'vw_home_renovation_footer',
        'choices' => array(
        	'100' => __('100','vw-home-renovation'),
            '200' => __('200','vw-home-renovation'),
            '300' => __('300','vw-home-renovation'),
            '400' => __('400','vw-home-renovation'),
            '500' => __('500','vw-home-renovation'),
            '600' => __('600','vw-home-renovation'),
            '700' => __('700','vw-home-renovation'),
            '800' => __('800','vw-home-renovation'),
            '900' => __('900','vw-home-renovation'),
        ),
	) );

  $wp_customize->add_setting('vw_home_renovation_footer_template',array(
      'default'	=> esc_html('vw_home_renovation-footer-one'),
      'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
  ));
  $wp_customize->add_control('vw_home_renovation_footer_template',array(
    'label'	=> esc_html__('Footer Style','vw-home-renovation'),
    'section'	=> 'vw_home_renovation_footer',
    'setting'	=> 'vw_home_renovation_footer_template',
    'type' => 'select',
    'choices' => array(
        'vw_home_renovation-footer-one' => esc_html__('Style 1', 'vw-home-renovation'),
        'vw_home_renovation-footer-two' => esc_html__('Style 2', 'vw-home-renovation'),
        'vw_home_renovation-footer-three' => esc_html__('Style 3', 'vw-home-renovation'),
        'vw_home_renovation-footer-four' => esc_html__('Style 4', 'vw-home-renovation'),
        'vw_home_renovation-footer-five' => esc_html__('Style 5', 'vw-home-renovation'),
        )
  ));

	$wp_customize->add_setting('vw_home_renovation_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_footer',
	)));

  // footer padding
  $wp_customize->add_setting('vw_home_renovation_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_home_renovation_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','vw-home-renovation'),
    'description' => __('Enter a value in pixels. Example:20px','vw-home-renovation'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
    'section'=> 'vw_home_renovation_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_home_renovation_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
  ));
  $wp_customize->add_control('vw_home_renovation_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','vw-home-renovation'),
    'section' => 'vw_home_renovation_footer',
    'choices' => array(
      'Left' => __('Left','vw-home-renovation'),
      'Center' => __('Center','vw-home-renovation'),
      'Right' => __('Right','vw-home-renovation')
    ),
  ) );

  $wp_customize->add_setting('vw_home_renovation_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
  ));
  $wp_customize->add_control('vw_home_renovation_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','vw-home-renovation'),
    'section' => 'vw_home_renovation_footer',
    'choices' => array(
      'Left' => __('Left','vw-home-renovation'),
      'Center' => __('Center','vw-home-renovation'),
      'Right' => __('Right','vw-home-renovation')
    ),
  	) );

	$wp_customize->add_setting('vw_home_renovation_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_home_renovation_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','vw-home-renovation' ),
		'section' => 'vw_home_renovation_footer'
	)));

	$wp_customize->add_setting('vw_home_renovation_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control(new vw_home_renovation_Image_Radio_Control($wp_customize, 'vw_home_renovation_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-home-renovation'),
        'section' => 'vw_home_renovation_footer',
        'settings' => 'vw_home_renovation_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting('vw_home_renovation_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_footer',
	)));

	$wp_customize->add_setting('vw_home_renovation_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_copyright_font_size',array(
		'label' => __('Copyright Font Size','vw-home-renovation'),
		'description' => __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'vw-home-renovation' ),
		    ),
		'section'=> 'vw_home_renovation_footer',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_home_renovation_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-home-renovation' ),
      	'section' => 'vw_home_renovation_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_home_renovation_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_home_renovation_Customize_partial_vw_home_renovation_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_home_renovation_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control(new vw_home_renovation_Image_Radio_Control($wp_customize, 'vw_home_renovation_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-home-renovation'),
        'section' => 'vw_home_renovation_footer',
        'settings' => 'vw_home_renovation_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

     $wp_customize->add_setting('vw_home_renovation_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser($wp_customize,'vw_home_renovation_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-home-renovation'),
    'transport' => 'refresh',
    'section' => 'vw_home_renovation_footer',
    'setting' => 'vw_home_renovation_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_home_renovation_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_home_renovation_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-home-renovation'),
    'description' => __('Enter a value in pixels. Example:20px','vw-home-renovation'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
    'section'=> 'vw_home_renovation_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_home_renovation_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_home_renovation_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-home-renovation'),
    'description' => __('Enter a value in pixels. Example:20px','vw-home-renovation'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
    'section'=> 'vw_home_renovation_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_home_renovation_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_home_renovation_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-home-renovation'),
    'description' => __('Enter a value in pixels Example:20px','vw-home-renovation'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
  ),
  'section'=> 'vw_home_renovation_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_home_renovation_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_home_renovation_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-home-renovation'),
    'description' => __('Enter a value in pixels. Example:20px','vw-home-renovation'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
    'section'=> 'vw_home_renovation_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_home_renovation_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_home_renovation_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-home-renovation' ),
    'section'     => 'vw_home_renovation_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

   	//Blog Post
	$wp_customize->add_panel( 'vw_home_renovation_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_home_renovation_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_home_renovation_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_home_renovation_Customize_partial_vw_home_renovation_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('vw_home_renovation_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
  ));
  $wp_customize->add_control(new vw_home_renovation_Image_Radio_Control($wp_customize, 'vw_home_renovation_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','vw-home-renovation'),
    'section' => 'vw_home_renovation_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('vw_home_renovation_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-home-renovation'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-home-renovation'),
        'section' => 'vw_home_renovation_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-home-renovation'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-home-renovation'),
            'One Column' => esc_html__('One Column','vw-home-renovation'),
 			'Three Columns' => __('Three Columns','vw-home-renovation'),
        	'Four Columns' => __('Four Columns','vw-home-renovation'),
            'Grid Layout' => esc_html__('Grid Layout','vw-home-renovation')
        ),
	) );

  	$wp_customize->add_setting('vw_home_renovation_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_post_settings',
		'setting'	=> 'vw_home_renovation_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'vw_home_renovation_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-home-renovation' ),
    'section' => 'vw_home_renovation_post_settings'
  )));

	$wp_customize->add_setting('vw_home_renovation_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_post_settings',
		'setting'	=> 'vw_home_renovation_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_home_renovation_blog_toggle_author',array(
	'default' => 1,
	'transport' => 'refresh',
	'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_blog_toggle_author',array(
	'label' => esc_html__( 'Show / Hide Author','vw-home-renovation' ),
	'section' => 'vw_home_renovation_post_settings'
  )));

  $wp_customize->add_setting('vw_home_renovation_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_post_settings',
		'setting'	=> 'vw_home_renovation_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_home_renovation_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-home-renovation' ),
		'section' => 'vw_home_renovation_post_settings'
  )));

  $wp_customize->add_setting('vw_home_renovation_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_post_settings',
		'setting'	=> 'vw_home_renovation_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_home_renovation_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-home-renovation' ),
		'section' => 'vw_home_renovation_post_settings'
  )));

  $wp_customize->add_setting( 'vw_home_renovation_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-home-renovation' ),
		'section' => 'vw_home_renovation_post_settings'
  )));

  $wp_customize->add_setting( 'vw_home_renovation_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_home_renovation_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-home-renovation'),
		'section'	=> 'vw_home_renovation_post_settings',
		'choices' => array(
		'default' => __('Default','vw-home-renovation'),
		'custom' => __('Custom Image Size','vw-home-renovation'),
      ),
	));

	$wp_customize->add_setting('vw_home_renovation_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_home_renovation_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-home-renovation' ),),
		'section'=> 'vw_home_renovation_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_home_renovation_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_home_renovation_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-home-renovation' ),),
		'section'=> 'vw_home_renovation_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_home_renovation_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'vw_home_renovation_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_home_renovation_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_home_renovation_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_home_renovation_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-home-renovation'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-home-renovation'),
		'section'=> 'vw_home_renovation_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_home_renovation_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','vw-home-renovation'),
    'section' => 'vw_home_renovation_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-home-renovation'),
        'Excerpt' => esc_html__('Excerpt','vw-home-renovation'),
        'No Content' => esc_html__('No Content','vw-home-renovation')
        ),
	) );

  $wp_customize->add_setting('vw_home_renovation_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','vw-home-renovation'),
    'section' => 'vw_home_renovation_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-home-renovation'),
        'Without Blocks' => __('Without Blocks','vw-home-renovation')
        ),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','vw-home-renovation' ),
		'section' => 'vw_home_renovation_post_settings'
  )));

	$wp_customize->add_setting('vw_home_renovation_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_home_renovation_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_home_renovation_blog_pagination_type', array(
    'section' => 'vw_home_renovation_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'vw-home-renovation' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'vw-home-renovation' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'vw-home-renovation' ),
  )));

    // Button Settings
	$wp_customize->add_section( 'vw_home_renovation_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_home_renovation_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_home_renovation_Customize_partial_vw_home_renovation_button_text',
	));

  $wp_customize->add_setting('vw_home_renovation_button_text',array(
		'default'=> esc_html__('Read More','vw-home-renovation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-home-renovation'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_home_renovation_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_font_size',array(
		'label'	=> __('Button Font Size','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_home_renovation_button_settings',
	));


	$wp_customize->add_setting( 'vw_home_renovation_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_home_renovation_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('vw_home_renovation_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
		'section'=> 'vw_home_renovation_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-home-renovation' ),
    ),
		'section'=> 'vw_home_renovation_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-home-renovation' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_home_renovation_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_home_renovation_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-home-renovation'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-home-renovation'),
      'Capitalize' => __('Capitalize','vw-home-renovation'),
      'Lowercase' => __('Lowercase','vw-home-renovation'),
    ),
		'section'=> 'vw_home_renovation_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_home_renovation_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_home_renovation_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_home_renovation_Customize_partial_vw_home_renovation_related_post_title',
	));

  	$wp_customize->add_setting( 'vw_home_renovation_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  	) );
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_post',array(
		'label' => esc_html__( 'Related Post','vw-home-renovation' ),
		'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('vw_home_renovation_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_home_renovation_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_home_renovation_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_home_renovation_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_related_toggle_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  	));
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_toggle_postdate',array(
	    'label' => esc_html__( 'Show / Hide Post Date','vw-home-renovation' ),
	    'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_postdate_icon',array(
	    'default' => 'fas fa-calendar-alt',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_home_renovation_related_postdate_icon',array(
	    'label' => __('Add Post Date Icon','vw-home-renovation'),
	    'transport' => 'refresh',
	    'section' => 'vw_home_renovation_related_posts_settings',
	    'setting' => 'vw_home_renovation_related_postdate_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_home_renovation_related_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  	));
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-home-renovation' ),
		'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_author_icon',array(
	    'default' => 'fas fa-user',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_home_renovation_related_author_icon',array(
	    'label' => __('Add Author Icon','vw-home-renovation'),
	    'transport' => 'refresh',
	    'section' => 'vw_home_renovation_related_posts_settings',
	    'setting' => 'vw_home_renovation_related_author_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_home_renovation_related_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  	) );
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-home-renovation' ),
		'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_comments_icon',array(
	    'default' => 'fa fa-comments',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_home_renovation_related_comments_icon',array(
	    'label' => __('Add Comments Icon','vw-home-renovation'),
	    'transport' => 'refresh',
	    'section' => 'vw_home_renovation_related_posts_settings',
	    'setting' => 'vw_home_renovation_related_comments_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_home_renovation_related_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  	) );
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-home-renovation' ),
		'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_time_icon',array(
	    'default' => 'fas fa-clock',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_home_renovation_related_time_icon',array(
	    'label' => __('Add Time Icon','vw-home-renovation'),
	    'transport' => 'refresh',
	    'section' => 'vw_home_renovation_related_posts_settings',
	    'setting' => 'vw_home_renovation_related_time_icon',
	    'type'    => 'icon'
  	)));

  	$wp_customize->add_setting('vw_home_renovation_related_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_related_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-home-renovation'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-home-renovation'),
		'section'=> 'vw_home_renovation_related_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_home_renovation_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-home-renovation' ),
		'section' => 'vw_home_renovation_related_posts_settings'
  	)));

  	$wp_customize->add_setting( 'vw_home_renovation_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('vw_home_renovation_related_button_text',array(
		'default'=> esc_html__('Read More','vw-home-renovation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-home-renovation'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_home_renovation_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_home_renovation_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_single_blog_settings',
		'setting'	=> 'vw_home_renovation_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_home_renovation_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_postdate',array(
	   'label' => esc_html__( 'Show / Hide Date','vw-home-renovation' ),
	   'section' => 'vw_home_renovation_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_home_renovation_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_single_blog_settings',
		'setting'	=> 'vw_home_renovation_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_home_renovation_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-home-renovation' ),
	    'section' => 'vw_home_renovation_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_home_renovation_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_single_blog_settings',
		'setting'	=> 'vw_home_renovation_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_home_renovation_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-home-renovation' ),
	    'section' => 'vw_home_renovation_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_home_renovation_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_single_blog_settings',
		'setting'	=> 'vw_home_renovation_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_home_renovation_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-home-renovation' ),
	    'section' => 'vw_home_renovation_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_home_renovation_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-home-renovation' ),
		'section' => 'vw_home_renovation_single_blog_settings'
  )));

	$wp_customize->add_setting( 'vw_home_renovation_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-home-renovation' ),
		'section' => 'vw_home_renovation_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'vw_home_renovation_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-home-renovation' ),
		'section' => 'vw_home_renovation_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_home_renovation_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_home_renovation_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-home-renovation'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-home-renovation'),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_home_renovation_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','vw-home-renovation' ),
		  'section' => 'vw_home_renovation_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_home_renovation_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
   $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-home-renovation' ),
		'section' => 'vw_home_renovation_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_home_renovation_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'vw-home-renovation' ),
    	),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-home-renovation'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-home-renovation'),
		'description'	=> __('Enter a value in %. Example:50%','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_home_renovation_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_home_renovation_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_grid_layout_settings',
		'setting'	=> 'vw_home_renovation_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_home_renovation_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-home-renovation' ),
    'section' => 'vw_home_renovation_grid_layout_settings'
  )));

	$wp_customize->add_setting('vw_home_renovation_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_grid_layout_settings',
		'setting'	=> 'vw_home_renovation_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_home_renovation_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-home-renovation' ),
		'section' => 'vw_home_renovation_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_home_renovation_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_grid_layout_settings',
		'setting'	=> 'vw_home_renovation_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_home_renovation_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-home-renovation' ),
		'section' => 'vw_home_renovation_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_home_renovation_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_grid_time_icon',array(
		'label'	=> __('Add Time Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_grid_layout_settings',
		'setting'	=> 'vw_home_renovation_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_home_renovation_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-home-renovation' ),
		'section' => 'vw_home_renovation_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_home_renovation_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
  	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-home-renovation' ),
		'section' => 'vw_home_renovation_grid_layout_settings'
  	)));

 	$wp_customize->add_setting('vw_home_renovation_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-home-renovation'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-home-renovation'),
		'section'=> 'vw_home_renovation_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_home_renovation_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','vw-home-renovation'),
    'section' => 'vw_home_renovation_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-home-renovation'),
      'Without Blocks' => __('Without Blocks','vw-home-renovation')
      ),
	) );

	$wp_customize->add_setting('vw_home_renovation_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-home-renovation'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_home_renovation_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','vw-home-renovation'),
    'section' => 'vw_home_renovation_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-home-renovation'),
        'Excerpt' => esc_html__('Excerpt','vw-home-renovation'),
        'No Content' => esc_html__('No Content','vw-home-renovation')
    ),
	) );

    $wp_customize->add_setting( 'vw_home_renovation_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'vw_home_renovation_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'vw-home-renovation' ),
		'panel' => 'vw_home_renovation_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_home_renovation_left_right', array(
  	'title' => esc_html__('General Settings', 'vw-home-renovation'),
		'panel' => 'vw_home_renovation_other_parent_panel'
	) );

	$wp_customize->add_setting('vw_home_renovation_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control(new vw_home_renovation_Image_Radio_Control($wp_customize, 'vw_home_renovation_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','vw-home-renovation'),
    'description' => esc_html__('Here you can change the width layout of Website.','vw-home-renovation'),
    'section' => 'vw_home_renovation_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('vw_home_renovation_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_page_layout',array(
    'type' => 'select',
    'label' => esc_html__('Page Sidebar Layout','vw-home-renovation'),
    'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-home-renovation'),
    'section' => 'vw_home_renovation_left_right',
    'choices' => array(
        'Left_Sidebar' => esc_html__('Left Sidebar','vw-home-renovation'),
        'Right_Sidebar' => esc_html__('Right Sidebar','vw-home-renovation'),
        'One_Column' => esc_html__('One Column','vw-home-renovation')
    ),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_single_page_breadcrumb1',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_single_page_breadcrumb1',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-home-renovation' ),
		'section' => 'vw_home_renovation_left_right'
    )));
	
    // Pre-Loader
	$wp_customize->add_setting( 'vw_home_renovation_loader_enable',array(
	    'default' => 0,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	  ) );
	  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_loader_enable',array(
	    'label' => esc_html__( 'Pre-Loader','vw-home-renovation' ),
	    'section' => 'vw_home_renovation_left_right'
	  )));

	$wp_customize->add_setting('vw_home_renovation_preloader_bg_color', array(
		'default'           => '#F6B110',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_left_right',
	)));

	$wp_customize->add_setting('vw_home_renovation_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_left_right',
	)));

	$wp_customize->add_setting('vw_home_renovation_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_home_renovation_preloader_bg_img',array(
    	'label' => __('Preloader Background Image','vw-home-renovation'),
    	'section' => 'vw_home_renovation_left_right'
	)));

	$wp_customize->add_setting('vw_home_renovation_breadcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_breadcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Breadcrumbs Alignment','vw-home-renovation'),
        'section' => 'vw_home_renovation_left_right',
        'choices' => array(
            'Left' => __('Left','vw-home-renovation'),
            'Right' => __('Right','vw-home-renovation'),
            'Center' => __('Center','vw-home-renovation'),
        ),
	) );

    //404 Page Setting
	$wp_customize->add_section('vw_home_renovation_404_page',array(
		'title'	=> __('404 Page Settings','vw-home-renovation'),
		'panel' => 'vw_home_renovation_other_parent_panel',
	));

	$wp_customize->add_setting('vw_home_renovation_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_404_page_title',array(
		'label'	=> __('Add Title','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_404_page_content',array(
		'label'	=> __('Add Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_home_renovation_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-home-renovation'),
		'panel' => 'vw_home_renovation_other_parent_panel',
	));

	$wp_customize->add_setting('vw_home_renovation_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_no_results_page_title',array(
		'label'	=> __('Add Title','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_home_renovation_no_results_page_content',array(
		'label'	=> __('Add Text','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_home_renovation_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-home-renovation'),
		'panel' => 'vw_home_renovation_other_parent_panel',
	));

	$wp_customize->add_setting('vw_home_renovation_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icon_width',array(
		'label'	=> __('Icon Width','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_social_icon_height',array(
		'label'	=> __('Icon Height','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_home_renovation_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-home-renovation'),
		'panel' => 'vw_home_renovation_other_parent_panel',
	));

	$wp_customize->add_setting( 'vw_home_renovation_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-home-renovation' ),
      'section' => 'vw_home_renovation_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_home_renovation_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Banner','vw-home-renovation' ),
      	'section' => 'vw_home_renovation_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_home_renovation_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-home-renovation' ),
      	'section' => 'vw_home_renovation_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_home_renovation_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','vw-home-renovation' ),
        'section' => 'vw_home_renovation_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_home_renovation_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
	));
	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-home-renovation' ),
    	'section' => 'vw_home_renovation_responsive_media'
	)));

 	$wp_customize->add_setting('vw_home_renovation_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_responsive_media',
		'setting'	=> 'vw_home_renovation_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_home_renovation_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Home_Renovation_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_home_renovation_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-home-renovation'),
		'transport' => 'refresh',
		'section'	=> 'vw_home_renovation_responsive_media',
		'setting'	=> 'vw_home_renovation_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_home_renovation_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#F6B110',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_home_renovation_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-home-renovation'),
		'section'  => 'vw_home_renovation_responsive_media',
	)));

  //Woocommerce settings
	$wp_customize->add_section('vw_home_renovation_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-home-renovation'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_home_renovation_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_home_renovation_customize_partial_vw_home_renovation_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_home_renovation_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-home-renovation' ),
		'section' => 'vw_home_renovation_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_home_renovation_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','vw-home-renovation'),
    'section' => 'vw_home_renovation_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-home-renovation'),
        'Right Sidebar' => __('Right Sidebar','vw-home-renovation'),
    ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_home_renovation_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_home_renovation_customize_partial_vw_home_renovation_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_home_renovation_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
   ) );
 	$wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-home-renovation' ),
		'section' => 'vw_home_renovation_woocommerce_section'
  )));

   $wp_customize->add_setting('vw_home_renovation_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','vw-home-renovation'),
    'section' => 'vw_home_renovation_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-home-renovation'),
        'Right Sidebar' => __('Right Sidebar','vw-home-renovation'),
    ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_home_renovation_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_float'
	));
	$wp_customize->add_control('vw_home_renovation_products_per_page',array(
		'label'	=> __('Products Per Page','vw-home-renovation'),
		'description' => __('Display on shop page','vw-home-renovation'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_home_renovation_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_products_per_row',array(
		'label'	=> __('Products Per Row','vw-home-renovation'),
		'description' => __('Display on shop page','vw-home-renovation'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'select',
	));
	
	//Products padding
	$wp_customize->add_setting('vw_home_renovation_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_home_renovation_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_home_renovation_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_home_renovation_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_home_renovation_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('vw_home_renovation_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'vw_home_renovation_sanitize_choices'
	));
	$wp_customize->add_control('vw_home_renovation_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','vw-home-renovation'),
    'section' => 'vw_home_renovation_woocommerce_section',
    'choices' => array(
        'left' => __('Left','vw-home-renovation'),
        'right' => __('Right','vw-home-renovation'),
    ),
	) );

	$wp_customize->add_setting('vw_home_renovation_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_home_renovation_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_home_renovation_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-home-renovation'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-home-renovation'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-home-renovation' ),
        ),
		'section'=> 'vw_home_renovation_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_home_renovation_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_home_renovation_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_home_renovation_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-home-renovation' ),
		'section'     => 'vw_home_renovation_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// Related Product
  $wp_customize->add_setting( 'vw_home_renovation_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_home_renovation_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Home_Renovation_Toggle_Switch_Custom_Control( $wp_customize, 'vw_home_renovation_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related product','vw-home-renovation' ),
    'section' => 'vw_home_renovation_woocommerce_section'
  )));

}

add_action( 'customize_register', 'vw_home_renovation_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Home_Renovation_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Home_Renovation_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Home_Renovation_Customize_Section_Pro( $manager,'VW_Home_Renovation_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'HOME RENOVATION PRO', 'vw-home-renovation' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-home-renovation' ),
			'pro_url'  => esc_url('https://www.buywptemplates.com/products/home-renovation-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new VW_Home_Renovation_Customize_Section_Pro($manager,'vw_home_renovation_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-home-renovation' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-home-renovation' ),
			'pro_url'  => esc_url('https://demos.buywptemplates.com/demo/docs/free-home-renovation/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-home-renovation-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-home-renovation-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Home_Renovation_Customize::get_instance();
