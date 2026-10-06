<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'الواجهة الرئيسية',
        'menu_title'    => 'الواجهه الرئيسية',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'hero-section-options',
        'position'      => 21,
        'icon_slug'     => 'dashicons-images-alt2',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_hero_section_options',
        'title'    => 'Hero Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_hero_section_enabled',
                'label' => 'Enable Hero Section',
                'name'  => 'hero_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_hero_background_image',
                'label' => 'Background Image',
                'name'  => 'hero_background_image',
                'type'  => 'image',
                'return_format' => 'url',
                'preview_size'  => 'full',
            ),
            array(
                'key'   => 'field_hero_background_color',
                'label' => 'Background Color (fallback)',
                'name'  => 'hero_background_color',
                'type'  => 'color',
                'default_value' => '#000000',
            ),
            array(
                'key'   => 'field_hero_title_primary',
                'label' => 'Title - Primary Text',
                'name'  => 'hero_title_primary',
                'type'  => 'text',
                'default_value' => 'نطبع أفكارك،',
            ),
            array(
                'key'   => 'field_hero_title_secondary',
                'label' => 'Title - Secondary Text',
                'name'  => 'hero_title_secondary',
                'type'  => 'text',
                'default_value' => 'ونصنع حضورك.',
            ),
            array(
                'key'   => 'field_hero_subtitle',
                'label' => 'Subtitle',
                'name'  => 'hero_subtitle',
                'type'  => 'text',
                'default_value' => 'حلول متكاملة للطباعة والدعاية',
            ),
            array(
                'key'   => 'field_hero_detail',
                'label' => 'Detail/Description',
                'name'  => 'hero_detail',
                'type'  => 'textarea',
                'rows'  => 4,
                'default_value' => 'من التصاميم المميزة إلى المطبوعات الاحترافية<br />نحوّل أفكارك إلى واقع يعبر عن هوية علامتك التجارية',
            ),
            array(
                'key'   => 'field_hero_button_text',
                'label' => 'Button Text',
                'name'  => 'hero_button_text',
                'type'  => 'text',
                'default_value' => 'اطلب عرض سعر',
            ),
            array(
                'key'   => 'field_hero_button_link',
                'label' => 'Button Link',
                'name'  => 'hero_button_link',
                'type'  => 'url',
                'default_value' => 'contact.html',
            ),
            array(
                'key'   => 'field_hero_button_target',
                'label' => 'Open Button Link in New Tab',
                'name'  => 'hero_button_target',
                'type'  => 'true_false',
                'ui'    => 1,
            ),
            array(
                'key'   => 'field_hero_alt_text',
                'label' => 'Background Image Alt Text',
                'name'  => 'hero_alt_text',
                'type'  => 'text',
                'default_value' => 'مطبوعات وعلب وأكياس فاخرة بالأسود والذهبي',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'hero-section-options',
                ),
            ),
        ),
    ));
}
