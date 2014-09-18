<?php

function products_init() {
	register_post_type( 'product', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'menu_position'		=> 5,
		'supports'          => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug'				  => 'products',
		),
		'labels'            => array(
			'name'                => __( 'Products', 'shiftwp' ),
			'singular_name'       => __( 'Product', 'shiftwp' ),
			'add_new'             => __( 'Add new Product', 'shiftwp' ),
			'all_items'           => __( 'Products', 'shiftwp' ),
			'add_new_item'        => __( 'Add new Product', 'shiftwp' ),
			'edit_item'           => __( 'Edit Product', 'shiftwp' ),
			'new_item'            => __( 'New Product', 'shiftwp' ),
			'view_item'           => __( 'View Product', 'shiftwp' ),
			'search_items'        => __( 'Search Product', 'shiftwp' ),
			'not_found'           => __( 'No Products found', 'shiftwp' ),
			'not_found_in_trash'  => __( 'No Products found in trash', 'shiftwp' ),
			'parent_item_colon'   => __( 'Parent Product', 'shiftwp' ),
			'menu_name'           => __( 'Products', 'shiftwp' ),
		),
	) );

}
add_action( 'init', 'products_init' );

function products_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['products'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Products updated. <a target="_blank" href="%s">View Products</a>', 'Products'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'Products'),
		3 => __('Custom field deleted.', 'Products'),
		4 => __('Products updated.', 'Products'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Products restored to revision from %s', 'Products'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Products published. <a href="%s">View Products</a>', 'Products'), esc_url( $permalink ) ),
		7 => __('Products saved.', 'Products'),
		8 => sprintf( __('Products submitted. <a target="_blank" href="%s">Preview Products</a>', 'Products'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Products scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Products</a>', 'Products'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Products draft updated. <a target="_blank" href="%s">Preview Products</a>', 'Products'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'products_updated_messages' );

/**
 * Rename the Posts menu to Blog
 */
function product_to_users() {
    p2p_register_connection_type( array(
        'name' => 'product_to_users',
        'from' => 'product',
        'to' => 'user'
    ) );
}
add_action( 'p2p_init', 'product_to_users' );

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
