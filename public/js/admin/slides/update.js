import { SLIDE, SLIDE_LAST_INDEX, SLIDE_UPDATE, STORAGE } from "../../url.js"
import { renderToast } from '../../helper.js'

$('#form-store').on('submit', function (e) {
    e.preventDefault()
    const formData = new FormData($(this)[0]);
    formData.append('_method', 'PUT')

    $.ajax({
        url: SLIDE_UPDATE.replace(':id', slideId),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: async function (response) {
            if (response.status) {
                renderToast({
                    title: 'Slide',
                    text: response.message,
                })
                await main()
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

const addIndexSelect = () => {
    return new Promise(resolve => {
        $.ajax({
            url: SLIDE_LAST_INDEX,
            type: 'GET',
            processData: false,
            contentType: false,
            success: function (response) {
                const lastIndex = response.body

                $('#index').html('')

                for (let i = 1; i <= lastIndex; i++) {
                    $('#index').append(`<option value="${i}">${i}</option>`)
                }
                resolve()
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

const renderSlide = async() => {
    $.ajax({
        url: SLIDE.replace(':id', slideId),
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {
            const slide = response.body

            console.log($('#redirect'));
            $('#pic').attr('src', STORAGE + slide.src)
            $('#redirect').val(slide.redirect)
            $(`#status option[value="${slide.status}"]`).attr('selected', 'selected')
            $(`#index option[value="${slide.index}"]`).attr('selected', 'selected')

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

const main = async() => {
    $('#form-store')[0].reset();
    await addIndexSelect()
    renderSlide()
}

await main()
