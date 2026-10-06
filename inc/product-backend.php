<?php

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_product_settings',
        'title'    => 'Product Settings',
        'fields'   => array(
            array(
                'key'   => 'field_product_external_link',
                'label' => 'External Product Link',
                'name'  => 'product_external_link',
                'type'  => 'url',
                'placeholder' => 'https://example.com',
            ),
            array(
                'key'   => 'field_product_price',
                'label' => 'Product Price',
                'name'  => 'product_price',
                'type'  => 'number',
                'placeholder' => '0.00',
            ),
            array(
                'key'   => 'field_product_sku',
                'label' => 'Product SKU',
                'name'  => 'product_sku',
                'type'  => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'product',
                ),
            ),
        ),
    ));
}
