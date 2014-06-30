<?php

function themes_init() {
	register_taxonomy( 'themes', array( 'post', 'projects' ), array(
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
			'name'                       => __( 'Themes', 'shiftwp' ),
			'singular_name'              => _x( 'Themes', 'taxonomy general name', 'shiftwp' ),
			'search_items'               => __( 'Search Themes', 'shiftwp' ),
			'popular_items'              => __( 'Popular Themes', 'shiftwp' ),
			'all_items'                  => __( 'All Themes', 'shiftwp' ),
			'parent_item'                => __( 'Parent Themes', 'shiftwp' ),
			'parent_item_colon'          => __( 'Parent Themes:', 'shiftwp' ),
			'edit_item'                  => __( 'Edit Themes', 'shiftwp' ),
			'update_item'                => __( 'Update Themes', 'shiftwp' ),
			'add_new_item'               => __( 'New Themes', 'shiftwp' ),
			'new_item_name'              => __( 'New Themes', 'shiftwp' ),
			'separate_items_with_commas' => __( 'Themes separated by comma', 'shiftwp' ),
			'add_or_remove_items'        => __( 'Add or remove Themes', 'shiftwp' ),
			'choose_from_most_used'      => __( 'Choose from the most used Themes', 'shiftwp' ),
			'menu_name'                  => __( 'Themes', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'themes_init' );
