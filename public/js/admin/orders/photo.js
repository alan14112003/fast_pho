import { formatCurrency, renderLoading, renderToast } from "../../helper.js";
import {
    ICONS,
    ORDER_TOTAL,
    PHOTO_ORDER,
    PHOTO_ORDER_BILL,
    PHOTO_ORDER_PRICE,
    STORAGE,
} from "../../url.js";

const bodyContent = $("#body-content");
//Show all orders
const renderOrder = () => {
    return new Promise((resolve) => {
        $.ajax({
            url: PHOTO_ORDER.replace(":id", orderId),
            type: "GET",
            contentType: false,
            beforeSend: function () {
                renderLoading("#body-content");
            },
            success: function (response) {
                if (!response.status) {
                    renderToast({
                        status: "danger",
                        title: "Thất bại",
                        text: response.message,
                    });
                    return;
                }
                const order = response.body;

                $(".user_name").html(order.user_name);
                $(".user_phone").html(order.user_phone);
                $(".user_address").html(order.user_address);
                $(".type").html(order.type);

                let total = 0;
                const photos = order.order_photos;

                const html = photos
                    .map((p, index) => {
                        const photoName = p.file ?? "";
                        const download = `<img src="${ICONS}download.svg" width="20" />`;
                        total += p.price;

                        return `
            <tr>
              <td>${index + 1}</td>
              <td>${photoName.replace(`photos/${p.photo_id}/`, "")}</td>
              <td>${p.is_paper}</td>
              <td>${p.type}</td>
              <td>${p.face_number}</td>
              <td class="col-2">${p.is_cover}</td>
              <td>${p.total}</td>
              <td>${p.descriptions}</td>
              <td class="price">
                <div class="view">
                  ${formatCurrency(p.photo_price)}
                </div>
                <div class="handle d-none">
                  <input type="number" class="price-inp" value="${
                      p.photo_price
                  }"/>
                  <button class="btn btn-sm btn-primary btn-submit-price" data-id="${
                      p.id
                  }">ok</button>
                </div>
              </td>
              <td>
                ${
                    p.file
                        ? `<a href="${
                              STORAGE + p.file
                          }" data-bs-toggle="tooltip" title="Tải về">
                      ${download}
                    </a>`
                        : ""
                }
              </td>
              <td>
                <button class="btn btn-sm btn-primary btn-add-price"> Nhập giá </button>
              </td>
            </tr>
          `;
                    })
                    .join("");

                bodyContent.html(html);

                $(".total").html(formatCurrency(order.total));
                $(".total-handle input").val(order.total ?? 0);
                $(".total-handle button").data('id', order.id);

                resolve();
            },
            error: function (response) {
                renderToast({
                    status: "danger",
                    title: "Lỗi",
                    text: response.responseJSON.message,
                });
            },
        });
    });
};

const main = async () => {
    await renderOrder();
    $(".print-order")
        .off("click")
        .on("click", function () {
            location.replace(PHOTO_ORDER_BILL.replace(":id", orderId));
        });

    $(".btn-add-price")
        .off("click")
        .on("click", function () {
            const priceEle = $(this).parent().parent().find(".price");

            priceEle.find(".view").addClass("d-none");
            priceEle.find(".handle").removeClass("d-none");
        });

    $(".btn-submit-price")
        .off("click")
        .on("click", function () {
            const priceEle = $(this).parent().parent();
            const orderPhotoId = $(this).data("id");

            const priceValue = priceEle.find(".price-inp")[0].value;
            if (!priceValue) {
                renderToast({
                    status: "danger",
                    title: "Lỗi",
                    text: "Giá tiền không được để trống",
                });
                return;
            }

            const data = new FormData();
            data.append("_method", "PUT");
            data.append("price", priceValue);

            $.ajax({
                url: PHOTO_ORDER_PRICE.replace(":id", orderPhotoId),
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(".btn-submit-price").addClass("d-none");
                },
                success: function (response) {
                    $(".btn-submit-price").removeClass("d-none");
                    if (!response.status) {
                        renderToast({
                            status: "danger",
                            title: "Thất bại",
                            text: response.message,
                        });
                        return;
                    }
                    priceEle.find(".view").html(formatCurrency(priceValue));
                    priceEle.find(".view").removeClass("d-none");
                    priceEle.find(".handle").addClass("d-none");

                    renderToast({
                        status: "success",
                        title: "Thành công",
                        text: response.message,
                    });
                },
                error: function (response) {
                    renderToast({
                        status: "danger",
                        title: "Lỗi",
                        text: response.responseJSON.message,
                    });
                },
            });
        });

    $(".btn-add-total")
        .off("click")
        .on("click", function () {
            const priceEle = $(this).parent();

            priceEle.find(".total-view").addClass("d-none");
            priceEle.find(".total-handle").removeClass("d-none");
        });

    $(".total-handle button")
        .off("click")
        .on("click", function () {
            const priceEle = $(this).parent().parent();
            const orderId = $(this).data("id");

            const priceValue = priceEle.find(".total-handle input")[0].value;
            if (!priceValue) {
                renderToast({
                    status: "danger",
                    title: "Lỗi",
                    text: "Tổng tiền không được để trống",
                });
                return;
            }

            const data = new FormData();
            data.append("_method", "PUT");
            data.append("total", priceValue);

            $.ajax({
                url: ORDER_TOTAL.replace(":id", orderId),
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(".total-handle button").addClass("d-none");
                },
                success: function (response) {
                    $(".total-handle button").removeClass("d-none");
                    if (!response.status) {
                        renderToast({
                            status: "danger",
                            title: "Thất bại",
                            text: response.message,
                        });
                        return;
                    }
                    priceEle.find(".total-view").html(formatCurrency(priceValue));
                    priceEle.find(".total-view").removeClass("d-none");
                    priceEle.find(".total-handle").addClass("d-none");

                    renderToast({
                        status: "success",
                        title: "Thành công",
                        text: response.message,
                    });
                },
                error: function (response) {
                    renderToast({
                        status: "danger",
                        title: "Lỗi",
                        text: response.responseJSON.message,
                    });
                },
            });
        });
};

await main();
