<?php


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

/* create shortcode for frontend */
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



/* 
Traiteur bestellingen hoofdgerechten aantallen met + en - icoontjes
om in het bestelformulier het aantal geselecteerde hoofdgerechten mee te sturen
*/
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

/* Traiteur bestelling toon hoofdgerechten */
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

/* Traiteur bestellingen afhaal datums, return in array met shortcode */
function bestellijst_afhaal_datum(){
	if( have_rows('datum_traiteur_bestellingen', 'option') ):
    $afhaal_datum = array("0" => "Kies een datum");
		  while( have_rows('datum_traiteur_bestellingen', 'option') ): the_row();
        $afhaal_datum[]= get_sub_field('datum');

      endwhile;
   $return_datum = implode("\n", $afhaal_datum);
   return $return_datum;

	endif;
}
add_shortcode( 'bestellijst_afhaal_datum', 'bestellijst_afhaal_datum' );

/* Traiteur bestellingen afhaal uren, return in array met shortcode */
function bestellijst_afhaal_uur(){
  $afhaal_uur = "Kies een tijdstip";
  return $afhaal_uur;

}
add_shortcode( 'bestellijst_afhaal_uur', 'bestellijst_afhaal_uur' );

add_action( 'wp_ajax_nopriv_get_datum', 'get_datum' );
add_action( 'wp_ajax_get_datum', 'get_datum' );

function get_datum() {
  check_ajax_referer('security', 'security');
  if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) { 
    $datum = $_POST['datum'];

    if( have_rows('datum_traiteur_bestellingen', 'option') ):
      $afhaal_uur = array("0" => "<option>Kies een tijdstip</option>");
        while( have_rows('datum_traiteur_bestellingen', 'option') ): the_row();
          if( get_sub_field('datum') == $datum):

            $interval = get_sub_field('interval_tijdstip');
            $totalSecs   = intval($interval) * 60; 
            $start_uur = get_sub_field('uur_afhalen_vanaf');
            $eind_uur = get_sub_field('uur_afhalen_tot');

            for( $i=strtotime($start_uur); $i<=strtotime($eind_uur); $i+=$totalSecs) {
              $afhaal_uur[] = "<option>".date('H:i', $i)."</option>";
                  
              }
        
          endif;
        endwhile;
     $return_uur = implode("\n", $afhaal_uur);
     echo $return_uur;
  
    endif;

  }
  die();
}
