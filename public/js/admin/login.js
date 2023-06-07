import { DOMAIN } from '../url.js';
import { renderAlert } from '../helper.js'

const LOGINING = DOMAIN + 'admin_logining'

$('#form-login').on('submit', function (e) {
    e.preventDefault()
    var formData = new FormData($('#form-login')[0]);

    $.ajax({
        url: LOGINING,
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                renderAlert('.card-body', {
                    status: 'success',
                    title: 'Đăng nhập thành công',
                })
                setTimeout(() => {
                    location.replace(response.body)
                }, 2000)
            }
        },
        error: function (response) {
            renderAlert('.card-body', {
                title: 'Lỗi',
                text: response.responseJSON.message
            })
        }
    });
})