// [+] Slider Options
const sliderOption = {
    slidesPerView:1,
    autoplay:{
        delay: 6000,
        disableOnInteraction: false
    },
    pagination:{
        el: '.swiper-pagination',
        bulletActiveClass:"slider__pagination--active",
        clickable:true,
    },
}
// [+] Defining Variables
const slider = new Swiper(".swiper", sliderOption);
