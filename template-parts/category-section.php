<?php
$product_categories = get_terms(array(
    'taxonomy'   => 'product-category',
    'number'     => 5,
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
));

$has_categories = !empty($product_categories) && !is_wp_error($product_categories);
if (!$has_categories) {
    return;
}

$show_all_label = get_field('product_category_all_label', 'option');
$section_eyebrow = get_field('product_category_eyebrow', 'option');
$section_title   = get_field('product_category_title', 'option');
$section_desc    = get_field('product_category_description', 'option');
?>

<section class="jc-section" aria-labelledby="jc-product-categories-title">
    <div class="jc-container">
        <div class="jc-section-heading">
            <?php if ($section_eyebrow): ?>
                <span class="jc-eyebrow"><?php echo esc_html($section_eyebrow); ?></span>
            <?php else: ?>
                <span class="jc-eyebrow">تصنيفاتنا</span>
            <?php endif; ?>

            <h2 id="jc-product-categories-title">
                <?php echo esc_html($section_title ?: 'كل ما تحتاجه للطباعة، في مكان واحد'); ?>
            </h2>

            <?php if ($section_desc): ?>
                <p><?php echo wp_kses_post($section_desc); ?></p>
            <?php endif; ?>
        </div>

        <div class="jc-categories-grid jc-product-categories">
            <?php foreach ($product_categories as $category): ?>
                <?php
                $category_image_id = get_term_meta($category->term_id, '_product_category_image', true);
                $category_image_url = $category_image_id ? wp_get_attachment_image_url($category_image_id, 'medium') : '';
                $category_link = get_term_link($category);
                ?>
                <article class="jc-category-card">
                    <a href="<?php echo esc_url($category_link); ?>" aria-label="<?php echo esc_attr($category->name); ?>">
                        <?php if ($category_image_url): ?>
                            <div class="jc-category-image">
                                <img src="<?php echo esc_url($category_image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" loading="lazy" />
                            </div>
                        <?php else: ?>
                            <div class="jc-category-icon" role="img" aria-label="<?php echo esc_attr($category->name); ?>"></div>
                        <?php endif; ?>
                        <div class="jc-category-copy">
                            <h3><?php echo esc_html($category->name); ?></h3>
                            <?php if ($category->description): ?>
                                <p><?php echo esc_html($category->description); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="jc-center-action">
            <a class="jc-button" href="<?php echo esc_url(get_post_type_archive_link('product')); ?>">
                <?php echo esc_html($show_all_label ?: 'عرض الكل'); ?>
            </a>
        </div>
    </div>
</section>