<?php

/* 
button reservatie bevestigen of button annuleren in edit reservatie 
*/
function reservatie_mail_versturen( $field ) {
    $button_mail = get_field('mail_is_verstuurd');
    if ($button_mail == FALSE){
		if ($field['key'] == "field_5f71944d9e412"){
      $post_id = $_GET['post'];
		printf( '<p><a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=accepteer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie bevestigen</a> <a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=annuleer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie annuleren</a></p>');
	
		}
    }

}
add_action( 'acf/render_field', 'reservatie_mail_versturen', 10, 1 );