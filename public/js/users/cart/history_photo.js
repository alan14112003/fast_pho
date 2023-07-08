import { formatCurrency, renderBanks, renderLoading, renderToast } from "../../helper.js";
import { ICONS, PHOTO_ORDER, PHOTO_ORDER_VIEW } from "../../url.js";

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
            
        const html = photos.map((p, index) => {
          
          const photoName = p.file ?? ''

          return `
            <tr>
              <td>${index + 1}</td>
              <td>${photoName.replace(`photos/${p.photo_id}/`, '')}</td>
              <td>${p.is_paper}</td>
              <td>${p.type}</td>
              <td>${p.face_number}</td>
              <td class="col-2">${p.is_cover}</td>
              <td>${p.total}</td>
              <td>${formatCurrency(p.photo_price)}</td>
            </tr>
          `
        }).join('')

        $('.total').html(formatCurrency(order.total))
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

const main = async() => {
  await renderBanks('.banks')

  const bankBox = $('.banks .bank_box')
  bankBox.removeClass()
  bankBox.addClass('col-12  bank_box')
  await renderOrder();
}

await main()