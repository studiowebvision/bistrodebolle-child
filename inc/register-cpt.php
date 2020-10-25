<?php


// register CPT reservaties
function cptui_register_my_cpts_reservaties() {

	/**
	 * Post Type: Reservaties.
	 */

	$labels = [
		"name" => __( "Reservaties", "bistro-de-bolle" ),
		"singular_name" => __( "Reservatie", "bistro-de-bolle" ),
		"menu_name" => __( "Reservaties", "bistro-de-bolle" ),
		"all_items" => __( "Reservaties", "bistro-de-bolle" ),
		"add_new" => __( "Nieuwe reservatie", "bistro-de-bolle" ),
		"add_new_item" => __( "Nieuwe reservatie", "bistro-de-bolle" ),
		"edit_item" => __( "Bewerk reservatie", "bistro-de-bolle" ),
	];

	$args = [
		"label" => __( "Reservaties", "bistro-de-bolle" ),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "reservaties", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 2,
		"menu_icon" => "dashicons-food",
		"supports" => false,
	];

	register_post_type( "reservaties", $args );
}

add_action( 'init', 'cptui_register_my_cpts_reservaties' );

// end register CPT reservaties