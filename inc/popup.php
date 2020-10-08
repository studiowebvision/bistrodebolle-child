<?php

// popup melding homepage
function popup() {
    if(is_front_page()){
	if(ICL_LANGUAGE_CODE=='nl'){
        popupwfb( $Popupwfb_group = "GROUP1", $Popupwfb_id = "1" );
	}
	if(ICL_LANGUAGE_CODE=='fr'){
        popupwfb( $Popupwfb_group = "GROUP1", $Popupwfb_id = "2" );
	}
	if(ICL_LANGUAGE_CODE=='en'){
        popupwfb( $Popupwfb_group = "GROUP1", $Popupwfb_id = "3" );
	}
	}
}
// popup laden
add_action('wp_footer', 'popup');