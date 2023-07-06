import { renderToast } from "../helper.js";
import { DOMAIN, RESET_PASSWORD } from "../url.js";

$('#form-reset-pass').on('submit', function (e) {
    e.preventDefault()

    const pass = $(this).find('input[name=password]').val()
    const re_pass = $(this).find('input[name=re-password]').val()

    if(pass != re_pass) {
        renderToast({
            title: 'Lỗi',
            text: 'Mật khẩu xác nhận không khớp!'
        })

        return;
    }

    const data = {
        password: pass
    }

    $.ajax({
        url: RESET_PASSWORD.replace(':token', location.pathname.split('/')[2]),
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.status) {
                renderToast({
                    title: 'Thành công',
                    text: response.message
                })
                    
                setTimeout(() => {
                    window.location.replace(DOMAIN)
                }, 2000)
            }
        },
        error: function (response) {
            renderToast({
                status: 'danger',
                title: 'Lỗi',
                text: response.message
            })
        }
    });
})