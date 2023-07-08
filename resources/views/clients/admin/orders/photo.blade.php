@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <script>
        let orderId = '{{ $id }}'
    </script>
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Thông tin hóa đơn photo</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin hóa đơn photo</li>
                </ol>
            </nav>
            <button class="btn btn-primary print-order">In hóa đơn</button>
        </div>
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="avatar-box mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="" style="max-width: 100px">
                            </div>
                            <div class="card-header">
                                <h3 class="text-center">Thông tin hóa đơn photo</h3>
                            </div>
                            <div class="card-body pt-0">
                                <h4>THÔNG TIN NGƯỜI NHẬN</h4>
                                <table>
                                    <tr>
                                        <td>Tên: </td>
                                        <td class="user_name"></td>
                                    </tr>
                                    <tr>
                                        <td>Sdt: </td>
                                        <td class="user_phone"></td>
                                    </tr>
                                    <tr>
                                        <td>Đc: </td>
                                        <td class="user_address"></td>
                                    </tr>
                                </table>
                                <h6 class="my-3">HÌNH THỨC THANH TOÁN: <span class="type"></span> </h6>
                                <h4 class="mt-4">PHOTO</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên photo</th>
                                            <th>Hình thức</th>
                                            <th>loại giấy</th>
                                            <th>SM</th>
                                            <th>bìa</th>
                                            <th>SL</th>
                                            <th class="col-4">Ghi chú</th>
                                            <th>Giá</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="body-content"></tbody>
                                </table>
                                <div>
                                    Tổng cộng: <span class="total total-view"></span> <span
                                        class="total-handle d-none"><input type="text"> <button
                                            class="btn btn-primary btn-sm">ok</button></span>
                                    <button class="btn btn-primary ms-2 btn-add-total">nhập giá tổng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                <p class="mb-0 text-dash-gray">2023{{ now()->year - 2023 === 0 ? '' : ' - ' . now()->year }} © Fast Pho.
                    Design by <a href="https://www.facebook.com/profile.php?id=100048327580198">DoubleS
                        Team</a>.</p>
            </div>
        </footer>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/orders/photo.js') }}" type="module"></script>
@endpush
