import { STORAGE, SUB_PRODUCT, SUB_PRODUCT_STORE, SUB_PRODUCT_UPDATE } from "../../../url.js"
import { renderToast } from '../../../helper.js'

const id = {
    productId: null,
    subProductId: null
};

$('#form-store').on('submit', function (e) {
    e.preventDefault()
    const formData = new FormData($(this)[0]);
    formData.append('_method', 'PUT')

    $.ajax({
        url: SUB_PRODUCT_UPDATE.replace(':productId', id.productId).replace(':id', id.subProductId),
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

const getProduct = () => {
    $.ajax({
        url: SUB_PRODUCT.replace(':productId', id.productId).replace(':id', id.subProductId),
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                renderToast({
                    title: 'Sản phẩm',
                    text: response.message,
                })
                $('#type').val(response.body.type)
                $('#total').val(response.body.total)
                $('#pic').attr('src', STORAGE + response.body.image)
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
}

const init = (productId, subProductId) => {
    id.productId = productId,
    id.subProductId = subProductId

    getProduct()
}

export default init