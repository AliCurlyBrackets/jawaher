<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Sale Price Section Options',
        'menu_title'    => 'عرض سعر',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'sale-price-section-options',
        'position'      => 25,
        'icon_slug'     => 'dashicons-money',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_sale_price_section_options',
        'title'    => 'Sale Price Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_sale_price_section_enabled',
                'label' => 'Enable Sale Price Section',
                'name'  => 'sale_price_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_sale_price_section_id',
                'label' => 'Section ID',
                'name'  => 'sale_price_section_id',
                'type'  => 'text',
                'default_value' => 'sale-price',
            ),
            array(
                'key'   => 'field_sale_price_section_class',
                'label' => 'Section CSS Class',
                'name'  => 'sale_price_section_class',
                'type'  => 'text',
                'default_value' => 'cta luxury-cta',
            ),
            array(
                'key'   => 'field_sale_price_title_primary',
                'label' => 'Title - Primary Text',
                'name'  => 'sale_price_title_primary',
                'type'  => 'text',
                'default_value' => 'جاهز تطبع فكرتك؟',
            ),
            array(
                'key'   => 'field_sale_price_title_secondary',
                'label' => 'Title - Secondary Text',
                'name'  => 'sale_price_title_secondary',
                'type'  => 'text',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_sale_price_description',
                'label' => 'Description',
                'name'  => 'sale_price_description',
                'type'  => 'textarea',
                'rows'  => 3,
                'default_value' => 'دع فريقنا يساعدك في تحويل أفكارك إلى مطبوعات استثنائية.',
            ),
            array(
                'key'   => 'field_sale_price_bg_image',
                'label' => 'Background Image',
                'name'  => 'sale_price_bg_image',
                'type'  => 'image',
                'return_format' => 'url',
                'preview_size'  => 'full',
                'instructions' => 'Upload a background image for the CTA section.',
            ),
            array(
                'key'   => 'field_sale_price_bg_color',
                'label' => 'Background Color (fallback)',
                'name'  => 'sale_price_bg_color',
                'type'  => 'color',
                'default_value' => '#040B36',
            ),
            array(
                'key'   => 'field_sale_price_button_text',
                'label' => 'Button Text',
                'name'  => 'sale_price_button_text',
                'type'  => 'text',
                'default_value' => 'اطلب عرض سعر',
            ),
            array(
                'key'   => 'field_sale_price_button_text_en',
                'label' => 'Button Text (English)',
                'name'  => 'sale_price_button_text_en',
                'type'  => 'text',
                'default_value' => '',
            ),
            array(
                'key'   => 'field_sale_price_button_link',
                'label' => 'Button Link URL',
                'name'  => 'sale_price_button_link',
                'type'  => 'url',
                'default_value' => 'contact.html',
            ),
            array(
                'key'   => 'field_sale_price_button_target',
                'label' => 'Open Button Link in New Tab',
                'name'  => 'sale_price_button_target',
                'type'  => 'true_false',
                'ui'    => 1,
                'default' => 0,
            ),
            array(
                'key'   => 'field_sale_price_button_icon',
                'label' => 'Button Icon Image',
                'name'  => 'sale_price_button_icon',
                'type'  => 'image',
                'return_format' => 'url',
                'preview_size'  => 'thumbnail',
                'instructions' => 'Optional: Upload an icon image to display inside the button.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'sale-price-section-options',
                ),
            ),
        ),
    ));
}
