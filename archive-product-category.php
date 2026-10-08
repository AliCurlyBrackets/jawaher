<?php

/**
 * archive-product.php
 * صفحة أرشيف المنتجات (HTML كامل) بدون get_header / get_footer
 * - كل التصنيفات
 * - 10 منتجات في كل سلايدر (غيّر الرقم أو خليه -1 لعرض الكل)
 */

/* ---------------- الباك اند ---------------- */
$products_limit = -1; // عدد المنتجات في كل تصنيف

$terms = get_terms(array(
    'taxonomy'   => 'product-category',
    'hide_empty' => true,
    'orderby'    => 'name',
    'order'      => 'ASC',
));

// رقم الواتساب (بصيغة دولية بدون + أو أصفار)
$whatsapp_number = '966532446558';

$archive_url = get_post_type_archive_link('product');
$assets      = get_template_directory_uri() . '/assets';
get_header();
?>

<section class="page-intro">
    <div class="container">
        <span class="eyebrow">جواهر الشام للطباعة والدعاية</span>
        <h1>التصنيفات </h1>
        <p>حلول طباعة متنوعة، وتفاصيل تليق بهوية علامتك.</p>
    </div>
</section>

<?php if (!is_wp_error($terms) && !empty($terms)) : ?>
    <?php foreach ($terms as $term) : ?>
        <?php
        $products = new WP_Query(array(
            'post_type'              => 'product',
            'post_status'            => 'publish',
            'posts_per_page'         => $products_limit,
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

        if (!$products->have_posts()) {
            continue;
        }

        // صورة التصنيف كبديل لو المنتج مفيهوش صورة
        $cat_image_id = get_term_meta($term->term_id, '_product_category_image', true);
        $fallback_img = $cat_image_id ? wp_get_attachment_image_url($cat_image_id, 'medium_large') : '';
        ?>

        <!-- بداية تصنيف: <?php echo esc_html($term->name); ?> -->
        <section class="category-section" id="<?php echo esc_attr($term->slug); ?>" aria-labelledby="title-<?php echo esc_attr($term->slug); ?>">
            <div class="container">
                <div class="category-heading">
                    <!-- اسم التصنيف يمين الصف. -->
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
                    </div>
                </div>
                <div class="swiper products-slider" dir="rtl">
                    <div class="swiper-wrapper">
                        <?php
                        while ($products->have_posts()) :
                            $products->the_post();
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
                                    <div class="product-actions">
                                        <?php
                                        $wa_text = 'السلام عليكم، أرغب في طلب عرض سعر للمنتج: ' . get_the_title() . "\n" . get_permalink();
                                        $wa_link = 'https://wa.me/' . $whatsapp_number . '?text=' . rawurlencode($wa_text);
                                        ?>
                                        <a class="quote-btn" href="<?php echo esc_url($wa_link); ?>" target="_blank" rel="noopener noreferrer">طلب عرض سعر</a>
                                    </div>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="slider-pagination"></div>
            </div>
        </section>

        <?php wp_reset_postdata(); ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php get_header(); ?>