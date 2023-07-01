import { formatMoney, renderBanks, renderToast } from '../helper.js'
import { HN_TREE, PHOTOS_ORDER_CREATE } from '../url.js';

const group = $('.group')
const totalPrice = $('.total-price')
let countPhotos = 0, total = 0, addressTree;
let lines = $('.line_')
const btnCreatePhoto = $('#btn-create-photo'), btnCalTotal = $('#btn-calculate-total')

const object = {
    photo_distance: {
        d_1: 10,
        d_2: 30,
        d_3: 50,
    },
    photo_price: {
        price_1: 1000,
        price_2: 800,
        price_3: 700,
        price_4: 500
    },
    photo_types: [
        {
            key: 'A5',
            text: 'A5',
            rate: 46
        },
        {
            key: 'A4_70',
            text: 'A4 70gsm',
            rate: 100
        },
        {
            key: 'A4_80',
            text: 'A4 80gsm',
            rate: 134
        },
        {
            key: 'A3',
            text: 'A3',
            rate: 200
        }
    ],
    photo_covers: [
        {
            key: 1,
            text: 'Bìa xanh dương',
        },
        {
            key: 2,
            text: 'Bìa xanh lá',
        },
        {
            key: 3,
            text: 'Bìa vàng',
        },
        {
            key: 4,
            text: 'Bìa hồng',
        }
    ]
}

btnCreatePhoto.off('click').on('click', function () {
    createPhotoPanel()
})

btnCalTotal.off('click').on('click', function () {
    calculateTotal()
})

const createPhotoPanel = () => {
    ++countPhotos;

    let photoTypes = "";
    object.photo_types.forEach(e => {
        photoTypes += `
        <li>
            <input type="radio" name="paper_type" id="paper_type_${e.key}_${countPhotos}" value="${e.key}" checked>
            <input type="text" hidden name="photo_rate" value="${e.rate}">
            <label for="paper_type_${e.key}_${countPhotos}">${e.text}</label>
        </li>
        `;
    })

    let photoCovers = "";
    object.photo_covers.forEach(e => {
        photoCovers += `
        <option value="${e.key}">${e.text}</option>
        `;
    })

    const panel = `
    <div class="mb-2">
        <div class="line_ show">
        </div>
        <form class="panel" data-index="${countPhotos}">
            <div class="row col-xl-12">
                <div class="left col-xl-4">
                    <div class="content">
                        <div class="header">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15"
                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </g>
                            </svg>
                            <p>Browse File to upload!</p>
                        </div>
                        <label for="file-${countPhotos}" class="footer">
                            <svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                                    <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                                </g>
                            </svg>
                            <p id="file_name_${countPhotos}" class="file_name">Not selected file</p>
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z"
                                        stroke="#000000" stroke-width="2"></path>
                                    <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2"
                                        stroke-linecap="round">
                                    </path>
                                    <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z"
                                        stroke="#000000" stroke-width="2"></path>
                                </g>
                            </svg>
                        </label>
                        <input id="file-${countPhotos}" class="d-none" name='photo-file' type="file" onchange="$(this).parent().find('.file_name').html(this.files[0].name)">
                    </div>
                </div>
                <div class="right col-xl-8">
                    <div class="form-group d-flex justify-content-between">
                        <div>
                            <h3>Kiểu giấy(*)</h3>
                            <ul class="paper-group" id="paper-group">
                                ${photoTypes}
                            </ul>
                        </div>
                        <div class="me-3">
                            <div>
                                <h3>Số lượng(*)</h3>
                                <div class="number-input">
                                    <button type="button"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                    <input class="quantity" min="1" name="quantity" value="1"
                                        type="number">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        class="plus"></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <h3>Bìa(*)</h3>
                                <select name="cover" id="cover">
                                    <option value="0" selected>Không bìa</option>
                                    ${photoCovers}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h3>Kiểu in(*)</h3>
                        <div class="d-flex">
                            <ul class="paper-group is-paper-group">
                                <li>
                                    <input type="radio" name="is_paper" id="paper_1_${countPhotos}" value="1" checked>
                                    <label for="paper_1_${countPhotos}">Trang - Theo dạng từng tờ</label>
                                </li>
                                <li>
                                    <input type="radio" name="is_paper" id="paper_0_${countPhotos}" value="0">
                                    <label for="paper_0_${countPhotos}">Tập - Theo dạng cuốn</label>
                                </li>
                            </ul>
                            <ul class="paper-group is-paper-group">
                                <li>
                                    <input type="radio" name="face_number" id="face_number_0_${countPhotos}" value="1"
                                        checked>
                                    <label for="face_number_0_${countPhotos}">In một mặt</label>
                                </li>
                                <li>
                                    <input type="radio" name="face_number" id="face_number_1_${countPhotos}"
                                        value="2">
                                    <label for="face_number_1_${countPhotos}">In hai mặt</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <h3>Ghi chú</h3>
                        <textarea class="note" name="note" id="note" cols="30" rows="8"
                            placeholder="Bạn còn yêu cầu gì thêm không?"></textarea>
                    </div>
                </div>
            </div>
            ${countPhotos > 1 ?
            `<a class="btn-remove-panel">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
            </a>` : ''}
            
        </form>
    </div>
    `

    if (countPhotos > 1) {
        $('.line_.show').removeClass('show')
    }
    group.append(panel);
    lines = $('.line_');
    setOnClickShowPanel()
    setOnClickRemovePanel()
    setOnChangePaperRadio()
}

const calculateWithQuantity = (quantity, rate) => {
    let price = 0;
    rate = rate / 100;

    if (quantity <= object.photo_distance.d_2) {
        return object.photo_price.price_2 * quantity * rate;
    }
    price = object.photo_price.price_2 * object.photo_distance.d_2;

    if (quantity <= object.photo_distance.d_3) {
        return (price + object.photo_price.price_3 * (quantity - object.photo_distance.d_2)) * rate;
    }
    price += object.photo_price.price_3 * (object.photo_distance.d_3 - object.photo_distance.d_2);

    return (price + object.photo_price.price_4 * (quantity - object.photo_distance.d_3)) * rate;
}

const calculateTotal = () => {
    total = 0;
    const panels = group.find('.panel')

    panels.each((i, e) => {
        const cover = $(e).find('select[name="cover"]').val()
        if (cover > 0) total += 1000;

        const isPaper = $(e).find('input[name="is_paper"]:checked').val()

        if (!isPaper) return;

        const quantity = $(e).find('input[name="quantity"]').val()
        if (quantity <= object.photo_distance.d_1) {
            total += 10000;
            return;
        }

        const paperTypeEle = $(e).find('input[name="paper_type"]:checked')
        const rate = $(paperTypeEle).parent().find('input[name="photo_rate"]').val()

        total += calculateWithQuantity(quantity, rate);
    });

    totalPrice.html(formatMoney(Math.round(total)) + '₫');
}

const setOnClickShowPanel = () => {
    lines.off('click').on('click', function () {
        $(this).toggleClass('show')
    })
}

const setOnClickRemovePanel = () => {
    $('.btn-remove-panel').off('click').on('click', function () {
        if (confirm('Bạn muốn xóa bản ghi photo này?')) {
            $(this).parent().parent().remove()
            lines = $('.line_');
            lines.last().addClass('show')
        }
    })
}

const renderAddressTree = async (nodeCode, leafCode) => {
    //If result has many province -> use foreach
    $('#customer_shipping_province').html(`<option value='${addressTree.code}' selected>${addressTree.name}</option>`)

    $('#customer_shipping_district').html(`<option value="null">Chọn quận / huyện
            </option>`)
    Object.values(addressTree.children).forEach(node => {
        $('#customer_shipping_district').append(`
            <option value='${node.code}' ${node.code === nodeCode ? 'selected' : ''}>${node.name_with_type}</option>
        `)


        if (node.code === nodeCode) {
            if (leafCode === undefined) {
                leafCode = node.children[0]?.code
            }

            $('#customer_shipping_ward').html(`<option value="null">Chọn phường / xã
            </option>`)
            Object.values(node.children).forEach(leaf => {
                $('#customer_shipping_ward').append(`
                    <option value='${leaf.code}' ${leaf.code === leafCode ? 'selected' : ''}>${leaf.name_with_type}</option>
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
    $('#customer_shipping_district').off('change').on('change', function (e) {
        console.log(this.value);
        renderAddressTree(this.value)
    })
}

const setOnChangePaperRadio = () => {
    $('input[type=radio][name=is_paper]').change(function () {
        const parent = $(this).parent().parent().parent().parent().parent()
        if (this.value == 1) {
            $(parent).find('select[name=cover]').val(0).attr('disabled', 'disabled')
        }
        else if (this.value == 0) {
            $(parent).find('select[name=cover]').removeAttr('disabled')
        }
    });
}

const createPhotoOrder = () => {
    const formData = new FormData()

    const address = $('#address').val()
    const ward = $('#customer_shipping_ward').val()
    const district = $('#customer_shipping_district').val()
    const province = $('#customer_shipping_province').val()
    const name = $('#full_name').val()
    const phone = $('#phone').val()
    const timeReceive = $('#time_receive').val()
    const payment = $('input[name="payment"]:checked').val()

    if (name.trim() == "" || phone.trim() == "" || address.trim() == "" || ward.trim() == "" || province.trim() == "" || district.trim() == "") {
        renderToast({
            status: 'danger',
            title: 'Lỗi',
            text: "Điền thiếu thông tin!"
        })
    }

    const info = {
        address: address,
        ward: ward,
        district: district,
        province: province,
        name: name,
        phone: phone,
        time_receive: timeReceive,
        payment,
        full_address: `${address}, ${ward}, ${district}, ${province}`
    }

    formData.append('info', JSON.stringify(info))

    let data = [];
    const panels = group.find('.panel')

    panels.each((i, e) => {
        const paperType = $(e).find('input[name="paper_type"]:checked').val()
        const isPaper = $(e).find('input[name="is_paper"]:checked').val()
        const faceNumber = $(e).find('input[name="face_number"]:checked').val()
        const quantity = $(e).find('input[name="quantity"]').val()
        const cover = $(e).find('select[name="cover"]').val()
        const photoFile = $(e).find('input[name="photo-file"]').prop('files')[0]
        const note = $(e).find('.note').html()

        const dataAdd = {
            face_number: faceNumber,
            cover: cover,
            is_paper: isPaper,
            descriptions: note,
            type: paperType,
            quantity: quantity,
        }

        data.push(dataAdd)
        formData.append('data[]', JSON.stringify(dataAdd))
        formData.append('files[]', photoFile)
    });

    $.ajax({
        url: PHOTOS_ORDER_CREATE,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                renderToast({
                    title: 'Đơn hàng',
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

const main = async () => {
    setOnClickShowPanel()
    createPhotoPanel()

    renderBanks('.banks')

    addressTree = await getAddressTree();
    await renderAddressTree()
    setOnChangeAddress()

    $('#btn-create-order').off('click').on('click', function () {
        createPhotoOrder()
    })
}

main();