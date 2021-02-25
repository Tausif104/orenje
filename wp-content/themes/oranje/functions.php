<?php
/**
 * Oranje functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Oranje
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


function pr($p=[]) {
	echo '<pre>';
	print_r($p);
	echo '</pre>';
}
function pe($p=[]) {
	pr($p);
	exit;
}


add_filter('site_transient_update_plugins', 'oranje_remove_updates');
function oranje_remove_updates($value) {
	unset($value->response['all-in-one-wp-migration/all-in-one-wp-migration.php']);
    unset($value->response[ 'advanced-custom-fields-pro-master/acf.php' ]);
    return $value;
}




if ( ! function_exists( 'oranje_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oranje_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Oranje, use a find and replace
		 * to change 'oranje' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oranje', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'oranje' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'oranje' ),
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
				'oranje_custom_background_args',
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
	}
endif;
add_action( 'after_setup_theme', 'oranje_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oranje_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oranje_content_width', 640 );
}
add_action( 'after_setup_theme', 'oranje_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oranje_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'oranje' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'oranje' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer explore widget', 'oranje' ),
			'id'            => 'footer-explore',
			'description'   => esc_html__( 'Add widgets here.', 'oranje' ),
			'before_widget' => '<div class="footer-widget-main">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widgett-title mb-50">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer cleaning service widget', 'oranje' ),
			'id'            => 'cleaning-service',
			'description'   => esc_html__( 'Add widgets here.', 'oranje' ),
			'before_widget' => '<div class="footer-widget-main">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widgett-title mb-50">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'oranje_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oranje_scripts() { 

	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
	
	wp_enqueue_style( 'meanmenu', get_theme_file_uri( '/assets/css/meanmenu.css', '4.1' ) ); 
	wp_enqueue_style( 'fullcalendar', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' );
	wp_enqueue_style( 'nice-select', get_theme_file_uri( '/assets/css/nice-select.css', '1.0' ) );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css', '4.7.0' ) );
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/all.min.css', '5.15.1' ) );
	wp_enqueue_style( 'owl-carousels', get_theme_file_uri( '/assets/css/owl.carousel.css', '1.0' ) );
	wp_enqueue_style( 'magnific', get_theme_file_uri( '/assets/css/magnific-popup.css', '1.0' ) ); 
	wp_enqueue_style( 'range', get_theme_file_uri( '/assets/css/range.css', '1.0' ) ); 
	wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', '1.0' ); 
	wp_enqueue_style( 'default', get_theme_file_uri( '/assets/css/default.css', '1.0' ) );
	wp_enqueue_style( 'jquery-steps', get_theme_file_uri( '/assets/css/jquery.steps.css' ), null, time() );
	wp_enqueue_style( 'multistep', get_theme_file_uri( '/assets/css/multistep.css' ), null, time() );
	wp_enqueue_style( 'oranje-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'oranje-responsive', get_theme_file_uri( '/assets/css/responsive.css', '1.0' ) );	
	wp_enqueue_style( 'bootstrap-slider', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css', '1.0' );

 
	
	
	

	wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'bootstrap-slider', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js', array('jquery', 'bootstrap'), '1.0', true );

	wp_enqueue_script( 'moment', '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'fullcalendar', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'range', get_theme_file_uri( '/assets/js/range.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'meanmenu', get_theme_file_uri( '/assets/js/jquery.meanmenu.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'nice-select', get_theme_file_uri( '/assets/js/jquery.nice-select.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'nav', get_theme_file_uri( '/assets/js/jquery.nav.js' ), array('jquery'), '3.0.0', true );
	wp_enqueue_script( 'waypoints', get_theme_file_uri( '/assets/js/waypoints.min2.0.3.js' ), array('jquery'), '2.0.3', true );
	wp_enqueue_script( 'countTo', get_theme_file_uri( '/assets/js/jquery.countTo.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'magnific', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'scrollUp', get_theme_file_uri( '/assets/js/jquery.scrollUp.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.0', true );	
	
	wp_enqueue_script( 'jquery-validate', get_theme_file_uri( '/assets/js/jquery.validate.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-steps', get_theme_file_uri( '/assets/js/jquery.steps.min.js' ), array('jquery'), '1.0', true );
	wp_enqueue_script( 'jquery-payment', get_theme_file_uri( '/assets/js/jquery.payment.min.js' ), array('jquery'), '1.0', true );
	wp_register_script( 'multistep', get_theme_file_uri( '/assets/js/multistep.js' ), array('jquery'), time(), true );
	$site_array = array(
		'home_url' => home_url(),
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	);
	wp_localize_script( 'multistep', 'site', $site_array );
	wp_enqueue_script('multistep');

	wp_enqueue_script( 'oranje-main', get_theme_file_uri( '/assets/js/main.js' ), array('jquery', 'multistep'), '1.0', true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'oranje_scripts' );


function oranje_admin_script( $hook ) {
    if ( isset( $_GET['page'] ) and $_GET['page'] == 'orders' ) {
		wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
        wp_enqueue_style( 'dataTables', '//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css' ); 
        wp_enqueue_style( 'admin-style', get_theme_file_uri( '/assets/css/admin.css' ) ); 
		
		wp_enqueue_script( 'dataTables', '//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js', array('jquery'), '1.0', true );	
		wp_enqueue_script( 'multistep', get_theme_file_uri( '/assets/js/admin.js' ), array('jquery'), '1.0', true );
    }    
}
add_action( 'admin_enqueue_scripts', 'oranje_admin_script' );


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
require get_template_directory() . '/inc/ssp.class.php';
require get_template_directory() . '/inc/cs/cs-framework.php';
require get_template_directory() . '/inc/cs/metabox-theme-options.php';
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require get_template_directory() . '/inc/orders.php';
require get_template_directory() . '/inc/products.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/ajax_disinfection.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/disinfection.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

require get_theme_file_path( '/gutenburg/index.php' );

function oranje_cp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'oranje_cp_content_width', 640 );
}
add_action( 'after_setup_theme', 'oranje_cp_content_width', 0 );
 


function oranje_editor_assets() {
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/all.min.css' ) ); 
	wp_enqueue_style( 'oranje-style', get_stylesheet_uri(), array(), _S_VERSION );
}

add_action('enqueue_block_editor_assets', 'oranje_editor_assets'); 


if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}


require_once get_theme_file_path( '/shortcodes/cleaning-form.php' );
require_once get_theme_file_path( '/shortcodes/disinfection-form.php' );

require_once get_theme_file_path( 'nav-walker.php' );