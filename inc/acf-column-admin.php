<?php
/* 
    1. Add ACF Columns
    2. Make ACF columns sortable
*/

// 1. Add ACF Columns
function add_new_reservaties_column( $columns ) {
    $columns['naam'] = 'Naam';
	$columns['aantal_personen'] = 'Aantal personen';
	$columns['datum_reservatie'] = 'Datum reservatie';
	$columns['uur_reservatie'] = 'Uur reservatie';
	$columns['lunch_diner_reservatie'] = 'Lunch / diner';
	$columns['goedkeuren'] = 'Bevestigen';
	$columns['annuleren'] = 'Annuleren';
	$columns['mail_is_verstuurd'] = 'Mail is verstuurd';
	unset($columns['date']);
    return $columns;
}
add_filter('manage_reservaties_posts_columns', 'add_new_reservaties_column');

function add_new_reservaties_admin_column_show_value( $column, $post_id ) {
    if ( $column == 'naam' ) {
		$naam = get_field('naam');
		echo $naam;

	}
	if ( $column == 'datum_reservatie' ) {
		$datum_reservatie = get_field('datum_reservatie');
		echo $datum_reservatie;

	}
	if ( $column == 'uur_reservatie' ) {
		$uur_reservatie = get_field('uur_reservatie');
		echo $uur_reservatie;

	}
	if ( $column == 'lunch_diner_reservatie' ) {
		$lunch_of_diner = get_field('lunch_of_diner');
		echo $lunch_of_diner;

	}
	if ( $column == 'aantal_personen' ) {
		$aantal_personen = get_field('aantal_personen');
		echo $aantal_personen;

	}
	if ( $column == 'mail_is_verstuurd' ) {
		$mail_is_verstuurd = get_field('mail_is_verstuurd');
		if(get_field('mail_is_verstuurd')){
			echo 'Ja';
		}
		else{
			echo 'Nee';
		}

	}

	if ( 'goedkeuren' == $column ) {

	    if(get_field('mail_is_verstuurd')){
           printf( 'Reservatie is bevestigd');
		}
	    else{
			printf( '<a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=accepteer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie bevestigen</a>');
		}

  }
	if ( 'annuleren' == $column ) {

		printf( '<a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=annuleer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie annuleren</a>');

	}

}

add_filter('manage_reservaties_posts_custom_column', 'add_new_reservaties_admin_column_show_value', 10, 2);

// 2. Make the column sortable
function set_custom_reservaties_sortable_columns( $columns ) {
	$columns['naam'] = 'naam';
	return $columns;
}
add_filter( 'manage_edit-reservaties_sortable_columns', 'set_custom_reservaties_sortable_columns' );

function reservaties_custom_orderby( $query ) {
	if ( ! is_admin() )
		return;

	$orderby = $query->get('orderby');

	if ( 'naam' == $orderby ) {
		$query->set( 'meta_key', 'naam' );
		$query->set( 'orderby', 'meta_value' );
	}
}
add_action( 'pre_get_posts', 'reservaties_custom_orderby' );
