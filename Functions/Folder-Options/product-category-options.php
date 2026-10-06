<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'إعدادات تصنيفات المنتجات',
        'menu_title'    => 'Product Categories',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'product-category-options',
        'position'      => 25,
        'icon_slug'     => 'dashicons-products',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_product_category_section_options',
        'title'    => 'Product Category Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_pc_section_enabled',
                'label' => 'Enable Product Category Section',
                'name'  => 'product_category_section_enabled',
                'type'  => 'true_false',
                'default' => 1,
                'ui'    => 1,
            ),
            array(
                'key'   => 'field_pc_section_id',
                'label' => 'Section ID',
                'name'  => 'product_category_section_id',
                'type'  => 'text',
                'placeholder' => 'product-categories',
            ),
            array(
                'key'   => 'field_pc_eyebrow',
                'label' => 'Section Eyebrow',
                'name'  => 'product_category_eyebrow',
                'type'  => 'text',
                'placeholder' => 'تصنيفاتنا',
            ),
            array(
                'key'   => 'field_pc_title',
                'label' => 'Section Title',
                'name'  => 'product_category_title',
                'type'  => 'text',
                'placeholder' => 'كل ما تحتاجه للطباعة، في مكان واحد',
            ),
            array(
                'key'   => 'field_pc_description',
                'label' => 'Section Description',
                'name'  => 'product_category_description',
                'type'  => 'textarea',
                'rows'  => 3,
            ),
            array(
                'key'   => 'field_pc_all_label',
                'label' => 'Show All Button Label',
                'name'  => 'product_category_all_label',
                'type'  => 'text',
                'default' => 'عرض الكل',
            ),
            array(
                'key'   => 'field_pc_count',
                'label' => 'Number of Categories to Show',
                'name'  => 'product_category_count',
                'type'  => 'number',
                'default' => 5,
                'min'  => 1,
            ),
            array(
                'key'   => 'field_pc_whatsapp',
                'label' => 'WhatsApp Number',
                'name'  => 'whatsapp_number',
                'type'  => 'text',
                'placeholder' => '966532446558',
            ),
            array(
                'key'   => 'field_pc_whatsapp_message',
                'label' => 'WhatsApp Message Template',
                'name'  => 'product_whatsapp_message',
                'type'  => 'textarea',
                'placeholder' => 'مرحبا، أريد مزيد من المعلومات',
                'rows'  => 3,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'product-category-options',
                ),
            ),
        ),
    ));
}
