import { formatCurrency, renderLoading, renderToast } from "../../helper.js";
import { ICONS, PHOTO_ORDER, PHOTO_ORDER_BILL, PHOTO_ORDER_VIEW, STORAGE } from "../../url.js";

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


        const photos = order.order_photos
            
        let total = 0
        const html = photos.map((p, index) => {
          
          const photoName = p.file ?? ''
          const download = `<img src="${ICONS}download.svg" width="20" />`
          total += p.price

          return `
            <tr>
              <td>${index + 1}</td>
              <td>${photoName.replace(`photos/${p.photo_id}/`, '')}</td>
              <td>${p.type}</td>
              <td>${p.face_number}</td>
              <td>${p.is_cover == 1 ? 'Có' : 'Không' }</td>
              <td>${p.total}</td>
              <td>${formatCurrency(p.price)}</td>
            </tr>
          `
        }).join('')

        $('.total').html(formatCurrency(total))
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
  location.replace(PHOTO_ORDER_VIEW.replace(':id', orderId))
}

const main = async() => {
  await renderOrder();
  printContent()
}

await main()