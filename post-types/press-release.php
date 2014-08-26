<?php

function press_release_init() {
	register_post_type( 'press-release', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'menu_position'		=> 5,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Press Releases', 'shiftwp' ),
			'singular_name'       => __( 'Press Release', 'shiftwp' ),
			'all_items'           => __( 'Press Releases', 'shiftwp' ),
			'new_item'            => __( 'New Press Releases', 'shiftwp' ),
			'add_new'             => __( 'Add New', 'shiftwp' ),
			'add_new_item'        => __( 'Add New Press Releases', 'shiftwp' ),
			'edit_item'           => __( 'Edit Press Releases', 'shiftwp' ),
			'view_item'           => __( 'View Press Releases', 'shiftwp' ),
			'search_items'        => __( 'Search Press Releases', 'shiftwp' ),
			'not_found'           => __( 'No Press Releases found', 'shiftwp' ),
			'not_found_in_trash'  => __( 'No Press Releases found in trash', 'shiftwp' ),
			'parent_item_colon'   => __( 'Parent Press Releases', 'shiftwp' ),
			'menu_name'           => __( 'Press Releases', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'press_release_init' );

function press_release_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['press-release'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Press Releases updated. <a target="_blank" href="%s">View Press Releases</a>', 'shiftwp'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'shiftwp'),
		3 => __('Custom field deleted.', 'shiftwp'),
		4 => __('Press Releases updated.', 'shiftwp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Press Releases restored to revision from %s', 'shiftwp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Press Releases published. <a href="%s">View Press Releases</a>', 'shiftwp'), esc_url( $permalink ) ),
		7 => __('Press Releases saved.', 'shiftwp'),
		8 => sprintf( __('Press Releases submitted. <a target="_blank" href="%s">Preview Press Releases</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Press Releases scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Press Releases</a>', 'shiftwp'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Press Releases draft updated. <a target="_blank" href="%s">Preview Press Releases</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'press_release_updated_messages' );
