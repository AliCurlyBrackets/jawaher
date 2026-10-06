<?php
$hero_enabled = get_field('hero_section_enabled', 'option');
if (!$hero_enabled) {
    return;
}

$hero_bg_image           = get_field('hero_background_image', 'option');
$hero_bg_color           = get_field('hero_background_color', 'option');
$hero_title_primary   = get_field('hero_title_primary', 'option');
$hero_title_secondary = get_field('hero_title_secondary', 'option');
$hero_subtitle           = get_field('hero_subtitle', 'option');
$hero_detail             = get_field('hero_detail', 'option');
$hero_btn_text           = get_field('hero_button_text', 'option');
$hero_btn_link           = get_field('hero_button_link', 'option');
$hero_btn_new            = get_field('hero_button_target', 'option');
$hero_alt                = get_field('hero_alt_text', 'option');
?>

<section class="hero luxury-hero" style="--hero-bg-color: <?php echo esc_attr($hero_bg_color); ?>">
    <?php if ($hero_bg_image): ?>
        <img class="hero-bg" src="<?php echo esc_url($hero_bg_image); ?>" alt="<?php echo esc_attr($hero_alt); ?>" fetchpriority="high" />
    <?php elseif ($hero_bg_color): ?>
        <div class="hero-bg" style="background-color: <?php echo esc_attr($hero_bg_color); ?>;"></div>
    <?php else: ?>
        <img class="hero-bg" src="assets/hero.png" alt="مطبوعات وعلب وأكياس فاخرة بالأسود والذهبي" fetchpriority="high" />
    <?php endif; ?>
    <div class="container">
        <div class="hero-content">
            <h1>
                <?php echo esc_html($hero_title_primary ?: 'نطبع أفكارك،'); ?>
                <br />
                <em><?php echo esc_html($hero_title_secondary ?: 'ونصنع حضورك.'); ?></em>
            </h1>
            <?php if ($hero_subtitle): ?>
                <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>
            <div class="gold-line"></div>
            <?php if ($hero_detail): ?>
                <p class="hero-detail">
                    <?php echo wp_kses_post($hero_detail); ?>
                </p>
            <?php endif; ?>
            <?php if ($hero_btn_text && $hero_btn_link): ?>
                <a class="btn" href="<?php echo esc_url($hero_btn_link); ?>" <?php echo $hero_btn_new ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
                    <?php echo esc_html($hero_btn_text); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
