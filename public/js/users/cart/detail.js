import { formatMoney } from '../../helper.js'
import { getCart } from '../header.js'

const cartBody = $('#cart-body-pro'), cartTotal_ = $('.order-summary-emphasis:first'), cartTotal = $('.payment-due-price')

const renderEleCart = (id, image, name, quantity, type, price, sale) => {
    cartBody.append(`
    <tr class="product" data-id="${id}">
        <td class="product-image">
            <div class="product-thumbnail">
                <div class="product-thumbnail-wrapper">
                    <img class="product-thumbnail-image" alt="${name}"
                        src="${image}">
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

    removeCartBtns = $('.remove-pro')
    setOnClickRemoveCartBtn()
    btnDown = $('.btn-down'), btnUp = $('.btn-up')
    setOnClickQuantityBtn()
}

const main = async () => {
    const result = await getCart()

    await renderCart(result)
}

main()