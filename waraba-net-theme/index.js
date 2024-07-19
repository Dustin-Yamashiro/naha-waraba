
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


// 画面スクロールを制御する関数
const scrollStop = (status) =>
{
    const body = document.getElementsByTagName('body')[0];
    body.style.overflow = status ? 'hidden' : '';
}

// サイドメニューの表示を管理する関数
const diplaySlideMenu = () =>
{
    const sideMenuClassList = document.getElementById('slideMenu').classList;
    const burgerButton = document.getElementById('burgerButton').classList;
    const blackFullScreen = document.getElementById('blackFullScreen').classList;

    if (!sideMenuClassList.contains('p-slideMenu--active')) {
        sideMenuClassList.add('p-slideMenu--active');
        burgerButton.add('p-header__burger--active');
        blackFullScreen.add('c-blackFullScreen--active');
        scrollStop(true);
        return;
    }

    sideMenuClassList.remove('p-slideMenu--active');
    burgerButton.remove('p-header__burger--active');
    blackFullScreen.remove('c-blackFullScreen--active');
    scrollStop(false);
}
document.getElementById('burgerButton').addEventListener('click', diplaySlideMenu);
