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


// Elementor form submit > create CPT reservatie
add_action( 'elementor_pro/forms/new_record', function( $record, $handler ) {
    //make sure its our form
    $form_name = $record->get_form_settings( 'form_name' );

    // Replace MY_FORM_NAME with the name you gave your form
    if ( 'Reservatie' !== $form_name ) {
        return;
    }
	  $fields = $record->get( 'fields' );

	$my_post = array(
    'post_title' => $fields['naam']['value'],
    'post_content' => '',
    'post_status' => 'publish',
    'post_type' => 'reservaties',
	);
	$the_post_id = wp_insert_post( $my_post );
	// acf fields in CTP reservatie
	update_field('datum_reservatie', $fields['datum']['value'], $the_post_id);
	update_field('lunch_of_diner', $fields['lunch']['value'], $the_post_id);
	update_field('uur_reservatie', $fields['uur']['value'], $the_post_id);
	update_field('aantal_personen', $fields['personen']['value'], $the_post_id);
	update_field('naam', $fields['naam']['value'], $the_post_id);
	update_field('e-mail', $fields['email_reservatie']['value'], $the_post_id);
	update_field('telefoon', $fields['telefoon']['value'], $the_post_id);
	update_field('bericht__opmerking', $fields['bericht']['value'], $the_post_id);

}, 10, 2 );
