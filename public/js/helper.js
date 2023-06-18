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

export const pushState = (name, value) => {
    let url = `?${name}=${value}`;

    window.history.pushState("", "", url);
}

export const pushStates = (obj) => {
    if (jQuery.isEmptyObject(obj)) {
        window.history.pushState("", "", "?");
        return;
    }

    let params = "?";
    for (const [key, value] of Object.entries(obj)) {
        if (value)
            params += `${key}=${value}&`
    }

    window.history.pushState("", "", params.substring(0, params.length - 1));
}

export const getParam = (name) => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);

    return urlParams.get(name)
}

export const renderPagination = (pagination, callback) => {
    const currentPage = pagination.current_page;
    const lastPage = pagination.last_page;
    const prePageUrl = pagination.prev_page_url;
    const nextPageUrl = pagination.next_page_url;

    $('#first-paginate').off('click').on('click', () => {
        if (currentPage !== 1) {
            pushState('page', 1)
            callback(1);
        }
    })

    if (prePageUrl) {
        $('#pre-paginate').off('click').on('click', () => {
            pushState('page', currentPage - 1)
            callback(currentPage - 1);
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
            callback(currentPage + 1);
        })
        $('#next-paginate').find('li').html(currentPage + 1)
        $('#next-paginate').show();
    } else {
        $('#next-paginate').hide();
    }

    $('#last-paginate').off('click').on('click', () => {
        if (currentPage !== lastPage) {
            pushState('page', lastPage)
            callback(lastPage);
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

function reverseString(str) {
    return str.split('').reverse().join('');
}

// Create our number formatter.
export const formatMoney = (num) => {
    let money = num.toString();
    money = reverseString(money).match(/.{1,3}/g);
    return reverseString(money.join('.'))
};

export const moneyToNumber = (money) => {
    money = money.toString()
    return parseFloat(money.substring(0, money.length - 1).replaceAll('.', ''))
};

export const calculateMoneyAfterSale = (m, s) => {
    return m * (100 - s) / 100;
}