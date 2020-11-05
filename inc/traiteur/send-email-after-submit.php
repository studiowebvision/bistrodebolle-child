<?php

add_action( 'pafe/form_builder/new_record', function( $record ) {
    foreach ($record as $fields) {
        $message.= "<p>". $fields["label"] .": ";

        if($fields["type"] =="number"){
            $message .= "<br /><b>Aantal stuks:</b> ".$fields["value"] . "x</p>";
        }
        else{
            $message .= $fields["value"]  . "</p>";
        }

        
        if($fields["name"] == "email"){
            $email = $fields["value"];
        }
            
    }
	    $to = $email;
		$subject = 'Traiteur bestelling - Bistro De Bolle';
        $headers = 'From: Bistro De Bolle <info@bistrodebolle.be>' . "\r\n";
        $header_admin = 'From: Bistro De Bolle <info@bistrodebolle.be>' . "\r\n";
        $header_admin .= 'Reply-To: <'.$email.'>';
        wp_mail( $to, $subject, $message, $headers );
        wp_mail( "sander.rebry@telenet.be", $subject, $message, $header_admin );
}, 10, 2);