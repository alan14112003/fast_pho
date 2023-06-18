import { STORAGE, PRODUCT_WITH_SUBS } from "../../url.js";
import { addToCart } from "../header.js";

const arrHref = window.location.href.split('/')
const bigImg = $('.big_img img')
const swiperContainer = $('.swiper-container'), colorsContainer = $('.colors.container')
let swiperSlides, colorBtns;
let curSlide, curColor;

const setOnClickSlides = () => {
    swiperSlides.off('click').on('click', function () {
        if (!this.isSameNode(curSlide)) {
            bigImg.attr('src', $(this).find('img').attr('src'))

            $(curSlide).toggleClass('cur')
            curSlide = this;
        } else {
            curSlide = null
        }
        $(this).addClass('cur')
    })
}

const setOnClickColor = () => {
    colorBtns.off('click').on('click', function () {
        if (!this.isSameNode(curColor)) {
            bigImg.attr('src', $(this).find('img').attr('src'))

            $(curColor).toggleClass('cur')
            curColor = this;
        } else {
            curColor = null
        }
        $(this).toggleClass('cur')
    })
}

const appendToSwiperCont = (item, isCur) => {
    swiperContainer.append(`
    <div class="swiper-wrapper">
        <div class="swiper-slide js-m imgwidth animate">
            <img src="${STORAGE + item.image}"
                alt="">
        </div>
    </div>
    `)
}

const appendToColors = (item) => {
    colorsContainer.append(`
    <button class="btn">${item.type}</button>
    `)
}

const getProduct = () => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: PRODUCT_WITH_SUBS.replace(':slug', arrHref[arrHref.length - 1]),
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    return resolve(response.body)
                }

                return reject(response.message)
            },
            error: function (response) {
                renderToast({
                    status: 'danger',
                    title: 'Lỗi',
                    text: response.responseJSON.message
                })
            }
        })
    })
}

const showProduct = async () => {
    const result = await getProduct()

    bigImg.attr('src', STORAGE + result.image);
    appendToSwiperCont(result)

    result.children.forEach(item => {
        appendToSwiperCont(item)
        appendToColors(item)
    })

    $('#p_name').html(result.name)
    $('#category-name').html(result.category_name)

    $('#add_cart').off('click').on('click', function () {
        let quantity = $('.number-input input.quantity').val()

        addToCart({
            slug: result.slug,
            image: result.image,
            name: result.name,
            quantity,
            type: $('.con_item .btn.cur').html(),
            price: result.price
        })
    })
}

const main = async () => {
    await showProduct()

    swiperSlides = $('.swiper-slide')
    curSlide = document.querySelector('.swiper-slide')
    $(curSlide).addClass('cur')
    setOnClickSlides()

    colorBtns = $('.colors.container .btn')
    setOnClickColor()
}

main()