import { formatMoney, moneyToNumber } from "../../helper.js";
import { CART_REMOVE, CART_UPDATE, PRODUCT_VIEW } from "../../url.js";
import { getCart } from "../header.js";

let removeCartBtns, btnDown, btnUp;
const cartBody = $('#cart-body-main'), cartTotal = $('.total-price')

const updateQuantity = (id, price, quantity, parent) => {
    const data = {
        id: id,
        quantity: quantity
    }

    $.ajax({
        url: CART_UPDATE,
        type: 'POST',
        data: data,
        success: function (response) {
            if (response.status) {
                const quantityTotal = $(parent).find('input.quantity').val()
                $(parent).find('.line-item-total').html(formatMoney(price * quantityTotal) + '₫')

                const preTotal = moneyToNumber(cartTotal.html())
                cartTotal.html(formatMoney(preTotal + (price * quantity)) + '₫')
            }
        },
        error: function (response) {
            const erorrs = Object.values(response.responseJSON.errors);
            showError($('#errors-category'), [erorrs]);
        }
    });
}

const deleteCart = (id, price, parent) => {
    $.ajax({
        url: CART_REMOVE.replace(':id', id),
        type: 'DELETE',
        dataType: 'json',
        success: function (response) {
            if (response.status) {
                const quantityTotal = $(parent).find('input.quantity').val()

                const preTotal = moneyToNumber(cartTotal.html())
                cartTotal.html(formatMoney(preTotal - (price * quantityTotal)) + '₫')

                parent.remove()
            }
        },
        error: function (response) {
            const erorrs = Object.values(response.responseJSON.errors);
            showError($('#errors-category'), [erorrs]);
        }
    });
}

const setOnClickRemoveCartBtn = () => {
    removeCartBtns.off('click').on('click', function () {
        if (confirm('Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
            const parent = $(this).parent().parent();
            const id = parent.attr('data-id');
            const price = moneyToNumber(parent.find('.pri').html())

            deleteCart(id, price, parent);
        }
    })
}

const setOnClickQuantityBtn = () => {
    btnDown.off('click').on('click', function () {
        if (this.parentNode.querySelector('input[type=number]').value > 1) {
            const parent = $(this).parent().parent().parent();
            const id = parent.attr('data-id')
            const price = moneyToNumber(parent.find('.pri').html())
            this.parentNode.querySelector('input[type=number]').stepDown()

            updateQuantity(id, price, -1, parent)
        }
    })
    btnUp.off('click').on('click', function () {
        const parent = $(this).parent().parent().parent();
        const id = parent.attr('data-id')
        const price = moneyToNumber(parent.find('.pri').html())
        this.parentNode.querySelector('input[type=number]').stepUp()

        updateQuantity(id, price, 1, parent)
    })
}

const renderEleCart = (linkToProduct, id, image, name, quantity, type, price, sale) => {
    cartBody.append(`
    <tr class="line-item-container" data-id="${id}">
        <td class="image">
            <div class="product_image">
                <a
                    href="${linkToProduct}">
                    <img src="${image}"
                        alt="${name}">
                </a>

            </div>
        </td>
        <td class="item">
            <h3><a href="${linkToProduct}">${name}</a></h3>
            <p>
                <span class="pri">${formatMoney(price * (100 - sale) / 100)}₫</span>
                <del>(${formatMoney(price)}₫)</del>
                <span class="value type-value">${type}</span>                       
            </p>
            <div class="number-input">
                <button class="btn-down"></button>
                <input class="quantity" min="1" name="quantity"
                    value="${quantity}" type="number" disabled>
                <button
                    class="plus btn-up"></button>
            </div>
            <p class="price">
                <span class="text">Thành tiền:</span>
                <span class="line-item-total">${formatMoney(price * (100 - sale) / 100 * quantity)}₫</span>
            </p>

        </td>
        <td class="remove">
            <a class="cart remove-pro">
                <img
                    src="//theme.hstatic.net/200000709407/1001045373/14/ic_close.png?v=76"></a>
        </td>
    </tr>
    `)
}

const renderCart = async (result) => {
    let preTotal = 0;
    result.forEach(p => {
        const linkToProduct = PRODUCT_VIEW.replace(':slug', p.slug)

        renderEleCart(
            linkToProduct,
            p.id,
            p.image,
            p.name,
            p.quantity,
            p.type,
            p.price,
            p.sale
        )
        preTotal += p.price * (100 - p.sale) / 100 * p.quantity;
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