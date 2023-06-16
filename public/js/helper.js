export const renderAlert = (ele, { status = 'danger', title = '', text = '' }) => {
    $(ele).prepend(`
        <div class="alert alert-${status} alert-dismissible fade show" role="alert">
            <strong>${title}</strong>${text && ':'} <span>${text}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `)
}

export const renderToast = ({ status = 'primary', title = '', text = '' }) => {
    $('.toast').html(`
    <div class="toast-header">
        <div class="bg-${status}" style="width: 20px; height: 20px; border-radius: 5px"></div>
        <strong class="ms-2 me-auto">${title}</strong>
        <small class="text-muted">just now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        ${text}
    </div>
    `)

    new bootstrap.Toast($('.toast')).show();
}

const pushState = (name, value) => {
    let url = `?${name}=${value}`;

    window.history.pushState("", "", url);
}

export const renderPagination = (pagination, callback) => {
    const currentPage = pagination.current_page;
    const lastPage = pagination.last_page;
    const prePageUrl = pagination.prev_page_url;
    const nextPageUrl = pagination.next_page_url;

    $('#first-paginate').off('click').on('click', () => {
        if (currentPage !== 1) {
            pushState('page', 1)
            callback();
        }
    })

    if (prePageUrl) {
        $('#pre-paginate').off('click').on('click', () => {
            pushState('page', currentPage - 1)
            callback();
        })
        $('#pre-paginate').find('li').html(currentPage - 1)
        $('#pre-paginate').show();
    } else {
        $('#pre-paginate').hide();
    }

    $('#current-paginate').find('li').html(currentPage)

    if (nextPageUrl) {
        $('#next-paginate').off('click').on('click', () => {
            pushState('page', currentPage + 1)
            callback();
        })
        $('#next-paginate').find('li').html(currentPage + 1)
        $('#next-paginate').show();
    } else {
        $('#next-paginate').hide();
    }

    $('#last-paginate').off('click').on('click', () => {
        if (currentPage !== lastPage) {
            pushState('page', lastPage)
            callback();
        }
    })
}

export const renderLoading = (ele) => {
    $(ele).html(`
        <div class="d-flex justify-content-center position-absolute w-100">
            <div class="spinner-border text-info" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `)
}

export const findChildObject = (array, id) => {
    var result;
    array.some(o => result = o.id === id ? o : findChildObject(o.children || [], id));
    return result;
};

export const formatCurrency = (number) => {
    const formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });
    return formatter.format(number);
}

export const formatDateTime = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1; // Lưu ý: Tháng bắt đầu từ 0 (tháng 0 là tháng 1)
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();
  
    // Chuyển đổi sang định dạng dd/mm/yyyy - hh:mm:ss
    const formattedDate = ('0' + day).slice(-2) + '/' + ('0' + month).slice(-2) + '/' + year;
    const formattedTime = ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2);
  
    return formattedDate + ' - ' + formattedTime;
}
  