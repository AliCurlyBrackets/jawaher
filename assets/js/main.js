"use strict";

/*
 * وظيفة هذا الملف فقط تشغيل Swiper.
 * لا توجد بيانات تصنيفات أو منتجات هنا.
 * كل الصور والعناوين والكروت مكتوبة في ملفي HTML.
 */
document.addEventListener("DOMContentLoaded", function () {
  if (typeof Swiper === "undefined") {
    return;
  }

  /* ===== الإعدادات ===== */
  const AUTOPLAY_DELAY = 4000; // الوقت بين كل تحريك (بالميلي ثانية)
  const reduceMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)",
  ).matches;

  document.querySelectorAll(".category-section").forEach(function (section) {
    const slider = section.querySelector(".products-slider");
    if (!slider) {
      return;
    }

    const swiper = new Swiper(slider, {
      // اتجاه RTL مأخوذ من dir="rtl" داخل HTML.
      slidesPerView: 2,
      spaceBetween: 14,
      speed: reduceMotion ? 0 : 450,
      loop: true,
      watchOverflow: true,
      grabCursor: true,

      // أوتو بلاي (يتعطل لو المستخدم مفعل تقليل الحركة)
      autoplay: reduceMotion
        ? false
        : {
            delay: AUTOPLAY_DELAY,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          },

      // عناصر التحكم تخص هذا السيكشن فقط.
      navigation: {
        nextEl: section.querySelector(".slider-next"),
        prevEl: section.querySelector(".slider-prev"),
      },

      pagination: {
        el: section.querySelector(".slider-pagination"),
        clickable: true,
      },

      a11y: {
        enabled: true,
        prevSlideMessage: "المنتجات السابقة",
        nextSlideMessage: "المنتجات التالية",
        firstSlideMessage: "بداية المنتجات",
        lastSlideMessage: "نهاية المنتجات",
        paginationBulletMessage: "انتقل إلى المجموعة {{index}}",
        slideLabelMessage: "منتج {{index}} من {{slidesLength}}",
      },

      breakpoints: {
        641: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1000: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      },
    });

    // يشتغل الأوتو بلاي بس لما السيكشن يكون ظاهر في الشاشة
    if (!reduceMotion && "IntersectionObserver" in window) {
      new IntersectionObserver(
        function (entries) {
          if (!swiper.autoplay) return;
          if (entries[0].isIntersecting) {
            swiper.autoplay.start();
          } else {
            swiper.autoplay.stop();
          }
        },
        { threshold: 0.2 },
      ).observe(section);
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const oldBtn = document.querySelector(".menu-toggle");
  const nav = document.getElementById("main-nav");
  if (!oldBtn || !nav) return;

  // نسخة نظيفة من الزرار تشيل أي كود قديم مربوط بيه
  const btn = oldBtn.cloneNode(false);
  btn.innerHTML =
    '<span class="menu-icon-bar"></span>' +
    '<span class="menu-icon-bar"></span>' +
    '<span class="menu-icon-bar"></span>';
  oldBtn.replaceWith(btn);

  function isOpen() {
    return document.body.classList.contains("menu-open");
  }

  function setOpen(open) {
    document.body.classList.toggle("menu-open", open);
    nav.classList.remove("open"); // نلغي كلاس الكود القديم لو موجود
    btn.setAttribute("aria-expanded", open ? "true" : "false");
    btn.setAttribute("aria-label", open ? "إغلاق القائمة" : "فتح القائمة");
  }

  btn.addEventListener("click", function (e) {
    e.stopPropagation();
    setOpen(!isOpen());
  });

  // أي ضغطة برّه السايد بار تقفله
  document.addEventListener("click", function (e) {
    if (!isOpen()) return;
    if (nav.contains(e.target) && !e.target.closest("a")) return; // جوه القائمة ومش لينك
    setOpen(false);
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") setOpen(false);
  });

  window
    .matchMedia("(min-width: 701px)")
    .addEventListener("change", function (e) {
      if (e.matches) setOpen(false);
    });

  setOpen(false);
});
