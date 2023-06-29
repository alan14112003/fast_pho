import { renderToast } from "../../helper.js";
import { BANKS } from "../../url.js";

$('#form-store').on('submit', function (e) {
  e.preventDefault()
  const formData = new FormData($(this)[0]);

  if ($('#qr_code').val().trim() == '' || $('#content').val().trim() == '') {
    renderToast({
      status: 'danger',
      title: 'Lỗi',
      text: 'Bạn phải nhập đầy đủ tất cả các trường'
    })

    return
  }

  $.ajax({
    url: BANKS,
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.status) {
        renderToast({
          title: 'Thành công',
          text: response.message,
        })
      }
      renderToast({
        title: 'Thất bại',
        text: response.message,
        status: 'danger',
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
})