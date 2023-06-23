import { formatMoney, renderToast } from '../../helper.js'
import {PRODUCT_ORDER_CREATE, STORAGE} from '../../url.js';
import { HN_TREE } from '../../url.js'
import { getCart } from '../header.js'

//Get categories and show through select
let addressTree = [];
const cartBody = $('#cart-body-pro'), cartTotal_ = $('.order-summary-emphasis:first'), cartTotal = $('.payment-due-price')
const mainContentDetails = $('.main-content#details'), mainContentPayment = $('.main-content#payment')

const renderEleCart = (id, image, name, quantity, type, price, sale) => {
    cartBody.append(`
    <tr class="product" data-id="${id}">
        <td class="product-image">
            <div class="product-thumbnail">
                <div class="product-thumbnail-wrapper">
                    <img class="product-thumbnail-image" alt="${name}"
                        src="${STORAGE + image}">
                </div>
                <span class="product-thumbnail-quantity" aria-hidden="true">${quantity}</span>
            </div>
        </td>
        <td class="product-description">
            <span class="product-description-name order-summary-emphasis">${name}</span>
            <span class="value type-value">${type}</span>
        </td>
        <td class="product-price">
            <span class="order-summary-emphasis">${formatMoney(price * (100 - sale) / 100 * quantity)}₫</span>
        </td>
    </tr>
    `)
}

const renderCart = async (result) => {
    let preTotal = 0;
    result.forEach(p => {
        renderEleCart(
            p.id,
            p.image,
            p.name,
            p.quantity,
            p.type,
            p.price,
            p.sale
        )
        preTotal += p.price * (100 - p.sale) / 100 * p.quantity;
        cartTotal_.html(formatMoney(preTotal) + '₫');
        cartTotal.html(formatMoney(preTotal) + '₫');
    });
}

const renderAddressTree = async (nodeCode, leafCode) => {
    //If result has many province -> use foreach
    $('#customer_shipping_province').html(`<option value='${addressTree.code}' selected>${addressTree.name}</option>`)

    $('#customer_shipping_district').html(`<option value="null">Chọn quận / huyện
            </option>`)
    Object.values(addressTree.children).forEach(node => {
        $('#customer_shipping_district').append(`
            <option value='${node.code}' ${node.code === nodeCode ? 'selected' : ''}>${node.name_with_type}</option>
        `)


        if (node.code === nodeCode) {
            if (leafCode === undefined) {
                leafCode = node.children[0]?.code
            }

            $('#customer_shipping_ward').html(`<option value="null">Chọn phường / xã
            </option>`)
            Object.values(node.children).forEach(leaf => {
                $('#customer_shipping_ward').append(`
                    <option value='${leaf.code}' ${leaf.code === leafCode ? 'selected' : ''}>${leaf.name_with_type}</option>
                `)
            })
        }
    })
}

const getAddressTree = () => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: HN_TREE,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                return resolve(response)
            },
            error: function (response) {
            }
        });
    })
}

$('#checkout_complete').off('submit').on('submit', function (e) {
    e.preventDefault()

    let pros = []
    const products = $('#cart-body-pro').find('.product');
    products.each((i, e) => {
        const quantity = parseInt($(e).find('.product-thumbnail-quantity').html())

        pros.push({ id: $(e).attr('data-id'), quantity: quantity });
    })

    const address = $('#address').val()
    const ward = $('#customer_shipping_ward').val()
    const district = $('#customer_shipping_district').val()
    const province = $('#customer_shipping_province').val()

    if (address == '' || ward == 'null' || district == 'null' || province == 'null') {
        renderToast({
            status: 'danger',
            title: 'Thất bại',
            text: 'Bạn phải điền đầy đủ địa chỉ',
        })
        return
    }

    const fullAddress =
        `${address}, ${$(`#customer_shipping_ward option[value="${ward}"]`).html()}, ${$(`#customer_shipping_district option[value="${district}"]`).html()}, ${$(`#customer_shipping_province option[value="${province}"]`).html()}`

    const data = new FormData()
    data.append('user_name', $('#full_name').val())
    data.append('user_phone', $('#phone').val())
    data.append('user_address', address)
    data.append('user_ward', ward)
    data.append('user_district', district)
    data.append('user_province', province)
    data.append('products', JSON.stringify(pros))
    data.append('payment', $('input[name="payment_method_id"]:checked').val())
    data.append('full_address', fullAddress)

    $.ajax({
        url: PRODUCT_ORDER_CREATE,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                renderToast({
                    title: 'Thanh toán thành công',
                    text: response.message,
                })
            }
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

const setOnChangeAddress = () => {
    $('#customer_shipping_district').off('change').on('change', function (e) {
        console.log(this.value);
        renderAddressTree(this.value)
    })
}


const main = async () => {
    const result = await getCart()
    await renderCart(result)

    addressTree = await getAddressTree();
    await renderAddressTree()
    setOnChangeAddress()

    $('#btn-content-detail').off('click').on('click', function () {
        mainContentDetails.addClass('hidden')
        mainContentPayment.removeClass('hidden')
        $('#btn-payment').parent().addClass('breadcrumb-item-current')
        $('#btn-details').parent().removeClass('breadcrumb-item-current')
    })

    $('#btn-details').off('click').on('click', function () {
        mainContentDetails.removeClass('hidden')
        mainContentPayment.addClass('hidden')
        $('#btn-payment').parent().removeClass('breadcrumb-item-current')
        $(this).parent().addClass('breadcrumb-item-current')
    })

    $('#btn-payment').off('click').on('click', function () {
        mainContentDetails.addClass('hidden')
        mainContentPayment.removeClass('hidden')
        $('#btn-details').parent().removeClass('breadcrumb-item-current')
        $(this).parent().addClass('breadcrumb-item-current')
    })
}

main()
