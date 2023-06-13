import { PRODUCT_STORE } from "../../url.js"
import { renderToast } from '../../helper.js'
import { main as categoriesReload } from '../categories.js'

$('#form-store-comic').on('submit', function (e) {
    e.preventDefault()
    const formData = new FormData($(this)[0]);
    formData.set('category_id', formData.get('category'));

    $.ajax({
        url: PRODUCT_STORE,
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

const main = async () => {
    await categoriesReload()
}

await main();