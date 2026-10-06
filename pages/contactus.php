<?php
/*
 * Template Name: Contact Us
 * Template Post Type: page
 */
get_header();

$c_home_text        = get_field('contactus_breadcrumb_home');
$c_home_link        = get_field('contactus_breadcrumb_home_link');
$c_breadcrumb_current = get_field('contactus_breadcrumb_current');
$c_page_title       = get_field('contactus_page_title');
$c_subtitle         = get_field('contactus_subtitle');
$c_eyebrow          = get_field('contactus_eyebrow');
$c_title_primary    = get_field('contactus_title_primary');
$c_title_secondary  = get_field('contactus_title_secondary');
$c_description      = get_field('contactus_description');
$c_phone_label      = get_field('contactus_phone_label');
$c_phone_number     = get_field('contactus_phone_number');
$c_phone_link       = get_field('contactus_phone_link');
$c_address_label    = get_field('contactus_address_label');
$c_address_text     = get_field('contactus_address_text');
$c_map_link         = get_field('contactus_map_link');
$c_map_link_text    = get_field('contactus_map_link_text');
$c_whatsapp_label   = get_field('contactus_whatsapp_label');
$c_whatsapp_link    = get_field('contactus_whatsapp_link');
$c_whatsapp_btn     = get_field('contactus_whatsapp_button_text');
$c_form_title       = get_field('contactus_form_title');
$c_service_options  = get_field('contactus_service_options');
$c_form_note        = get_field('contactus_form_note');
$c_form_btn_text    = get_field('contactus_form_button_text');
$c_whatsapp_template = get_field('contactus_whatsapp_template');
$c_ready_btn        = get_field('contactus_ready_button_text');
$c_status_message   = get_field('contactus_status_message');
$c_bg_image         = get_field('contactus_background_image');
$c_bg_color         = get_field('contactus_background_color');
?>

<section class="page-top">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url($c_home_link ?: home_url('/')); ?>"><?php echo esc_html($c_home_text ?: 'الرئيسية'); ?></a> / <?php echo esc_html($c_breadcrumb_current ?: 'تواصل معنا'); ?>
        </div>
        <h1><?php echo esc_html($c_page_title ?: 'تواصل معنا'); ?></h1>
        <?php if ($c_subtitle): ?>
            <p><?php echo esc_html($c_subtitle); ?></p>
        <?php else: ?>
            <p>مشروعك القادم يبدأ بمحادثة. شاركنا فكرتك، ولنحدد معك التفاصيل.</p>
        <?php endif; ?>
    </div>
</section>
<?php if ($c_bg_image || $c_bg_color): ?>
    <section class="section" style="<?php echo $c_bg_image ? 'background-image: url(' . esc_url($c_bg_image) . ');' : 'background-color: ' . esc_attr($c_bg_color) . ';'; ?>">
    <?php else: ?>
        <section class="section">
        <?php endif; ?>
        <div class="container contact-grid">
            <div>
                <?php if ($c_eyebrow): ?>
                    <span class="eyebrow"><?php echo esc_html($c_eyebrow); ?></span>
                <?php else: ?>
                    <span class="eyebrow">يسعدنا تواصلك</span>
                <?php endif; ?>

                <h2>
                    <?php echo esc_html($c_title_primary ?: 'لنطبع فكرتك القادمة'); ?>
                    <?php if ($c_title_secondary): ?>
                        <em><?php echo esc_html($c_title_secondary); ?></em>
                    <?php endif; ?>
                </h2>

                <?php if ($c_description): ?>
                    <p class="muted"><?php echo esc_html($c_description); ?></p>
                <?php else: ?>
                    <p class="muted">
                        حدد الخدمة والمقاس والكمية والتشطيب إن أمكن، لنفهم احتياجك بصورة
                        أوضح.
                    </p>
                <?php endif; ?>

                <div class="contact-item">
                    <h3><?php echo esc_html($c_phone_label ?: 'اتصل بنا'); ?></h3>
                    <?php if ($c_phone_link): ?>
                        <a href="<?php echo esc_url($c_phone_link); ?>" dir="ltr"><?php echo esc_html($c_phone_number ?: '+966 53 244 6558'); ?></a>
                    <?php else: ?>
                        <span dir="ltr"><?php echo esc_html($c_phone_number ?: '+966 53 244 6558'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="contact-item">
                    <h3><?php echo esc_html($c_address_label ?: 'موقعنا'); ?></h3>
                    <p><?php echo esc_html($c_address_text ?: 'الرياض — حي المنصورة'); ?></p>
                    <?php if ($c_map_link): ?>
                        <a class="read-link" href="<?php echo esc_url($c_map_link); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html($c_map_link_text ?: 'البحث عن الموقع على الخريطة'); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="contact-item">
                    <h3><?php echo esc_html($c_whatsapp_label ?: 'واتساب'); ?></h3>
                    <?php if ($c_whatsapp_link): ?>
                        <a class="btn outline" href="<?php echo esc_url($c_whatsapp_link); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html($c_whatsapp_btn ?: 'ابدأ محادثة'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <form class="form" id="contact-form">
                <?php if ($c_form_title): ?>
                    <h2 class="full"><?php echo esc_html($c_form_title); ?></h2>
                <?php else: ?>
                    <h2 class="full">اطلب عرض سعر</h2>
                <?php endif; ?>

                <label>الاسم<input
                        name="name"
                        required
                        autocomplete="name"
                        maxlength="100"
                        placeholder="اسمك الكريم" /></label>

                <label>رقم الجوال<input
                        name="phone"
                        required
                        type="tel"
                        autocomplete="tel"
                        dir="ltr"
                        pattern="[+0-9() −-]{7,20}"
                        maxlength="20"
                        placeholder="05xxxxxxxx" /></label>

                <label class="full">نوع الخدمة<select name="service" required>
                        <option value="">اختر الخدمة</option>
                        <?php if ($c_service_options): ?>
                            <?php foreach ($c_service_options as $option): ?>
                                <option><?php echo esc_html($option['service_text']); ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option>مطبوعات ورقية</option>
                            <option>علب وأكياس</option>
                            <option>لوحات وبنرات</option>
                            <option>إكريليك</option>
                            <option>رول أب وبوب أب</option>
                            <option>خدمة أخرى</option>
                        <?php endif; ?>
                    </select></label>

                <label class="full">تفاصيل الطلب<textarea
                        name="message"
                        required
                        minlength="10"
                        maxlength="2000"
                        placeholder="أخبرنا بالمقاس والكمية والخامة أو اشرح فكرتك..."></textarea></label>

                <?php if ($c_form_note): ?>
                    <small class="full"><?php echo esc_html($c_form_note); ?></small>
                <?php else: ?>
                    <small class="full">نجهّز تفاصيلك في رسالة واتساب، وتراجعها قبل إرسالها.</small>
                <?php endif; ?>

                <button class="btn dark full" type="submit">
                    <?php echo esc_html($c_form_btn_text ?: 'تجهيز الطلب عبر واتساب'); ?>
                </button>
                <p class="full" id="form-status" role="status"></p>
                <a
                    class="btn full"
                    id="whatsapp-ready"
                    target="_blank"
                    rel="noopener"
                    hidden>
                    <?php echo esc_html($c_ready_btn ?: 'فتح واتساب وإكمال الإرسال'); ?>
                </a>
            </form>
        </div>
        </section>

        <?php get_footer(); ?>