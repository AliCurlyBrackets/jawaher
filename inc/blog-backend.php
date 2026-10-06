<?php

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key'      => 'group_blog_post_settings',
        'title'    => 'Blog Post Settings',
        'fields'   => array(
            array(
                'key'   => 'field_blog_featured_image',
                'label' => 'Custom Featured Image',
                'name'  => 'blog_featured_image',
                'type'  => 'image',
                'return_format' => 'url',
                'preview_size'  => 'medium',
                'instructions' => 'Custom image for blog card display (optional - uses featured image if not set).',
            ),
            array(
                'key'   => 'field_blog_image_alt',
                'label' => 'Featured Image Alt Text',
                'name'  => 'blog_image_alt',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_blog_reading_time',
                'label' => 'Reading Time (minutes)',
                'name'  => 'blog_reading_time',
                'type'  => 'number',
                'default' => 3,
                'min'  => 1,
            ),
            array(
                'key'   => 'field_blog_excerpt_custom',
                'label' => 'Custom Excerpt',
                'name'  => 'blog_excerpt_custom',
                'type'  => 'textarea',
                'rows'  => 3,
                'instructions' => 'Optional custom excerpt for archive display.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'blog',
                ),
            ),
        ),
    ));
}

