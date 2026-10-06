<?php
get_header();

$term = get_queried_object();

$category_image_id = get_term_meta($term->term_id, '_product_category_image', true);
$category_image_url = $category_image_id ? wp_get_attachment_image_url($category_image_id, 'large') : '';

$products = get_posts(array(
    'post_type'      => 'product',
    'posts_per_page' => 12,
    'tax_query'      => array(
        array(
            'taxonomy' => 'product-category',
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        ),
    ),
));
?>


<main>
    <section class="jc-page-banner">
        <div class="jc-container">
            <nav class="jc-breadcrumb" aria-label="مسار الصفحة">
                <a href="index.html">الرئيسية</a><span aria-hidden="true">/</span>
                <a href="categories.html">التصنيفات</a><span aria-hidden="true">/</span>
                <span data-jc-category-breadcrumb aria-current="page"><?php echo esc_html($term->name); ?></span>
            </nav>
            <h1 data-jc-category-title><?php echo esc_html($term->name); ?></h1>
            <p data-jc-category-description><?php echo esc_html($term->description); ?></p>
        </div>
    </section>


    <section class="jc-section" aria-label="صور المنتجات">
        <div class="jc-container">
            <div class="jc-products-heading" data-jc-products-heading>
                <h2>منتجات <?php echo esc_html($term->name); ?></h2>
                <span data-jc-product-count><?php echo count($products); ?> منتج</span>
            </div>
            <div class="jc-products-grid" data-jc-products>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <?php
                        $product_image_id = get_post_thumbnail_id($product->ID);
                        $product_image_url = $product_image_id ? wp_get_attachment_image_url($product_image_id, 'large') : '';
                        ?>
                        <article class="jc-product-card">
                            <div class="jc-product-image-wrapper">
                                <?php if ($product_image_url): ?>
                                    <button type="button" class="jc-product-image" data-jc-modal-trigger aria-label="تكبير صورة <?php echo esc_attr($product->post_title); ?>">
                                        <img src="<?php echo esc_url($product_image_url); ?>"
                                            alt="<?php echo esc_attr($product->post_title); ?>"
                                            width="512" height="512"
                                            loading="lazy"
                                            data-full-image="<?php echo esc_url($product_image_url); ?>">
                                        <span class="jc-zoom-icon" aria-hidden="true">+</span>
                                    </button>
                                <?php else: ?>
                                    <div class="product-sprite jc-product-placeholder" role="img" aria-label="<?php echo esc_attr($product->post_title); ?>"></div>
                                <?php endif; ?>
                            </div>
                            <div class="jc-product-content">
                                <h3><?php echo esc_html($product->post_title); ?></h3>
                                <p>المقاس والكمية والتشطيب حسب طلبك.</p>
                                <a href="https://wa.me/966532446558?text=<?php echo urlencode('مرحبا جواهر الشام، أريد عرض سعر لـ ' . $product->post_title); ?>"
                                    class="jc-button"
                                    target="_blank"
                                    rel="noopener">اطلب عرض سعر</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="jc-empty" data-jc-empty hidden>
                <p data-jc-empty-message>لم نعثر على هذا التصنيف.</p>
                <a href="categories.html" class="jc-button">عرض جميع التصنيفات</a>
            </div>
        </div>
    </section>
    <dialog class="jc-lightbox" id="jc-lightbox" aria-labelledby="jc-modal-title">
        <div class="jc-lightbox-top">
            <h2 id="jc-modal-title" data-jc-modal-title>صورة المنتج</h2>
            <button class="jc-close" type="button" data-jc-close aria-label="إغلاق الصورة">×</button>
        </div>
        <img data-jc-modal-image alt="">
    </dialog>
</main>

<?php
wp_reset_postdata();
get_footer();
?>