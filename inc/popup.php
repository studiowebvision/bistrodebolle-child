<?php


// create elementor pop-up function
function webvision_elementor_popup(){
	// set popup id
	/* $popup_id = get_field("popup_template_elementor_id","option"); */
	$popup_id = "34347";
	// insert the popup to the current page
	ElementorPro\Modules\Popup\Module::add_popup_to_location( $popup_id );
	
	?><script>
		// wait for the page to load and add own trigger
		jQuery( document ).ready( function() {
			// wait for elementor to load
			jQuery( window ).on( 'elementor/frontend/init', function() {
				// wait for elementor pro to load
				elementorFrontend.on( 'components:init', function() {
					// show the popup
					elementorFrontend.documentsManager.documents[<?php echo $popup_id ;?>].showModal();
				} );
			} );
		} );
	</script>;
	<?php
}



// popup melding homepage
function popup() {
	/* Get start date and end date from ACF, convert to timestamp to compare date today */
	$date_start = strtotime( get_field('start_datum', "option") );
	$date_end = strtotime( get_field('eind_datum', "option") );

	/* Get start hour and end hour from ACF */
	$use_time = get_field('use_time', "option");
	$hour_start = strtotime( get_field('start_uur', "option") );
	$hour_end = strtotime( get_field('eind_uur', "option") );


	$dt = new DateTime(); 
	$timezone = new DateTimeZone('Europe/Brussels'); // set timezone to Brussels
	$dt->setTimezone($timezone);
	$date_only = strtotime(date("Ymd", $dt->getTimestamp())); // get timestamp from today to compare with acf fields
	$date_time = strtotime($dt->format('H:i:s')); // use date and time from today

/* 	//for debugging only
	echo "<pre>";
	var_dump( date("d/m/Y", $date_only ) ); // show the date now
	var_dump( date("H:i:s", $date_time ) ); // show the time now
	var_dump( date("d/m/Y", $date_start ), date("d/m/Y", $date_end )); // show the start and end date
	var_dump( date("H:i:s", $hour_start ), date("H:i:s", $hour_end )); // show the start and end date
	echo "</pre>"; 
*/

	/* if date only is used by ACF */
	if( !$use_time && !empty($date_start) && !empty($date_end) && $date_only >= $date_start && $date_end >= $date_only && !($date_end < $date_only) && is_front_page(  )){
		echo webvision_elementor_popup();
	}
	/* if date and time is used by ACF */
	if( $use_time && !empty($date_start) && !empty($date_end) && $date_only >= $date_start && $date_end >= $date_only && !($date_end < $date_only) && is_front_page(  )){
		if( !empty($hour_start) && !empty($hour_end) && $date_time >= $hour_start && $date_time <= $hour_end){
			echo webvision_elementor_popup();
		}	
	}
}
// popup laden in footer
add_action('wp_footer', 'popup');