<?php
/**
 * Bistro De Bolle Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bistro De Bolle
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_BISTRO_DE_BOLLE_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'bistro-de-bolle-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_BISTRO_DE_BOLLE_VERSION, 'all' );
	wp_enqueue_script( 'custom-jquery', get_stylesheet_directory_uri() . '/custom-jquery.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'css-datepicker','https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.1', 'all' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

require_once __DIR__ "inc/acf-options.php";

require_once __DIR__ "inc/acf-shortcode.php";


remove_action( 'wpcf7_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts' );
add_action( 'wpcf7_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts_custom' );

function wpcf7_recaptcha_enqueue_scripts_custom() {
    $hl = 'nl';
    if (ICL_LANGUAGE_CODE == 'fr') $hl = 'fr-FR';
    if (ICL_LANGUAGE_CODE == 'en') $hl = 'en-EN';

    $url = 'https://www.google.com/recaptcha/api.js';
    $url = add_query_arg( array(
        'hl' => $hl,
        'onload' => 'recaptchaCallback',
        'render' => 'explicit' ), $url );

    wp_register_script( 'google-recaptcha', $url, array(), '2.0', true );
}
function remove_post_custom_fields() {
	remove_meta_box( 'accura_fmwp1-field accura_fmwp1-text-wrapper' ,'item_span_content' , 'side' );
}
add_action( 'admin_menu' , 'remove_post_custom_fields' );

add_action( 'wp_dashboard_setup', 'register_my_dashboard_widget' );
function register_my_dashboard_widget() {
	wp_add_dashboard_widget(
		'my_dashboard_widget',
		'Handige links',
		'my_dashboard_widget_display'
	);
	wp_add_dashboard_widget(
		'Tripadvisor',
		'Tripadvisor',
		'widget'
	);
	wp_add_dashboard_widget(
		'Website statistieken rapport',
		'Website statistieken rapport',
		'my_dashboard_widget_ga_display'
	);


}

function my_dashboard_widget_display() {
    echo '<ul class="quick-admin-dashboard-links-list">
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="edit.php?post_type=menukaart">Menu kaart</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="admin.php?page=impressie-galerij">Fotogalerij - Impressie</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="admin.php?page=opties">Beoordelingen</a>
	</li>
<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="options-general.php?page=popup-with-fancybox&ac=edit&did=1">Popup melding</a>
	</li>
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="post.php?post=30969&action=edit&lang=nl">Slapen en uitgaan in Zwevegem</a>
	</li>
	</ul>';
}


function my_dashboard_widget_ga_display() {
    echo '<ul class="quick-admin-dashboard-links-list">
	<li class="quick-admin-dashboard-link-item">
	<div class="dashicons dashicons-arrow-right"></div>
	<a class="quick-admin-dashboard-link-tag" href="https://datastudio.google.com/open/0BwtzJCht3RsOVnl2MFhacXhaVDQ">Website statistieken</a>
	</li>
	</ul>';
}

function widget() {
    echo '<div id="TA_certificateOfExcellence355" class="TA_certificateOfExcellence">
<ul id="Mc9EtPT" class="TA_links OPSp8HL">
 	<li id="LrgHEJ86c5k" class="pRVbeZXA8"><a href="https://www.tripadvisor.nl/Restaurant_Review-g801351-d3396841-Reviews-Bistro_De_Bolle-Zwevegem_West_Flanders_Province.html" target="_blank" rel="noopener"><img id="CDSWIDCOELOGO" class="widCOEImg" src="https://www.tripadvisor.nl/img/cdsi/img2/awards/CoE2016_WidgetAsset-14348-2.png" alt="TripAdvisor" /></a></li>
</ul>
</div>
<script src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&uniq=355&locationId=3396841&lang=nl&year=2016&display_version=2"></script>';
}


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
div#TB_window {
    margin-top: 0px!important;
}
  </style>';
}
add_filter( 'caldera_forms_phone_js_options', function( $options){
	//Use ISO_3166-1_alpha-2 formatted country code
	$options[ 'initialCountry' ] = 'BE';
	return $options;
});
add_filter( 'caldera_forms_field_attributes', function( $attrs, $field, $form ){
	if( 'date_picker' === Caldera_Forms_Field_Util::get_type( $field, $form ) ){
		$attrs[ 'data-date-days-of-week-disabled' ] = '1,2';
	}
	return $attrs;
}, 20, 3 );
add_filter( 'cf_translate_get_current_language', function( $lang ){
    return apply_filters( 'wpml_current_language', NULL );
});
function wpse_enqueue_datepicker() {
    // Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );

    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    //wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );

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


// voorgerechten bestelformulier
function bestellijst_voorgerechten_func(){
	if( have_rows('voorgerechten', 'option') ):
$bestellijst = array();
		while( have_rows('voorgerechten', 'option') ): the_row();
  $bestellijst[]= get_sub_field('voorgerecht_item');

 $input_field .='<div class="elementor-element elementor-element-f7bbaf2 elementor-widget elementor-widget-pafe-form-builder-field" data-id="f7bbaf2" data-element_type="widget"
 data-widget_type="pafe-form-builder-field.default"><div class="elementor-widget-container"><div class="elementor-form-fields-wrapper elementor-labels-above">
 <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-bestellen elementor-col-100" data-pafe-form-builder-spiner="">
 <div class="titel-gerecht"><label for="form-field-order" class="elementor-field-label">'.get_sub_field('voorgerecht_item').'</div></label>
 <div class="nice-number"><input class="elementor-field elementor-size-  elementor-field-textual"
 type="number" name="form_fields['.get_sub_field('voorgerecht_item').']" id="form-field-bestelling" autocomplete="on" placeholder="0" value="" data-pafe-form-builder-value="0"
 data-pafe-form-builder-form-id="bestellen" step="any" min="0"></div></div></div></div></div>';

   endwhile;
   $new_list = implode("\n", $bestellijst);
   return $input_field;
  // return $new_list;

	endif;
}
add_shortcode( 'bestellijst_voorgerechten_form', 'bestellijst_voorgerechten_func' );

function bestellijst_voorgerechten_form_func(){
	if( have_rows('voorgerechten', 'option') ):
$bestellijst = array();
		while( have_rows('voorgerechten', 'option') ): the_row();
  $bestellijst[]= "<div style='height:54px;padding: 12px 0px;font-size: 18px;font-weight: 600;'>".get_sub_field('voorgerecht_item')."</div>";

   endwhile;
   $new_list = implode("\n", $bestellijst);
   return $new_list;

	endif;
}
add_shortcode( 'bestellijst_voorgerechten', 'bestellijst_voorgerechten_form_func' );

// hoofdgerechten bestelformulier
function bestellijst_hoofdgerechten_func(){
	if( have_rows('hoofdgerechten', 'option') ):
$bestellijst = array();
		while( have_rows('hoofdgerechten', 'option') ): the_row();
  $bestellijst[]= get_sub_field('hoofdgerecht_item');

 $input_field .='<div class="elementor-element elementor-element-f7bbaf2 elementor-widget elementor-widget-pafe-form-builder-field" data-id="f7bbaf2" data-element_type="widget"
 data-widget_type="pafe-form-builder-field.default"><div class="elementor-widget-container"><div class="elementor-form-fields-wrapper elementor-labels-above">
 <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-bestellen elementor-col-100" data-pafe-form-builder-spiner="">
 <div class="titel-gerecht"><label for="form-field-order" class="elementor-field-label">'.get_sub_field('hoofdgerecht_item').'</div></label>
 <div class="nice-number"><input class="elementor-field elementor-size-  elementor-field-textual"
 type="number" name="form_fields['.get_sub_field('hoofdgerecht_item').']" id="form-field-bestelling" autocomplete="on" placeholder="0" value="" data-pafe-form-builder-value="0"
 data-pafe-form-builder-form-id="bestellen" step="any" min="0"></div></div></div></div></div>';

   endwhile;
   $new_list = implode("\n", $bestellijst);
   return $input_field;
  // return $new_list;

	endif;
}
add_shortcode( 'bestellijst_hoofdgerechten_form', 'bestellijst_hoofdgerechten_func' );

function bestellijst_hoofdgerechten_form_func(){
	if( have_rows('hoofdgerechten', 'option') ):
$bestellijst = array();
		while( have_rows('hoofdgerechten', 'option') ): the_row();
  $bestellijst[]= "<div style='height:54px;padding: 12px 0px;font-size: 18px;font-weight: 600;'>".get_sub_field('hoofdgerecht_item')."</div>";

   endwhile;
   $new_list = implode("\n", $bestellijst);
   return $new_list;

	endif;
}
add_shortcode( 'bestellijst_hoofdgerechten', 'bestellijst_hoofdgerechten_form_func' );


function jj_filter_private_pages_from_menu ($items, $args) {
    foreach ($items as $ix => $obj) {
        if (!is_user_logged_in () && 'private' == get_post_status ($obj->object_id)) {
            unset ($items[$ix]);
        }
    }
    return $items;
}
add_filter ('wp_nav_menu_objects', 'jj_filter_private_pages_from_menu', 10, 2);

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


// Add ACF Columns
function add_new_reservaties_column($columns) {
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
    if ($column == 'naam') {
		$naam = get_field('naam');
		echo $naam;

	}
	if ($column == 'datum_reservatie') {
		$datum_reservatie = get_field('datum_reservatie');
		echo $datum_reservatie;

	}
	if ($column == 'uur_reservatie') {
		$uur_reservatie = get_field('uur_reservatie');
		echo $uur_reservatie;

	}
	if ($column == 'lunch_diner_reservatie') {
		$lunch_of_diner = get_field('lunch_of_diner');
		echo $lunch_of_diner;

	}
	if ($column == 'aantal_personen') {
		$aantal_personen = get_field('aantal_personen');
		echo $aantal_personen;

	}
	if ($column == 'mail_is_verstuurd') {
		$mail_is_verstuurd = get_field('mail_is_verstuurd');
		if(get_field('mail_is_verstuurd'))
		{
			echo 'Ja';
		}
		else
		{
			echo 'Nee';
		}

	}

	if ('goedkeuren' == $column) {

					if(get_field('mail_is_verstuurd')){
           printf( 'Reservatie is bevestigd');
				 }
				 else{
					 printf( '<a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=accepteer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie bevestigen</a>');
				}

  }
	if ('annuleren' == $column) {

           printf( '<a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=annuleer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie annuleren</a>');

            }

}
function action_function_name( $field ) {
    $button_mail = get_field('mail_is_verstuurd');
    if ($button_mail == FALSE){
		if ($field['key'] == "field_5f71944d9e412"){
	
		printf( '<p><a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=accepteer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie bevestigen</a> <a class="button" href="'.wp_nonce_url(admin_url( 'admin-ajax.php?action=annuleer_reservatie&post_id='.$post_id ),'reservatie').'">Reservatie annuleren</a></p>');
	
		}
    }

}
add_action( 'acf/render_field', 'action_function_name', 10, 1 );

add_filter('manage_reservaties_posts_custom_column', 'add_new_reservaties_admin_column_show_value', 10, 2);

/* Make the column sortable */
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

			wp_redirect(admin_url('edit.php?post_type=reservaties&notice=success'));
			update_field('mail_is_verstuurd', 1, $post_id);
		}
		else{
			wp_redirect(admin_url('edit.php?post_type=reservaties&notice=fail'));
			update_field('mail_is_verstuurd', 0, $post_id);
		}


	}

	wp_die(); // this is required to terminate immediately and return a proper response

	exit();
}


add_action('admin_notices', 'webvision_admin_notice');

function webvision_admin_notice()
{
    //global $pagenow;
	$screen = get_current_screen();

    // Only show this message on the admin dashboard and if asked for
    if ('edit-reservaties' == $screen->id && $_GET['notice'] == 'success')
    {
		echo '<div class="notice notice-success is-dismissible">
        <p>Mail is verstuurd naar de klant!</p>
		</div>';

    }
	 if ('edit-reservaties' == $screen->id && $_GET['notice'] == 'fail')
    {
		echo '<div class="notice notice-error is-dismissible">
        <p>Fout: mail is niet verstuurd naar de klant!</p>
		</div>';

    }
}

// create shortcode for Restaurant Guru Widget (acf field from options)

add_shortcode( "shortcode_restaurant_guru", "restaurant_guru" );
function restaurant_guru(){
	$html_widget_acf = get_field("widget_restaurant_guru","option");
	return $html_widget_acf;
}

// create shortcode for TripAdvisor Widget (acf field from options)

add_shortcode( "shortcode_tripadvisor_widget", "tripadvisor_widget" );
function tripadvisor_widget(){
	$html_widget_acf = get_field("widget","option");
	return $html_widget_acf;
}

/*
if ( !empty( $pagerating = get_field('rating') ) ) {
    $rating  = explode( "/", $pagerating );
    $score   = $rating[0];
    $reviews = $rating[1];
    $product = get_the_title();
    $ratingoutput = '<script type="application/ld+json">{"@context": "http://schema.org","@type": "Product","name": "' . $product . '","aggregateRating": {"@type": "AggregateRating","ratingValue": "' . $score . '","reviewCount": "'. $reviews . '"}}</script>';
    echo $ratingoutput;
  }
*/
  /**
 * Collect data to output in JSON-LD.
 *
 * @param array  $unsigned An array of data to output in json-ld.
 * @param JsonLD $unsigned JsonLD instance.
 */
/*
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
	$data['Organization'] = [
		'@context' => 'https://schema.org/',
		'@type' => 'AggregateRating',
		'itemReviewed',
	];
	$data['itemReviewed'] = [
		'@type' => 'Restaurant',
	];

	
	return $data;
}, 99, 2);
*/