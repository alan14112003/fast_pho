import { renderToast } from "../../helper.js";
import { MAIL_ADMIN } from "../../url.js";

const renderAbout = async () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: MAIL_ADMIN,
      type: 'GET',
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          $('#mail-admin-inp').val(response.body)

          return resolve()
        }

        return reject(response.message)
      },
      error: function (response) {
        reject(response.responseJSON.message);
      }
    })
  })
}

const setUpdateMail = () => {
  $('#mail-admin-btn').off('click').on('click', () => {
    const formData = new FormData()
    formData.append('email', $('#mail-admin-inp').val())
    formData.append('_method', 'PUT')

    $.ajax({
      url: MAIL_ADMIN,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          renderToast({
            title: 'Mail admin',
            text: response.message,
          })
        }
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
  await renderAbout()
  setUpdateMail()
}

await main()
