import { PHOTOS_ORDERS, PHOTOS_ORDERS_AUTH, PRODUCT_ORDERS, PRODUCT_ORDERS_AUTH } from "../../url.js"
import { formatDateTime, renderLoading, renderPagination, renderToast } from "../../helper.js"


const page = new URLSearchParams(window.location.search).get('page') ?? 1;
//Show all orders
const renderOrders = (typePage) => {
  const bodyContent = (typePage === 'PRODUCT') ? $('#body-content-product') : $('#body-content-photo')
  let url = (typePage === 'PRODUCT') ? PRODUCT_ORDERS_AUTH : PHOTOS_ORDERS_AUTH

  url += `?page=${page}`

  return new Promise(resolve => {
    $.ajax({
      url: url,
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
        const orders = response.body.data;
        bodyContent.html('');
        orders.forEach(o => {
            const id = `<th class="col-1" scope="row">${o.id}</th>`

            const createdAt = formatDateTime(new Date(o.created_at))

            bodyContent.append(`
              <tr>
                  ${id}
                  <td class="col-1">${o.item_count}</td>
                  <td class="col-1">${o.type}</td>
                  <td class="col-2">${createdAt}</td>
                  <td class="col-2">${o.status}</td>
              </tr>
            `)
        })

        renderPagination(response.body, renderOrders)

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

const main = async () => {
  await renderOrders('PRODUCT')
  await renderOrders('PHOTOS')
}

main()