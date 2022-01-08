<?php

require_once get_template_directory(  ).'/inc/dh_walker.php';
/**
 * Doors and Handles functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doors_and_Handles
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'doors_and_handles_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function doors_and_handles_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Doors and Handles, use a find and replace
		 * to change 'doors-and-handles' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'doors-and-handles', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'doors-and-handles' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'doors_and_handles_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		/**
		 * 
		 */ 
		add_theme_support( 'custom-header', array(
			'flex-width'    => true,
			'width'         => 2000,
			'flex-height'   => true,
			'height'        => 500,
			'default-image' => get_template_directory_uri() . '/images/header.jpg',
		) );
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'doors_and_handles_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function doors_and_handles_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'doors_and_handles_content_width', 640 );
}
add_action( 'after_setup_theme', 'doors_and_handles_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function doors_and_handles_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'doors-and-handles' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'doors-and-handles' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'doors_and_handles_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function doors_and_handles_scripts() {
	wp_enqueue_style( 'doors-and-handles-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'doors-and-handles-main-style', get_template_directory_uri().'/css/main.css' );
	//enqueue font awesome
	wp_enqueue_style( 'doors-and-handles-font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.min.css' );
	wp_style_add_data( 'doors-and-handles-style', 'rtl', 'replace' );

	wp_enqueue_script( 'doors-and-handles-bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'doors-and-handles-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'doors_and_handles_scripts' );



/* 
	Header Widgets
*/

function doors_and_handles_header_widget_search(){
	$args = array(
			'id' => 'dh_header_widget_search',
			'name' => __('Header Search Widget Area 1', 'text_domain'),
			'description' => __('Header Search Widget Area 1', 'text_domain'),
			'before_title' => '<span class="dh-header-search-title">',
			'after_title' => '<span/>',
			'before_widget' => '<span id="id="%1$s" class="widget %2$s">',
			'after_widget' => '<span/>',

	);
	register_sidebar( $args );
}
add_action( "widgets_init", 'doors_and_handles_header_widget_search');

function doors_and_handles_header_widget_one(){
	$args = array(
			'id' => 'dh_header_widget_one',
			'name' => __('Header Widget Area 1', 'text_domain'),
			'description' => __('Header Widget Area 1', 'text_domain'),
			'before_title' => '<h3 class="dh-header-one-title">',
			'after_title' => '<h3/>',
			'before_widget' => '<span id="id="%1$s" class="widget %2$s">',
			'after_widget' => '<span/>',

	);
	register_sidebar( $args );
}
add_action( "widgets_init", 'doors_and_handles_header_widget_one');

function doors_and_handles_header_widget_two(){
	$args = array(
			'id' => 'dh_header_widget_two',
			'name' => __('Header Widget Area 2', 'text_domain'),
			'description' => __('Header Widget Area 2', 'text_domain'),
			'before_title' => '<h3 class="dh-header-two-title">',
			'after_title' => '<h3/>',
			'before_widget' => '<span id="id="%1$s" class="widget %2$s">',
			'after_widget' => '<span/>',

	);
	register_sidebar( $args );
}
add_action( "widgets_init", 'doors_and_handles_header_widget_two');

/* 
	Footer Widgets
*/

function doors_and_handles_footer_widget_one(){
	$args = array(
			'id' => 'dh_footer_widget_one',
			'name' => __('Footer Widget Area 1', 'text_domain'),
			'description' => __('Footer Widget Area 1', 'text_domain'),
			'before_title' => '<h3 class="dh-footer-one-title">',
			'after_title' => '<h3/>',
			'before_widget' => '<div id="id="%1$s" class="widget %2$s">',
			'after_widget' => '<div/>',

	);
	register_sidebar( $args );
}
add_action( "widgets_init", 'doors_and_handles_footer_widget_one');

function doors_and_handles_footer_widget_two(){
	$args = array(
			'id' => 'dh_footer_widget_two',
			'name' => __('Footer Widget Area 2 ', 'text_domain'),
			'description' => __('Footer Widget Area 2', 'text_domain'),
			'before_title' => '<h3 class="dh-footer-two-title">',
			'after_title' => '<h3/>',
			'before_widget' => '<div id="id="%1$s" class="widget %2$s">',
			'after_widget' => '<div/>',

	);
	register_sidebar( $args );
}
add_action( "widgets_init", 'doors_and_handles_footer_widget_two');

/***
 * 
 *  Custom Fonts Roboto, Nunito
 * 
*/

function enqueue_custom_fonts(){
	if(!is_admin()){
		 wp_register_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat');
		//  wp_register_style( 'nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap');
		 wp_register_style( 'nunito', 'https://fonts.googleapis.com/css2?family=Nunito');
		 wp_enqueue_style( 'montserrat' );
		 wp_enqueue_style( 'nunito' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_fonts' );

/**
 * Show cart contents / total Ajax
 */
//add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
	<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?>
	</a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

/* Cart Page Template Qty Filter */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
/*
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
*/

remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
add_action('woocommerce_cart_is_empty', 'doors_and_handles_empty_cart', 10);

function doors_and_handles_empty_cart(){
	echo '<p class="my-5 fs-4 fw-bold text-black">Your cart is currently empty </p>';
}