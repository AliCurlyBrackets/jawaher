<?php

/**
 * product-post-type.php
 * ضيف السطر ده في functions.php:
 * require_once get_template_directory() . '/product-post-type.php';
 */

if (!defined('ABSPATH')) {
    exit;
}

/* -------------------------------------------------------------------------
 * 1) Post Type: product
 * ---------------------------------------------------------------------- */
function create_product_post_type()
{
    $labels = array(
        'name'                  => 'Products',
        'singular_name'         => 'Product',
        'menu_name'             => 'Product',
        'name_admin_bar'        => 'Product',
        'archives'              => 'Product Archives',
        'attributes'            => 'Product Attributes',
        'parent_item_colon'     => 'Parent Product:',
        'all_items'             => 'All Products',
        'add_new_item'          => 'Add New Product',
        'add_new'               => 'Add New',
        'new_item'              => 'New Product',
        'edit_item'             => 'Edit Product',
        'update_item'           => 'Update Product',
        'view_item'             => 'View Product',
        'view_items'            => 'View Products',
        'search_items'          => 'Search Product',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Product Image',
        'featured_image_admin'  => 'Product Image',
        'no_title'              => 'Untitled',
        'insert_into_item'      => 'Insert into product',
        'uploaded_to_this_item' => 'Upload to this product',
    );

    $args = array(
        'label'              => 'Product',
        'description'        => 'Products for موقع جواهر الشام للطباعة والدعاية',
        'labels'             => $labels,
        'supports'           => array('title', 'thumbnail'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-products',
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'menu_position'      => 20,
        // تم التعديل: كان 'product-category' وبيتعارض مع slug التصنيف
        'has_archive'        => 'products',
        'rewrite'            => array('slug' => 'product', 'with_front' => false),
    );

    register_post_type('product', $args);
}
add_action('init', 'create_product_post_type');

/* -------------------------------------------------------------------------
 * 2) Taxonomy: product-category
 * ---------------------------------------------------------------------- */
function create_product_category_taxonomy()
{
    $labels = array(
        'name'                => 'Product Categories',
        'singular_name'       => 'Product Category',
        'search_items'        => 'Search Product Categories',
        'all_items'           => 'All Product Categories',
        'parent_item'         => 'Parent Product Category',
        'parent_item_colon'   => 'Parent Product Category:',
        'edit_item'           => 'Edit Product Category',
        'update_item'         => 'Update Product Category',
        'add_new_item'        => 'Add New Product Category',
        'new_item_name'       => 'New Product Category Name',
        'menu_name'           => 'Product Category',
        'add_or_remove_items' => 'Add or remove product categories',
        'not_found'           => 'Not found',
        'not_found_in_trash'  => 'Not found in Trash',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'product-category', 'with_front' => false),
    );

    register_taxonomy('product-category', array('product'), $args);
}
add_action('init', 'create_product_category_taxonomy');

/* -------------------------------------------------------------------------
 * 3) صورة التصنيف (Term Meta)
 * ---------------------------------------------------------------------- */

// فورم الإضافة
function add_product_category_image_field()
{
?>
    <div class="form-field">
        <label for="product_category_image"><?php _e('Category Image', 'textdomain'); ?></label>
        <input type="hidden" name="product_category_image" id="product_category_image" value="">
        <button type="button" class="button jc-category-image-upload"><?php _e('Upload Image', 'textdomain'); ?></button>
        <div class="jc-category-image-preview" style="margin-top: 10px;"></div>
    </div>
<?php
}
add_action('product-category_add_form_fields', 'add_product_category_image_field');

// فورم التعديل
function edit_product_category_image_field($term)
{
    $image_id  = get_term_meta($term->term_id, '_product_category_image', true);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
?>
    <tr class="form-field">
        <th scope="row"><label for="product_category_image"><?php _e('Category Image', 'textdomain'); ?></label></th>
        <td>
            <input type="hidden" name="product_category_image" id="product_category_image" value="<?php echo esc_attr($image_id); ?>">
            <button type="button" class="button jc-category-image-upload"><?php _e('Upload Image', 'textdomain'); ?></button>
            <div class="jc-category-image-preview" style="margin-top: 10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width: 150px; height: auto;" alt="">
                <?php endif; ?>
            </div>
        </td>
    </tr>
    <?php
}
add_action('product-category_edit_form_fields', 'edit_product_category_image_field');

function save_product_category_image($term_id)
{
    if (!current_user_can('manage_categories')) {
        return;
    }
    if (isset($_POST['product_category_image'])) {
        update_term_meta($term_id, '_product_category_image', absint($_POST['product_category_image']));
    }
}
add_action('created_product-category', 'save_product_category_image');
add_action('edit_product-category', 'save_product_category_image');

function product_category_admin_scripts($hook)
{
    if (!in_array($hook, array('edit-tags.php', 'term.php'), true)) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->taxonomy !== 'product-category') {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script('jquery');

    $js = <<<'JS'
jQuery(document).ready(function($){
    var frame;

    $(document).on('click', '.jc-category-image-upload', function(e){
        e.preventDefault();
        var $button  = $(this);
        var $input   = $('#product_category_image');
        var $preview = $button.parent().find('.jc-category-image-preview');

        if (!frame) {
            frame = wp.media({
                title: 'Select Category Image',
                button: { text: 'Choose Image' },
                multiple: false
            });
        }

        frame.off('select').on('select', function(){
            var attachment = frame.state().get('selection').first().toJSON();
            $input.val(attachment.id);
            var url = (attachment.sizes && attachment.sizes.medium)
                ? attachment.sizes.medium.url
                : attachment.url;
            $preview.html('<img src="' + url + '" style="max-width:150px;height:auto;" alt="">');
        });

        frame.open();
    });
});
JS;

    wp_add_inline_script('jquery-core', $js);
}
add_action('admin_enqueue_scripts', 'product_category_admin_scripts');

/* -------------------------------------------------------------------------
 * 4) دالة عرض السلايدرز (بتتستخدم في الرئيسية والأرشيف)
 *
 * categories_limit : عدد التصنيفات (0 = الكل)
 * products_limit   : عدد المنتجات في كل تصنيف (-1 = الكل)
 * show_view_all    : إظهار زر "عرض المزيد"
 * ---------------------------------------------------------------------- */
function jc_render_product_sliders($args = array())
{
    $args = wp_parse_args($args, array(
        'categories_limit' => 5,
        'products_limit'   => 5,
        'show_view_all'    => true,
    ));

    $terms = get_terms(array(
        'taxonomy'   => 'product-category',
        'hide_empty' => true,
        'number'     => (int) $args['categories_limit'],
        'orderby'    => 'name',
        'order'      => 'ASC',
    ));

    if (is_wp_error($terms) || empty($terms)) {
        return;
    }

    $archive_url = get_post_type_archive_link('product');

    foreach ($terms as $term) :
        $query = new WP_Query(array(
            'post_type'              => 'product',
            'post_status'            => 'publish',
            'posts_per_page'         => (int) $args['products_limit'],
            'no_found_rows'          => true,
            'update_post_term_cache' => false,
            'tax_query'              => array(
                array(
                    'taxonomy' => 'product-category',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ),
            ),
        ));

        if (!$query->have_posts()) {
            continue;
        }

        // صورة احتياطية من صورة التصنيف لو المنتج مفيهوش صورة
        $cat_image_id = get_term_meta($term->term_id, '_product_category_image', true);
        $fallback_img = $cat_image_id ? wp_get_attachment_image_url($cat_image_id, 'medium_large') : '';
    ?>
        <section class="category-section" id="<?php echo esc_attr($term->slug); ?>" aria-labelledby="title-<?php echo esc_attr($term->slug); ?>">
            <div class="container">
                <div class="category-heading">
                    <div class="category-title">
                        <h2 id="title-<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></h2>
                    </div>
                    <div class="category-actions">
                        <div class="slider-nav">
                            <button class="slider-button slider-prev" type="button" aria-label="المنتجات السابقة">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="m9 5 7 7-7 7" />
                                </svg>
                            </button>
                            <button class="slider-button slider-next" type="button" aria-label="المنتجات التالية">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="m15 5-7 7 7 7" />
                                </svg>
                            </button>
                        </div>
                        <?php if ($args['show_view_all'] && $archive_url) : ?>
                            <a class="view-all" href="<?php echo esc_url($archive_url . '#' . $term->slug); ?>">عرض المزيد</a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="swiper products-slider" dir="rtl">
                    <div class="swiper-wrapper">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                            if (!$img) {
                                $img = $fallback_img;
                            }
                        ?>
                            <div class="swiper-slide">
                                <article class="product-card">
                                    <div class="product-image">
                                        <?php if ($img) : ?>
                                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="512" height="512" loading="lazy">
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-info">
                                        <h3><?php the_title(); ?></h3>
                                        <p>خيارات طباعة حسب احتياجك</p>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="slider-pagination"></div>
            </div>
        </section>
<?php
        wp_reset_postdata();
    endforeach;
}
