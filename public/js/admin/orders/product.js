import { renderLoading, renderPagination, renderToast } from "../../helper.js";
import { CHANGE_STATUS_ORDER, ICONS, PRODUCT_ORDERS } from "../../url.js";

const bodyContent = $('#body-content')
//Show all orders
const renderOrders = () => {
  const page = new URLSearchParams(window.location.search).get('page');

  return new Promise(resolve => {
    $.ajax({
      url: PRODUCT_ORDERS + `?page=${page}`,
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
            
            const info = `
                <strong>${o.user_name}</strong>
                <p>
                  ${o.user_phone} <br>
                  ${o.user_address}
                </p>
            `
            const createdAt = new Date(o.created_at)

            const status = `
              <select class="form-select select-status" data-order-id='${o.id}'>
                ${
                  arrayViewStatusOrder.map(status => `
                    <option value="${status.value}" ${o.status === status.value ? 'selected' : ''}>
                      ${status.name}
                    </option>
                  `)
                }
              </select>
            `

            bodyContent.append(`
              <tr>
                  ${id}
                  <td class="col-3">${info}</td>
                  <td class="col-2">${o.delivery_time}</td>
                  <td class="col-1">${o.product_count}</td>
                  <td class="col-1">${o.type}</td>
                  <td class="col-2">${createdAt}</td>
                  <td class="col-2">${status}</td>
                  <td class="col-1">
                    <a href=""  data-bs-toggle="tooltip" title="Xem chi tiết">
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

const setchangeSelectStatus = () => {
  $('.select-status').off('change').on('change', function () {
    onChangeStatusOrder(this)
  })
}

const onChangeStatusOrder = (_this) => {
  const data = new FormData()
  data.append('_method', 'PUT')
  data.append('status', $(_this).val())

  $.ajax({
    url: CHANGE_STATUS_ORDER.replace(':id', $(_this).data('order-id')),
    type: 'POST',
    processData: false,
    contentType: false,
    data: data,
    success: function (response) {
      if (!response.status) {
        renderToast({
          status: 'danger',
          title: 'Thất bại',
          text: response.message
        })
        return
      }

      renderToast({
        title: 'Thành công',
        text: response.message
      })
    },
    error: function (response) {
      renderToast({
        status: 'danger',
        title: 'Lỗi',
        text: response.responseJSON.message
      })
    }
  })
}

const main = async() => {
  await renderOrders();
  setchangeSelectStatus()
}

await main()