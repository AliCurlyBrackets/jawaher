'use strict';

/*
 * وظيفة هذا الملف فقط تشغيل Swiper.
 * لا توجد بيانات تصنيفات أو منتجات هنا.
 * كل الصور والعناوين والكروت مكتوبة في ملفي HTML.
 */
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Swiper === 'undefined') {
        return;
    }

    document.querySelectorAll('.category-section').forEach(function (section) {
        const slider = section.querySelector('.products-slider');
        if (!slider) {
            return;
        }

        new Swiper(slider, {
            // اتجاه RTL مأخوذ من dir="rtl" داخل HTML.
            slidesPerView: 2,
            spaceBetween: 14,
            speed: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 0 : 450,
            loop: false,
            watchOverflow: true,
            grabCursor: true,

            // عناصر التحكم تخص هذا السيكشن فقط.
            navigation: {
                nextEl: section.querySelector('.slider-next'),
                prevEl: section.querySelector('.slider-prev')
            },

            pagination: {
                el: section.querySelector('.slider-pagination'),
                clickable: true
            },

            a11y: {
                enabled: true,
                prevSlideMessage: 'المنتجات السابقة',
                nextSlideMessage: 'المنتجات التالية',
                firstSlideMessage: 'بداية المنتجات',
                lastSlideMessage: 'نهاية المنتجات',
                paginationBulletMessage: 'انتقل إلى المجموعة {{index}}',
                slideLabelMessage: 'منتج {{index}} من {{slidesLength}}'
            },

            breakpoints: {
                641: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1000: {
                    slidesPerView: 5,
                    spaceBetween: 20
                }
            }
        });
    });
});
