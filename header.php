<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="theme-color" content="#211f1d" />
    <meta
        name="description"
        content="جواهر الشام للطباعة والدعاية في الرياض. مطبوعات ورقية ولوحات وبنرات وإكريليك، ومعرض نماذج وخدمات متكاملة." />
    <link
        rel="icon"
        type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='8' fill='%23211f1d'/%3E%3Cpath d='M10 28V10h20v18H10m4-6h12m-12-6h12' fill='none' stroke='%23cea640' stroke-width='3'/%3E%3C/svg%3E" />

    <?php
    // رقم النسخة تلقائي حسب آخر تعديل للملف
    $jw_dir = get_template_directory();
    $jw_uri = get_template_directory_uri();
    $jw_ver = function ($path) use ($jw_dir) {
        $file = $jw_dir . $path;
        return file_exists($file) ? filemtime($file) : time();
    };
    ?>

    <link rel="stylesheet" href="<?php echo $jw_uri . '/assets/css/categories.css?v=' . $jw_ver('/assets/css/categories.css'); ?>">
    <link rel="stylesheet" href="<?php echo $jw_uri . '/assets/styles.css?v=' . $jw_ver('/assets/styles.css'); ?>" />
    <script src="<?php echo $jw_uri . '/assets/app.js?v=' . $jw_ver('/assets/app.js'); ?>"></script>

    <!-- Swiper محلي: لا يحتاج اتصالًا خارجيًا عند فتح الصفحة. -->
    <link rel="stylesheet" href="<?php echo $jw_uri . '/assets/vendor/swiper-bundle.min.css?v=' . $jw_ver('/assets/vendor/swiper-bundle.min.css'); ?>">
    <script src="<?php echo $jw_uri . '/assets/vendor/swiper-bundle.min.js?v=' . $jw_ver('/assets/vendor/swiper-bundle.min.js'); ?>"></script>
    <script src="<?php echo $jw_uri . '/assets/js/main.js?v=' . $jw_ver('/assets/js/main.js'); ?>"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alexandria:wght@400;500;600;700;800&family=IBM+Plex+Sans+Arabic:wght@400;500;600&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&display=swap">
    <?php wp_head(); ?>
    <title>الطباعة والدعاية | جواهر الشام</title>
</head>

    <body class="luxury-theme">
    <a class="skip-link" href="#main">انتقل إلى المحتوى</a>
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-bar-left">
                <a href="tel:<?php echo esc_attr(get_theme_mod('top_bar_phone', '0123456789')); ?>">
                    <?php echo esc_html(get_theme_mod('top_bar_phone', '0123 456 7890')); ?>
                </a>
            </div>
            <div class="top-bar-right">
                <a href="mailto:<?php echo esc_attr(get_theme_mod('top_bar_email', 'info@example.com')); ?>">
                    <?php echo esc_html(get_theme_mod('top_bar_email', 'info@example.com')); ?>
                </a>
            </div>
        </div>
    </div>
    <header class="site-header">
        <div class="container header-inner">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $footer_text    = get_bloginfo('name');
            $logo_url       = '';

            if ($custom_logo_id) {
                $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                $logo_url   = $logo_image[0];
            } else {
                $footer_logo_opt = get_field('footer_brand_logo', 'option');
                $logo_url = $footer_logo_opt ?: get_template_directory_uri() . '/assets/logo.png';
            }
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr($footer_text); ?>">
                <img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($footer_text); ?>" />
            </a>
            <button class="menu-toggle" aria-expanded="false" aria-controls="main-nav" aria-label="فتح القائمة">
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
                <span class="menu-icon-bar"></span>
                <span class="menu-close" aria-hidden="true">×</span>
            </button>
            <div class="nav-overlay" aria-hidden="true"></div>
            <nav id="main-nav" class="nav" aria-label="القائمة الرئيسية">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'fallback_cb'    => 'default_main_menu_fallback',
                    'walker'         => new Custom_Menu_Walker(),
                    'link_class'     => '',
                ));
                ?>
            </nav>
            <?php
            $cta_text = get_field('footer_cta_text', 'option');
            $cta_link = get_field('footer_cta_link', 'option');
            ?>
            <?php if ($cta_text && $cta_link): ?>
                <a class="btn header-cta" href="<?php echo esc_url($cta_link); ?>"><?php echo esc_html($cta_text); ?></a>
            <?php else: ?>
                <a class="btn header-cta" href="contact.html">اطلب عرض سعر</a>
            <?php endif; ?>
        </div>
    </header>
    <main id="main">

        <?php
        function default_main_menu_fallback()
        {
            wp_list_pages(array('title_li' => ''));
        }
