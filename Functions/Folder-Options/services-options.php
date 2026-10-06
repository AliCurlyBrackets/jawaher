<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'الخدمات',
        'menu_title'    => 'Services',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'services-section-options',
        'position'      => 22,
        'icon_slug'     => 'dashicons-admin-networking',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_services_section_options',
        'title'    => 'Services Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_services_section_enabled',
                'label' => 'Enable Services Section',
                'name'  => 'services_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_services_section_id',
                'label' => 'Section ID',
                'name'  => 'services_section_id',
                'type'  => 'text',
                'default_value' => 'services',
            ),
            array(
                'key'   => 'field_services_eyebrow',
                'label' => 'Eyebrow Text',
                'name'  => 'services_eyebrow',
                'type'  => 'text',
                'default_value' => 'خدماتنا المتخصصة',
            ),
            array(
                'key'   => 'field_services_title_primary',
                'label' => 'Title - Primary Text',
                'name'  => 'services_title_primary',
                'type'  => 'text',
                'default_value' => 'تفاصيل صغيرة،',
            ),
            array(
                'key'   => 'field_services_title_secondary',
                'label' => 'Title - Secondary Text',
                'name'  => 'services_title_secondary',
                'type'  => 'text',
                'default_value' => 'تصنع فرقًا كبيرًا',
            ),
            array(
                'key'   => 'field_services_description',
                'label' => 'Description',
                'name'  => 'services_description',
                'type'  => 'textarea',
                'rows'  => 4,
                'default_value' => 'مجموعة متكاملة من حلول الطباعة والإعلان لتلبية جميع احتياجات أعمالك.',
            ),
            array(
                'key'   => 'field_services_items',
                'label' => 'Service Items',
                'name'  => 'services_items',
                'type'  => 'repeater',
                'button_label' => 'Add Service Item',
                'sub_fields' => array(
                    array(
                        'key'   => 'field_service_item_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_service_item_image',
                        'label' => 'Image',
                        'name'  => 'image',
                        'type'  => 'image',
                        'return_format' => 'url',
                        'preview_size'  => 'thumbnail',
                    ),
                    array(
                        'key'   => 'field_service_item_description',
                        'label' => 'Description',
                        'name'  => 'description',
                        'type'  => 'textarea',
                        'rows'  => 3,
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_service_item_tile_class',
                        'label' => 'Tile Class (CSS)',
                        'name'  => 'tile_class',
                        'type'  => 'text',
                        'default_value' => 'tile-0',
                        'instructions' => 'e.g., tile-0, tile-1, tile-2, etc.',
                    ),
                    array(
                        'key'   => 'field_service_item_link',
                        'label' => 'Link URL',
                        'name'  => 'link',
                        'type'  => 'url',
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_service_item_aria_label',
                        'label' => 'Link Aria Label',
                        'name'  => 'aria_label',
                        'type'  => 'text',
                        'instructions' => 'e.g., اطلب بزنس كارد',
                    ),
                    array(
                        'key'   => 'field_service_item_sprite_label',
                        'label' => 'Sprite Aria Label',
                        'name'  => 'sprite_label',
                        'type'  => 'text',
                        'instructions' => 'e.g., نموذج بزنس كارد',
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
                    'value'    => 'services-section-options',
                ),
            ),
        ),
    ));
}
