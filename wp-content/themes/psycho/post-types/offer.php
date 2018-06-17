<?php

/**
 * Registers the `offer` post type.
 */
function offer_init() {
	register_post_type( 'offer', array(
		'labels'                => array(
			'name'                  => __( 'Offers', 'cl' ),
			'singular_name'         => __( 'Offer', 'cl' ),
			'all_items'             => __( 'All Offers', 'cl' ),
			'archives'              => __( 'Offer Archives', 'cl' ),
			'attributes'            => __( 'Offer Attributes', 'cl' ),
			'insert_into_item'      => __( 'Insert into offer', 'cl' ),
			'uploaded_to_this_item' => __( 'Uploaded to this offer', 'cl' ),
			'featured_image'        => _x( 'Featured Image', 'offer', 'cl' ),
			'set_featured_image'    => _x( 'Set featured image', 'offer', 'cl' ),
			'remove_featured_image' => _x( 'Remove featured image', 'offer', 'cl' ),
			'use_featured_image'    => _x( 'Use as featured image', 'offer', 'cl' ),
			'filter_items_list'     => __( 'Filter offers list', 'cl' ),
			'items_list_navigation' => __( 'Offers list navigation', 'cl' ),
			'items_list'            => __( 'Offers list', 'cl' ),
			'new_item'              => __( 'New Offer', 'cl' ),
			'add_new'               => __( 'Add New', 'cl' ),
			'add_new_item'          => __( 'Add New Offer', 'cl' ),
			'edit_item'             => __( 'Edit Offer', 'cl' ),
			'view_item'             => __( 'View Offer', 'cl' ),
			'view_items'            => __( 'View Offers', 'cl' ),
			'search_items'          => __( 'Search offers', 'cl' ),
			'not_found'             => __( 'No offers found', 'cl' ),
			'not_found_in_trash'    => __( 'No offers found in trash', 'cl' ),
			'parent_item_colon'     => __( 'Parent Offer:', 'cl' ),
			'menu_name'             => __( 'Offers', 'cl' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'offer',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'offer_init' );

/**
 * Sets the post updated messages for the `offer` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `offer` post type.
 */
function offer_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['offer'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Offer updated. <a target="_blank" href="%s">View offer</a>', 'cl' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'cl' ),
		3  => __( 'Custom field deleted.', 'cl' ),
		4  => __( 'Offer updated.', 'cl' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Offer restored to revision from %s', 'cl' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Offer published. <a href="%s">View offer</a>', 'cl' ), esc_url( $permalink ) ),
		7  => __( 'Offer saved.', 'cl' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Offer submitted. <a target="_blank" href="%s">Preview offer</a>', 'cl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Offer scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview offer</a>', 'cl' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Offer draft updated. <a target="_blank" href="%s">Preview offer</a>', 'cl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'offer_updated_messages' );
