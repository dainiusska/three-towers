document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".third-swiper-container", {
        slidesPerView: 3.5,
        spaceBetween: 20,
        loop: false,
        navigation: {
            nextEl: ".third-section .slider-arrow--next",
            prevEl: ".third-section .slider-arrow--prev",
        },
        breakpoints: {
            1200: {
                slidesPerView: 3.5,
            },
            0: {
                slidesPerView: 1,
            },
        },
    });
});