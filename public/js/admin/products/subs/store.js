import { SUB_PRODUCT_STORE } from "../../../url.js"
import { renderToast } from '../../../helper.js'

const productId = location.href.split('/').find(element => Number(element))

$('#form-store').on('submit', function (e) {
    e.preventDefault()
    const formData = new FormData($(this)[0]);

    $.ajax({
        url: SUB_PRODUCT_STORE.replace(':productId', productId),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                renderToast({
                    title: 'Sản phẩm',
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