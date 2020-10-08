<?php

/**
 * ACF Pro repeater field shortcode
 *
 * I created this shortcode function because it didn't exist and it was being requested by others
 * I originally posted it here: https://support.advancedcustomfields.com/forums/topic/repeater-field-shortcode/
 *
 * @attr {string} field - (Required) the name of the field that contains a repeater sub group
 * @attr {string} sub_fields - (Required) a comma separated list of sub field names that are part of the field repeater group
 * @attr {string} post_id - (Optional) Specific post ID where your value was entered. Defaults to current post ID (not required). This can also be options / taxonomies / users / etc
 */

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