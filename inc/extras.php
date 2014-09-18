<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Shiftwp
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function shiftwp_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'shiftwp_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shiftwp_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'shiftwp_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function shiftwp_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'shiftwp' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'shiftwp_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function shiftwp_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'shiftwp_setup_author' );


/**
 * Rename the Posts menu to Blog
 */
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Posts';
    $submenu['edit.php'][16][0] = 'Posts Tags';
    echo '';
}
add_action( 'admin_menu', 'revcon_change_post_label' );

function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Posts';
    $labels->add_new = 'Add Posts';
    $labels->add_new_item = 'Add Posts';
    $labels->edit_item = 'Edit Posts';
    $labels->new_item = 'Posts';
    $labels->view_item = 'View Posts';
    $labels->search_items = 'Search Posts';
    $labels->not_found = 'No Posts found';
    $labels->not_found_in_trash = 'No Posts found in Trash';
    $labels->all_items = 'All Posts';
    $labels->menu_name = 'Posts';
    $labels->name_admin_bar = 'Posts';
}
add_action( 'init', 'revcon_change_post_object' );

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard

  if ( !current_user_can( 'manage_options' ) ) {
	  //remove_menu_page( 'edit.php' );                   //Posts
	  //remove_menu_page( 'upload.php' );                 //Media
	  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
	  //remove_menu_page( 'edit-comments.php' );          //Comments
	  //remove_menu_page( 'users.php' );                  //Users
	  remove_menu_page( 'themes.php' );                 //Appearance
	  remove_menu_page( 'plugins.php' );                //Plugins
	  remove_menu_page( 'tools.php' );                  //Tools
	  remove_menu_page( 'options-general.php' );        //Settings
  }
  
}
add_action( 'admin_menu', 'remove_menus' );

