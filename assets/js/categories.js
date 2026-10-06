// "use strict";

// /*
//  * عدّل بيانات التصنيفات والمنتجات من هنا.
//  * الصور والأسماء الحالية بيانات عرض مبدئية؛ استبدلها بمنتجاتك الفعلية.
//  * يمكنك تغيير صورة كل منتج بصورة مستقلة من خاصية image.
//  */
// const JC_CATEGORIES = [
//   {
//     slug: "business-cards",
//     name: "بزنس كارد",
//     image: "assets/images/cards.jpg",
//     description: "بطاقات أعمال بتفاصيل تعكس هوية علامتك.",
//     products: [
//       { name: "بطاقة أعمال مطفية", image: "assets/images/cards.jpg" },
//       { name: "بطاقة أعمال بطباعة ذهبية", image: "assets/images/cards.jpg" },
//       { name: "بطاقة أعمال بطباعة وجهين", image: "assets/images/cards.jpg" },
//       { name: "بطاقة أعمال بتشطيب خاص", image: "assets/images/cards.jpg" },
//     ],
//   },
//   {
//     slug: "acrylic",
//     name: "إكريليك",
//     image: "assets/images/acrylic.jpg",
//     description: "حلول الإكريليك للوحات الأسماء والعرض والديكور.",
//     products: [
//       { name: "لوحة اسم إكريليك", image: "assets/images/acrylic.jpg" },
//       { name: "ستاند عرض إكريليك", image: "assets/images/acrylic.jpg" },
//       { name: "لوحة مكتبية إكريليك", image: "assets/images/acrylic.jpg" },
//       { name: "لوحة إكريليك مخصصة", image: "assets/images/acrylic.jpg" },
//     ],
//   },
//   {
//     slug: "rollup-popup",
//     name: "رول أب وبوب أب",
//     image: "assets/images/rollup.jpg",
//     description: "حلول عرض لمعارضك وفعالياتك وحضورك التجاري.",
//     products: [
//       { name: "رول أب للفعاليات", image: "assets/images/rollup.jpg" },
//       { name: "بوب أب للمعارض", image: "assets/images/rollup.jpg" },
//       { name: "ستاند دعائي", image: "assets/images/rollup.jpg" },
//       { name: "طقم عرض للمعارض", image: "assets/images/rollup.jpg" },
//     ],
//   },
//   {
//     slug: "bags-boxes",
//     name: "علب وأكياس",
//     image: "assets/images/packaging.jpg",
//     description: "تغليف مطبوع يحمل هوية علامتك ويليق بمنتجك.",
//     products: [
//       { name: "كيس ورقي مطبوع", image: "assets/images/packaging.jpg" },
//       { name: "علبة منتج مطبوعة", image: "assets/images/packaging.jpg" },
//       { name: "علبة هدايا", image: "assets/images/packaging.jpg" },
//       { name: "مجموعة تغليف مخصصة", image: "assets/images/packaging.jpg" },
//     ],
//   },
//   {
//     slug: "brochures-catalogs",
//     name: "بروشورات وكتالوجات",
//     image: "assets/images/brochures.jpg",
//     description: "مطبوعات تعريفية تعرض خدماتك ومنتجاتك بوضوح.",
//     products: [
//       { name: "بروشور تعريفي", image: "assets/images/brochures.jpg" },
//       { name: "كتالوج منتجات", image: "assets/images/brochures.jpg" },
//       { name: "فولدر شركة", image: "assets/images/brochures.jpg" },
//       { name: "ملف تعريفي مطبوع", image: "assets/images/brochures.jpg" },
//     ],
//   },
//   {
//     slug: "signage",
//     name: "لوحات وبنرات",
//     image: "assets/images/signage.jpg",
//     description: "طباعة ولوحات دعائية لإبراز حضور علامتك.",
//     products: [
//       { name: "لوحة واجهة", image: "assets/images/signage.jpg" },
//       { name: "لوحة حروف مضيئة", image: "assets/images/signage.jpg" },
//       { name: "لوحة إرشادية", image: "assets/images/signage.jpg" },
//       { name: "لوحة دعائية مخصصة", image: "assets/images/signage.jpg" },
//     ],
//   },
// ];

// // رقم واتساب: رمز الدولة + الرقم، بدون + أو مسافات.
// const JC_WHATSAPP = "966532446558";

// function jcCreateCategoryCard(category, headingTag) {
//   const link = document.createElement("a");
//   link.className = "jc-category-card";
//   link.href = `category.html?category=${encodeURIComponent(category.slug)}`;

//   const circle = document.createElement("div");
//   circle.className = "jc-category-circle";

//   const image = document.createElement("img");
//   image.src = category.image;
//   image.alt = "";
//   image.width = 512;
//   image.height = 512;
//   image.loading = "lazy";
//   circle.append(image);

//   const heading = document.createElement(headingTag);
//   heading.textContent = category.name;
//   link.append(circle, heading);
//   return link;
// }

// // سيكشن الصفحة الرئيسية: خمسة تصنيفات فقط.
// const featuredGrid = document.querySelector("[data-jc-featured]");
// if (featuredGrid) {
//   JC_CATEGORIES.slice(0, 5).forEach((category) => {
//     featuredGrid.append(jcCreateCategoryCard(category, "h3"));
//   });
// }

// // صفحة جميع التصنيفات: خمسة في الصف، مهما زاد العدد.
// const allCategoriesGrid = document.querySelector("[data-jc-all-categories]");
// if (allCategoriesGrid) {
//   JC_CATEGORIES.forEach((category) => {
//     allCategoriesGrid.append(jcCreateCategoryCard(category, "h2"));
//   });
// }

// const lightbox = document.querySelector("#jc-lightbox");
// let lastProductButton = null;

// function jcOpenProduct(product, trigger) {
//   if (!lightbox) return;
//   lastProductButton = trigger;
//   lightbox.querySelector("[data-jc-modal-title]").textContent = product.name;
//   const image = lightbox.querySelector("[data-jc-modal-image]");
//   image.src = product.image;
//   image.alt = product.name;
//   lightbox.showModal();
// }

// function jcCreateProductCard(product, category) {
//   const article = document.createElement("article");
//   article.className = "jc-product-card";

//   const button = document.createElement("button");
//   button.type = "button";
//   button.className = "jc-product-image";
//   button.setAttribute("aria-label", `تكبير صورة ${product.name}`);
//   button.addEventListener("click", () => jcOpenProduct(product, button));

//   const image = document.createElement("img");
//   image.src = product.image;
//   image.alt = product.name;
//   image.width = 512;
//   image.height = 512;
//   image.loading = "lazy";

//   const zoom = document.createElement("span");
//   zoom.className = "jc-zoom-icon";
//   zoom.textContent = "+";
//   zoom.setAttribute("aria-hidden", "true");
//   button.append(image, zoom);

//   const content = document.createElement("div");
//   content.className = "jc-product-content";
//   const title = document.createElement("h3");
//   title.textContent = product.name;
//   const description = document.createElement("p");
//   description.textContent = "المقاس والكمية والتشطيب حسب طلبك.";

//   const quote = document.createElement("a");
//   quote.className = "jc-button";
//   quote.textContent = "اطلب عرض سعر";
//   quote.target = "_blank";
//   quote.rel = "noopener";
//   const message = `مرحبًا جواهر الشام، أريد عرض سعر لـ ${product.name} من تصنيف ${category.name}.`;
//   quote.href = `https://wa.me/${JC_WHATSAPP}?text=${encodeURIComponent(message)}`;

//   content.append(title, description, quote);
//   article.append(button, content);
//   return article;
// }

// const productsGrid = document.querySelector("[data-jc-products]");
// if (productsGrid) {
//   const params = new URLSearchParams(window.location.search);
//   const slug = params.get("category") || JC_CATEGORIES[0].slug;
//   const category = JC_CATEGORIES.find((item) => item.slug === slug);

//   if (category) {
//     document.title = `${category.name} | جواهر الشام`;
//     document.querySelector("[data-jc-category-title]").textContent =
//       category.name;
//     document.querySelector("[data-jc-category-breadcrumb]").textContent =
//       category.name;
//     document.querySelector("[data-jc-category-description]").textContent =
//       category.description;
//     document.querySelector("[data-jc-product-count]").textContent =
//       `${category.products.length} منتجات`;
//     category.products.forEach((product) => {
//       productsGrid.append(jcCreateProductCard(product, category));
//     });

//     if (category.products.length === 0) {
//       document.querySelector("[data-jc-empty]").hidden = false;
//       document.querySelector("[data-jc-empty-message]").textContent =
//         "لا توجد منتجات في هذا التصنيف حاليًا.";
//     }
//   } else {
//     document.title = "التصنيف غير موجود | جواهر الشام";
//     document.querySelector("[data-jc-category-title]").textContent =
//       "التصنيف غير موجود";
//     document.querySelector("[data-jc-category-breadcrumb]").textContent =
//       "تصنيف غير موجود";
//     document.querySelector("[data-jc-category-description]").textContent =
//       "اختر أحد التصنيفات المتاحة للمتابعة.";
//     document.querySelector("[data-jc-products-heading]").hidden = true;
//     document.querySelector("[data-jc-empty]").hidden = false;
//   }
// }

// if (lightbox) {
//   lightbox
//     .querySelector("[data-jc-close]")
//     .addEventListener("click", () => lightbox.close());
//   lightbox.addEventListener("click", (event) => {
//     const bounds = lightbox.getBoundingClientRect();
//     const outside =
//       event.clientX < bounds.left ||
//       event.clientX > bounds.right ||
//       event.clientY < bounds.top ||
//       event.clientY > bounds.bottom;
//     if (event.target === lightbox && outside) lightbox.close();
//   });
//   lightbox.addEventListener("close", () => lastProductButton?.focus());
// }
