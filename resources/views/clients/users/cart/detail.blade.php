@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/cart/detail.css') }}">
    <style>
        a.logo {
            display: block;
        }

        .logo-cus {
            width: 100%;
            padding: 15px 0;
            text-align: ;
        }

        .logo-cus img {
            max-height: 4.2857142857em
        }

        .logo-text {
            text-align: ;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "";
            padding: 0;
        }

        .breadcrumb-item+.breadcrumb-item {
            padding: 0
        }

        @media (max-width: 767px) {
            .banner a {
                display: block;
            }
        }
    </style>
@endpush
@section('content')
    <div class="content">
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list"
                                data-order-summary-section="line-items">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-body-pro">
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"
                                                    data-checkout-subtotal-price-target="173000000">
                                                    0₫
                                                </span>
                                            </td>
                                        </tr>


                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Phí vận chuyển</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis"
                                                    data-checkout-total-shipping-target="0">
                                                    —
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price"
                                                    data-checkout-payment-due-target="173000000">
                                                    0₫
                                                </span>
                                                <span class="checkout_version" display:none="" data_checkout_version="35">
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <h1 class="logo-text">Fast Pho - Nền tảng chuyển đổi số</h1>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            <a href="#" id="btn-details" class="breadcrumb-link">Thông tin giao hàng</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" id="btn-payment" class="breadcrumb-link">Phương thức thanh toán</a>
                        </li>
                    </ul>

                </div>
                <div class="main-content" id="details">
                    <div id="checkout_order_information_changed_error_message" class="hidden" style="margin-bottom:15px">
                        <p class="field-message field-message-error alert alert-danger"><svg x="0px" y="0px"
                                viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;"
                                xml:space="preserve">
                                <g>
                                    <path style="fill:#E2574C;"
                                        d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027 c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236 c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209 S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972 c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723 c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843 C160.878,195.732,152.878,187.723,143.036,187.723z">
                                    </path>
                                </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </svg>
                            <span>
                            </span>
                        </p>
                    </div>
                    <div class="step">
                        <div class="step-sections " step="1">
                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                <div class="section-content section-customer-information no-mb">
                                    <div class="inventory_location_data">
                                        <input name="customer_shipping_country" type="hidden" value="241">
                                        <input name="customer_shipping_province" type="hidden" value="33">
                                        <input name="customer_shipping_district" type="hidden" value="369">
                                        <input name="customer_shipping_ward" type="hidden" value="20407">
                                    </div>
                                    <div class="logged-in-customer-information">&nbsp;
                                        <div class="logged-in-customer-information-avatar-wrapper">
                                            <div class="logged-in-customer-information-avatar gravatar"
                                                style="background-image: url(//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank);
                                                filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank', 
                                                sizingMethod='scale')">
                                            </div>
                                        </div>
                                        <p class="logged-in-customer-information-paragraph">
                                            @auth
                                                {{ auth()->user()->name }} ({{ auth()->user()->email }})
                                            @endauth
                                        </p>
                                    </div>
                                    <div class="fieldset">
                                        <div class="field field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="full_name">Họ và
                                                    tên</label>
                                                <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                    class="field-input" size="30" type="text" id="full_name"
                                                    name="billing_address[full_name]" value="Phan Xuân Sỹ"
                                                    autocomplete="false" required>
                                            </div>
                                        </div>
                                        <div class="field field-required   field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="phone">Số điện
                                                    thoại</label>
                                                <input autocomplete="false" placeholder="Số điện thoại"
                                                    autocapitalize="off" spellcheck="false" class="field-input"
                                                    size="30" maxlength="15" type="tel" id="phone"
                                                    name="billing_address[phone]" value="0788641673" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="fieldset">
                                        <form autocomplete="off" id="form_update_shipping_method" class="field default"
                                            accept-charset="UTF-8" method="post">
                                            <input name="utf8" type="hidden" value="✓">
                                            <div class="content-box mt0">
                                                <div id="form_update_location_customer_shipping"
                                                    class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary "
                                                    for="customer_pick_at_location_false">
                                                    <input name="utf8" type="hidden" value="✓">
                                                    <div class="order-checkout__loading--box">
                                                        <div class="order-checkout__loading--circle"></div>
                                                    </div>
                                                    <div class="field field-required  field-show-floating-label">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="address">Địa
                                                                chỉ</label>
                                                            <input placeholder="Địa chỉ" autocapitalize="off"
                                                                spellcheck="false" class="field-input" size="30"
                                                                type="text" id="address"
                                                                name="billing_address[address1]" value="112 Hùng Vương"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province">
                                                                Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province"
                                                                name="customer_shipping_province" required>
                                                            </select>
                                                        </div>


                                                    </div>


                                                    <div
                                                        class="field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label"
                                                                for="customer_shipping_district">Quận / huyện</label>
                                                            <select class="field-input" id="customer_shipping_district"
                                                                name="customer_shipping_district">
                                                                <option data-code="null" value="null">Chọn quận / huyện
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div
                                                        class="field field-show-floating-label field-required  field-third  ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_ward">Phường
                                                                / xã</label>
                                                            <select class="field-input" id="customer_shipping_ward"
                                                                name="customer_shipping_ward">
                                                                <option data-code="null" value="null">Chọn phường / xã
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="div_location_country_not_vietnam"
                                                        class="section-customer-information " style="display: none;">
                                                        <div class="field field-two-thirds">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label"
                                                                    for="billing_address_city">Thành phố</label>
                                                                <input placeholder="Thành phố" autocapitalize="off"
                                                                    spellcheck="false" class="field-input" size="30"
                                                                    type="text" id="billing_address_city"
                                                                    name="billing_address[city]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="field field-third">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="billing_address_zip">Mã
                                                                    bưu chính</label>
                                                                <input placeholder="Mã bưu chính" autocapitalize="off"
                                                                    spellcheck="false" class="field-input" size="30"
                                                                    type="text" id="billing_address_zip"
                                                                    name="billing_address[zip]" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <div id="change_pick_location_or_shipping">




                                </div>
                            </div>



                        </div>
                        <div class="step-footer" id="step-footer-checkout">
                            <a href="#" id="btn-content-detail" class="step-footer-continue-btn btn">
                                <span>Tiếp tục đến phương thức thanh toán</span>
                                <i class="btn-spinner icon icon-button-spinner"></i>
                            </a>
                            <a class="step-footer-previous-link" href="{{ route('cart.index') }}">
                                Giỏ hàng
                            </a>


                        </div>
                    </div>
                </div>
                <div class="main-content hidden" id="payment">


                    <div id="checkout_order_information_changed_error_message" class="hidden" style="margin-bottom:15px">



                        <p class="field-message field-message-error alert alert-danger"><svg x="0px"
                                y="0px" viewBox="0 0 286.054 286.054"
                                style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve">
                                <g>
                                    <path style="fill:#E2574C;"
                                        d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027 c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236 c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209 S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972 c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723 c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843 C160.878,195.732,152.878,187.723,143.036,187.723z">
                                    </path>
                                </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                                <g> </g>
                            </svg>
                            <span>



                            </span>

                        </p>
                    </div>
                    <div class="step">
                        <div class="step-sections " step="2">
                            <div id="section-shipping-rate" class="section">
                                <div class="order-checkout__loading--box">
                                    <div class="order-checkout__loading--circle"></div>
                                </div>
                                <div class="section-header">
                                    <h2 class="section-title">Phương thức vận chuyển</h2>
                                </div>
                                <div class="section-content">

                                    <div class="content-box">

                                        <div class="content-box-row">
                                            <div class="radio-wrapper">
                                                <label class="radio-label" for="shipping_rate_id_1000409448">
                                                    <div class="radio-input">
                                                        <input id="shipping_rate_id_1000409448" class="input-radio"
                                                            type="radio" name="shipping_rate_id" value="1000409448"
                                                            checked="">
                                                    </div>
                                                    <span class="radio-label-primary">Giao hàng tận nơi</span>
                                                    <span class="radio-accessory content-box-emphasis">
                                                        0₫
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div id="section-payment-method" class="section">
                                <div class="order-checkout__loading--box">
                                    <div class="order-checkout__loading--circle"></div>
                                </div>
                                <div class="section-header">
                                    <h2 class="section-title">Phương thức thanh toán</h2>
                                </div>
                                <div class="section-content">
                                    <div class="content-box">


                                        <div class="radio-wrapper content-box-row">
                                            <label class="two-page" for="payment_method_">
                                                <div class="radio-input payment-method-checkbox">
                                                    <input id="payment_method_" class="input-radio"
                                                        name="payment_method_id" type="radio" value="0"
                                                        checked="">
                                                </div>

                                                <div class="radio-content-input">
                                                    <img class="main-img"
                                                        src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=4">
                                                    <div class="content-wrapper">
                                                        <span class="radio-label-primary">Thanh toán khi giao hàng
                                                            (COD)</span>
                                                        <span class="quick-tagline hidden"></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="radio-wrapper content-box-row">
                                            <label class="two-page" for="payment_method__">
                                                <div class="radio-input payment-method-checkbox">
                                                    <input id="payment_method__" class="input-radio"
                                                        name="payment_method_id" type="radio" value="1">
                                                </div>

                                                <div class="radio-content-input">
                                                    <img class="main-img"
                                                        src="https://hstatic.net/0/0/global/design/seller/image/payment/other.svg?v=4">
                                                    <div class="content-wrapper">
                                                        <span class="radio-label-primary">Chuyển khoản qua ngân hàng</span>
                                                        <span class="quick-tagline hidden"></span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="radio-wrapper content-box-row content-box-row-secondary"
                                            for="payment_method_id_1003594838">
                                            <div class="blank-slate">
                                                *Lưu ý: Nhân viên sẽ gọi xác nhận và thông báo số tiền cần chuyển khoản của
                                                quý khách, quý khách vui lòng không chuyển khoản trước.

                                                • ACB CN Thống Nhất : 12466 - LƯƠNG NGỌC PHƯƠNG CHI

                                                LƯU Ý
                                                • Khi chuyển khoản quý khách ghi nội dung CK là: TÊN FB CÁ NHÂN + MÃ ĐƠN
                                                HÀNG + SĐT
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="step-footer" id="step-footer-checkout">
                            <form id="checkout_complete" method="post">
                                <input name="form_type" type="hidden" value="checkout">
                                <input name="utf8" type="hidden" value="✓">
                                <input name="data_type" type="hidden" value="liquid">
                                <button type="submit" id="btn-content-payment" class="step-footer-continue-btn btn">
                                    <span>Hoàn tất đơn hàng</span>
                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>

                                <input name="__RequestVerificationToken" type="hidden"
                                    value="CfDJ8FyFPV59mBtNhmQGz0fYZt9IUhVONwdDqdEx1_c-6r_GT1he34ubQodHbzxtDJVVX6parqdtyr4MUZepybgPvMOWp67Qb5roLydPzn7MtdsJwCtyIKoKiJZ1VQ6uh21hI5MaCebu8hTZY57nTQftoqhIiuG8CY-Uxk8RChdLZ9kWqu0Es8gKE7M9344WTh8DQQ">

                            </form> <a class="step-footer-previous-link" href="/cart">
                                Giỏ hàng
                            </a>
                        </div>
                    </div>

                </div>
                <div class="hrv-coupons-popup">
                    <div class="hrv-title-coupons-popup">
                        <p>Chọn giảm giá <span class="count-coupons"></span></p>
                        <div class="hrv-coupons-close-popup">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.1663 2.4785L15.5213 0.833496L8.99968 7.35516L2.47801 0.833496L0.833008 2.4785L7.35468 9.00016L0.833008 15.5218L2.47801 17.1668L8.99968 10.6452L15.5213 17.1668L17.1663 15.5218L10.6447 9.00016L17.1663 2.4785Z"
                                    fill="#424242"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="hrv-content-coupons-code">
                        <h3 class="coupon_heading">Mã giảm giá của shop</h3>
                        <div class="hrv-discount-code-web">
                        </div>
                        <div class="hrv-discount-code-external">

                        </div>
                    </div>
                </div>
                <div class="hrv-coupons-popup-site-overlay"></div>
                <div class="main-footer footer-powered-by">Powered by AlanSNguyen</div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/cart/detail.js') }}" type="module"></script>
@endpush
