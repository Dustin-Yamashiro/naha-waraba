
// スィーパー設定
const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    loop: true,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        disableOnInteraction: false,
        delay: 7000
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
