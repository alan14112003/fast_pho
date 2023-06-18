import { formatMoney, moneyToNumber } from "../helper.js";
import { CATEGORIES, DOMAIN, ICONS, IMAGES, PRODUCT_VIEW, STORAGE, _PRODUCTS } from "../url.js";

const proSubBox = $('#prosub-box');


$.ajax({
    url: CATEGORIES,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        if (response.status) {
            response.body.forEach(element => {
                const nodeCategories = element.children

                let thirdBox = `<div class="third_box">`;

                nodeCategories.forEach(node => {
                    thirdBox += `
                    <a href="${_PRODUCTS}?c=${node.slug}_${node.index}">${node.name}</a>
                    `
                })

                thirdBox += "</div>"

                proSubBox.append(`
                    <div class="prosub_item">
                        <a href="${_PRODUCTS}?c=${element.slug}_${element.index}"
                            class="second_title antart_b">
                            ${element.name}</a>
                        ${thirdBox}
                    </div>
                `)
            });
        }
    },
    error: function (response) {
        const erorrs = Object.values(response.responseJSON.errors);
        showError($('#errors-category'), [erorrs]);
    }
});

//Header Account Action
const headerActionAccount = $(".header-action.header-action_account")

headerActionAccount.off('click').on('click', function () {
    $(document).off('click').on('click', function (e) {
        if (!$(e.target).closest(".header-action_dropdown").length && !$(e.target).closest(headerActionAccount).length) {
            headerActionAccount.removeClass("show-action")
            $(document).off('click');
        } else {
            headerActionAccount.addClass("show-action")
            headerActionCart.removeClass("show-action")
        }
    })
})

$('#form-search').off('submit').on('submit', function (e) {
    e.preventDefault()

    $(this).attr('action', _PRODUCTS)
    e.currentTarget.submit()
})

//Header Cart Action
const headerActionCart = $(".header-action.header-action_cart")

headerActionCart.off('click').on('click', function () {
    $(document).off('click').on('click', function (e) {
        if (!$(e.target).closest(".header-action_dropdown").length && !$(e.target).closest(headerActionCart).length) {
            headerActionCart.removeClass("show-action")
            $(document).off('click');
        } else {
            headerActionCart.addClass("show-action")
            headerActionAccount.removeClass("show-action")
        }
    })
})

let cartBody = $('#cart-body')
let cartTotal = $('#total-view-cart')
let removeCartBtns;

const renderEleCart = (linkToProduct, slug, image, name, quantity, type, price) => {
    cartBody.append(`
    <tr class="item_2" data-slug="${slug}">
        <td class="img"><a
                href="${linkToProduct}"
                title="${linkToProduct}"><img
                    src="${STORAGE + image}"
                    alt="${linkToProduct}"></a>
        </td>
        <td>
            <p class="pro-title">
                <a class="pro-title-view"
                    href="${linkToProduct}"
                    title="${linkToProduct}">${name}</a>
                <span class="variant"></span>
            </p>
            <div class="mini-cart_quantity">
                <div class="pro-quantity-view">
                    <span class="value qty-value">${quantity}</span>
                    <span class="value type-value">${type}</span>
                </div>
                <div class="pro-price-view">${formatMoney(price)}₫</div>
            </div>
            <div class="remove_link remove-cart" id="remove-cart"><a
                    href="javascript:void(0);">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve"> <g><path d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z"></path></g> </svg>
                </a>
            </div>
        </td>
    </tr>
    `)
}

const showCart = () => {

}

const deleteCart = (slug, price, quantity) => {
    cartBody.find(`.item_2[data-slug=${slug}]`).remove()

    const preTotal = moneyToNumber(cartTotal.html())
    cartTotal.html(formatMoney(preTotal - price * quantity) + '₫')
}

const setOnClickRemoveCartBtn = () => {
    removeCartBtns.off('click').on('click', function () {
        const slug = $(this).parent().parent().attr('data-slug');
        const price = moneyToNumber($(this).parent().find('.pro-price-view').html())
        const quantity = parseInt($('.qty-value').html())

        deleteCart(slug, price, quantity);
    })
}

export const addToCart = ({ slug, image, name, quantity, type, price }) => {
    const preTotal = moneyToNumber(cartTotal.html())
    if (cartBody.find('.item_2').attr('data-slug') === slug) {
        const ele = cartBody.find(`.item_2[data-slug=${slug}] .qty-value`)
        ele.html(parseInt(ele.html()) + parseInt(quantity))
    } else {
        const linkToProduct = PRODUCT_VIEW.replace(':slug', slug)

        renderEleCart(linkToProduct, slug, image, name, quantity, type, price)
    }

    cartTotal.html(formatMoney(preTotal + price * quantity) + '₫')

    removeCartBtns = $('#remove-cart')
    setOnClickRemoveCartBtn()

    headerActionCart.addClass('show-action')
}

