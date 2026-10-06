<?php
$hs_enabled = get_field('how_start_section_enabled', 'option');
if (!$hs_enabled) {
    return;
}

$hs_id             = get_field('how_start_section_id', 'option');
$hs_eyebrow        = get_field('how_start_eyebrow', 'option');
$hs_title_primary  = get_field('how_start_title_primary', 'option');
$hs_title_secondary = get_field('how_start_title_secondary', 'option');
$hs_title_primary_en  = get_field('how_start_title_primary_en', 'option');
$hs_title_secondary_en = get_field('how_start_title_secondary_en', 'option');
$hs_description    = get_field('how_start_description', 'option');
$hs_description_en = get_field('how_start_description_en', 'option');
$hs_steps          = get_field('how_start_steps', 'option');
?>

<section class="section luxury-steps" id="<?php echo esc_attr($hs_id ? $hs_id : 'how-start'); ?>">
    <div class="container center">
        <?php if ($hs_eyebrow): ?>
            <span class="eyebrow"><?php echo esc_html($hs_eyebrow); ?></span>
        <?php else: ?>
            <span class="eyebrow">كيف نبدأ؟</span>
        <?php endif; ?>

        <h2>
            <?php echo esc_html($hs_title_primary ?: 'من فكرتك إلى واقع ملموس'); ?>
            <?php if ($hs_title_secondary): ?>
                <em><?php echo esc_html($hs_title_secondary); ?></em>
            <?php endif; ?>
            <?php if ($hs_title_primary_en || $hs_title_secondary_en): ?>
                <span class="title-en" lang="en">
                    <?php echo esc_html($hs_title_primary_en ?: ($hs_title_secondary_en ?: '')); ?>
                </span>
            <?php endif; ?>
        </h2>

        <?php if ($hs_description): ?>
            <p class="muted"><?php echo esc_html($hs_description); ?></p>
        <?php else: ?>
            <p class="muted">عملية بسيطة وواضحة لنصل معك إلى النتيجة المناسبة.</p>
        <?php endif; ?>

        <?php if ($hs_steps): ?>
            <div class="steps">
                <?php foreach ($hs_steps as $step): ?>
                    <?php
                    $step_number      = isset($step['step_number']) ? $step['step_number'] : '';
                    $step_icon        = isset($step['step_icon']) ? $step['step_icon'] : '';
                    $step_title       = isset($step['step_title']) ? $step['step_title'] : '';
                    $step_title_en    = isset($step['step_title_en']) ? $step['step_title_en'] : '';
                    $step_desc        = isset($step['step_description']) ? $step['step_description'] : '';
                    $step_desc_en     = isset($step['step_description_en']) ? $step['step_description_en'] : '';
                    ?>
                    <div class="step">
                        <?php if ($step_icon): ?>
                            <div class="step-icon" aria-hidden="true">
                                <img src="<?php echo esc_url($step_icon); ?>" alt="<?php echo esc_attr($step_title); ?>" loading="lazy" />
                            </div>
                        <?php endif; ?>
                        <?php if ($step_number): ?>
                            <span><?php echo esc_html($step_number); ?></span>
                        <?php endif; ?>
                        <h3>
                            <?php echo esc_html($step_title); ?>
                            <?php if ($step_title_en): ?>
                                <span lang="en"><?php echo esc_html($step_title_en); ?></span>
                            <?php endif; ?>
                        </h3>
                        <?php if ($step_desc): ?>
                            <p><?php echo esc_html($step_desc); ?></p>
                        <?php endif; ?>
                        <?php if ($step_desc_en): ?>
                            <p class="desc-en" lang="en"><?php echo esc_html($step_desc_en); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="steps">
                <div class="step">
                    <div class="step-icon" aria-hidden="true">
                        <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M19 21c8 0 14-5 14-12S27 0 19 0 5 3 5 9c0 3 1 5 3 7l-2 7 8-3Z" transform="translate(0 7)" />
                            <path d="M13 16h1m5 0h1m5 0h1" />
                        </svg>
                    </div>
                    <span>01</span>
                    <h3>شاركنا فكرتك</h3>
                    <p>أخبرنا عن مشروعك واحتياجاتك ومواصفاتك الأساسية.</p>
                </div>
                <div class="step">
                    <div class="step-icon" aria-hidden="true">
                        <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M11 4h14l6 6v26H11Z M25 4v8h6 M16 19h10 M16 25h10 M16 31h7" />
                        </svg>
                    </div>
                    <span>02</span>
                    <h3>حدّد المواصفات</h3>
                    <p>نراجع المقاسات والخامات والكميات والتشطيب.</p>
                </div>
                <div class="step">
                    <div class="step-icon" aria-hidden="true">
                        <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M27 6l7 7-18 18-8 2 2-8Z M23 10l7 7 M7 9H3v29h29v-5" />
                        </svg>
                    </div>
                    <span>03</span>
                    <h3>اعتمد التصميم</h3>
                    <p>نراجع الملف معك قبل اعتماد التنفيذ.</p>
                </div>
                <div class="step">
                    <div class="step-icon" aria-hidden="true">
                        <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M16 4h8l1 5 5 3 5-1 4 7-4 4v5l3 4-5 6-5-2-5 2-2 4h-7l-2-5-5-2-4 2-4-7 3-4v-5l-3-4 5-6 5 1 4-3Z"
                                transform="translate(2 0) scale(.85)" />
                            <circle cx="20" cy="20" r="6" />
                        </svg>
                    </div>
                    <span>04</span>
                    <h3>نبدأ التنفيذ</h3>
                    <p>ننفّذ وفق التفاصيل والموعد المتفق عليهما.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
