</main>
<?php
$custom_logo_id = get_theme_mod('custom_logo');
$footer_brand   = get_bloginfo('name');
$logo_url       = '';

if ($custom_logo_id) {
    $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
    $logo_url   = $logo_image[0];
} else {
    $footer_logo_opt   = get_field('footer_brand_logo', 'option');
    $logo_url = $footer_logo_opt ?: get_template_directory_uri() . '/assets/logo.png';
}

$footer_phone   = get_field('footer_contact_phone', 'option');
$phone_link     = get_field('footer_contact_phone_link', 'option');
$footer_address = get_field('footer_contact_address', 'option');
$whatsapp_link  = get_field('footer_whatsapp_link', 'option');
$whatsapp_text  = get_field('footer_whatsapp_text', 'option');
$copyright      = get_field('footer_copyright_text', 'option');
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <a class="footer-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img class="logo footer-logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($footer_brand); ?>" />
                </a>
                <p>
                    <?php
                    $footer_desc = get_field('footer_brand_description', 'option');
                    echo esc_html($footer_desc ?: 'حلول الطباعة والدعاية التي تمنح أفكارك حضورًا ملموسًا، من المطبوعات الورقية إلى اللوحات وأعمال الإكريليك.');
                    ?>
                </p>
            </div>
            <div class="footer-service-list">
                <h3>خدماتنا</h3>
                <div class="footer-links">
                    <?php
                    if (has_nav_menu('footer-menu')):
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'walker'         => new Custom_Menu_Walker(),
                        ));
                    endif;
                    ?>
                </div>
            </div>
            <div>
                <h3>روابط سريعة</h3>
                <div class="footer-links">
                    <?php
                    if (has_nav_menu('footer-2')):
                        wp_nav_menu(array(
                            'theme_location' => 'footer-2',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'walker'         => new Custom_Menu_Walker(),
                        ));
                    endif;
                    ?>
                </div>
            </div>
            <div>
                <h3>تواصل معنا</h3>
                <div class="footer-links">
                    <?php if ($phone_link): ?>
                        <a href="<?php echo esc_url($phone_link); ?>" dir="ltr"><?php echo esc_html($footer_phone ?: '+966 53 244 6558'); ?></a>
                    <?php else: ?>
                        <span dir="ltr"><?php echo esc_html($footer_phone ?: '+966 53 244 6558'); ?></span>
                    <?php endif; ?>
                    <span><?php echo esc_html($footer_address ?: 'الرياض — حي المنصورة'); ?></span>
                    <?php if ($whatsapp_link): ?>
                        <a href="<?php echo esc_url($whatsapp_link); ?>" target="_blank" rel="noopener"><?php echo esc_html($whatsapp_text ?: 'تواصل عبر واتساب'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="copyright">
            <?php echo esc_html($copyright ?: 'جواهر الشام © 2026 — جميع الحقوق محفوظة'); ?>
        </div>
    </div>
</footer>
<button class="to-top" aria-label="العودة إلى أعلى الصفحة">↑</button>


<!-- أيقونة Font Awesome (ضيفها مرة واحدة في الـ head لو مش موجودة) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- زر الواتساب -->
<a href="https://wa.me/966532446558" class="whatsapp-btn" target="_blank" aria-label="WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<style>
.whatsapp-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  background: #25d366;
  color: #fff;
  font-size: 34px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  z-index: 9999;
  box-shadow: 0 4px 12px rgba(0,0,0,.3);
  animation: heartbeat 1.5s infinite;
}

@keyframes heartbeat {
  0%   { transform: scale(1); }
  14%  { transform: scale(1.15); }
  28%  { transform: scale(1); }
  42%  { transform: scale(1.15); }
  70%  { transform: scale(1); }
}
</style>


</body>
<?php wp_footer(); ?>
<script>
    const menu = document.querySelector(".menu-toggle"),
  nav = document.querySelector(".nav");

menu?.addEventListener("click", () => {
  const open = nav.classList.toggle("open");

  menu.setAttribute("aria-expanded", open);
  menu.textContent = open ? "إغلاق" : "القائمة";
});

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && nav?.classList.contains("open")) {
    nav.classList.remove("open");
    menu.setAttribute("aria-expanded", "false");
    menu.textContent = "القائمة";
    menu.focus();
  }
});

</script>
</html>
