import { CATEGORIES } from "../url.js";

const proSubBox = $('#prosub-box');


$.ajax({
    url: CATEGORIES,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
        if (response.status) {
            response.body.forEach(element => {
                const nodeCategories = element.children

                let thirdBox = `<div class="third_box">`;

                nodeCategories.forEach(node => {
                    thirdBox += `
                    <a href="https://vn.deliworld.com/product/lists/6050.html?0">${node.name}</a>
                    `
                })

                thirdBox += "</div>"

                proSubBox.append(`
                    <div class="prosub_item">
                        <a href="https://vn.deliworld.com/product/lists/6049.html?0 "
                            class="second_title antart_b">
                            ${element.name}</a>
                        ${thirdBox}
                    </div>
                `)
            });
        }
    },
    error: function (response) {
        const erorrs = Object.values(response.responseJSON.errors);
        showError($('#errors-category'), [erorrs]);
    }
});

//Header Account Action
const headerAction = $(".header-action.header-action_account")

headerAction.off('click').on('click', function () {
    $(document).off('click').on('click', function (e) {
        if (!$(e.target).closest(".header-action_dropdown").length && !$(e.target).closest(headerAction).length) {
            headerAction.removeClass("show-action")
            $(document).off('click');
        } else {
            headerAction.addClass("show-action")
        }
    })
})
