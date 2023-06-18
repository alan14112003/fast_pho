import { SLIDE_LAST_INDEX, SLIDE_STORE } from "../../url.js"
import { renderToast } from '../../helper.js'

$('#form-store').on('submit', function (e) {
    e.preventDefault()
    const formData = new FormData($(this)[0]);

    $.ajax({
        url: SLIDE_STORE,
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
    
                for (let i = 1; i <= lastIndex + 1; i++) {
                    $('#index').append(`<option>${i}</option>`)
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
const main = async() => {
    $('#form-store')[0].reset();
    await addIndexSelect()
}

await main()