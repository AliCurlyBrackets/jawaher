<?php get_header(); ?>

<?php
$works_title              = get_field('works_page_title');
$works_home_text          = get_field('works_breadcrumb_home');
$works_home_link          = get_field('works_breadcrumb_home_link');
$works_breadcrumb_current = get_field('works_breadcrumb_current');
$works_description        = get_field('works_description');
$works_filters_title      = get_field('works_filters_title');
$works_filters            = get_field('works_filters');
$works_gallery_note       = get_field('works_gallery_note');
$works_gallery_note_class = get_field('works_gallery_note_class');
$works_items              = get_field('works_items');
$works_final_title        = get_field('works_final_cta_title');
$works_final_desc         = get_field('works_final_cta_description');
$works_final_cta_text     = get_field('works_final_cta_button_text');
$works_final_cta_link     = get_field('works_final_cta_button_link');
$works_lightbox_title     = get_field('works_lightbox_title_text');
/* template name: works */
?>

<section class="page-top">
    <div class="container">
        <div class="breadcrumb">
            <a href="<?php echo esc_url($works_home_link ?: home_url('/')); ?>"><?php echo esc_html($works_home_text ?: 'الرئيسية'); ?></a> / <?php echo esc_html($works_breadcrumb_current ?: 'أعمالنا'); ?>
        </div>
        <h1><?php echo esc_html($works_title ?: 'أعمالنا'); ?></h1>
        <?php if ($works_description): ?>
            <p><?php echo esc_html($works_description); ?></p>
        <?php else: ?>
            <p>
                تفاصيل متنوعة، وهوية تطبع أثرها. استعرض نماذج المطبوعات والدعاية من
                بروفايل جواهر الشام.
            </p>
        <?php endif; ?>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="filters" role="group" aria-label="<?php echo esc_attr($works_filters_title ?: 'تصفية الأعمال'); ?>">
            <?php if ($works_filters): ?>
                <?php foreach ($works_filters as $index => $filter): ?>
                    <?php
                    $filter_label    = isset($filter['label']) ? $filter['label'] : 'الكل';
                    $filter_value    = isset($filter['value']) ? $filter['value'] : 'الكل';
                    $filter_is_active = isset($filter['is_active']) ? $filter['is_active'] : ($index === 0 ? true : false);
                    ?>
                    <button class="filter<?php echo $filter_is_active ? ' active' : ''; ?>"
                        data-work-filter="<?php echo esc_attr($filter_value); ?>"
                        aria-pressed="<?php echo $filter_is_active ? 'true' : 'false'; ?>">
                        <?php echo esc_html($filter_label); ?>
                    </button>
                <?php endforeach; ?>
            <?php else: ?>
                <button class="filter active" data-work-filter="الكل" aria-pressed="true">الكل</button>
                <button class="filter" data-work-filter="ورقيات" aria-pressed="false">مطبوعات ورقية</button>
                <button class="filter" data-work-filter="لوحات" aria-pressed="false">لوحات وبنرات</button>
                <button class="filter" data-work-filter="إكريليك" aria-pressed="false">إكريليك</button>
                <button class="filter" data-work-filter="تغليف" aria-pressed="false">أكياس وتغليف</button>
                <button class="filter" data-work-filter="هدايا" aria-pressed="false">هدايا دعائية</button>
            <?php endif; ?>
        </div>
        <div class="gallery" data-gallery>
            <?php if ($works_items): ?>
                <?php foreach ($works_items as $item): ?>
                    <?php
                    $item_title  = isset($item['title']) ? $item['title'] : '';
                    $item_image  = isset($item['image']) ? $item['image'] : '';
                    $item_alt    = isset($item['image_alt']) ? $item['image_alt'] : $item_title;
                    $item_desc   = isset($item['description']) ? $item['description'] : '';
                    $item_cat    = isset($item['category']) ? $item['category'] : '';
                    $item_lb     = isset($item['lightbox_title']) ? $item['lightbox_title'] : 'تفاصيل العمل';

                    if (!$item_image) continue;
                    ?>
                    <a href="<?php echo esc_url($item_image); ?>" class="gallery-item" data-category="<?php echo esc_attr($item_cat); ?>" data-title="<?php echo esc_attr($item_title); ?>" data-lightbox-title="<?php echo esc_attr($item_lb); ?>">
                        <div class="image-wrap">
                            <img src="<?php echo esc_url($item_image); ?>" alt="<?php echo esc_attr($item_alt); ?>" loading="lazy" />
                            <span class="zoom" aria-hidden="true">+</span>
                        </div>
                        <div class="card-copy">
                            <h3><?php echo esc_html($item_title); ?></h3>
                            <?php if ($item_desc): ?>
                                <p><?php echo esc_html($item_desc); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if ($works_gallery_note): ?>
            <p class="<?php echo esc_attr($works_gallery_note_class ?: 'center muted'); ?>" style="margin-top: 30px">
                <?php echo esc_html($works_gallery_note); ?>
            </p>
        <?php else: ?>
            <p class="center muted" style="margin-top: 30px">
                صور ونماذج توضيحية من البروفايل.
            </p>
        <?php endif; ?>
    </div>
</section>
<section class="cta">
    <div class="container cta-inner">
        <div>
            <h2><?php echo esc_html($works_final_title ?: 'عندك مشروع مشابه؟'); ?></h2>
            <p><?php echo esc_html($works_final_desc ?: 'خلّنا نطبع فكرتك ونحوّلها إلى واقع مميز.'); ?></p>
        </div>
        <?php if ($works_final_cta_text && $works_final_cta_link): ?>
            <a class="btn dark" href="<?php echo esc_url($works_final_cta_link); ?>"><?php echo esc_html($works_final_cta_text); ?></a>
        <?php else: ?>
            <a class="btn dark" href="contact.html">اطلب عرض سعر</a>
        <?php endif; ?>
    </div>
</section>
<dialog class="lightbox" id="lightbox" aria-labelledby="lightbox-title">
    <div class="dialog-top">
        <h2 id="lightbox-title"><?php echo esc_html($works_lightbox_title ?: 'تفاصيل العمل'); ?></h2>
        <button class="close-dialog" aria-label="إغلاق الصورة">×</button>
    </div>
    <img alt="" />
</dialog>

<script>
    // Gallery filter for works page
const gallery = document.querySelector("[data-gallery]");

if (gallery) {
  let filter = "الكل";

  const filters = document.querySelectorAll("[data-work-filter]");
  const items = document.querySelectorAll(".gallery-item");

  const renderGallery = () => {
    items.forEach((item) => {
      const cat = item.getAttribute("data-category");

      const show = filter === "الكل" || cat === filter;

      item.style.display = show ? "" : "none";
    });
  };

  filters.forEach((b) => {
    b.addEventListener("click", () => {
      filter = b.getAttribute("data-work-filter");

      filters.forEach((x) => {
        const isActive = x === b;

        x.classList.toggle("active", isActive);
        x.setAttribute("aria-pressed", isActive);
      });

      renderGallery();
    });
  });

  renderGallery();
}

const dialog = document.querySelector("#lightbox");

let lastTrigger;

document.addEventListener("click", (e) => {
  const link = e.target.closest(".gallery-item");

  if (link && dialog) {
    e.preventDefault();

    lastTrigger = link;

    const img = dialog.querySelector("img");

    img.src = link.getAttribute("href");
    img.alt = link.getAttribute("data-title") || "";

    dialog.querySelector("h2").textContent =
      link.getAttribute("data-lightbox-title") || "تفاصيل العمل";

    dialog.showModal();
  }

  const b = e.target.closest("[data-image]");

  if (b && dialog) {
    e.preventDefault();

    lastTrigger = b;

    dialog.querySelector("img").src =
      `assets/${b.dataset.image}.png`;

    dialog.querySelector("img").alt =
      b.dataset.title;

    dialog.querySelector("h2").textContent =
      b.dataset.title;

    dialog.showModal();
  }
});

if (dialog) {
  dialog.querySelector("button").onclick = () =>
    dialog.close();

  dialog.addEventListener("click", (e) => {
    if (e.target === dialog) {
      dialog.close();
    }
  });

  dialog.addEventListener("close", () =>
    lastTrigger?.focus()
  );
}
</script>

<?php get_footer(); ?>