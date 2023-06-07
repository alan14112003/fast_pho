import { REGISTERING } from "../url.js";
import { renderAlert } from '../helper.js'

$('#create_customer').on('submit', function (e) {
    e.preventDefault()

    var formData = new FormData($('#create_customer')[0]);

    const name = $('#first_name').val() + ' ' + $('#last_name').val()
    formData.delete('first_name')
    formData.delete('last_name')
    formData.append("name", name)

    if ($('#password').val() !== $('#re-password').val()) {
        renderAlert('.wrapbox-content-account', {
            title: 'Lỗi',
            text: 'Mật khẩu nhập lại không khớp'
        })
        return;
    }

    $.ajax({
        url: REGISTERING,
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                renderAlert('.wrapbox-content-account', {
                    status: 'success',
                    title: 'Đăng ký thành công',
                })
                setTimeout(() => {
                    location.replace(response.body)
                }, 2000)
            }
        },
        error: function (response) {
            renderAlert('.wrapbox-content-account', {
                title: 'Lỗi',
                text: response.responseJSON.message
            })
        }
    });
})