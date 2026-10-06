<?php get_header(); ?>

<?php
$about_home_text         = get_field('about_breadcrumb_home');
$about_home_link         = get_field('about_breadcrumb_home_link');
$about_breadcrumb_current = get_field('about_breadcrumb_current');
$about_page_title        = get_field('about_page_title');
$about_subtitle          = get_field('about_subtitle');
$about_eyebrow           = get_field('about_eyebrow');
$about_heading_primary   = get_field('about_heading_primary');
$about_heading_secondary = get_field('about_heading_secondary');
$about_desc_1            = get_field('about_description_1');
$about_desc_2            = get_field('about_description_2');
$about_features          = get_field('about_features');
$about_cta_text          = get_field('about_cta_button_text');
$about_cta_link          = get_field('about_cta_button_link');
$about_image             = get_field('about_image');
$about_image_alt         = get_field('about_image_alt');
$about_eyebrow_values    = get_field('about_eyebrow_values');
$about_values_title      = get_field('about_values_title');
$about_values            = get_field('about_values');
$about_services_title    = get_field('about_services_section_title');
$about_services          = get_field('about_services');
$about_final_title       = get_field('about_final_cta_title');
$about_final_desc        = get_field('about_final_cta_description');
$about_final_cta_text    = get_field('about_final_cta_button_text');
$about_final_cta_link    = get_field('about_final_cta_button_link');
/* template name: About Us */
?>

<section class="page-top">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url($about_home_link ?: home_url('/')); ?>"><?php echo esc_html($about_home_text ?: 'الرئيسية'); ?></a> / <?php echo esc_html($about_breadcrumb_current ?: 'من نحن'); ?>
        </div>
        <h1><?php echo esc_html($about_page_title ?: 'من نحن'); ?></h1>
        <?php if ($about_subtitle): ?>
            <p><?php echo esc_html($about_subtitle); ?></p>
        <?php else: ?>
            <p>نؤمن أن كل فكرة تستحق تنفيذًا يليق بها.</p>
        <?php endif; ?>
    </div>
</section>
<section class="section">
    <div class="container split">
        <div>
            <span class="eyebrow"><?php echo esc_html($about_eyebrow ?: 'جواهر الشام'); ?></span>
            <h2>
                <?php echo esc_html($about_heading_primary ?: 'نمنح أفكارك'); ?>
                <br />
                <em><?php echo esc_html($about_heading_secondary ?: 'حضورًا ملموسًا'); ?></em>
            </h2>
            <?php if ($about_desc_1): ?>
                <p><?php echo esc_html($about_desc_1); ?></p>
            <?php else: ?>
                <p>
                    في جواهر الشام نقدم حلول الطباعة والدعاية، من بطاقات الأعمال
                    والبروشورات والكتالوجات إلى اللوحات والبنرات وأعمال الإكريليك.
                </p>
            <?php endif; ?>
            <?php if ($about_desc_2): ?>
                <p class="muted"><?php echo esc_html($about_desc_2); ?></p>
            <?php endif; ?>
            <?php if ($about_features): ?>
                <ul class="check-list">
                    <?php foreach ($about_features as $feature): ?>
                        <li><?php echo esc_html(isset($feature['feature_title']) ? $feature['feature_title'] : ''); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <ul class="check-list">
                    <li>خيارات متعددة للمطبوعات والدعاية</li>
                    <li>مراجعة التفاصيل قبل اعتماد التنفيذ</li>
                    <li>تواصل مباشر لفهم متطلبات مشروعك</li>
                </ul>
            <?php endif; ?>
            <?php if ($about_cta_text && $about_cta_link): ?>
                <a class="btn" href="<?php echo esc_url($about_cta_link); ?>"><?php echo esc_html($about_cta_text); ?></a>
            <?php else: ?>
                <a class="btn" href="works.html">استعرض نماذجنا</a>
            <?php endif; ?>
        </div>
        <?php if ($about_image): ?>
            <img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($about_image_alt ?: 'مجموعة منتجات الطباعة'); ?>" loading="lazy" />
        <?php else: ?>
            <img src="assets/hero.png" alt="مجموعة منتجات الطباعة" loading="lazy" />
        <?php endif; ?>
    </div>
</section>
<section class="section" style="background: white">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow"><?php echo esc_html($about_eyebrow_values ?: 'ما نهتم به'); ?></span>
            <h2><?php echo esc_html($about_values_title ?: 'تفاصيل صغيرة، تصنع الفرق'); ?></h2>
        </div>
        <?php if ($about_values): ?>
            <div class="values">
                <?php foreach ($about_values as $value): ?>
                    <div class="value">
                        <b><?php echo esc_html(isset($value['value_number']) ? $value['value_number'] : ''); ?></b>
                        <h3><?php echo esc_html(isset($value['value_title']) ? $value['value_title'] : ''); ?></h3>
                        <p><?php echo esc_html(isset($value['value_description']) ? $value['value_description'] : ''); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="values">
                <div class="value">
                    <b>01</b>
                    <h3>وضوح الاحتياج</h3>
                    <p>اختيار المقاس والخامة والتشطيب بحسب الاستخدام الفعلي.</p>
                </div>
                <div class="value">
                    <b>02</b>
                    <h3>اتساق الهوية</h3>
                    <p>الحفاظ على لغة علامتك في مختلف تطبيقات الطباعة.</p>
                </div>
                <div class="value">
                    <b>03</b>
                    <h3>دقة التفاصيل</h3>
                    <p>مراجعة الملف والمواصفات المتفق عليها قبل بدء التنفيذ.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="section dark-section">
    <div class="container center">
        <span class="eyebrow"><?php echo esc_html($about_services_title ?: 'خدماتنا'); ?></span>
        <h2><?php echo esc_html($about_services_title ?: 'حلول متكاملة للطباعة والدعاية'); ?></h2>
        <?php if ($about_services): ?>
            <div class="services">
                <?php foreach ($about_services as $service): ?>
                    <div class="service">
                        <div class="icon" aria-hidden="true"><?php echo esc_html(isset($service['service_number']) ? $service['service_number'] : '▤'); ?></div>
                        <h3><?php echo esc_html(isset($service['service_title']) ? $service['service_title'] : ''); ?></h3>
                        <p><?php echo esc_html(isset($service['service_description']) ? $service['service_description'] : ''); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="services">
                <div class="service">
                    <div class="icon" aria-hidden="true">▤</div>
                    <h3>مطبوعات</h3>
                    <p>بروشورات وكتالوجات وبطاقات أعمال وفولدرات.</p>
                </div>
                <div class="service">
                    <div class="icon" aria-hidden="true">◇</div>
                    <h3>علب وأكياس</h3>
                    <p>تطبيقات مطبوعة تحمل هوية علامتك.</p>
                </div>
                <div class="service">
                    <div class="icon" aria-hidden="true">▣</div>
                    <h3>لوحات وبنرات</h3>
                    <p>حلول دعائية للاستخدامات الداخلية والخارجية.</p>
                </div>
                <div class="service">
                    <div class="icon" aria-hidden="true">▱</div>
                    <h3>إكريليك</h3>
                    <p>خامات وألوان متنوعة لأعمال العرض والدعاية.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="cta">
    <div class="container cta-inner">
        <div>
            <h2><?php echo esc_html($about_final_title ?: 'عندك مشروع مشابه؟'); ?></h2>
            <p><?php echo esc_html($about_final_desc ?: 'خلّنا نطبع فكرتك ونحوّلها إلى واقع مميز.'); ?></p>
        </div>
        <?php if ($about_final_cta_text && $about_final_cta_link): ?>
            <a class="btn dark" href="<?php echo esc_url($about_final_cta_link); ?>"><?php echo esc_html($about_final_cta_text); ?></a>
        <?php else: ?>
            <a class="btn dark" href="contact.html">اطلب عرض سعر</a>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>