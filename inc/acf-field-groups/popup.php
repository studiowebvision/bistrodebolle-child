<?php

/****************************
 * ACF FIELDS POPUP
 ***************************/ 
 
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f8c3bb578434',
        'title' => 'Popup',
        'fields' => array(
            array(
                'key' => 'field_5f8c3bbe00c2b',
                'label' => 'Start datum',
                'name' => 'start_datum',
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
                'key' => 'field_5f8c3bdf00c2c',
                'label' => 'Eind datum',
                'name' => 'eind_datum',
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
                'key' => 'field_5f8c45000a16d',
                'label' => 'Start en eind tijd gebruiken',
                'name' => 'use_time',
                'type' => 'true_false',
                'instructions' => 'Vink deze optie aan, indien de pop-up tussen een specifiek tijdstip moet weergegeven worden.
    Bijvoorbeeld:	
    Start uur: 12:00
    Eind uur: 18:00',
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
                'ui_on_text' => 'Inschakelen',
                'ui_off_text' => 'Uitschakelen',
            ),
            array(
                'key' => 'field_5f8c466abc7c5',
                'label' => 'Start uur',
                'name' => 'start_uur',
                'type' => 'time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f8c45000a16d',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
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
                'key' => 'field_5f8c468ebc7c7',
                'label' => 'Eind uur',
                'name' => 'eind_uur',
                'type' => 'time_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_5f8c45000a16d',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
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
                'key' => 'field_5f8c3be800c2d',
                'label' => 'Bericht',
                'name' => 'bericht',
                'type' => 'wysiwyg',
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
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'popup',
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
    
    endif;

/****************************
 * ACF FIELDS POPUP ELEMENTOR TEMPLATE ID (ADMIN ONLY)
 ***************************/ 
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f9573593c859',
        'title' => 'Popup Elementor',
        'fields' => array(
            array(
                'key' => 'field_5f95737010d84',
                'label' => 'Popup template elementor ID',
                'name' => 'popup_template_elementor_id',
                'type' => 'number',
                'instructions' => 'Geef hier de elementor template ID in',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
                'wpml_cf_preferences' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'popup',
                ),
                array(
                    'param' => 'current_user_role',
                    'operator' => '==',
                    'value' => 'administrator',
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
    
    endif;