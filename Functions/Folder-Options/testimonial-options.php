<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Testimonials Section Options',
        'menu_title'    => 'التقييمات',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'testimonial-section-options',
        'position'      => 26,
        'icon_slug'     => 'dashicons-format-chat',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_testimonial_section_options',
        'title'    => 'Testimonial Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_testimonial_section_enabled',
                'label' => 'Enable Testimonials Section',
                'name'  => 'testimonial_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_testimonial_section_id',
                'label' => 'Section ID',
                'name'  => 'testimonial_section_id',
                'type'  => 'text',
                'default_value' => 'testimonials',
            ),
            array(
                'key'   => 'field_testimonial_eyebrow',
                'label' => 'Eyebrow Text',
                'name'  => 'testimonial_eyebrow',
                'type'  => 'text',
                'default_value' => 'آراء العملاء',
            ),
            array(
                'key'   => 'field_testimonial_title_primary',
                'label' => 'Title - Primary Text',
                'name'  => 'testimonial_title_primary',
                'type'  => 'text',
                'default_value' => 'آراء عملائنا',
            ),
            array(
                'key'   => 'field_testimonial_source_text',
                'label' => 'Source Text',
                'name'  => 'testimonial_source_text',
                'type'  => 'text',
                'default_value' => 'مأخوذة من تقييمات Google',
            ),
            array(
                'key'   => 'field_testimonial_source_url',
                'label' => 'Source URL',
                'name'  => 'testimonial_source_url',
                'type'  => 'url',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_testimonial_items',
                'label' => 'Testimonials',
                'name'  => 'testimonial_items',
                'type'  => 'repeater',
                'button_label' => 'Add Testimonial',
                'sub_fields' => array(
                    array(
                        'key'   => 'field_testimonial_rating',
                        'label' => 'Rating',
                        'name'  => 'rating',
                        'type'  => 'number',
                        'default_value' => 5,
                        'min' => 0,
                        'max' => 5,
                        'step' => 1,
                    ),
                    array(
                        'key'   => 'field_testimonial_quote',
                        'label' => 'Quote',
                        'name'  => 'quote',
                        'type'  => 'textarea',
                        'rows'  => 4,
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_testimonial_name',
                        'label' => 'Client Name',
                        'name'  => 'name',
                        'type'  => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_testimonial_company',
                        'label' => 'Company',
                        'name'  => 'company',
                        'type'  => 'text',
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
                    'value'    => 'testimonial-section-options',
                ),
            ),
        ),
    ));
}
