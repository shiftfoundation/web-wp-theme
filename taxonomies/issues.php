<?php

function issues_init() {
	register_taxonomy( 'issues', array( 'post', 'project' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts'
		),
		'labels'            => array(
			'name'                       => __( 'Social issues', 'shift' ),
			'singular_name'              => _x( 'Social issues', 'taxonomy general name', 'shift' ),
			'search_items'               => __( 'Search Social issues', 'shift' ),
			'popular_items'              => __( 'Popular Social issues', 'shift' ),
			'all_items'                  => __( 'All Social issues', 'shift' ),
			'parent_item'                => __( 'Parent Social issues', 'shift' ),
			'parent_item_colon'          => __( 'Parent Social issues:', 'shift' ),
			'edit_item'                  => __( 'Edit Social issues', 'shift' ),
			'update_item'                => __( 'Update Social issues', 'shift' ),
			'add_new_item'               => __( 'New Social issues', 'shift' ),
			'new_item_name'              => __( 'New Social issues', 'shift' ),
			'separate_items_with_commas' => __( 'Social issues separated by comma', 'shift' ),
			'add_or_remove_items'        => __( 'Add or remove Social issues', 'shift' ),
			'choose_from_most_used'      => __( 'Choose from the most used Social issues', 'shift' ),
			'menu_name'                  => __( 'Social issues', 'shift' ),
		),
	) );

}
add_action( 'init', 'issues_init' );
