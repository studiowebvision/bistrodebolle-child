<?php


// create elementor pop-up function
function webvision_elementor_popup(){
	// set popup id
	$popup_id = get_field("popup_template_elementor_id","option");

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
	/* Get start date and end date from ACF */
	$date_start = get_field('start_datum', "option");
	$date_end = get_field('eind_datum', "option");

	/* Get start hour and end hour from ACF */
	$use_time = get_field('use_time', "option");
	$hour_start = get_field('start_uur', "option");
	$hour_end = get_field('eind_uur', "option");

	/* Get date from timezone Brussels */
	$tz = 'Europe/Brussels';
	$timestamp = time();
	$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
	$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
	$date_only = $dt->format('d/m/Y'); // use only date from today
	$date_time = $dt->format('H:i:s'); // use date and time from today

	/* if date only is used by ACF */
	if( !$use_time && !empty($date_start) && !empty($date_end) && $date_only >= $date_start && $date_only <= $date_end && is_front_page(  )){
		echo webvision_elementor_popup();
	}
	/* if date and time is used by ACF */
	if( $use_time && !empty($date_start) && !empty($date_end) && !empty($hour_start) && !empty($hour_end) && $date_only >= $date_start && $date_only <= $date_end && $date_time >= $hour_start && $date_time <= $hour_end && is_front_page(  )){
		echo webvision_elementor_popup();
	}
	
}
// popup laden in footer
add_action('wp_footer', 'popup');