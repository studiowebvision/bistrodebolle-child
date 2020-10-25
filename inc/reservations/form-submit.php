<?php
/*************************
 * Front-end submitted form > fill in fields in CPT reservaties
 *************************/

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
