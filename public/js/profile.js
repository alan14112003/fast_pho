import { CHANGE_PASSWORD, HN_TREE, UPDATE_PROFILE } from './url.js'
import {renderToast} from "./helper.js";

let addressTree = [];

const renderAddressTree = async (nodeCode, leafCode) => {
    //If result has many province -> use foreach
    $('#province').html(`<option value='${addressTree.code}' selected>${addressTree.name}</option>`)

    $('#district').html(``)
    Object.values(addressTree.children).forEach(node => {
        $('#district').append(`
            <option value='${node.code}' ${node.code == nodeCode ? 'selected' : ''}>${node.name_with_type}</option>
        `)


        if (node.code == nodeCode) {
            if (leafCode == undefined) {
                leafCode = node.children[0]?.code
            }

            $('#ward').html(``)
            Object.values(node.children).forEach(leaf => {
                $('#ward').append(`
                    <option value='${leaf.code}' ${leaf.code == leafCode ? 'selected' : ''}>${leaf.name_with_type}</option>
                `)
            })
        }
    })
}

const getAddressTree = () => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: HN_TREE,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                return resolve(response)
            },
            error: function (response) {
            }
        });
    })
}

const setOnChangeAddress = () => {
    $('#district').off('change').on('change', function (e) {
        renderAddressTree(this.value)
    })
}


$('#form-update-profile').on('submit', function (e) {
    e.preventDefault()

    const data = new FormData($(this)[0])
    data.append('_method', 'PUT')

    $.ajax({
        url: UPDATE_PROFILE,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                renderToast({
                    title: 'Thành công',
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

$('#form-change-password').on('submit', function (e) {
    e.preventDefault()

    const oldPass = $('#old_password').val()
    const newPass = $('#new_password').val()
    const confirmPass = $('#confirm_password').val()
    if (!oldPass || !newPass || !confirmPass) {
        renderToast({
            status: 'danger',
            title: 'Lỗi',
            text: 'Bạn phải nhập tất cả các trường'
        })
        return
    }
    if (newPass !== confirmPass) {
        renderToast({
            status: 'danger',
            title: 'Lỗi',
            text: 'Mật khẩu nhập lại không khớp'
        })
        return
    }

    const data = new FormData($(this)[0])
    data.append('_method', 'PUT')

    $.ajax({
        url: CHANGE_PASSWORD,
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                renderToast({
                    title: 'Thành công',
                    text: response.message,
                })
                return
            }
            renderToast({
                status: 'danger',
                title: 'Lỗi',
                text: response.message
            })
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
    addressTree = await getAddressTree();
    await renderAddressTree($('#district').data('code'), $('#ward').data('code'))
    setOnChangeAddress()
}

main()
