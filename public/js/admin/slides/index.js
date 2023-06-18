import { SLIDES, SLIDE_DELETE, SLIDE_EDIT, STORAGE } from "../../url.js";
import { renderLoading, renderPagination, renderToast } from "../../helper.js";

const bodyContent = $("#body-content");

/*-------------------- Slides ------------------------*/
//Show all Slides

let statusQr = new URLSearchParams(window.location.search).get("status");

const renderSlides = () => {
    const page = new URLSearchParams(window.location.search).get("page");

    let url = SLIDES + `?page=${page}`;
    if (statusQr) {
        url += `&status=${statusQr}`;
        $(`#status-filter option[value='${statusQr}']`).attr("selected", true);
    }

    return new Promise((resolve) => {
        resolve(
            $.ajax({
                url: url,
                type: "GET",
                processData: false,
                contentType: false,
                beforeSend: function () {
                    renderLoading("#body-content");
                },
                success: function (response) {
                    if (response.status) {
                        const slides = response.body.data;

                        bodyContent.html("");
                        slides.forEach((s) => {
                            const id = `<th class="col-1" scope="row">${s.id}</th>`;
                            const image = `<img width='80' height='80'
                            style="object-fit: cover"
                            src="${STORAGE + s.src}?${Date.now()}"/>`;

                            const functions = `
                            <a class="btn btn-secondary" href ="${SLIDE_EDIT.replace(
                                ":id",
                                s.id
                            )}" role = "button" >Sửa</a>
                            <button type="button" class="btn btn-danger btn-delete" data-id=${
                                s.id
                            }>Xóa</button>
                        `;

                            bodyContent.append(`
                            <tr>
                                ${id}
                                <td>${image}</td>
                                <td>${s.redirect}</td>
                                <td>${s.index}</td>
                                <td>${s.status ? "Bật" : "Tắt"}</td>
                                <td class="functions-box">${functions}</td>
                            </tr>
                        `);
                        });

                        renderPagination(response.body, renderSlides);
                    }
                },
                error: function (response) {
                    renderToast({
                        status: "danger",
                        title: "Lỗi",
                        text: response.responseJSON.message,
                    });
                },
            })
        );
    });
};

const setChangeStatus = () => {
    $("#status-filter")
        .off("change")
        .on("change", async function () {
            statusQr = $(this).val();
            let href = location.href;
            if (href.includes("?")) {
                href = href.slice(0, href.indexOf("?"));
            }
            history.pushState("", "", `${href}?status=${statusQr}`);
            await renderSlides();
        });
};

//Delete
const deleteSlide = (deletedUri, e) => {
    $.ajax({
        url: deletedUri.replace(":id", $(e.currentTarget).data("id")),
        type: "DELETE",
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status) {
                $(e.currentTarget).parent().parent().remove();

                renderToast({
                    title: "Slide",
                    text: response.message,
                });
            }
        },
        error: function (response) {
            renderToast({
                status: "danger",
                title: "Lỗi",
                text: response.responseJSON.message,
            });
        },
    });
};

const setDeleteSlide = () => {
    $(".btn-delete").on("click", function (e) {
        if (confirm("Bạn chắc chắn muốn xóa sản phẩm này?")) {
            deleteSlide(SLIDE_DELETE, e);
        }
    });
};

const main = async () => {
    await renderSlides();
    setDeleteSlide();
    setChangeStatus()
};

await main();
