<?php

function research_init() {
	register_post_type( 'research', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'menu_position'		=> 5,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Research', 'shiftwp' ),
			'singular_name'       => __( 'Research', 'shiftwp' ),
			'all_items'           => __( 'Research', 'shiftwp' ),
			'new_item'            => __( 'New Research', 'shiftwp' ),
			'add_new'             => __( 'Add New', 'shiftwp' ),
			'add_new_item'        => __( 'Add New Research', 'shiftwp' ),
			'edit_item'           => __( 'Edit Research', 'shiftwp' ),
			'view_item'           => __( 'View Research', 'shiftwp' ),
			'search_items'        => __( 'Search Researches', 'shiftwp' ),
			'not_found'           => __( 'No Researches found', 'shiftwp' ),
			'not_found_in_trash'  => __( 'No Researches found in trash', 'shiftwp' ),
			'parent_item_colon'   => __( 'Parent Research', 'shiftwp' ),
			'menu_name'           => __( 'Research', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'research_init' );

function research_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['research'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Research updated. <a target="_blank" href="%s">View Research</a>', 'shiftwp'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'shiftwp'),
		3 => __('Custom field deleted.', 'shiftwp'),
		4 => __('Research updated.', 'shiftwp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Research restored to revision from %s', 'shiftwp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Research published. <a href="%s">View Research</a>', 'shiftwp'), esc_url( $permalink ) ),
		7 => __('Research saved.', 'shiftwp'),
		8 => sprintf( __('Research submitted. <a target="_blank" href="%s">Preview Research</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Research scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Research</a>', 'shiftwp'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Research draft updated. <a target="_blank" href="%s">Preview Research</a>', 'shiftwp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'research_updated_messages' );


