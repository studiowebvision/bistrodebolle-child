<?php
/* 
 versturen van reservatie mail  
*/

// verstuur reservatie goedkeuring
add_action( 'wp_ajax_accepteer_reservatie', 'accepteer_reservatie' );
add_action( 'wp_ajax_annuleer_reservatie', 'accepteer_reservatie' );

function accepteer_reservatie() {
	if ( isset ( $_GET['action'] ) && !empty($_GET['action']) && !empty($_GET['post_id'])){
		$post_id = $_GET['post_id'];
		// get ACF field values from post
		$email = get_field( 'e-mail', $post_id );
		$naam = get_field( 'naam', $post_id );
		$datum_reservatie = get_field( 'datum_reservatie', $post_id );
		$uur_reservatie = get_field( 'uur_reservatie', $post_id );
		$telefoon = get_field( 'telefoon', $post_id );
		$aantal_personen = get_field( 'aantal_personen', $post_id );
		$bericht__opmerking = get_field( 'bericht__opmerking', $post_id );
		$lunch_of_diner = get_field( 'lunch_of_diner', $post_id );


		// if reservatie accept or cancel
		if($_GET['action'] == 'accepteer_reservatie'){
			$tekst_email = get_field('reservatie_goedgekeurd', 'option');
			$subject = get_field('reservatie_goedgekeurd_onderwerp', 'option');
		}
		if($_GET['action'] == 'annuleer_reservatie'){
			$tekst_email = get_field('reservatie_geannuleerd', 'option');
			$subject = get_field('reservatie_geannuleerd_onderwerp', 'option');
		}

		// convert special HTML variables and mapping with ACF field values
		$tekst_email = str_replace('[NAAM]', $naam, $tekst_email);
		$tekst_email = str_replace('[DATUM_RESERVATIE]', $datum_reservatie, $tekst_email);
		$tekst_email = str_replace('[UUR_RESERVATIE]', $uur_reservatie, $tekst_email);
		$tekst_email = str_replace('[TELEFOON]', $telefoon, $tekst_email);
		$tekst_email = str_replace('[AANTAL_PERSONEN]', $aantal_personen, $tekst_email);
		$tekst_email = str_replace('[BERICHT]', $bericht__opmerking, $tekst_email);
		$tekst_email = str_replace('[EMAIL]', $email, $tekst_email);
		$tekst_email = str_replace('[LUNCH_DINER]', $lunch_of_diner, $tekst_email);

		// send e-mail to client if accept

			$headers = "From: Bistro De Bolle <info@bistrodebolle.be>";
			$send_mail = wp_mail($email,$subject,$tekst_email,$headers);

		//if mail is send show message
		if($send_mail)
		{
			$my_current_screen = get_current_screen();
			var_dump( $my_current_screen->base );	
			wp_safe_redirect( wp_get_referer() . '&notice=success');
			update_field('mail_is_verstuurd', 1, $post_id);
		}
		else{
			wp_safe_redirect(admin_url('edit.php?post_type=reservaties&notice=fail'));
			update_field('mail_is_verstuurd', 0, $post_id);
		}


	}

	wp_die(); // this is required to terminate immediately and return a proper response

	exit();
}