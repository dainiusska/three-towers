document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".fourth-swiper-container", {
        slidesPerView: 2.1,
        spaceBetween: 20,
        loop: false,
        navigation: {
            nextEl: ".fourth-section .slider-arrow--next",
            prevEl: ".fourth-section .slider-arrow--prev",
        },
        breakpoints: {
            1200: {
                slidesPerView: 2,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });
});