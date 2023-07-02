import { LOGINING } from "../url.js";
import { renderAlert, renderToast } from '../helper.js'

$('#customer_login').on('submit', function (e) {
    e.preventDefault()

    var formData = new FormData($('#customer_login')[0]);

    $.ajax({
        url: LOGINING,
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                renderAlert('.site_account_inner', {
                    status: 'success',
                    title: 'Đăng nhập thành công',
                })
                setTimeout(() => {
                    location.replace(response.body)
                }, 2000)
                return
            }
            renderToast({
                status: 'danger',
                title: 'Đăng nhập thất bại',
                text: response.message
            })
        },
        error: function (response) {
            renderAlert('.site_account_inner', {
                title: 'Lỗi',
                text: response.responseJSON.message
            })
        }
    });
})