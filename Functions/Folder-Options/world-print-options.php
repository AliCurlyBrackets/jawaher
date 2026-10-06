<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'World Print Section Options',
        'menu_title'    => 'عالم الطباعة',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'world-print-section-options',
        'position'      => 23,
        'icon_slug'     => 'dashicons-images-alt',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_world_print_section_options',
        'title'    => 'World Print Section Options',
        'fields'   => array(
            array(
                'key'   => 'field_world_print_section_enabled',
                'label' => 'Enable World Print Section',
                'name'  => 'world_print_section_enabled',
                'type'  => 'true_false',
                'default'    => 1,
                'ui'         => 1,
            ),
            array(
                'key'   => 'field_world_print_section_id',
                'label' => 'Section ID',
                'name'  => 'world_print_section_id',
                'type'  => 'text',
                'default_value' => 'portfolio',
            ),
            array(
                'key'   => 'field_world_print_eyebrow',
                'label' => 'Eyebrow Text',
                'name'  => 'world_print_eyebrow',
                'type'  => 'text',
                'default_value' => 'من عالم الطباعة',
            ),
            array(
                'key'   => 'field_world_print_title',
                'label' => 'Title',
                'name'  => 'world_print_title',
                'type'  => 'text',
                'default_value' => 'نماذج تلهم فكرتك',
            ),
            array(
                'key'   => 'field_world_print_description',
                'label' => 'Description',
                'name'  => 'world_print_description',
                'type'  => 'textarea',
                'rows'  => 3,
                'default_value' => 'تصوّرات لتطبيقات الطباعة والدعاية.',
            ),
            array(
                'key'   => 'field_world_print_note',
                'label' => 'Note Text',
                'name'  => 'world_print_note',
                'type'  => 'text',
                'default_value' => 'نماذج تصميمية توضيحية، وليست أعمالًا موثقة لعملاء محددين.',
            ),
            array(
                'key'   => 'field_world_print_portfolio_items',
                'label' => 'Portfolio Items',
                'name'  => 'world_print_portfolio_items',
                'type'  => 'repeater',
                'button_label' => 'Add Portfolio Item',
                'sub_fields' => array(
                    array(
                        'key'   => 'field_wp_item_title',
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key'   => 'field_wp_item_image',
                        'label' => 'Image',
                        'name'  => 'image',
                        'type'  => 'image',
                        'return_format' => 'url',
                        'preview_size'  => 'thumbnail',
                    ),
                    array(
                        'key'   => 'field_wp_item_tile_class',
                        'label' => 'Tile Class (CSS)',
                        'name'  => 'tile_class',
                        'type'  => 'text',
                        'default_value' => 'tile-0',
                        'instructions' => 'e.g., tile-0, tile-1, tile-2, tile-3, tile-4, etc.',
                    ),
                    array(
                        'key'   => 'field_wp_item_aria_label',
                        'label' => 'Sprite Aria Label',
                        'name'  => 'aria_label',
                        'type'  => 'text',
                        'instructions' => 'e.g., كتالوج يحكي تفاصيلك',
                    ),
                    array(
                        'key'   => 'field_wp_item_link',
                        'label' => 'Link URL',
                        'name'  => 'link',
                        'type'  => 'url',
                        'default_value' => 'works.html',
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
                    'value'    => 'world-print-section-options',
                ),
            ),
        ),
    ));
}
