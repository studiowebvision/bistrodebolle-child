<?php
/* options page acf */
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
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Bestellijst',
		'menu_title'	=> 'Bestellijst',
		'menu_slug' 	=> 'bestellijst',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url' => 'dashicons-list-view',
		'position' => 2
	));

}