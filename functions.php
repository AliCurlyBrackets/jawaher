<?php

// Enable featured image support
function add_featured_image_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('post-thumbnails', array('post'));
    set_post_thumbnail_size(1200, 630, true);
}
add_action('after_setup_theme', 'add_featured_image_support');

// Custom upload dir for featured images
function custom_post_thumbnail_dir($content) {
    if (is_singular('post')) {
        $upload_dir = wp_upload_dir();
        $featured_img_id = get_post_thumbnail_id();
        if ($featured_img_id) {
            $custom_dir = $upload_dir['basedir'] . '/article-images';
            if (!file_exists($custom_dir)) {
                mkdir($custom_dir, 0755, true);
            }
            $image_path = get_attached_file($featured_img_id);
            $new_path = $custom_dir . '/' . basename($image_path);
            if (file_exists($image_path) && !file_exists($new_path)) {
                copy($image_path, $new_path);
            }
        }
    }
    return $content;
}
add_filter('the_content', 'custom_post_thumbnail_dir');

// Save article image on post save
function save_article_featured_image($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        $upload_dir = wp_upload_dir();
        $custom_dir = $upload_dir['basedir'] . '/article-images';
        if (!file_exists($custom_dir)) {
            mkdir($custom_dir, 0755, true);
        }
        $image_path = get_attached_file($thumbnail_id);
        $new_path = $custom_dir . '/' . basename($image_path);
        if (file_exists($image_path) && !file_exists($new_path)) {
            copy($image_path, $new_path);
        }
    }
}
add_action('save_post', 'save_article_featured_image');

// Add logo support
function add_theme_logo_support() {
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action('after_setup_theme', 'add_theme_logo_support');

// Register Custom Menus
function register_theme_menus() {
    register_nav_menus(array(
        'main-menu'   => 'Main Menu',
        'mobile-menu' => 'Mobile Menu',
        'footer-menu' => 'Footer Menu',
        'footer-2'    => 'Footer Menu 2',
    ));
}
add_action('after_setup_theme', 'register_theme_menus');

// Ensure blog templates are loaded properly
function blog_template_redirect() {
    if (is_singular('blog')) {
        add_filter('template_include', function($template) {
            if (file_exists(get_template_directory() . '/single-blog.php')) {
                return get_template_directory() . '/single-blog.php';
            }
            return $template;
        });
    }
}
add_action('template_redirect', 'blog_template_redirect');

function blog_archive_redirect() {
    if (is_post_type_archive('blog')) {
        add_filter('template_include', function($template) {
            if (file_exists(get_template_directory() . '/archive-blog.php')) {
                return get_template_directory() . '/archive-blog.php';
            }
            return $template;
        });
    }
}
add_action('template_redirect', 'blog_archive_redirect');

// Ensure product archive templates are loaded properly
function product_tax_template_redirect() {
    if (is_tax('product-category')) {
        add_filter('template_include', function($template) {
            $term = get_queried_object();
            if ($term && $term->taxonomy === 'product-category') {
                if (file_exists(get_template_directory() . '/single-product-category.php')) {
                    return get_template_directory() . '/single-product-category.php';
                }
            }
            return $template;
        });
    }
}
add_action('template_redirect', 'product_tax_template_redirect');

function product_archive_redirect() {
    if (is_post_type_archive('product')) {
        add_filter('template_include', function($template) {
            if (file_exists(get_template_directory() . '/archive-product-category.php')) {
                return get_template_directory() . '/archive-product-category.php';
            }
            return $template;
        });
    }
}
add_action('template_redirect', 'product_archive_redirect');

include("inc/Theme_Style/theme-style.php");

// Include Custom Walker
include("Classes/Custom_Menu_Walker.php");

// Include theme option files
include("inc/about-backend.php");
include("inc/works-backend.php");
include("inc/contactus-backend.php");
include("Functions/Folder-Options/hero-options.php");
include("Functions/Folder-Options/services-options.php");
include("Functions/Folder-Options/world-print-options.php");
include("Functions/Folder-Options/how-start-options.php");
include("Functions/Folder-Options/sale-price-options.php");
include("Functions/Folder-Options/footer-settings.php");
include("Functions/Folder-Options/product-category-options.php");
include("Functions/PostTypes/blog-post-type.php");
include("Functions/PostTypes/product-category.php");

// Debug: verify blog post type is registered
if ( defined('WP_DEBUG') && WP_DEBUG ) {
    error_log('Blog post type registration included');
}
