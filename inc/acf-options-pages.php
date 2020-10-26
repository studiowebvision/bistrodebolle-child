<?php
/*********************
 * Create ACF options
 ********************/

 /* Impressie options */
 
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Impressie',
		'menu_title'	=> 'Impressie galerij',
		'menu_slug' 	=> 'impressie-galerij',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-format-gallery',
		'position' => 3
	));


}

/* Opties options */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Opties',
		'menu_title'	=> 'Opties',
		'menu_slug' 	=> 'opties',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-admin-settings',
		'position' => 4
	));

}

/* Bestellijst options */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Traiteurlijst',
		'menu_title'	=> 'Traiteurlijst',
		'menu_slug' 	=> 'bestellijst',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-list-view',
		'position' => 2
	));

}

/* Popup options */
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Popup',
		'menu_title'	=> 'Popup',
		'menu_slug' 	=> 'popup',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-external',
		'position' => 4
	));

}