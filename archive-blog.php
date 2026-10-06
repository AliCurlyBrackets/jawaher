<?php get_header(); ?>

<section class="page-top">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">الرئيسية</a> / المدونة
        </div>
        <h1>المدونة</h1>
        <p>
            أفكار ونصائح تساعدك على اختيار الخامة، وتجهيز ملفاتك، وتطوير مطبوعات
            علامتك.
        </p>
    </div>
</section>
<section class="section">
    <div class="container blog-layout">
        <div>
            <label for="blog-search">ابحث في المقالات</label>
            <div class="search">
                <input
                    id="blog-search"
                    type="search"
                    placeholder="عنوان أو موضوع تبحث عنه..." />
            </div>
            <div
                class="filters"
                data-blog-filters
                role="group"
                aria-label="تصنيفات المقالات">
                <?php
                $all_categories = get_categories(array(
                    'taxonomy'     => 'category',
                    'hide_empty'   => false,
                    'orderby'      => 'name',
                    'order'        => 'ASC',
                ));
                ?>
                <button class="filter active" data-category="الكل" aria-pressed="true">الكل</button>
                <?php foreach ($all_categories as $cat): ?>
                    <?php
                    $count = $cat->count;
                    if ($count > 0):
                    ?>
                    <button class="filter" data-category="<?php echo esc_html($cat->name); ?>" aria-pressed="false">
                        <?php echo esc_html($cat->name); ?><b><?php echo $count; ?></b>
                    </button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <p class="meta" data-result-count aria-live="polite"><?php echo wp_count_posts('blog')->publish; ?> مقالات</p>
            <div class="posts" data-posts>
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <?php
                    $custom_image = get_field('blog_featured_image') ?: get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $featured_image = $custom_image ?: get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $image_alt = get_field('blog_image_alt') ?: get_the_title();
                    $alt = $custom_image ? $image_alt : get_the_title();
                    $alt = $custom_image ?: $image_alt;
                    $reading_time = get_field('blog_reading_time');
                    $reading_time = $reading_time ? $reading_time : 3;
                    $excerpt = get_field('blog_excerpt_custom');
                    $excerpt = $excerpt ?: get_the_excerpt();
                    $terms = get_the_terms(get_the_ID(), 'category');
                    $category = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
                    ?>
                    <article class="post-card reveal" data-category="<?php echo esc_attr($category); ?>">
                        <a href="<?php the_permalink(); ?>" class="image-wrap">
                            <?php if ($featured_image): ?>
                                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy" />
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                            <?php endif; ?>
                            <span class="zoom" aria-hidden="true">+</span>
                        </a>
                        <div class="card-copy">
                            <?php if ($category): ?>
                                <span class="tag"><?php echo esc_html($category); ?></span>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="meta"><?php echo get_the_date('Y-m-d'); ?> · <?php echo esc_html($reading_time); ?> دقيقة قراءة</div>
                            <p><?php echo esc_html($excerpt); ?></p>
                            <a class="read-link" href="<?php the_permalink(); ?>">اقرأ المقال</a>
                        </div>
                    </article>
                <?php endwhile; else: ?>
                    <p>لا توجد مقالات حالياً.</p>
                <?php endif; ?>
            </div>
        </div>
        <aside class="sidebar" data-sidebar aria-label="أحدث المقالات والتصنيفات">
            <div class="side-box">
                <h2>أحدث المقالات</h2>
                <?php
                $recent_posts = new WP_Query(array(
                    'post_type'      => 'blog',
                    'posts_per_page' => 4,
                ));
                if ($recent_posts->have_posts()):
                    while ($recent_posts->have_posts()): $recent_posts->the_post();
                        $rel_image = get_field('blog_featured_image') ?: get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        ?>
                        <a class="recent" href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url($rel_image ?: get_template_directory_uri() . '/assets/logo.png'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                            <span><?php the_title(); ?></span>
                        </a>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="side-box">
                <h2>التصنيفات</h2>
                <div class="categories">
                    <?php
                    $categories = get_categories(array(
                        'taxonomy'   => 'category',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $cat):
                        $count = count(get_posts(array(
                            'post_type' => 'blog',
                            'cat'       => $cat->term_id,
                        )));
                        if ($count > 0):
                    ?>
                            <a href="?category=<?php echo urlencode($cat->name); ?>">
                                <?php echo esc_html($cat->name); ?><b><?php echo $count; ?></b>
                            </a>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </aside>
    </div>
</section>
<section class="cta">
    <div class="container cta-inner">
        <div>
            <h2>عندك مشروع مشابه؟</h2>
            <p>خلّنا نطبع فكرتك ونحوّلها إلى واقع مميز.</p>
        </div>
        <a class="btn dark" href="contact.html">اطلب عرض سعر</a>
    </div>
</section>

<script>
// Simple blog filter for the WordPress-rendered posts
document.addEventListener('DOMContentLoaded', function() {
    const filters = document.querySelectorAll('[data-blog-filters] .filter');
    const items = document.querySelectorAll('[data-posts] .post-card');
    const resultCount = document.querySelector('[data-result-count]');
    
    const updateCount = () => {
        const visible = items.length - document.querySelectorAll('[data-posts] .post-card[style*="display: none"]').length;
        if (resultCount) {
            resultCount.textContent = `${items.length} مقالات`;
        }
    };
    
    filters.forEach(filter => {
        filter.addEventListener('click', () => {
            filters.forEach(f => {
                f.classList.remove('active');
                f.setAttribute('aria-pressed', 'false');
            });
            filter.classList.add('active');
            filter.setAttribute('aria-pressed', 'true');
            
            const cat = filter.getAttribute('data-category');
            items.forEach(item => {
                if (cat === 'الكل' || item.getAttribute('data-category') === cat) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>


<?php get_footer(); ?>