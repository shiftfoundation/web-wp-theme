<?php

function projects_init() {
	register_post_type( 'projects', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Projects', 'Projects' ),
			'singular_name'       => __( 'Project', 'Projects' ),
			'add_new'             => __( 'Add new Project', 'Projects' ),
			'all_items'           => __( 'Projects', 'Projects' ),
			'add_new_item'        => __( 'Add new Project', 'Projects' ),
			'edit_item'           => __( 'Edit Project', 'Projects' ),
			'new_item'            => __( 'New Project', 'Projects' ),
			'view_item'           => __( 'View Project', 'Projects' ),
			'search_items'        => __( 'Search Project', 'Projects' ),
			'not_found'           => __( 'No Projects found', 'Projects' ),
			'not_found_in_trash'  => __( 'No Projects found in trash', 'Projects' ),
			'parent_item_colon'   => __( 'Parent Project', 'Projects' ),
			'menu_name'           => __( 'Projects', 'Projects' ),
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
