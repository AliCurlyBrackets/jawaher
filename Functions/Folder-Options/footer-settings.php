<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'إعدادات التذييل',
        'capability'    => 'edit_theme_options',
        'menu_slug'     => 'footer-settings',
        'position'      => 26,
        'icon_slug'     => 'dashicons-admin-site',
        'redirect'      => false
    ));
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_footer_settings',
        'title'    => 'Footer Settings',
        'fields'   => array(
            array(
                'key'   => 'field_footer_brand_logo',
                'label' => 'Footer Logo',
                'name'  => 'footer_brand_logo',
                'type'  => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
            ),
            array(
                'key'   => 'field_footer_brand_text',
                'label' => 'Brand Text',
                'name'  => 'footer_brand_text',
                'type'  => 'text',
                'default_value' => 'جواهر الشام',
            ),
            array(
                'key'   => 'field_footer_brand_description',
                'label' => 'Brand Description',
                'name'  => 'footer_brand_description',
                'type'  => 'textarea',
                'rows'  => 3,
                'default_value' => 'حلول الطباعة والدعاية التي تمنح أفكارك حضورًا ملموسًا، من المطبوعات الورقية إلى اللوحات وأعمال الإكريليك.',
            ),
            array(
                'key'   => 'field_footer_contact_phone',
                'label' => 'Contact Phone Number',
                'name'  => 'footer_contact_phone',
                'type'  => 'text',
                'default_value' => '+966 53 244 6558',
            ),
            array(
                'key'   => 'field_footer_contact_phone_link',
                'label' => 'Phone Link URL',
                'name'  => 'footer_contact_phone_link',
                'type'  => 'text',
                'default_value' => 'tel:+966532446558',
                'instructions' => 'e.g., tel:+966532446558',
            ),
            array(
                'key'   => 'field_footer_contact_address',
                'label' => 'Contact Address',
                'name'  => 'footer_contact_address',
                'type'  => 'text',
                'default_value' => 'الرياض — حي المنصورة',
            ),
            array(
                'key'   => 'field_footer_whatsapp_link',
                'label' => 'WhatsApp Link URL',
                'name'  => 'footer_whatsapp_link',
                'type'  => 'url',
                'default_value' => 'https://wa.me/966532446558',
            ),
            array(
                'key'   => 'field_footer_whatsapp_text',
                'label' => 'WhatsApp Button Text',
                'name'  => 'footer_whatsapp_text',
                'type'  => 'text',
                'default_value' => 'تواصل عبر واتساب',
            ),
            array(
                'key'   => 'field_footer_copyright_text',
                'label' => 'Copyright Text',
                'name'  => 'footer_copyright_text',
                'type'  => 'text',
                'default_value' => 'جواهر الشام © 2026 — جميع الحقوق محفوظة',
            ),
            array(
                'key'   => 'field_footer_cta_text',
                'label' => 'Header CTA Button Text',
                'name'  => 'footer_cta_text',
                'type'  => 'text',
                'default_value' => 'اطلب عرض سعر',
            ),
            array(
                'key'   => 'field_footer_cta_link',
                'label' => 'Header CTA Button Link',
                'name'  => 'footer_cta_link',
                'type'  => 'url',
                'default_value' => 'contact.html',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'footer-settings',
                ),
            ),
        ),
    ));
}
