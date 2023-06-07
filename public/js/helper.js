export const renderAlert = (ele, { status = 'danger', title = '', text = '' }) => {
    $(ele).prepend(`
        <div class="alert alert-${status} alert-dismissible fade show" role="alert">
            <strong>${title}</strong>${text && ':'} <span>${text}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `)
}