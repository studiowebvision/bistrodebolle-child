<?php


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


// create shortcode for ACF repeater field

function my_acf_repeater($atts, $content='') {
    extract(shortcode_atts(array(
      "field" => null,
      "sub_fields" => null,
      "post_id" => null
    ), $atts));
  
    if (empty($field) || empty($sub_fields)) {
      // silently fail? is that the best option? idk
      return "";
    }
  
    $sub_fields = explode(",", $sub_fields);
  
    $_finalContent = '';
  
    if( have_rows($field, $post_id) ):
      while ( have_rows($field, $post_id) ) : the_row();
  
        $_tmp = $content;
        foreach ($sub_fields as $sub) {
          $subValue = get_sub_field(trim($sub));
          $_tmp = str_replace("%$sub%", $subValue, $_tmp);
        }
        $_finalContent .= do_shortcode( $_tmp );
  
      endwhile;
    else :
      $_finalContent = "$field does not have any rows";
    endif;
  
    return $_finalContent;
  }
  
  add_shortcode("acf_repeater", "my_acf_repeater");