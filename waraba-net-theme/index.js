
// スィーパー設定
const swiperSlider = new Swiper('#swiper-slider', {
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

const swiperMainPost = new Swiper('#swiper-mainPost', {
    speed: 600,
    thumbs: {
        swiper: {
            el: '#swiper-postMenu',
            slidesPerView: 4
        }
    }
});
