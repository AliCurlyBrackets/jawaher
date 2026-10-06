<?php get_header(); ?>

<?php
$blog_featured_image = get_field('blog_featured_image');
$blog_image_alt       = get_field('blog_image_alt');
$blog_reading_time    = get_field('blog_reading_time');
$blog_excerpt_custom  = get_field('blog_excerpt_custom');
$terms                = get_the_terms(get_the_ID(), 'category');
$category             = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
?>

<section class="page-top">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_option('blog_breadcrumb_home', 'الرئيسية')); ?></a> /
            <a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>">المدونة</a> /
            <?php the_title(); ?>
        </div>
        <?php if (get_field('about_page_title')): ?>
            <h1><?php the_field('about_page_title'); ?></h1>
        <?php else: ?>
            <h1><?php the_title(); ?></h1>
        <?php endif; ?>
        <?php if ($blog_excerpt_custom): ?>
            <p><?php echo esc_html($blog_excerpt_custom); ?></p>
        <?php elseif (get_the_excerpt()): ?>
            <p><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container blog-layout">
        <div>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <article class="article">
                    <?php if ($blog_featured_image): ?>
                        <img class="article-cover" src="<?php echo esc_url($blog_featured_image); ?>" alt="<?php echo esc_attr($blog_image_alt ?: get_the_title()); ?>" />
                    <?php elseif (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('large', array('class' => 'article-cover', 'alt' => $blog_image_alt ?: get_the_title())); ?>
                    <?php else: ?>
                        <img class="article-cover" src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                    <?php endif; ?>

                    <?php if ($category): ?>
                        <span class="tag"><?php echo esc_html($category); ?></span>
                    <?php endif; ?>
                    <div class="meta">
                        <?php echo get_the_date('Y-m-d'); ?> ·
                        فريق جواهر الشام ·
                        <?php echo esc_html($blog_reading_time ?: '3'); ?> دقيقة قراءة
                    </div>

                    <?php the_content(); ?>
                </article>
            <?php endwhile; endif; ?>

            <section style="margin-top: 40px">
                <h2>قد يهمك أيضًا</h2>
                <?php
                $related = new WP_Query(array(
                    'post_type'      => 'blog',
                    'posts_per_page' => 2,
                    'post__not_in'   => array(get_the_ID()),
                    'ignore_sticky_posts' => true,
                ));
                ?>
                <?php if ($related->have_posts()): ?>
                    <?php while ($related->have_posts()): $related->the_post(); ?>
                        <?php
                        $rel_image = get_field('blog_featured_image') ?: get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $rel_alt   = get_field('blog_image_alt') ?: get_the_title();
                        ?>
                        <article class="post-card reveal">
                            <a href="<?php the_permalink(); ?>" class="image-wrap">
                                <?php if ($rel_image): ?>
                                    <img src="<?php echo esc_url($rel_image); ?>" alt="<?php echo esc_attr($rel_alt); ?>" loading="lazy" />
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                                <?php endif; ?>
                            </a>
                            <div class="card-copy">
                                <?php
                                $rel_terms = get_the_terms(get_the_ID(), 'category');
                                if ($rel_terms && !is_wp_error($rel_terms)):
                                    echo '<span class="tag">' . esc_html($rel_terms[0]->name) . '</span>';
                                endif;
                                ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="meta"><?php echo get_the_date('Y-m-d'); ?> · <?php echo esc_html(get_field('blog_reading_time') ?: '3'); ?> دقيقة قراءة</div>
                                <p><?php echo esc_html(get_the_excerpt()); ?></p>
                                <a class="read-link" href="<?php the_permalink(); ?>">اقرأ المقال</a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>لا توجد مقالات ذات صلة.</p>
                <?php endif; ?>
            </section>
        </div>
        <aside class="sidebar" aria-label="أحدث المقالات والتصنيفات">
            <?php
            $recent_posts = new WP_Query(array(
                'post_type'      => 'blog',
                'posts_per_page' => 4,
                'post__not_in'   => array(get_the_ID()),
            ));
            ?>
            <div class="side-box">
                <h2>أحدث المقالات</h2>
                <?php if ($recent_posts->have_posts()): ?>
                    <?php while ($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                            <?php $rel_image = get_field('blog_featured_image') ?: get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                            <a class="recent" href="<?php the_permalink(); ?>">
                                <?php if ($rel_image): ?>
                                    <img src="<?php echo esc_url($rel_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy" />
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() . '/assets/logo.png'; ?>" alt="" loading="lazy" />
                                <?php endif; ?>
                                <span><?php the_title(); ?></span>
                            </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <div class="side-box">
                <h2>التصنيفات</h2>
                <div class="categories">
                    <?php
                    $all_cats = get_categories(array('taxonomy' => 'category', 'hide_empty' => false));
                    foreach ($all_cats as $cat):
                        $count = count(get_posts(array(
                            'post_type' => 'blog',
                            'cat'       => $cat->term_id,
                        )));
                        if ($count > 0):
                    ?>
                            <a href="<?php echo esc_url(add_query_arg('category', $cat->name, get_post_type_archive_link('blog'))); ?>">
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

<?php get_footer(); ?>
