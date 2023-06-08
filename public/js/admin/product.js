import { PRODUCTS as productsUri, PRODUCT_EDIT, PRODUCT_DELETE } from "../url.js";
import { renderPagination, renderToast } from '../helper.js'

const bodyContent = $('#body-content')

//Show all products
const renderProducts = () => {
    const page = new URLSearchParams(window.location.search).get('page');

    return new Promise(resolve => {
        resolve($.ajax({
            url: productsUri + `?page=${page}`,
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    const products = response.body.data;

                    bodyContent.html('');
                    products.forEach(p => {
                        const id = `<th class="col-1" scope="row">${p.id}</th>`
                        const image = `<img width='80' height='80' 
                            style="object-fit: cover" 
                            src="${p.image}?${new Date()}" alt="${p.slug}"/>`
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
                            <a class="btn btn-secondary" href ="${PRODUCT_EDIT + p.id}" role = "button" >Edit</a>
                            <button type="button" class="btn btn-danger btn-delete" data-id=${p.id}>Delete</button>
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
        }))
    })
}

await renderProducts();


//Delete
const deleteProduct = (deletedUri, e) => {
    $.ajax({
        url: deletedUri + $(e.currentTarget).data('id'),
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

//Show Sub Each Product
const renderSubProduct = () => {
    return new Promise(resolve => {
        resolve($.ajax({
            url: url,
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    const products = response.body.data;

                    bodyContent.html('');
                    products.forEach(p => {
                        const id = `<th class="col-1" scope="row">${p.id}</th>`
                        const image = `<img width='80' height='80' 
                            style="object-fit: cover" 
                            src="${p.image}?${new Date()}" alt="${p.slug}"/>`
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
                            <a class="btn btn-secondary" href ="${PRODUCT_EDIT + p.id}" role = "button" >Edit</a>
                            <button type="button" class="btn btn-danger btn-delete" data-id=${p.id}>Delete</button>
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
        }))
    })
}


bodyContent.find('tr').off('click').on('click', function (e) {
    if ($(e.target).hasClass('functions-box') || $(e.target).parent().hasClass('functions-box')) {
        return;
    }


})

