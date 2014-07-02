<?php

function member_init() {
	register_post_type( 'member', array(
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
			'name'                => __( 'The Team', 'shiftwp' ),
			'singular_name'       => __( 'Member', 'shiftwp' ),
			'all_items'           => __( 'Members', 'shiftwp' ),
			'new_item'            => __( 'New Member', 'shiftwp' ),
			'add_new'             => __( 'Add New', 'shiftwp' ),
			'add_new_item'        => __( 'Add New Member', 'shiftwp' ),
			'edit_item'           => __( 'Edit Member', 'shiftwp' ),
			'view_item'           => __( 'View Member', 'shiftwp' ),
			'search_items'        => __( 'Search Members', 'shiftwp' ),
			'not_found'           => __( 'No Members found', 'shiftwp' ),
			'not_found_in_trash'  => __( 'No Members found in trash', 'shiftwp' ),
			'parent_item_colon'   => __( 'Parent Member', 'shiftwp' ),
			'menu_name'           => __( 'The Team', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'member_init' );

function member_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['member'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('The Team updated. <a target="_blank" href="%s">View The Team</a>', 'shiftwp'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'shiftwp'),
		3 => __('Custom field deleted.', 'shiftwp'),
		4 => __('The Team updated.', 'shiftwp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('The Team restored to revision from %s', 'shiftwp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('The Team published. <a href="%s">View The Team</a>', 'shiftwp'), esc_url( $permalink ) ),
		7 => __('The Team saved.', 'shiftwp'),
		8 => sprintf( __('The Team submitted. <a target="_blank" href="%s">Preview The Team</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('The Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview The Team</a>', 'shiftwp'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('The Team draft updated. <a target="_blank" href="%s">Preview The Team</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'member_updated_messages' );
