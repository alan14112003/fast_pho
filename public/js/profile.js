import { HN_TREE } from './url.js'

let addressTree = [];

const renderAddressTree = async (nodeCode, leafCode) => {
    //If result has many province -> use foreach
    $('#province').html(`<option value='${addressTree.code}' selected>${addressTree.name}</option>`)

    $('#district').html(`<option value="null">Chọn quận / huyện
            </option>`)
    Object.values(addressTree.children).forEach(node => {
        $('#district').append(`
            <option value='${node.code}' ${node.code == nodeCode ? 'selected' : ''}>${node.name_with_type}</option>
        `)


        if (node.code == nodeCode) {
            if (leafCode == undefined) {
                leafCode = node.children[0]?.code
            }

            $('#ward').html(`<option value="null">Chọn phường / xã
            </option>`)
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
        console.log(this.value);
        renderAddressTree(this.value)
    })
}


const main = async () => {
    addressTree = await getAddressTree();
    console.log($('#district').data('code'), $('#ward').data('code'));
    await renderAddressTree($('#district').data('code'), $('#ward').data('code'))
    setOnChangeAddress()
}

main()
