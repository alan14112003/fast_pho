import { CATEGORIES, ICONS, CATEGORY_CREATE, CATEGORY_DELETE } from "../url.js"
import { renderToast } from '../helper.js'

//Get categories and show through select
let categories = [];
export const getCategories = () => {
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

const assignCategories = async () => {
    try {
        categories = await getCategories();
    } catch (error) {
        renderToast({
            status: 'danger',
            title: 'Danh mục sản phẩm',
            text: error
        })
    }
}

await assignCategories();

export const showCategories = (rootId, nodeId, leafId) => {
    $('#category').html('')
    $('#category_').html('')
    $('#category__').html('')

    if (!rootId) rootId = categories[0]?.id

    categories.forEach(root => {
        $('#category_').append(`
            <option value="${root.id}" ${root.id === rootId ? 'selected' : ''}>
                ${root.name}
            </option>
        `)

        if (root.id === rootId) {
            if (nodeId === undefined) {
                nodeId = root.children[0]?.id
            }

            root.children.forEach(node => {
                $('#category__').append(`
                    <option value="${node.id}" ${node.id === nodeId ? 'selected' : ''}>
                        ${node.name}
                    </option>
                `)

                if (node.id === nodeId) {
                    if (leafId === undefined) {
                        leafId = node.children[0]?.id
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
    })

    setOnChangeCategories();
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
                <img src="${ICONS}close.svg" alt="" class="delete">
            </div>
        </div>
    `
}

const showTreeCategories = () => {
    $('#modal-categories .modal-body').find('.root').remove();
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
        setOnClickDeleteCategory();
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
        $('#category_name_inp').focus()
    })
}

const setOnClickDeleteCategory = () => {
    $('.delete').off('click').on('click', function () {
        if (confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm này?')) {
            const id = $(this).parent().parent().attr('data-id');

            handleDeleteCategory(id)
        }
    })
}

const setOnClickCancelCreateCategory = () => {
    $('#cancel-c-category').off('click').on('click', function () {
        resetForm()
    })
}

const setOnSubmitFormCreateCategory = () => {
    $('#form-c-category').off('submit').on('submit', function (e) {
        e.preventDefault()
        const formData = new FormData($(this)[0]);

        $.ajax({
            url: CATEGORY_CREATE,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: async function (response) {
                if (response.status) {
                    resetForm()
                    await assignCategories();
                    await main()

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

const handleDeleteCategory = (id) => {
    const formData = new FormData();

    formData.append('_method', 'DELETE')

    $.ajax({
        url: CATEGORY_DELETE.replace(':id', id),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                await assignCategories();
                await main()

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
}

const resetForm = () => {
    $('#parent-label').html('Danh mục')
    $('#parent-id').removeAttr('value')
    $('#cancel-c-category').addClass('d-none')
    $('#category_name_inp').focus()
    $('#category_name_inp').val('')
}

export const main = async () => {
    showCategories();
    showTreeCategories();
    setOnClickCancelCreateCategory();
    setOnSubmitFormCreateCategory();
}