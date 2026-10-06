<?php
$wp_enabled = get_field('world_print_section_enabled', 'option');
if (!$wp_enabled) {
    return;
}

$wp_id          = get_field('world_print_section_id', 'option');
$wp_eyebrow     = get_field('world_print_eyebrow', 'option');
$wp_title       = get_field('world_print_title', 'option');
$wp_description = get_field('world_print_description', 'option');
$wp_note        = get_field('world_print_note', 'option');
$wp_items       = get_field('world_print_portfolio_items', 'option');
?>

<section class="section luxury-portfolio" id="<?php echo esc_attr($wp_id ? $wp_id : 'portfolio'); ?>">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow"><?php echo esc_html($wp_eyebrow ?: 'من عالم الطباعة'); ?></span>
            <h2><?php echo esc_html($wp_title ?: 'نماذج تلهم فكرتك'); ?></h2>
            <?php if ($wp_description): ?>
                <p><?php echo esc_html($wp_description); ?></p>
            <?php else: ?>
                <p>تصوّرات لتطبيقات الطباعة والدعاية.</p>
            <?php endif; ?>
            <?php if ($wp_note): ?>
                <small><?php echo esc_html($wp_note); ?></small>
            <?php else: ?>
                <small>نماذج تصميمية توضيحية، وليست أعمالًا موثقة لعملاء محددين.</small>
            <?php endif; ?>
        </div>
        <?php if ($wp_items): ?>
            <div class="portfolio-strip">
                <?php foreach ($wp_items as $item): ?>
                    <?php
                    $item_title     = isset($item['title']) ? $item['title'] : '';
                    $item_image     = isset($item['image']) ? $item['image'] : '';
                    $item_tile      = isset($item['tile_class']) ? $item['tile_class'] : 'tile-0';
                    $item_aria      = isset($item['aria_label']) ? $item['aria_label'] : '';
                    $item_link      = isset($item['link']) ? $item['link'] : 'works.html';
                    ?>
                    <a href="<?php echo esc_url($item_link); ?>" class="portfolio-piece">
                        <?php if ($item_image): ?>
                            <div class="portfolio-image">
                                <img src="<?php echo esc_url($item_image); ?>" alt="<?php echo esc_attr($item_title); ?>" loading="lazy" />
                            </div>
                        <?php else: ?>
                            <div class="product-sprite <?php echo esc_attr($item_tile); ?>" role="img" aria-label="<?php echo esc_attr($item_aria); ?>"></div>
                        <?php endif; ?>
                        <h3><?php echo esc_html($item_title); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="portfolio-strip">
                <a href="works.html" class="portfolio-piece">
                    <div class="product-sprite tile-4" role="img" aria-label="كتالوج يحكي تفاصيلك"></div>
                    <h3>كتالوج يحكي تفاصيلك</h3>
                </a><a href="works.html" class="portfolio-piece">
                    <div class="product-sprite tile-3" role="img" aria-label="تغليف يليق بمنتجك"></div>
                    <h3>تغليف يليق بمنتجك</h3>
                </a><a href="works.html" class="portfolio-piece">
                    <div class="product-sprite tile-0" role="img" aria-label="هوية مطبوعة متكاملة"></div>
                    <h3>هوية مطبوعة متكاملة</h3>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
