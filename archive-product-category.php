<?php
get_header();

$all_categories = get_terms(array(
    'taxonomy'   => 'product-category',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
));
?>

<section class="jc-page-banner">
    <div class="jc-container">
        <nav class="jc-breadcrumb" aria-label="مسار الصفحة">
            <a href="<?php echo esc_url(home_url()); ?>">الرئيسية</a><span aria-hidden="true">/</span>
            <span aria-current="page">جميع التصنيفات</span>
        </nav>
        <h1>جميع التصنيفات</h1>
        <p>حلول الطباعة والدعاية لعلامتك، من أول بطاقة إلى أكبر حضور.</p>
    </div>
</section>

<section class="jc-section" aria-label="تصنيفات الطباعة">
    <div class="jc-container">
        <?php if (!empty($all_categories) && !is_wp_error($all_categories)): ?>
            <div class="jc-categories-grid">
                <?php foreach ($all_categories as $category): ?>
                    <?php
                    $category_image_id = get_term_meta($category->term_id, '_product_category_image', true);
                    $category_image_url = $category_image_id ? wp_get_attachment_image_url($category_image_id, 'medium') : '';
                    ?>
                    <article class="jc-category-card">
                        <a href="<?php echo esc_url(get_term_link($category)); ?>" aria-label="<?php echo esc_attr($category->name); ?>">
                            <?php if ($category_image_url): ?>
                                <div class="jc-category-image">
                                    <img src="<?php echo esc_url($category_image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" loading="lazy" />
                                </div>
                            <?php endif; ?>
                            <div class="jc-category-copy">
                                <h3><?php echo esc_html($category->name); ?></h3>
                                <?php if ($category->description): ?>
                                    <p><?php echo esc_html(wp_trim_words($category->description, 20)); ?></p>
                                <?php endif; ?>
                                <span class="jc-category-count"><?php echo intval($category->count); ?> منتجات</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="jc-empty">
                <p>لم يتم العثور على تصنيفات.</p>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>