<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'How Start Section Options',
        'menu_title'    => 'كيف نبدأ؟',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'how-start-section-options',
        'position'      => 24,
        'icon_slug'     => 'dashicons-marker',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_how_start_section_options',
        'title'    => 'How Start Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_how_start_section_enabled',
                'label' => 'Enable How Start Section',
                'name'  => 'how_start_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_how_start_section_id',
                'label' => 'Section ID',
                'name'  => 'how_start_section_id',
                'type'  => 'text',
                'default_value' => 'how-start',
            ),
            array(
                'key'   => 'field_how_start_eyebrow',
                'label' => 'Eyebrow Text',
                'name'  => 'how_start_eyebrow',
                'type'  => 'text',
                'default_value' => 'كيف نبدأ؟',
            ),
            array(
                'key'   => 'field_how_start_title_primary',
                'label' => 'Title - Primary Text',
                'name'  => 'how_start_title_primary',
                'type'  => 'text',
                'default_value' => 'من فكرتك إلى واقع ملموس',
            ),
            array(
                'key'   => 'field_how_start_title_secondary',
                'label' => 'Title - Secondary Text',
                'name'  => 'how_start_title_secondary',
                'type'  => 'text',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_how_start_title_primary_en',
                'label' => 'Title - Primary Text (English)',
                'name'  => 'how_start_title_primary_en',
                'type'  => 'text',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_how_start_title_secondary_en',
                'label' => 'Title - Secondary Text (English)',
                'name'  => 'how_start_title_secondary_en',
                'type'  => 'text',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_how_start_description',
                'label' => 'Description',
                'name'  => 'how_start_description',
                'type'  => 'textarea',
                'rows'  => 3,
                'default_value' => 'عملية بسيطة وواضحة لنصل معك إلى النتيجة المناسبة.',
            ),
            array(
                'key'   => 'field_how_start_description_en',
                'label' => 'Description (English)',
                'name'  => 'how_start_description_en',
                'type'  => 'textarea',
                'rows'  => 3,
                'default_value' => '',
            ),
            array(
                'key'   => 'field_how_start_steps',
                'label' => 'Steps',
                'name'  => 'how_start_steps',
                'type'  => 'repeater',
                'button_label' => 'Add Step',
                'sub_fields' => array(
                    array(
                        'key'   => 'field_step_number',
                        'label' => 'Step Number',
                        'name'  => 'step_number',
                        'type'  => 'text',
                        'default_value' => '01',
                        'instructions' => 'e.g., 01, 02, 03, 04',
                    ),
                    array(
                        'key'   => 'field_step_icon',
                        'label' => 'Step Icon Image',
                        'name'  => 'step_icon',
                        'type'  => 'image',
                        'return_format' => 'url',
                        'preview_size'  => 'thumbnail',
                        'instructions' => 'Upload an SVG icon image for this step.',
                    ),
                    array(
                        'key'   => 'field_step_title',
                        'label' => 'Step Title',
                        'name'  => 'step_title',
                        'type'  => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_step_title_en',
                        'label' => 'Step Title (English)',
                        'name'  => 'step_title_en',
                        'type'  => 'text',
                    ),
                    array(
                        'key'   => 'field_step_description',
                        'label' => 'Step Description',
                        'name'  => 'step_description',
                        'type'  => 'textarea',
                        'rows'  => 3,
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_step_description_en',
                        'label' => 'Step Description (English)',
                        'name'  => 'step_description_en',
                        'type'  => 'textarea',
                        'rows'  => 3,
                    ),
                ),
                'min' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'how-start-section-options',
                ),
            ),
        ),
    ));
}
