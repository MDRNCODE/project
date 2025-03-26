<?php
/**
 * Modular Kitchen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Modular Kitchen
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Modular_Kitchen_Loader.php' );

$Modular_Kitchen_Loader = new \WPTRT\Autoload\Modular_Kitchen_Loader();

$Modular_Kitchen_Loader->modular_kitchen_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Modular_Kitchen_Loader->modular_kitchen_register();

if ( ! function_exists( 'modular_kitchen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function modular_kitchen_setup() {

		load_theme_textdomain( 'modular-kitchen', get_template_directory() . '/languages' );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
		
		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('modular-kitchen-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','modular-kitchen' ),
	        'footer'=> esc_html__( 'Footer Menu','modular-kitchen' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'modular_kitchen_custom_background_args', array(
			'default-color' => 'f7ebe5',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
		add_action('wp_ajax_modular_kitchen_dismissable_notice', 'modular_kitchen_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'modular_kitchen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function modular_kitchen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'modular_kitchen_content_width', 1170 );
}
add_action( 'after_setup_theme', 'modular_kitchen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function modular_kitchen_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'modular-kitchen' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'modular-kitchen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'modular-kitchen' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'modular-kitchen' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'modular-kitchen' ),
		'id'            => 'modular-kitchen-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'modular-kitchen' ),
		'id'            => 'modular-kitchen-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'modular-kitchen' ),
		'id'            => 'modular-kitchen-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'modular_kitchen_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modular_kitchen_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'modular-kitchen-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'modular-kitchen-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'modular-kitchen-style',$modular_kitchen_theme_css );

	wp_style_add_data('modular-kitchen-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() .'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('modular-kitchen-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modular_kitchen_scripts' );

/**
 * Enqueue Preloader.
 */
function modular_kitchen_preloader() {

  $modular_kitchen_theme_color_css = '';
  $modular_kitchen_preloader_bg_color = get_theme_mod('modular_kitchen_preloader_bg_color');
  $modular_kitchen_preloader_dot_1_color = get_theme_mod('modular_kitchen_preloader_dot_1_color');
  $modular_kitchen_preloader_dot_2_color = get_theme_mod('modular_kitchen_preloader_dot_2_color');
  $modular_kitchen_preloader2_dot_color = get_theme_mod('modular_kitchen_preloader2_dot_color');
  $modular_kitchen_logo_max_height = get_theme_mod('modular_kitchen_logo_max_height');

  	if(get_theme_mod('modular_kitchen_logo_max_height') == '') {
		$modular_kitchen_logo_max_height = '24';
	}

	if(get_theme_mod('modular_kitchen_preloader_bg_color') == '') {
		$modular_kitchen_preloader_bg_color = '#ffffff';
	}
	if(get_theme_mod('modular_kitchen_preloader_dot_1_color') == '') {
		$modular_kitchen_preloader_dot_1_color = '#00cbee';
	}
	if(get_theme_mod('modular_kitchen_preloader_dot_2_color') == '') {
		$modular_kitchen_preloader_dot_2_color = '#2a2b31';
	}
	$modular_kitchen_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($modular_kitchen_logo_max_height).'px;
	 	}
		.loading, .loading2{
			background-color: '.esc_attr($modular_kitchen_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($modular_kitchen_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($modular_kitchen_preloader_dot_2_color).';
		  }
		}
		.load hr {
			background-color: '.esc_attr($modular_kitchen_preloader2_dot_color).';
		}
	';
    wp_add_inline_style( 'modular-kitchen-style',$modular_kitchen_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'modular_kitchen_preloader' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/tgm.php';

/** * Posts pagination. */
if ( ! function_exists( 'modular_kitchen_blog_posts_pagination' ) ) {
	function modular_kitchen_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'modular_kitchen_blog_pagination_type', 'blog-nav-numbers' );
		if ( $pagination_type == 'blog-nav-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}

function modular_kitchen_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function modular_kitchen_preloader1(){
	if(get_theme_mod('modular_kitchen_preloader_type', 'Preloader 1') == 'Preloader 1' ) {
		return true;
	}
	return false;
}

function modular_kitchen_preloader2(){
	if(get_theme_mod('modular_kitchen_preloader_type', 'Preloader 1') == 'Preloader 2' ) {
		return true;
	}
	return false;
}

/*radio button sanitization*/
function modular_kitchen_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function modular_kitchen_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

function modular_kitchen_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function modular_kitchen_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'modular_kitchen_loop_columns');
if (!function_exists('modular_kitchen_loop_columns')) {
	function modular_kitchen_loop_columns() {
		$columns = get_theme_mod( 'modular_kitchen_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}


/**
 * Get CSS
 */

function modular_kitchen_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','modular_kitchen',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('modular_kitchen_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'modular_kitchen_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_modular-kitchen-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'modular-kitchen-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'modular_kitchen_getpage_css' );

if ( ! defined( 'MODULAR_KITCHEN_CONTACT_SUPPORT' ) ) {
define('MODULAR_KITCHEN_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/modular-kitchen','modular-kitchen'));
}
if ( ! defined( 'MODULAR_KITCHEN_REVIEW' ) ) {
define('MODULAR_KITCHEN_REVIEW',__('https://wordpress.org/support/theme/modular-kitchen/reviews/#new-post','modular-kitchen'));
}
if ( ! defined( 'MODULAR_KITCHEN_LIVE_DEMO' ) ) {
define('MODULAR_KITCHEN_LIVE_DEMO',__('https://demo.themagnifico.net/modular-kitchen/','modular-kitchen'));
}
if ( ! defined( 'MODULAR_KITCHEN_GET_PREMIUM_PRO' ) ) {
define('MODULAR_KITCHEN_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/modular-kitchen-wordpress-theme','modular-kitchen'));
}
if ( ! defined( 'MODULAR_KITCHEN_PRO_DOC' ) ) {
define('MODULAR_KITCHEN_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/modular-kitchen-doc/','modular-kitchen'));
}
if ( ! defined( 'MODULAR_KITCHEN_FREE_DOC' ) ) {
define('MODULAR_KITCHEN_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/modular-kitchen-free-doc/','modular-kitchen'));
}

add_action('admin_menu', 'modular_kitchen_themepage');
function modular_kitchen_themepage(){

	$modular_kitchen_theme_test = wp_get_theme();

	$modular_kitchen_theme_info = add_theme_page( __('Theme Options','modular-kitchen'), __(' Theme Options','modular-kitchen'), 'manage_options', 'modular-kitchen-info.php', 'modular_kitchen_info_page' );
}

function modular_kitchen_info_page() {
	$modular_kitchen_theme_user = wp_get_current_user();
	$modular_kitchen_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap modular-kitchen-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','modular-kitchen'); ?><?php echo esc_html( $modular_kitchen_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "modular-kitchen"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Modular Kitchen , feel free to contact us for any support regarding our theme.", "modular-kitchen"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "modular-kitchen"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "modular-kitchen"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "modular-kitchen"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "modular-kitchen"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "modular-kitchen"); ?></h3>
						<p><?php esc_html_e("If You love Modular Kitchen theme then we would appreciate your review about our theme.", "modular-kitchen"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "modular-kitchen"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "modular-kitchen"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "modular-kitchen"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "modular-kitchen"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","modular-kitchen"); ?></h2>
		<div class="modular-kitchen-button-container">
			<a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "modular-kitchen"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "modular-kitchen"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "modular-kitchen"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "modular-kitchen"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "modular-kitchen"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "modular-kitchen"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "modular-kitchen"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "modular-kitchen"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "modular-kitchen"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="modular-kitchen-button-container">
			<a target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "modular-kitchen"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function modular_kitchen_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function modular_kitchen_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'modular_kitchen_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'modular-kitchen'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'modular-kitchen'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=modular-kitchen-info.php' )); ?>"><?php esc_html_e( 'Get started', 'modular-kitchen' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'modular-kitchen' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( MODULAR_KITCHEN_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'modular-kitchen' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'modular_kitchen_deprecated_hook_admin_notice' );

function modular_kitchen_switch_theme() {
    delete_user_meta(get_current_user_id(), 'modular_kitchen_dismissable_notice');
}
add_action('after_switch_theme', 'modular_kitchen_switch_theme');
function modular_kitchen_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'modular_kitchen_dismissable_notice', true);
    die();
}