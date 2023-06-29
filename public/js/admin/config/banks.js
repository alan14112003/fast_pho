import { formatDateTime, renderLoading, renderToast } from "../../helper.js";
import { BANK, BANKS, BANK_EDIT, STORAGE } from "../../url.js";

const renderBanks = async () => {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: BANKS,
      type: 'GET',
      processData: false,
      contentType: false,
      beforeSend: function () {
        renderLoading('#body-content')
      },
      success: function (response) {
        if (response.status) {
          const banks = response.body
          $('#body-content').html('')

          banks.forEach((bank, index)  => {
            const image = `<img width='80' height='80' 
                            style="object-fit: cover" 
                            src="${STORAGE + bank.info_1}?${Date.now()}" alt="${bank.info_1}"/>
                          `
            const createdAt = new Date(bank.created_at);   
            const functions = `
                            <a class="btn btn-secondary" href ="${BANK_EDIT.replace(':id', bank.id)}" role = "button" >Sửa</a>
                            <button type="button" class="btn btn-danger btn-delete-bank" data-id=${bank.id}>Xóa</button>
                        `
            $('#body-content').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td class="col-1">${image}</td>
                                <td class="col-4">${bank.info_2}</td>
                                <td class="col-2">${formatDateTime(createdAt)}</td>
                                <td class="col-3 functions-box">${functions}</td>
                            </tr>
                        `)            
          });
          return resolve()
        }

        return reject(response.message)
      },
      error: function (response) {
        reject(response.responseJSON.message);
      }
    })
  })
}

const setDeleteBank = () => {
  $('.btn-delete-bank').off('click').on('click', function() {
    if (!confirm('Bạn có muốn xóa không')) {
      return
    }

    $.ajax({
      url: BANK.replace(':id', $(this).data('id')),
      type: 'DELETE',
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status) {
          renderToast({
            title: 'Ngân hàng',
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

const main = async () => {
  await renderBanks()
  setDeleteBank()
}

await main()
