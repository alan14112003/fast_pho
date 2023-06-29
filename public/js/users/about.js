import { renderToast } from "../helper.js"
import { ABOUT } from "../url.js"

const renderAbout = async () => {
  $.ajax({
    url: ABOUT,
    type: 'GET',
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.status) {
        $('.container').html(response.body.content)
        return
      }
      renderToast({
        status: 'danger',
        title: 'Lỗi',
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

renderAbout()