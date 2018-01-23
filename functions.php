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

	function shiftwp_setup() {

		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'shiftwp' ),
			'footer' => __( 'Footer Menu', 'shiftwp' ),
		) );

		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link'
		) );

		include get_template_directory() . '/post-types/products.php';
		include get_template_directory() . '/post-types/research.php';

		include get_template_directory() . '/taxonomies/issues.php';
		//include get_template_directory() . '/taxonomies/themes.php';
	}
endif;
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
	wp_enqueue_style( 'shiftwp-style', get_template_directory_uri() . '/css/site.css?time=' . date('now') );
	//wp_enqueue_style( 'shiftwp-style', get_template_directory_uri() . '/css/app.css' );

	wp_enqueue_script( 'shiftwp-twitter', get_template_directory_uri() . '/tweetie/tweetie.min.js', array('jquery'), '20120206' );
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

if ( ! function_exists( 'shiftwp_pagination' ) ) :
	function shiftwp_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;


function shiftwp_editor_styles() {
    add_editor_style( 'css/typography.css' );
}
add_action( 'after_setup_theme', 'shiftwp_editor_styles' );


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

add_filter('xmlrpc_enabled', '__return_false');

function wpse_81939_post_types_admin_order( $wp_query ) {
  if (is_admin()) {

    // Get the post type from the query
    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'product') {

      $wp_query->set('orderby', 'order');
    }
  }
}
add_filter('pre_get_posts', 'wpse_81939_post_types_admin_order');

function archive_category_include_research($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ( is_category() ) {
			$query->set('post_type', array( 'post', 'research' ) );
		}
	}
}

add_action('pre_get_posts','archive_category_include_research');
