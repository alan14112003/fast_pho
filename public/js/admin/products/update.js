import { PRODUCT_UPDATE, PRODUCT, CATEGORIES, ICONS, CATEGORY_CREATE } from "../../url.js"
import { renderToast } from '../../helper.js'

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
                $('#pic').attr('src', result.image)
                $('#description').val(result.descriptions)
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


//Get categories and show through select
let categories = [];
const getCategories = () => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: CATEGORIES,
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    return resolve(response.body)
                }

                return reject(response.message)
            },
            error: function (response) {
                reject(response.responseJSON.message);
            }
        })
    })
}

try {
    categories = await getCategories();
} catch (error) {
    renderToast({
        status: 'danger',
        title: 'Danh mục sản phẩm',
        text: error
    })
}

const showCategories = (rootId, nodeId, leafId) => {
    $('#category').html('')
    $('#category_').html('')
    $('#category__').html('')
    categories.forEach(root => {
        $('#category_').append(`
            <option value="${root.id}" ${root.id === rootId ? 'selected' : ''}>
                ${root.name}
            </option>
        `)

        if (root.id === rootId) {
            if (nodeId === undefined) {
                nodeId = root.children[0].id
            }

            root.children.forEach(node => {
                $('#category__').append(`
                    <option value="${node.id}" ${node.id === nodeId ? 'selected' : ''}>
                        ${node.name}
                    </option>
                `)

                if (node.id === nodeId) {
                    if (leafId === undefined) {
                        leafId = node.children[0].id
                    }

                    node.children.forEach(leaf => {
                        $('#category').append(`
                            <option value="${leaf.id}" ${leaf.id === leafId ? 'selected' : ''}>
                                ${leaf.name}
                            </option>
                        `)
                    })
                }
            })
        }

        setOnChangeCategories();
    })
}

const setOnChangeCategories = () => {
    $('#category_').off('change').on('change', function (e) {
        showCategories(parseInt(this.value))
    })

    $('#category__').off('change').on('change', function (e) {
        showCategories(parseInt($('#category_').val()), parseInt(this.value))
    })
}

//New Categories
const subTree = (mainClass, id, text) => {
    return `
        <div class="${mainClass}" data-id=${id}>
            <div class="d-flex align-items-center info">
                ${!mainClass.includes('leaf') ? `<img src="${ICONS}caret-right.svg" alt="" class="caret">` : ''}
                <span class="text-second">${text}</span>
                ${!mainClass.includes('leaf') ? `<img src="${ICONS}plus.svg" alt="" class="create">` : ''}
            </div>
        </div>
    `
}

const showTreeCategories = () => {
    categories.forEach(root => {
        $('#modal-categories .modal-body').append(subTree('root', root.id, root.name))

        root.children.forEach(node => {
            $(`.root[data-id=${root.id}]`).append(subTree('node d-none', node.id, node.name))

            node.children.forEach(leaf => {
                $(`.node[data-id= ${node.id}]`).append(subTree('leaf d-none', leaf.id, leaf.name))
            })
        })

        setOnClickCategories();
        setOnClickCreateCategory();
    })
}

const setOnClickCategories = () => {
    $('.root .caret').off('click').on('click', function (e) {
        const node = $(this).parent().parent().find('.node');

        node.toggleClass('d-none')
        if (!node.hasClass('d-none'))
            $(this).attr('src', ICONS + 'caret-down.svg')
        else
            $(this).attr('src', ICONS + 'caret-right.svg')
    })

    $('.node .caret').off('click').on('click', function (e) {
        const leaf = $(this).parent().parent().find('.leaf');

        leaf.toggleClass('d-none')
        if (!leaf.hasClass('d-none'))
            $(this).attr('src', ICONS + 'caret-down.svg')
        else
            $(this).attr('src', ICONS + 'caret-right.svg')
    })
}

const setOnClickCreateCategory = () => {
    $('.create').off('click').on('click', function () {
        const id = $(this).parent().parent().attr('data-id');
        $('#parent-id').val(id)
        $('#parent-label').html($(this).parent().find('.text-second').text())
        $('#cancel-c-category').removeClass('d-none')
    })
}

const setOnClickCancelCreateCategory = () => {
    $('#cancel-c-category').off('click').on('click', function () {
        $('#parent-label').html('Danh mục')
        $('#parent-id').removeAttr('value')
        $(this).addClass('d-none')
    })
}

const setOnSubmitFormCreateCategory = () => {
    $('#form-c-category').off('submit').on('submit', function (e) {
        e.preventDefault()
        var formData = new FormData($(this)[0]);

        $.ajax({
            url: CATEGORY_CREATE,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status) {
                    renderToast({
                        title: 'Danh mục sản phẩm',
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
}

const handleCreateCategory = () => {

}

const main = async () => {
    showCategories();
    getProduct();
    showTreeCategories();
    setOnClickCancelCreateCategory();
    setOnSubmitFormCreateCategory();
}

main()