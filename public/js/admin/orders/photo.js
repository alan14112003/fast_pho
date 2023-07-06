import { formatCurrency, renderLoading, renderToast } from "../../helper.js";
import { ICONS, PHOTO_ORDER, PHOTO_ORDER_BILL, STORAGE } from "../../url.js";

const bodyContent = $('#body-content')
//Show all orders
const renderOrder = () => {

  return new Promise(resolve => {
    $.ajax({
      url: PHOTO_ORDER.replace(':id', orderId),
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

        let total = 0
        const photos = order.order_photos
            
        const html = photos.map((p, index) => {
          
          const photoName = p.file ?? ''
          const download = `<img src="${ICONS}download.svg" width="20" />`
          total += p.price

          return `
            <tr>
              <td>${index + 1}</td>
              <td>${photoName.replace(`photos/${p.photo_id}/`, '')}</td>
              <td>${p.is_paper}</td>
              <td>${p.type}</td>
              <td>${p.face_number}</td>
              <td class="col-2">${p.is_cover}</td>
              <td>${p.total}</td>
              <td>${p.descriptions}</td>
              <td>${order.total ? '-' : formatCurrency(p.price)}</td>
              <td>
                ${
                  p.file ? 
                    `<a href="${STORAGE + p.file}" data-bs-toggle="tooltip" title="Tải về">
                      ${download}
                    </a>`
                  : ''
                }
              </td>
            </tr>
          `
        }).join('')

        bodyContent.html(html)

        $('.total').html(order.total ? formatCurrency(order.total) : formatCurrency(total))
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

const main = async() => {
  await renderOrder();
  $('.print-order').off('click').on('click', function () {
    location.replace(PHOTO_ORDER_BILL.replace(':id', orderId))
  })
}

await main()