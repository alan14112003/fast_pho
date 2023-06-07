import { LOGOUT } from "../url.js";
import { renderAlert } from '../helper.js'

$('#logout-btn').on('click', function () {
    $.ajax({
        url: LOGOUT,
        type: 'POST',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                location.replace(response.body)
            }
        },
        error: function (response) {
            renderAlert('.site_account_info', {
                title: 'Lỗi',
                text: response.responseJSON.message
            })
        }
    });
})