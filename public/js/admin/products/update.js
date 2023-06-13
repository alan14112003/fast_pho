import { PRODUCT_UPDATE, PRODUCT, STORAGE } from "../../url.js"
import { renderToast } from '../../helper.js'
import { main as categoriesReload, showCategories } from '../categories.js'

const arrHref = window.location.href.split('/')

const getProduct = () => {
    $.ajax({
        url: PRODUCT.replace(':id', arrHref[arrHref.length - 1]),
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                const result = response.body;

                $('#name').val(result.name)
                $('#pic').attr('src', STORAGE + result.image)
                $('#descriptions').val(result.descriptions)
                $('#price').val(result.price)
                $('#sale').val(result.sale)
                $('#slug').val(result.slug)

                showCategories(result.root_rategory_id, result.node_category_id, result.category_id)
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

$('#form-update-comic').on('submit', function (e) {
    e.preventDefault()
    var formData = new FormData($('#form-update-comic')[0]);
    formData.append('_method', 'PUT');
    formData.set('category_id', formData.get('category'));

    $.ajax({
        url: PRODUCT_UPDATE.replace(':id', arrHref[arrHref.length - 1]),
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
    categoriesReload()
    getProduct();
}

main();