import { renderToast } from "../../helper.js";
import { BANK, STORAGE } from "../../url.js";

$('#form-update').on('submit', function (e) {
  e.preventDefault()
  const formData = new FormData($(this)[0]);
  formData.append('_method', 'PUT')

  if ($('#content').val().trim() == '') {
    renderToast({
      status: 'danger',
      title: 'Lỗi',
      text: 'Bạn phải nhập đầy đủ tất cả các trường'
    })

    return
  }

  $.ajax({
    url: BANK.replace(':id', $ID),
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

const renderBank = async() => {
  return new Promise(resolve => {
    $.ajax({
      url: BANK.replace(':id', $ID),
      type: 'GET',
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          $('#pic').attr('src', STORAGE + response.body.info_1)
          $('#content').val(response.body.info_2)
          new RichTextEditor("#content")
        }
        return resolve()
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
  await renderBank()
}

await main()