<?php

function create_blog_post_type() {
    $labels = array(
        'name'                  => 'Blogs',
        'singular_name'         => 'Blog',
        'menu_name'             => 'Blog',
        'name_admin_bar'        => 'Blog',
        'archives'              => 'Blog Archives',
        'attributes'            => 'Blog Attributes',
        'parent_item_colon'     => 'Parent Blog:',
        'all_items'             => 'All Blogs',
        'add_new_item'          => 'Add New Blog',
        'add_new'               => 'Add New',
        'new_item'              => 'New Blog',
        'edit_item'             => 'Edit Blog',
        'update_item'           => 'Update Blog',
        'view_item'             => 'View Blog',
        'view_items'            => 'View Blogs',
        'search_items'          => 'Search Blog',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'featured_image_admin'  => 'Featured Image',
        'no_title'               => 'Untitled',
        'insert_into_item'      => 'Insert into blog',
        'uploaded_to_this_item' => 'Upload to this blog',
    );

    $args = array(
        'label'                 => 'Blog',
        'description'           => 'Blog posts for موقع جواهر الشام للطباعة والدعاية',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'revisions'),
        'public'                => true,
        'publicly_queryable'     => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'menu_icon'             => 'dashicons-media-document',
        'capability_type'       => 'post',
        'hierarchical'          => false,
        'menu_position'         => 15,
        'has_archive'           => 'blog',
        'rewrite'               => array('slug' => 'blog', 'with_front' => false),
    );

    register_post_type('blog', $args);

    // Associate categories with blog post type
    register_taxonomy_for_object_type('category', 'blog');
}
add_action('init', 'create_blog_post_type');
