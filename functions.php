<?php
/**
 * Shiftwp functions and definitions
 *
 * @package Shiftwp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'shiftwp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shiftwp_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Shiftwp, use a find and replace
		 * to change 'shiftwp' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'shiftwp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'shiftwp' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		//add_theme_support( 'post-formats', array(
			//'aside', 'image', 'video', 'quote', 'link'
		//) );

		// Setup the WordPress core custom background feature.
		//add_theme_support( 'custom-background', apply_filters( 'shiftwp_custom_background_args', array(
			//'default-color' => 'ffffff',
			//'default-image' => '',
		//) ) );

		include get_template_directory() . '/post-types/projects.php';
		include get_template_directory() . '/post-types/press-release.php';
		include get_template_directory() . '/post-types/member.php';
		include get_template_directory() . '/taxonomies/themes.php';
	}
endif; // shiftwp_setup
add_action( 'after_setup_theme', 'shiftwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shiftwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'shiftwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'shiftwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shiftwp_scripts() {
	wp_enqueue_style( 'shiftwp-iconfont', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'shiftwp-style', get_template_directory_uri() . '/css/app.css' );

	wp_enqueue_script( 'shiftwp-app', get_template_directory_uri() . '/js/app.js', array('jquery'), '20120206' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shiftwp_scripts' );


function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
