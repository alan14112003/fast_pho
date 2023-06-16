import { STORAGE, PRODUCTS as productsUri, SUBS_PRODUCTS as subsProductUri, PRODUCT_EDIT, PRODUCT_DELETE, SUB_PRODUCT_EDIT, SUB_PRODUCT_CREATE, SUB_PRODUCT_DELETE } from "../url.js";
import { renderLoading, renderPagination, renderToast } from '../helper.js'

const bodyContent = $('#body-content')

/*-------------------- Product ------------------------*/
//Show all products
const renderProducts = () => {
    const page = new URLSearchParams(window.location.search).get('page');

    return new Promise(resolve => {
        resolve($.ajax({
            url: productsUri + `?page=${page}`,
            type: 'GET',
            processData: false,
            contentType: false,
            beforeSend: function () {
                renderLoading('#body-content')
            },
            success: function (response) {
                if (response.status) {
                    const products = response.body.data;

                    bodyContent.html('');
                    products.forEach(p => {
                        const id = `<th class="col-1" scope="row">${p.id}</th>`
                        const image = `<img width='80' height='80' 
                            style="object-fit: cover" 
                            src="${STORAGE + p.image}?${Date.now()}" alt="${p.slug}"/>`
                        const info = `
                            <strong>${p.name}</strong>
                            <p class="text-ellipsis" style="-webkit-line-clamp: 2;">${p.descriptions}</p>
                        `
                        const price = `
                            <strong>${p.price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</strong>
                            <span>- ${p.sale}</span>
                        `

                        const createdAt = new Date(p.created_at);

                        const functions = `
                            <a class="btn btn-secondary" href ="${PRODUCT_EDIT + p.id}" role = "button" >Sửa</a>
                            <button type="button" class="btn btn-danger btn-delete" data-id=${p.id}>Xóa</button>
                            <a class="btn btn-info btn-create_sub" href="${SUB_PRODUCT_CREATE.replace(':productId', p.id)}">Con</a>
                        `

                        bodyContent.append(`
                            <tr>
                                ${id}
                                <td class="col-1">${image}</td>
                                <td class="col-4">${info}</td>
                                <td class="col-2">${price}</td>
                                <td class="col-2">${createdAt}</td>
                                <td class="col-3 functions-box">${functions}</td>
                            </tr>
                        `)
                    });

                    renderPagination(response.body, renderProducts)
                }
            },
            error: function (response) {
                renderToast({
                    status: 'danger',
                    title: 'Lỗi',
                    text: response.responseJSON.message
                })
            }
        }))
    })
}

await renderProducts();


//Delete
const deleteProduct = (deletedUri, e) => {
    $.ajax({
        url: deletedUri.replace(':id', $(e.currentTarget).data('id')),
        type: 'DELETE',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                $(e.currentTarget).parent().parent().remove()

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
}

$('.btn-delete').on('click', function (e) {
    if (confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) {
        deleteProduct(PRODUCT_DELETE, e)
    }
})

/*-------------------- Subs Product ------------------------*/

//Show Subs Each Product
const renderSubsProduct = (parent, productId) => {
    return new Promise(resolve => {
        resolve($.ajax({
            url: subsProductUri.replace(':productId', productId),
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    const subsProduct = response.body;

                    subsProduct.forEach(subP => {
                        const image = `<img width='80' height='80' 
                            style="object-fit: cover; border-radius: 10px" 
                            src="${STORAGE + subP.image}?${Date.now()}""/>`

                        const info = `
                            <div class="d-flex">
                                ${image}
                                <div class="ms-4 fw-bold">
                                    <p class="text-ellipsis" style="-webkit-line-clamp: 3;">${subP.type}</p>
                                </div>
                            </div>
                        `
                        const quantity = `
                            <div class="text-start fw-bold">Số lượng</div>
                            <div class="text-start text-info">${subP.total}</div>
                        `

                        const createdAt = new Date(subP.created_at);

                        const editUrl = SUB_PRODUCT_EDIT
                            .replace(':productId', productId)
                            .replace(':id', subP.id)
                        const functions = `
                            <a class="btn btn-secondary" href ="${editUrl}" role = "button" >Edit</a>
                            <button type="button" class="btn btn-danger btn-delete" data-product-id=${productId} data-id=${subP.id}>Delete</button>
                        `

                        const subsP = $(`<tr data-product-id=${productId}>`, {
                            class: 'sub-product'
                        });

                        $(subsP).addClass('sub-product')

                        subsP.html(`
                            <td class="col-1"></td>
                            <td class="col-4" colspan="2">${info}</td>
                            <td class="col-2">${quantity}</td>
                            <td class="col-2">${createdAt}</td>
                            <td class="col-3 functions-box">${functions}</td>
                        `);
                        subsP.insertAfter(parent)
                    });

                    setOnclickDeleteSubProductBtn()
                }
            },
            error: function (response) {
                renderToast({
                    status: 'danger',
                    title: 'Lỗi',
                    text: response.responseJSON.message
                })
            }
        }))
    })
}

const removeSubsProduct = (productId) => {
    bodyContent.find(`[data-product-id=${productId}]`).remove()
}


bodyContent.find('tr').off('click').on('click', function (e) {
    if ($(e.target).hasClass('functions-box') || $(e.target).parent().hasClass('functions-box')) {
        return;
    }

    const productId = $(e.currentTarget).find('th:first-child').html()
    if (!$(e.currentTarget).attr('data-show-children')) {
        renderSubsProduct($(e.currentTarget), productId)
        $(e.currentTarget).attr('data-show-children', true)
        $(e.currentTarget).children().css('border-bottom-width', 0)
    } else {
        removeSubsProduct(productId)
        $(e.currentTarget).removeAttr('data-show-children')
        $(e.currentTarget).children().removeAttr('style')
    }

})


//Delete subproduct
const deleteSubProduct = (deletedUri, e) => {
    $.ajax({
        url: deletedUri.replace(':productId', $(e.currentTarget).data('product-id')).replace(':id', $(e.currentTarget).data('id')),
        type: 'DELETE',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                $(e.currentTarget).parent().parent().remove()

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
}

const setOnclickDeleteSubProductBtn = () => {
    $('.sub-product .btn-delete').on('click', function (e) {
        if (confirm('Bạn chắc chắn muốn xóa loại sản phẩm này?')) {
            deleteSubProduct(SUB_PRODUCT_DELETE, e)
        }
    })
}
