<?php
$testimonial_enabled    = get_field('testimonial_section_enabled', 'option');
if (!$testimonial_enabled) {
    return;
}

$testimonial_id         = get_field('testimonial_section_id', 'option');
$testimonial_eyebrow    = get_field('testimonial_eyebrow', 'option');
$testimonial_title      = get_field('testimonial_title_primary', 'option');
$testimonial_source_text = get_field('testimonial_source_text', 'option');
$testimonial_source_url = get_field('testimonial_source_url', 'option');
$testimonial_items      = get_field('testimonial_items', 'option');
?>
<style>
    /* ===== آراء العملاء — جواهر الشام =====
       يحتاج خطوط: Alexandria + IBM Plex Sans Arabic (من Google Fonts) */

    .jw-testimonials {
        --jw-ink: #1A1714;
        --jw-ink-soft: #3A332A;
        --jw-muted: #6B5F4B;
        --jw-gold: #C9A24A;
        --jw-gold-deep: #8A6A1F;
        --jw-star: #B8913A;
        --jw-sand: #F2ECE0;
        --jw-line: #E5DCCB;
        --jw-card: #FFFFFF;

        direction: rtl;
        background: var(--jw-sand);
        padding: 88px 0;
        font-family: 'IBM Plex Sans Arabic', Tahoma, sans-serif;
        color: var(--jw-ink);
    }

    .jw-testimonials *,
    .jw-testimonials *::before,
    .jw-testimonials *::after {
        box-sizing: border-box;
    }

    .jw-t-container {
        max-width: 1240px;
        margin: 0 auto;
        padding: 0 24px;
        display: flex;
        flex-direction: column;
        gap: 36px;
    }

    /* ---------- Header ---------- */
    .jw-t-head {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: space-between;
        align-items: flex-end;
    }

    .jw-t-head-text {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .jw-t-eyebrow {
        font-family: 'Alexandria', sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: var(--jw-gold-deep);
    }

    .jw-t-title {
        margin: 0;
        font-family: 'Alexandria', sans-serif;
        font-weight: 700;
        font-size: clamp(28px, 3vw, 40px);
        line-height: 1.3;
        color: var(--jw-ink);
    }

    .jw-t-head-side {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .jw-t-source {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: var(--jw-muted);
        text-decoration: none;
    }

    .jw-t-source:hover {
        color: var(--jw-gold-deep);
    }

    .jw-t-nav {
        display: flex;
        gap: 8px;
    }

    .jw-t-arrow {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: 1px solid var(--jw-line);
        background: var(--jw-card);
        color: var(--jw-ink);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background .2s, color .2s, border-color .2s, opacity .2s;
    }

    .jw-t-arrow:hover:not(:disabled) {
        background: var(--jw-ink);
        border-color: var(--jw-ink);
        color: #F4EEE2;
    }

    .jw-t-arrow:disabled {
        opacity: .35;
        cursor: default;
    }

    .jw-t-arrow:focus-visible,
    .jw-t-track:focus-visible,
    .jw-t-dot:focus-visible {
        outline: 2px solid var(--jw-gold-deep);
        outline-offset: 3px;
    }

    /* ---------- Track (slider) ---------- */
    .jw-t-track {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: calc((100% - 36px) / 3);
        /* 3 كروت على الديسكتوب */
        gap: 18px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        scrollbar-width: none;
        padding-bottom: 4px;
    }

    .jw-t-track::-webkit-scrollbar {
        display: none;
    }

    /* ---------- Card ---------- */
    .jw-t-card {
        margin: 0;
        padding: 28px;
        border-radius: 20px;
        background: var(--jw-card);
        border: 1px solid transparent;
        display: flex;
        flex-direction: column;
        gap: 16px;
        scroll-snap-align: start;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s;
    }

    .jw-t-card:hover {
        transform: translateY(-4px);
        border-color: var(--jw-line);
        box-shadow: 0 14px 30px -18px rgba(26, 23, 20, .35);
    }

    .jw-t-stars {
        display: flex;
        gap: 3px;
        color: var(--jw-star);
    }

    .jw-t-stars svg {
        width: 18px;
        height: 18px;
    }

    .jw-t-stars .is-empty {
        color: var(--jw-line);
    }

    .jw-t-quote {
        margin: 0;
        flex: 1 1 auto;
        font-size: 16px;
        line-height: 1.85;
        color: var(--jw-ink-soft);
    }

    .jw-t-author {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-top: 16px;
        border-top: 1px solid var(--jw-sand);
    }

    .jw-t-avatar {
        width: 42px;
        height: 42px;
        flex: none;
        border-radius: 50%;
        background: var(--jw-ink);
        color: #E6C77A;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-family: 'Alexandria', sans-serif;
        font-weight: 600;
        font-size: 16px;
    }

    .jw-t-name {
        display: block;
        font-family: 'Alexandria', sans-serif;
        font-size: 15px;
        font-weight: 600;
    }

    .jw-t-company {
        display: block;
        font-size: 13px;
        color: var(--jw-muted);
    }

    /* ---------- Dots ---------- */
    .jw-t-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .jw-t-dot {
        width: 8px;
        height: 8px;
        padding: 0;
        border: 0;
        border-radius: 999px;
        background: #D4C8B2;
        cursor: pointer;
        transition: width .25s, background .25s;
    }

    .jw-t-dot[aria-selected="true"] {
        width: 26px;
        background: var(--jw-gold-deep);
    }

    /* مساحة لمس أكبر من غير ما الشكل يكبر */
    .jw-t-dot {
        position: relative;
    }

    .jw-t-dot::after {
        content: "";
        position: absolute;
        inset: -14px -6px;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 1024px) {
        .jw-t-track {
            grid-auto-columns: calc((100% - 18px) / 2);
        }
    }

    @media (max-width: 640px) {
        .jw-testimonials {
            padding: 64px 0;
        }

        .jw-t-track {
            grid-auto-columns: 86%;
        }

        .jw-t-nav {
            display: none;
        }

        /* على الموبايل سحب بالصباع + النقط */
        .jw-t-card {
            padding: 22px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .jw-t-track {
            scroll-behavior: auto;
        }

        .jw-t-card,
        .jw-t-dot,
        .jw-t-arrow {
            transition: none;
        }
    }
</style>

<!-- ===== آراء العملاء — جواهر الشام ===== -->
<!-- النصوص تأتي من خيارات ACF -> صفحة "التقييمات" -->
<?php if (!empty($testimonial_items)): ?>
<section class="jw-testimonials" id="<?php echo esc_attr($testimonial_id ? $testimonial_id : 'testimonials'); ?>" aria-labelledby="jw-t-title">
    <div class="jw-t-container">

        <div class="jw-t-head">
            <div class="jw-t-head-text">
                <span class="jw-t-eyebrow"><?php echo esc_html($testimonial_eyebrow ?: 'آراء العملاء'); ?></span>
                <h2 id="jw-t-title" class="jw-t-title"><?php echo esc_html($testimonial_title ?: 'آراء عملائنا'); ?></h2>
            </div>
            <div class="jw-t-head-side">
                <?php if ($testimonial_source_url): ?>
                    <a class="jw-t-source" href="<?php echo esc_url($testimonial_source_url); ?>" target="_blank" rel="noopener">
                        <?php echo esc_html($testimonial_source_text ?: 'مأخوذة من تقييمات Google'); ?>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M7 17L17 7"></path>
                            <path d="M8 7h9v9"></path>
                        </svg>
                    </a>
                <?php endif; ?>
                <div class="jw-t-nav">
                    <button type="button" class="jw-t-arrow" data-dir="prev" aria-label="التقييم السابق">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 18l6-6-6-6"></path>
                        </svg>
                    </button>
                    <button type="button" class="jw-t-arrow" data-dir="next" aria-label="التقييم التالي">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="jw-t-track" tabindex="0" aria-label="قائمة التقييمات">

            <?php foreach ($testimonial_items as $item): ?>
                <?php
                    $rating  = isset($item['rating']) ? $item['rating'] : 5;
                    $quote   = isset($item['quote']) ? $item['quote'] : '';
                    $name    = isset($item['name']) ? $item['name'] : '';
                    $company = isset($item['company']) ? $item['company'] : '';
                ?>
                <figure class="jw-t-card">
                    <div class="jw-t-stars" data-rating="<?php echo esc_attr($rating); ?>"></div>
                    <blockquote class="jw-t-quote"><?php echo esc_html($quote); ?></blockquote>
                    <figcaption class="jw-t-author">
                        <span class="jw-t-avatar" aria-hidden="true"></span>
                        <span>
                            <strong class="jw-t-name"><?php echo esc_html($name); ?></strong>
                            <span class="jw-t-company"><?php echo esc_html($company); ?></span>
                        </span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>

        </div>

        <div class="jw-t-dots" role="tablist" aria-label="التنقل بين التقييمات"></div>

    </div>
</section>
<?php endif; ?>

<script>
    /* ===== آراء العملاء — جواهر الشام =====
       - يرسم النجوم من data-rating
       - يحط أول حرف من اسم العميل في الدائرة
       - أسهم + نقط تنقل + سحب على الموبايل (RTL) */
    (function() {
        'use strict';

        var STAR =
            '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">' +
            '<path d="M12 2.5l2.9 5.9 6.5.9-4.7 4.6 1.1 6.5L12 17.3l-5.8 3.1 1.1-6.5L2.6 9.3l6.5-.9z"/></svg>';

        function initSection(section) {
            var track = section.querySelector('.jw-t-track');
            var cards = Array.prototype.slice.call(section.querySelectorAll('.jw-t-card'));
            var dotsWrap = section.querySelector('.jw-t-dots');
            var prevBtn = section.querySelector('.jw-t-arrow[data-dir="prev"]');
            var nextBtn = section.querySelector('.jw-t-arrow[data-dir="next"]');
            if (!track || !cards.length) return;

            /* 1) النجوم */
            section.querySelectorAll('.jw-t-stars').forEach(function(el) {
                var rating = Math.max(0, Math.min(5, parseInt(el.getAttribute('data-rating'), 10) || 5));
                var html = '';
                for (var i = 1; i <= 5; i++) {
                    html += i <= rating ? STAR : STAR.replace('<svg ', '<svg class="is-empty" ');
                }
                el.innerHTML = html;
                el.setAttribute('role', 'img');
                el.setAttribute('aria-label', 'تقييم ' + rating + ' من 5');
            });

            /* 2) أول حرف من الاسم */
            cards.forEach(function(card) {
                var nameEl = card.querySelector('.jw-t-name');
                var avatar = card.querySelector('.jw-t-avatar');
                if (!nameEl || !avatar || avatar.textContent.trim()) return;
                var name = nameEl.textContent.replace(/[\[\]]/g, '').trim();
                avatar.textContent = name ? name.charAt(0) : '';
            });

            /* 3) حساب الصفحات حسب عدد الكروت الظاهرة */
            function perView() {
                var cardW = cards[0].getBoundingClientRect().width;
                var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
                return Math.max(1, Math.round((track.clientWidth + gap) / (cardW + gap)));
            }

            function pageCount() {
                return Math.max(1, cards.length - perView() + 1);
            }
            // في RTL قيمة scrollLeft بتكون سالبة في أغلب المتصفحات، فبنستخدم القيمة المطلقة
            function currentIndex() {
                var cardW = cards[0].getBoundingClientRect().width;
                var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
                return Math.round(Math.abs(track.scrollLeft) / (cardW + gap));
            }

            function goTo(index) {
                index = Math.max(0, Math.min(pageCount() - 1, index));
                cards[index].scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest',
                    inline: 'start'
                });
            }

            /* 4) النقط */
            var dots = [];

            function buildDots() {
                if (!dotsWrap) return;
                dotsWrap.innerHTML = '';
                dots = [];
                var count = pageCount();
                dotsWrap.hidden = count < 2;
                for (var i = 0; i < count; i++) {
                    var dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'jw-t-dot';
                    dot.setAttribute('role', 'tab');
                    dot.setAttribute('aria-label', 'التقييم ' + (i + 1));
                    dot.addEventListener('click', goTo.bind(null, i));
                    dotsWrap.appendChild(dot);
                    dots.push(dot);
                }
                update();
            }

            function update() {
                var idx = Math.min(currentIndex(), pageCount() - 1);
                dots.forEach(function(d, i) {
                    d.setAttribute('aria-selected', i === idx ? 'true' : 'false');
                });
                if (prevBtn) prevBtn.disabled = idx <= 0;
                if (nextBtn) nextBtn.disabled = idx >= pageCount() - 1;
                var hideNav = pageCount() < 2;
                if (prevBtn) prevBtn.hidden = hideNav;
                if (nextBtn) nextBtn.hidden = hideNav;
            }

            /* 5) الأسهم */
            if (prevBtn) prevBtn.addEventListener('click', function() {
                goTo(currentIndex() - 1);
            });
            if (nextBtn) nextBtn.addEventListener('click', function() {
                goTo(currentIndex() + 1);
            });

            /* 6) الكيبورد على التراك (في RTL السهم الشمال = التالي) */
            track.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    goTo(currentIndex() + 1);
                }
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    goTo(currentIndex() - 1);
                }
            });

            var ticking = false;
            track.addEventListener('scroll', function() {
                if (ticking) return;
                ticking = true;
                requestAnimationFrame(function() {
                    update();
                    ticking = false;
                });
            }, {
                passive: true
            });

            var resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(buildDots, 150);
            });

            buildDots();
        }

        function init() {
            document.querySelectorAll('.jw-testimonials').forEach(initSection);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }
    })();
</script>
