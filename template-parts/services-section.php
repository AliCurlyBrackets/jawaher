<?php
$services_enabled = get_field('services_section_enabled', 'option');
if (!$services_enabled) {
    return;
}

$services_id            = get_field('services_section_id', 'option');
$services_eyebrow       = get_field('services_eyebrow', 'option');
$services_title_primary = get_field('services_title_primary', 'option');
$services_title_secondary = get_field('services_title_secondary', 'option');
$services_desc          = get_field('services_description', 'option');
$services_items         = get_field('services_items', 'option');
?>

<section class="section luxury-services" id="<?php echo esc_attr($services_id ? $services_id : 'services'); ?>">
    <div class="container">
        <div class="section-head">
            <?php if ($services_eyebrow): ?>
                <span class="eyebrow"><?php echo esc_html($services_eyebrow); ?></span>
            <?php else: ?>
                <span class="eyebrow">خدماتنا المتخصصة</span>
            <?php endif; ?>

            <h2>
                <?php echo esc_html($services_title_primary ?: 'تفاصيل صغيرة،'); ?>
                <em><?php echo esc_html($services_title_secondary ?: 'تصنع فرقًا كبيرًا'); ?></em>
            </h2>

            <p>
                <?php if ($services_desc): ?>
                    <?php echo wp_kses_post($services_desc); ?>
                <?php else: ?>
                    مجموعة متكاملة من حلول الطباعة والإعلان لتلبية جميع احتياجات أعمالك.
                <?php endif; ?>
            </p>
        </div>

        <?php if ($services_items): ?>
            <div class="service-cards">
                <?php foreach ($services_items as $item): ?>
                    <?php
                    $tile_class    = isset($item['tile_class']) ? $item['tile_class'] : 'tile-0';
                    $link          = isset($item['link']) ? $item['link'] : 'contact.html';
                    $aria_label    = isset($item['aria_label']) ? $item['aria_label'] : '';
                    $sprite_label  = isset($item['sprite_label']) ? $item['sprite_label'] : '';
                    $title         = isset($item['title']) ? $item['title'] : '';
                    $image         = isset($item['image']) ? $item['image'] : '';
                    $description   = isset($item['description']) ? $item['description'] : '';
                    ?>
                    <article class="service-card">
                        <a href="<?php echo esc_url($link); ?>" aria-label="<?php echo esc_attr($aria_label); ?>">
                            <?php if ($image): ?>
                                <div class="service-image">
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($item_title); ?>" loading="lazy" />
                                </div>
                            <?php else: ?>
                                <div class="product-sprite <?php echo esc_attr($tile_class); ?>" role="img" aria-label="<?php echo esc_attr($sprite_label); ?>"></div>
                            <?php endif; ?>
                            <div class="service-copy">
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo esc_html($description); ?></p>
                                <span class="service-plus" aria-hidden="true">+</span>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="service-cards">
                <article class="service-card">
                    <a href="contact.html?service=0" aria-label="اطلب بزنس كارد">
                        <div class="product-sprite tile-0" role="img" aria-label="نموذج بزنس كارد"></div>
                        <div class="service-copy">
                            <h3>بزنس كارد</h3>
                            <p>تصاميم راقية تعكس هويتك باحترافية.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
                <article class="service-card">
                    <a href="contact.html?service=1" aria-label="اطلب إكريليك">
                        <div class="product-sprite tile-1" role="img" aria-label="نموذج إكريليك"></div>
                        <div class="service-copy">
                            <h3>إكريليك</h3>
                            <p>حلول عصرية للوحات والديكور الداخلي.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
                <article class="service-card">
                    <a href="contact.html?service=2" aria-label="اطلب رول أب وبوب أب">
                        <div class="product-sprite tile-2" role="img" aria-label="نموذج رول أب وبوب أب"></div>
                        <div class="service-copy">
                            <h3>رول أب وبوب أب</h3>
                            <p>حلول إعلانية مميزة للمعارض والفعاليات.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
                <article class="service-card">
                    <a href="contact.html?service=3" aria-label="اطلب علب وأكياس">
                        <div class="product-sprite tile-3" role="img" aria-label="نموذج علب وأكياس"></div>
                        <div class="service-copy">
                            <h3>علب وأكياس</h3>
                            <p>تغليف يليق بمنتجك.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
                <article class="service-card">
                    <a href="contact.html?service=4" aria-label="اطلب بروشورات وكتالوجات">
                        <div class="product-sprite tile-4" role="img" aria-label="نموذج بروشورات وكتالوجات"></div>
                        <div class="service-copy">
                            <h3>بروشورات وكتالوجات</h3>
                            <p>تصاميم لمطبوعات تعريفية وتسويقية.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
                <article class="service-card">
                    <a href="contact.html?service=5" aria-label="اطلب لوحات وبنرات">
                        <div class="product-sprite tile-5" role="img" aria-label="نموذج لوحات وبنرات"></div>
                        <div class="service-copy">
                            <h3>لوحات وبنرات</h3>
                            <p>حضور لافت لعلامتك التجارية في كل مكان.</p>
                            <span class="service-plus" aria-hidden="true">+</span>
                        </div>
                    </a>
                </article>
            </div>
        <?php endif; ?>
    </div>
</section>
