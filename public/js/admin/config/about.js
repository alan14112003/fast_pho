import { renderToast } from "../../helper.js";
import { ABOUT } from "../../url.js";

const renderAbout = async () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: ABOUT,
      type: 'GET',
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          $('#about').html(response.body.content)
          new RichTextEditor("#about")

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

const setUpdateAbout = () => {
  $('#update-about-btn').off('click').on('click', () => {
    const formData = new FormData()
    formData.append('content', $('#about').val())
    formData.append('_method', 'PUT')

    $.ajax({
      url: ABOUT,
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          renderToast({
            title: 'Về chúng tôi',
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
  setUpdateAbout()
}

await main()
