import { CART_HISTORY_PHOTO, CART_HISTORY_PRODUCT, ICONS, PHOTOS_ORDERS_AUTH, PRODUCT_ORDERS_AUTH } from "../../url.js"
import { formatDateTime, renderBanks, renderLoading, renderPagination, renderToast } from "../../helper.js"


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
        const viewOrderUrl = (typePage === 'PRODUCT') ? CART_HISTORY_PRODUCT : CART_HISTORY_PHOTO

        orders.forEach(o => {
            const id = `<th scope="row">${o.id}</th>`

            const createdAt = formatDateTime(new Date(o.created_at))

            bodyContent.append(`
              <tr>
                  ${id}
                  <td>${o.item_count}</td>
                  <td>${o.type}</td>
                  <td>${createdAt}</td>
                  <td>${o.status}</td>
                  <td>
                    <a href="${viewOrderUrl.replace(':id', o.id)}" data-bs-toggle="tooltip" title="Xem chi tiết">
                      <img src="${ICONS}eye.svg" />
                    </a>
                  </td>
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
  renderBanks('.banks')
  await renderOrders('PRODUCT')
  await renderOrders('PHOTOS')
}

main()