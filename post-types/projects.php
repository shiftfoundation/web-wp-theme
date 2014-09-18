<?php

function projects_init() {
	register_post_type( 'project', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'menu_position'		=> 5,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'				  => 'projects',
		),
		'labels'            => array(
			'name'                => __( 'Projects', 'shiftwp' ),
			'singular_name'       => __( 'Project', 'shiftwp' ),
			'add_new'             => __( 'Add new Project', 'shiftwp' ),
			'all_items'           => __( 'Projects', 'shiftwp' ),
			'add_new_item'        => __( 'Add new Project', 'shiftwp' ),
			'edit_item'           => __( 'Edit Project', 'shiftwp' ),
			'new_item'            => __( 'New Project', 'shiftwp' ),
			'view_item'           => __( 'View Project', 'shiftwp' ),
			'search_items'        => __( 'Search Project', 'shiftwp' ),
			'not_found'           => __( 'No Projects found', 'shiftwp' ),
			'not_found_in_trash'  => __( 'No Projects found in trash', 'shiftwp' ),
			'parent_item_colon'   => __( 'Parent Project', 'shiftwp' ),
			'menu_name'           => __( 'Projects', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'projects_init' );

function projects_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['projects'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Projects updated. <a target="_blank" href="%s">View Projects</a>', 'Projects'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'Projects'),
		3 => __('Custom field deleted.', 'Projects'),
		4 => __('Projects updated.', 'Projects'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Projects restored to revision from %s', 'Projects'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Projects published. <a href="%s">View Projects</a>', 'Projects'), esc_url( $permalink ) ),
		7 => __('Projects saved.', 'Projects'),
		8 => sprintf( __('Projects submitted. <a target="_blank" href="%s">Preview Projects</a>', 'Projects'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Projects scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Projects</a>', 'Projects'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Projects draft updated. <a target="_blank" href="%s">Preview Projects</a>', 'Projects'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'projects_updated_messages' );

/**
 * Rename the Posts menu to Blog
 */
function project_to_users() {
    p2p_register_connection_type( array(
        'name' => 'project_to_users',
        'from' => 'project',
        'to' => 'user'
    ) );
}
add_action( 'p2p_init', 'project_to_users' );

/**
 * Rename the Posts menu to Blog
 */
function page_to_users() {
    p2p_register_connection_type( array(
        'name' => 'page_to_users',
        'from' => 'page',
        'to' => 'user'
    ) );
}
add_action( 'p2p_init', 'page_to_users' );
