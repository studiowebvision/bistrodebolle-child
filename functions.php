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

	// Load the datepicker script (pre-registered in WordPress).
		
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_style( 'jquery-ui' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/* load ACF options page */
require_once __DIR__ . "/inc/acf-options.php";

/* load ACF columns admin */
require_once __DIR__ . "/inc/acf-column-admin.php";

/* load shortcodes */
require_once __DIR__ . "/inc/shortcodes.php";

/* load custom dashboard widgets */
require_once __DIR__ . "/inc/dashboard-widgets.php";

/* load popup melding frontend */
require_once __DIR__ . "/inc/popup.php";

/* load traiteurlijst bestellingen */
require_once __DIR__ . "/inc/traiteur-bestellingen.php";

/* load reservatie mail function */
require_once __DIR__ . "/inc/reservatie-mail.php";

/* load admin notices */
require_once __DIR__ . "/inc/admin-notices.php";

/* load individual post reservatie */
require_once __DIR__ . "/inc/edit-posts-reservatie.php";

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
div#TB_window {
    margin-top: 0px!important;
}
  </style>';
}


add_filter( 'cf_translate_get_current_language', function( $lang ){
    return apply_filters( 'wpml_current_language', NULL );
});

function jj_filter_private_pages_from_menu ($items, $args) {
    foreach ($items as $ix => $obj) {
        if (!is_user_logged_in () && 'private' == get_post_status ($obj->object_id)) {
            unset ($items[$ix]);
        }
    }
    return $items;
}
add_filter ('wp_nav_menu_objects', 'jj_filter_private_pages_from_menu', 10, 2);
