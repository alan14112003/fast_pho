@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/cart/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/photocopy.css') }}">
@endpush
@section('content')
    <div class="container row col-xl-12">
        <div class="col-xl-9">
            <div class="step mb-2">
                <div class="line_ show">
                </div>
                <div class="panel" style="padding: 0 10px;">
                    <div class="step-sections " step="1">
                        <div class="section">
                            <div class="section-header">
                                <h2 class="section-title">Thông tin giao hàng</h2>
                            </div>
                            <div class="section-content section-customer-information no-mb">
                                <div class="logged-in-customer-information">&nbsp;
                                    <div class="logged-in-customer-information-avatar-wrapper">
                                        <div class="logged-in-customer-information-avatar gravatar"
                                            style="background-image: url(//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank);
                                            filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/f9c70ec134cefbbe4124e7178fb0e1b3.jpg?s=100&amp;d=blank',
                                            sizingMethod='scale')">
                                        </div>
                                    </div>
                                    <p class="logged-in-customer-information-paragraph">
                                    </p>
                                </div>
                                <div class="fieldset col-xl-12">
                                    <div class="field field-show-floating-label row col-xl-12">
                                        <div class="field-input-wrapper col-xl-6">
                                            <label class="field-label" for="full_name">Họ và
                                                tên</label>
                                            <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                class="field-input" size="30" type="text" id="full_name"
                                                autocomplete="false" required="">
                                        </div>
                                        <div class="field-input-wrapper col-xl-6">
                                            <label class="field-label" for="phone">Số điện
                                                thoại</label>
                                            <input autocomplete="false" placeholder="Số điện thoại" autocapitalize="off"
                                                spellcheck="false" class="field-input" size="30" maxlength="15"
                                                type="tel" id="phone" required="">
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
                                                <div class="field field-required  field-show-floating-label row col-xl-12">
                                                    <div class="field-input-wrapper col-xl-6">
                                                        <label class="field-label" for="address">Thời gian nhận
                                                            hàng (nếu có)</label>
                                                        <input placeholder="Thời gian nhận hàng (nếu có)"
                                                            autocapitalize="off" spellcheck="false" class="field-input"
                                                            size="30" type="text" id="time_receive">
                                                    </div>
                                                    <div class="field-input-wrapper col-xl-6">
                                                        <label class="field-label" for="address">Địa
                                                            chỉ</label>
                                                        <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false"
                                                            class="field-input" size="30" type="text" id="address"
                                                            required="">
                                                    </div>
                                                </div>
                                                <div class="row col-xl-12" style="padding: 0 25px;">
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province">
                                                                Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province"
                                                                name="customer_shipping_province" required="">
                                                                <option value="01" selected="">Hà Nội</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required field-third ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label"
                                                                for="customer_shipping_district">Quận /
                                                                huyện</label>
                                                            <select class="field-input" id="customer_shipping_district"
                                                                name="customer_shipping_district">
                                                                <option value="null">Chọn quận / huyện
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div
                                                        class="col-xl-4 field field-show-floating-label field-required  field-third  ">
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
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group">
            </div>
        </div>
        <div class="col-xl-3">
            <div class="sidebox-order">
                <div class="sidebox-order-inner">
                    <div class="sidebox-order_title">
                        <h3>Thông tin đơn hàng</h3>
                    </div>
                    <div class="sidebox-order_total">
                        <p>Tổng tiền:
                            <span class="total-price">0₫</span>
                        </p>
                    </div>
                    <div class="sidebox-order_text">
                        <p>*Tổng tiền chỉ mang tính tương đối.<br>
                    </div>
                    <div class="sidebox-order_action">
                        <a href="#" id="btn-create-order" class="button dark btncart-checkout">THANH
                            TOÁN</a>
                        <p class="link-continue text-center">
                            <a href="https://fast_pho.com/products">
                                <i class="fa fa-reply"></i> Tiếp tục mua hàng
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <a href="#" id="btn-create-photo" class="step-footer-continue-btn btn">
                    <span>Thêm bản ghi</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </a>
                <a href="#" id="btn-calculate-total" class="step-footer-continue-btn btn">
                    <span>Tính tổng tiền</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </a>
            </div>
            <ul class="mt-2 list-type">
                <label for="">Các loại giấy:</label>
                <li class="mt-1">1. A4 80gsm dày hơn và có tính chất cứng tốt hơn, nó thường được sử dụng trong các công
                    việc yêu cầu
                    giấy bền hơn như in sách, báo, tài liệu quan trọng, hay các công việc cần độ mịn cao như in brochure,
                    catalog.</li>
                <li class="mt-1">2. A4 70gsm thường nhẹ hơn và giá thành thấp hơn so với A4 80gsm. Do đó, nó thích hợp
                    cho các tài liệu
                    hàng ngày, như in ấn nội bộ, các tài liệu làm việc, ghi chú, hoặc các tài liệu không yêu cầu độ bền và
                    độ mịn cao.</li>
            </ul>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/photocopy.js') }}" type="module"></script>
@endpush
