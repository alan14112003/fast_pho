let mainGif = $('.main-gif');
if (mainGif.css('display') != 'none') {
    setTimeout(() => {
        mainGif.css("display", "none");
    }, 2000)
}

//Create Swiper
var swiper = new Swiper('.swiper', {
    direction: 'vertical',
    sliderPerView: 1,
    spaceBetween: 0,
    autoHeight: true,
    mousewheel: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    }
})

//
swiper.on('slideChange', function (e) {
    if (e.activeIndex) {
        $(".header-wrap.index").addClass('headroom--unpinned')
    } else {
        $(".header-wrap.index").removeClass('headroom--unpinned')
    }
});