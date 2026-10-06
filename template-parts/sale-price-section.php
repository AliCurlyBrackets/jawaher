<?php
$sp_enabled = get_field('sale_price_section_enabled', 'option');
if (!$sp_enabled) {
    return;
}

$sp_id          = get_field('sale_price_section_id', 'option');
$sp_class       = get_field('sale_price_section_class', 'option');
$sp_title_primary   = get_field('sale_price_title_primary', 'option');
$sp_title_secondary = get_field('sale_price_title_secondary', 'option');
$sp_title_primary_en   = get_field('sale_price_title_primary_en', 'option');
$sp_title_secondary_en = get_field('sale_price_title_secondary_en', 'option');
$sp_description = get_field('sale_price_description', 'option');
$sp_description_en = get_field('sale_price_description_en', 'option');
$sp_bg_image   = get_field('sale_price_bg_image', 'option');
$sp_bg_color   = get_field('sale_price_bg_color', 'option');
$sp_btn_text   = get_field('sale_price_button_text', 'option');
$sp_btn_text_en = get_field('sale_price_button_text_en', 'option');
$sp_btn_link   = get_field('sale_price_button_link', 'option');
$sp_btn_target = get_field('sale_price_button_target', 'option');
$sp_btn_icon   = get_field('sale_price_button_icon', 'option');
?>

<section class="cta <?php echo esc_attr($sp_class ?: 'luxury-cta'); ?>" id="<?php echo esc_attr($sp_id ? $sp_id : 'sale-price'); ?>"
    <?php if ($sp_bg_image): ?>
        style="background-image: url('<?php echo esc_url($sp_bg_image); ?>');"
    <?php elseif ($sp_bg_color): ?>
        style="background-color: <?php echo esc_attr($sp_bg_color); ?>;"
    <?php endif; ?>
>
    <div class="container cta-inner">
        <?php if ($sp_title_primary || $sp_title_secondary): ?>
            <div>
                <h2>
                    <?php echo esc_html($sp_title_primary ?: 'جاهز تطبع فكرتك؟'); ?>
                    <?php if ($sp_title_secondary): ?>
                        <em><?php echo esc_html($sp_title_secondary); ?></em>
                    <?php endif; ?>
                    <?php if ($sp_title_primary_en || $sp_title_secondary_en): ?>
                        <span class="title-en" lang="en">
                            <?php echo esc_html($sp_title_primary_en ?: ($sp_title_secondary_en ?: '')); ?>
                        </span>
                    <?php endif; ?>
                </h2>
            </div>
        <?php else: ?>
            <div>
                <h2>جاهز تطبع فكرتك؟</h2>
                <p>دع فريقنا يساعدك في تحويل أفكارك إلى مطبوعات استثنائية.</p>
            </div>
        <?php endif; ?>

        <?php if ($sp_description): ?>
            <p><?php echo esc_html($sp_description); ?></p>
        <?php endif; ?>

        <?php if ($sp_btn_text && $sp_btn_link): ?>
            <a class="btn dark" href="<?php echo esc_url($sp_btn_link); ?>"
               <?php echo $sp_btn_target ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
                <?php if ($sp_btn_icon): ?>
                    <img class="btn-icon" src="<?php echo esc_url($sp_btn_icon); ?>" alt="<?php echo esc_attr($sp_btn_text); ?>" loading="lazy" />
                <?php endif; ?>
                <?php echo esc_html($sp_btn_text); ?>
                <?php if ($sp_btn_text_en): ?>
                    <span class="btn-text-en" lang="en"><?php echo esc_html($sp_btn_text_en); ?></span>
                <?php endif; ?>
            </a>
        <?php else: ?>
            <a class="btn dark" href="contact.html">اطلب عرض سعر</a>
        <?php endif; ?>
    </div>
</section>
