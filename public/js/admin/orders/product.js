import {calculateMoneyAfterSale, formatCurrency, renderLoading, renderToast} from "../../helper.js";
import { PRODUCT_ORDER } from "../../url.js";

const bodyContent = $('#body-content')
//Show all orders
const renderOrder = () => {

  return new Promise(resolve => {
    $.ajax({
      url: PRODUCT_ORDER.replace(':id', orderId),
      type: 'GET',
      contentType: false,
      beforeSend: function () {
        renderLoading('#body-content')
      },
      success: function (response) {
        if (!response.status) {
          renderToast({
            status: 'danger',
            title: 'Thất bại',
            text: response.message
          })
          return
        }
        const order = response.body;

        $('.user_name').html(order.user_name)
        $('.user_phone').html(order.user_phone)
        $('.user_address').html(order.user_address)
        $('.type').html(order.type)


        const products = order.order_products
        let totalAll = 0;

        const html = products.map((p, index) => {

          const totalNumber = calculateMoneyAfterSale(p.product_price, p.product_sale) * p.total
          totalAll += totalNumber

          return `
            <tr>
              <td>${index + 1}</td>
              <td>${p.product_name}</td>
              <td>${p.product_type}</td>
              <td>${formatCurrency(p.product_price)}</td>
              <td>${p.product_sale ? p.product_sale + '%' : '' }</td>
              <td>${p.total}</td>
              <td>${formatCurrency(totalNumber)}</td>
            </tr>
          `
        }).join('')

        $('.total').html(formatCurrency(totalAll))

        bodyContent.html(html)
        resolve()
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

function printContent() {
  const content = $('.card').html();

  $(document.body).html(content)
  print();
  location.reload()
}

const main = async() => {
  await renderOrder();
  $('.print-order').off('click').on('click', printContent)
}

await main()
