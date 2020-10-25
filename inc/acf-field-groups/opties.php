<?php

/**************************
 * ACF FIELD E-MAIL INSTELLINGEN
 **************************/
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5f6a7d91d4419',
	'title' => 'Reservatie e-mail instellingen',
	'fields' => array(
		array(
			'key' => 'field_5f6a7e321330f',
			'label' => 'Reservatie goedgekeurd - tekst',
			'name' => 'reservatie_goedgekeurd',
			'type' => 'textarea',
			'instructions' => 'Je kan hier de e-mail tekst aanpassen.
							Gebruik deze TAGS:
							[NAAM]
							[EMAIL]
							[DATUM_RESERVATIE]
							[UUR_RESERVATIE]
							[AANTAL_PERSONEN]
							[LUNCH_DINER]
							[TELEFOON]
							[BERICHT]',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5f6a86f4b21cb',
			'label' => 'Reservatie goedgekeurd - onderwerp',
			'name' => 'reservatie_goedgekeurd_onderwerp',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f6a7e5313310',
			'label' => 'Reservatie geannuleerd - tekst',
			'name' => 'reservatie_geannuleerd',
			'type' => 'textarea',
			'instructions' => 'Je kan hier de e-mail tekst aanpassen.
							Gebruik deze TAGS:
							[NAAM]
							[EMAIL]
							[DATUM_RESERVATIE]
							[UUR_RESERVATIE]
							[AANTAL_PERSONEN]
							[LUNCH_DINER]
							[TELEFOON]
							[BERICHT]',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5f6a872cb21cc',
			'label' => 'Reservatie geannuleerd- onderwerp',
			'name' => 'reservatie_geannuleerd_onderwerp',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'opties',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5f68e011c0e98',
	'title' => 'Reservatie',
	'fields' => array(
		array(
			'key' => 'field_5f68e03e2571d',
			'label' => 'Datum reservatie',
			'name' => 'datum_reservatie',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 1,
		),
		array(
			'key' => 'field_5f68e01725719',
			'label' => 'Naam',
			'name' => 'naam',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f68e06d2571f',
			'label' => 'Lunch of diner',
			'name' => 'lunch_of_diner',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'choices' => array(
				'Lunch' => 'Lunch',
				'Diner' => 'Diner',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f68e01c2571a',
			'label' => 'E-mail',
			'name' => 'e-mail',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_5f68e0532571e',
			'label' => 'Uur reservatie',
			'name' => 'uur_reservatie',
			'type' => 'time_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'display_format' => 'H:i:s',
			'return_format' => 'H:i:s',
		),
		array(
			'key' => 'field_5f68e0232571b',
			'label' => 'Telefoon',
			'name' => 'telefoon',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f68e07b25720',
			'label' => 'Aantal personen',
			'name' => 'aantal_personen',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f68e02a2571c',
			'label' => 'Bericht / opmerking',
			'name' => 'bericht__opmerking',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5f71944d9e412',
			'label' => 'Mail is verstuurd',
			'name' => 'mail_is_verstuurd',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Ja',
			'ui_off_text' => 'Nee',
			'wpml_cf_preferences' => 0,
		),
		array(
			'key' => 'field_5f88af0fbe834',
			'label' => 'Bevestigd / geannuleerd',
			'name' => 'bevestigd__geannuleerd',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Reservatie is bevestigd',
			'ui_off_text' => 'Reservatie is geannuleerd',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'reservaties',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

/**************************
 * ACF FIELD RESTAURANT GURU AWARD
 **************************/

acf_add_local_field_group(array(
	'key' => 'group_5f76cc4bd8b14',
	'title' => 'Restaurant Guru Award',
	'fields' => array(
		array(
			'key' => 'field_5f76cc57b54d9',
			'label' => 'Widget',
			'name' => 'widget_restaurant_guru',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'wpml_cf_preferences' => 0,
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'opties',
			),
		),
	),
	'menu_order' => 4,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;