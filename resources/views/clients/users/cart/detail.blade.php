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
                            <div></div>
                            {{-- <div class="order-summary-section order-summary-section-discount"
                                data-order-summary-section="discount">
                                <form id="form_discount_add" accept-charset="UTF-8" method="post">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="fieldset">
                                        <div class="field  ">
                                            <div class="field-input-btn-wrapper">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                    <input placeholder="Mã giảm giá" class="field-input"
                                                        data-discount-field="true" autocomplete="false" autocapitalize="off"
                                                        spellcheck="false" size="30" type="text" id="discount.code"
                                                        name="discount.code" value="">
                                                </div>
                                                <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                                    <span class="btn-content">Sử dụng</span>
                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}

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
                                                    1,730,000₫
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
                                                    1,730,000₫
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

                            Thông tin giao hàng

                        </li>
                        <li class="breadcrumb-item ">

                            <a href="/checkouts/7319231ceb8b491187cdc7a39097aa67?step=2" class="breadcrumb-link">

                                Phương thức thanh toán

                            </a>

                        </li>

                    </ul>

                </div>
                <div class="main-content">
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
                    <script>
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                    </script>
                    <div class="step">
                        <div class="step-sections " step="1">
                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                <div class="section-content section-customer-information no-mb">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="inventory_location_data">
                                        <input name="customer_shipping_country" type="hidden" value="241">
                                        <input name="customer_shipping_province" type="hidden" value="33">
                                        <input name="customer_shipping_district" type="hidden" value="369">
                                        <input name="customer_shipping_ward" type="hidden" value="20407">
                                    </div>
                                    <input type="hidden" name="checkout_user[email]" value="phanxuansy219812@gmail.com">
                                    <div class="logged-in-customer-information">&nbsp;
                                        <div class="logged-in-customer-information-avatar-wrapper">
                                            <div class="logged-in-customer-information-avatar gravatar"
                                                style="background-image: url(//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank);filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank', sizingMethod='scale')">
                                            </div>
                                        </div>
                                        <p class="logged-in-customer-information-paragraph">
                                            Phan Xuân Sỹ (phanxuansy219812@gmail.com)
                                            <br>
                                            <a
                                                href="/account/logout?return_url=%2Fcheckouts%2F7319231ceb8b491187cdc7a39097aa67%3Fstep%3D1">Đăng
                                                xuất</a>
                                        </p>
                                    </div>
                                    <div class="fieldset">
                                        <div class="field field-show-floating-label">
                                            <div class="field-input-wrapper field-input-wrapper-select">
                                                <label class="field-label" for="stored_addresses">Thêm địa chỉ
                                                    mới...</label>
                                                <select class="field-input" id="stored_addresses">
                                                    <option value="0" data-properties="{}">Địa chỉ đã lưu trữ
                                                    </option>
                                                    <option value="1128620155"
                                                        data-properties="{&quot;id&quot;:1128620155,
                                                                &quot;last_name&quot;:&quot;Phan Xuân&quot;,
                                                                &quot;first_name&quot;:&quot;Sỹ&quot;,
                                                                &quot;phone&quot;:&quot;0788641673&quot;,
                                                                &quot;address1&quot;:&quot;112 Hùng Vương&quot;,
                                                                &quot;zip&quot;:null,
                                                                &quot;city&quot;:null,
                                                                &quot;country&quot;:&quot;Vietnam&quot;,
                                                                &quot;country_id&quot;:&quot;241&quot;,
                                                                &quot;province&quot;:&quot;Quảng Nam&quot;,
                                                                &quot;province_id&quot;:&quot;33&quot;,
                                                                &quot;district&quot;:&quot;Thành phố Hội An&quot;,
                                                                &quot;district_id&quot;:&quot;369&quot;,
                                                                &quot;ward&quot;:&quot;Phường Thanh Hà&quot;,
                                                                &quot;wardid&quot;:&quot;20407&quot;,
                                                                &quot;default&quot;:true}"
                                                        selected="">
                                                        0788641673,
                                                        112 Hùng Vương,


                                                        Phường Thanh Hà,
                                                        Thành phố Hội An,
                                                        Quảng Nam,
                                                        Vietnam
                                                    </option>
                                                    <option value="1130670892"
                                                        data-properties="{&quot;id&quot;:1130670892,
                                                                &quot;last_name&quot;:&quot;Phan Xuân&quot;,
                                                                &quot;first_name&quot;:&quot;Sỹ&quot;,
                                                                &quot;phone&quot;:null,
                                                                &quot;address1&quot;:null,
                                                                &quot;zip&quot;:null,
                                                                &quot;city&quot;:null,
                                                                &quot;country&quot;:&quot;Vietnam&quot;,
                                                                &quot;country_id&quot;:&quot;241&quot;,
                                                                &quot;province&quot;:null,
                                                                &quot;province_id&quot;:null,
                                                                &quot;district&quot;:null,
                                                                &quot;district_id&quot;:null,
                                                                &quot;ward&quot;:null,
                                                                &quot;wardid&quot;:null,
                                                                &quot;default&quot;:false}">
                                                        Vietnam
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_full_name">Họ và
                                                    tên</label>
                                                <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                    class="field-input" size="30" type="text"
                                                    id="billing_address_full_name" name="billing_address[full_name]"
                                                    value="Phan Xuân Sỹ" autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="field field-required   field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_phone">Số điện
                                                    thoại</label>
                                                <input autocomplete="false" placeholder="Số điện thoại"
                                                    autocapitalize="off" spellcheck="false" class="field-input"
                                                    size="30" maxlength="15" type="tel"
                                                    id="billing_address_phone" name="billing_address[phone]"
                                                    value="0788641673">
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
                                                            <label class="field-label" for="billing_address_address1">Địa
                                                                chỉ</label>
                                                            <input placeholder="Địa chỉ" autocapitalize="off"
                                                                spellcheck="false" class="field-input" size="30"
                                                                type="text" id="billing_address_address1"
                                                                name="billing_address[address1]" value="112 Hùng Vương">
                                                        </div>
                                                    </div>

                                                    <input name="selected_customer_shipping_country" type="hidden"
                                                        value="241">
                                                    <input name="selected_customer_shipping_province" type="hidden"
                                                        value="33">
                                                    <input name="selected_customer_shipping_district" type="hidden"
                                                        value="369">
                                                    <input name="selected_customer_shipping_ward" type="hidden"
                                                        value="20407">

                                                    <div
                                                        class="field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province">
                                                                Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province"
                                                                name="customer_shipping_province">
                                                                <option data-code="null" value="null">

                                                                    Chọn tỉnh / thành </option>



                                                                <option data-code="HC" value="50">Hồ Chí Minh</option>



                                                                <option data-code="HI" value="1">Hà Nội</option>



                                                                <option data-code="DA" value="32">Đà Nẵng</option>



                                                                <option data-code="AG" value="57">An Giang</option>



                                                                <option data-code="BV" value="49">Bà Rịa - Vũng Tàu
                                                                </option>



                                                                <option data-code="BI" value="47">Bình Dương</option>



                                                                <option data-code="BP" value="45">Bình Phước</option>



                                                                <option data-code="BU" value="39">Bình Thuận</option>



                                                                <option data-code="BD" value="35">Bình Định</option>



                                                                <option data-code="BL" value="62">Bạc Liêu</option>



                                                                <option data-code="BG" value="15">Bắc Giang</option>



                                                                <option data-code="BK" value="4">Bắc Kạn</option>



                                                                <option data-code="BN" value="18">Bắc Ninh</option>



                                                                <option data-code="BT" value="53">Bến Tre</option>



                                                                <option data-code="CB" value="3">Cao Bằng</option>



                                                                <option data-code="CM" value="63">Cà Mau</option>



                                                                <option data-code="CN" value="59">Cần Thơ</option>



                                                                <option data-code="GL" value="41">Gia Lai</option>



                                                                <option data-code="HG" value="2">Hà Giang</option>



                                                                <option data-code="HM" value="23">Hà Nam</option>



                                                                <option data-code="HT" value="28">Hà Tĩnh</option>



                                                                <option data-code="HO" value="11">Hòa Bình</option>



                                                                <option data-code="HY" value="21">Hưng Yên</option>



                                                                <option data-code="HD" value="19">Hải Dương</option>



                                                                <option data-code="HP" value="20">Hải Phòng</option>



                                                                <option data-code="HU" value="60">Hậu Giang</option>



                                                                <option data-code="KH" value="37">Khánh Hòa</option>



                                                                <option data-code="KG" value="58">Kiên Giang</option>



                                                                <option data-code="KT" value="40">Kon Tum</option>



                                                                <option data-code="LI" value="8">Lai Châu</option>



                                                                <option data-code="LA" value="51">Long An</option>



                                                                <option data-code="LO" value="6">Lào Cai</option>



                                                                <option data-code="LD" value="44">Lâm Đồng</option>



                                                                <option data-code="LS" value="13">Lạng Sơn</option>



                                                                <option data-code="ND" value="24">Nam Định</option>



                                                                <option data-code="NA" value="27">Nghệ An</option>



                                                                <option data-code="NB" value="25">Ninh Bình</option>



                                                                <option data-code="NT" value="38">Ninh Thuận</option>



                                                                <option data-code="PT" value="16">Phú Thọ</option>



                                                                <option data-code="PY" value="36">Phú Yên</option>



                                                                <option data-code="QB" value="29">Quảng Bình</option>



                                                                <option data-code="QM" value="33" selected="">
                                                                    Quảng Nam</option>



                                                                <option data-code="QG" value="34">Quảng Ngãi</option>



                                                                <option data-code="QN" value="14">Quảng Ninh</option>



                                                                <option data-code="QT" value="30">Quảng Trị</option>



                                                                <option data-code="ST" value="61">Sóc Trăng</option>



                                                                <option data-code="SL" value="9">Sơn La</option>



                                                                <option data-code="TH" value="26">Thanh Hóa</option>



                                                                <option data-code="TB" value="22">Thái Bình</option>



                                                                <option data-code="TY" value="12">Thái Nguyên</option>



                                                                <option data-code="TT" value="31">Thừa Thiên Huế
                                                                </option>



                                                                <option data-code="TG" value="52">Tiền Giang</option>



                                                                <option data-code="TV" value="54">Trà Vinh</option>



                                                                <option data-code="TQ" value="5">Tuyên Quang</option>



                                                                <option data-code="TN" value="46">Tây Ninh</option>



                                                                <option data-code="VL" value="55">Vĩnh Long</option>



                                                                <option data-code="VT" value="17">Vĩnh Phúc</option>



                                                                <option data-code="YB" value="10">Yên Bái</option>



                                                                <option data-code="DB" value="7">Điện Biên</option>



                                                                <option data-code="DC" value="42">Đắk Lắk</option>



                                                                <option data-code="DO" value="43">Đắk Nông</option>



                                                                <option data-code="DN" value="48">Đồng Nai</option>



                                                                <option data-code="DT" value="56">Đồng Tháp</option>



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


                                                                <option data-code="QM381" value="381">Huyện Bắc Trà My
                                                                </option>

                                                                <option data-code="QM371" value="371">Huyện Đại Lộc
                                                                </option>

                                                                <option data-code="QM372" value="372">Huyện Điện Bàn
                                                                </option>

                                                                <option data-code="QM804" value="804">Huyện Đông Giang
                                                                </option>

                                                                <option data-code="QM373" value="373">Huyện Duy Xuyên
                                                                </option>

                                                                <option data-code="QM374" value="374">Huyện Giằng
                                                                </option>

                                                                <option data-code="QM370" value="370">Huyện Hiên
                                                                </option>

                                                                <option data-code="QM377" value="377">Huyện Hiệp Đức
                                                                </option>

                                                                <option data-code="QM806" value="806">Huyện Nam Giang
                                                                </option>

                                                                <option data-code="QM803" value="803">Huyện Nam Trà My
                                                                </option>

                                                                <option data-code="QM782" value="782">Huyện Nông Sơn
                                                                </option>

                                                                <option data-code="QM380" value="380">Huyện Núi Thành
                                                                </option>

                                                                <option data-code="QM783" value="783">Huyện Phú Ninh
                                                                </option>

                                                                <option data-code="QM379" value="379">Huyện Phước Sơn
                                                                </option>

                                                                <option data-code="QM376" value="376">Huyện Quế Sơn
                                                                </option>

                                                                <option data-code="QM805" value="805">Huyện Tây Giang
                                                                </option>

                                                                <option data-code="QM375" value="375">Huyện Thăng Bình
                                                                </option>

                                                                <option data-code="QM378" value="378">Huyện Tiên Phước
                                                                </option>

                                                                <option data-code="QM369" value="369" selected="">
                                                                    Thành phố Hội An</option>

                                                                <option data-code="QM368" value="368">Thành phố Tam Kỳ
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


                                                                <option data-code="20419" value="20419">Phường Cẩm An
                                                                </option>

                                                                <option data-code="20413" value="20413">Phường Cẩm Châu
                                                                </option>

                                                                <option data-code="20428" value="20428">Phường Cẩm Nam
                                                                </option>

                                                                <option data-code="20404" value="20404">Phường Cẩm Phô
                                                                </option>

                                                                <option data-code="20416" value="20416">Phường Cửa Đại
                                                                </option>

                                                                <option data-code="20398" value="20398">Phường Minh An
                                                                </option>

                                                                <option data-code="20410" value="20410">Phường Sơn Phong
                                                                </option>

                                                                <option data-code="20407" value="20407" selected="">
                                                                    Phường Thanh Hà</option>

                                                                <option data-code="20401" value="20401">Phường Tân An
                                                                </option>

                                                                <option data-code="20422" value="20422">Xã Cẩm Hà
                                                                </option>

                                                                <option data-code="20425" value="20425">Xã Cẩm Kim
                                                                </option>

                                                                <option data-code="20431" value="20431">Xã Cẩm Thanh
                                                                </option>

                                                                <option data-code="20434" value="20434">Xã Tân Hiệp
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


                            <form id="form_next_step" accept-charset="UTF-8" method="post">
                                <input name="utf8" type="hidden" value="✓">
                                <button type="submit" class="step-footer-continue-btn btn">
                                    <span class="btn-content">Tiếp tục đến phương thức thanh toán</span>
                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                </button>
                            </form>
                            <a class="step-footer-previous-link" href="/cart">
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
