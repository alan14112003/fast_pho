@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/cart/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="wrapper-cart-detail">
        <div class="container-fluid">
            <div class="heading-page">
                <div class="header-page">
                    <h1>Giỏ hàng của bạn</h1>
                    <p class="count-cart">Có <span>0</span> sản phẩm trong giỏ hàng</p>
                </div>
            </div>
            <div class="row wrapbox-content-cart">
                <div class="col-md-8 col-sm-8 contentCart-detail">
                    <div class="cart-container">
                        <div class="cart-col-left">
                            <div class="main-content-cart">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table-cart">
                                            <thead>
                                                <tr>
                                                    <th class="image">&nbsp;</th>
                                                    <th class="item"></th>
                                                    <th class="remove">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart-body-main">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-md-6 col-sm-12">
                                        <div class="sidebox-group">
                                            <h4>Ghi chú đơn hàng</h4>
                                            <div class="checkout-note clearfix">
                                                <textarea id="note" name="note" rows="4" placeholder="Ghi chú"></textarea>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 col-sm-12 hidden-xs">
                                        <div class="sidebox-group sidebox-policy">
                                            <h4>Chính sách mua hàng</h4>
                                            <ul>
                                                <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                                <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                                <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống</li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 sidebarCart-sticky">
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
                                <p>Phí vận chuyển sẽ được tính ở trang thanh toán.<br>
                                    Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                            </div>
                            <div class="sidebox-order_action">
                                <a href="{{ route('cart.details') }}" class="button dark btncart-checkout">THANH TOÁN</a>
                                <p class="link-continue text-center">
                                    <a href="{{ route('products.index') }}">
                                        <i class="fa fa-reply"></i> Tiếp tục mua hàng
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/cart/index.js') }}" type="module"></script>
@endpush
