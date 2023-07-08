@extends('layouts.users.master')
@push('styles')
    <style>
        table:not(.table) tr td,
        th {
            padding: 0 10px 0 0;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .bank_box {
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
            padding: 12px;
            margin-top: 12px;
        }

        .bill-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 24px;
        }

        .bill-h3 {
            font-size: 18px;
            font-weight: bold;
        }
        
        .info-banks {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
    <script>
        let orderId = '{{ $id }}'
    </script>
@endpush
@section('content')
    <div class="mt-5 container-fluid">
        <section class="row">
            <section class="col-lg-8">
                <section class="tables py-0 pb-2">
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <div class="card mb-0">
                                <div class="avatar-box mb-4">
                                    <img src="{{ asset('images/logo.png') }}" alt="" style="max-width: 100px">
                                </div>
                                <div>
                                    <h2 class="text-center bill-title">HÓA ĐƠN SẢN PHẨM</h2>
                                </div>
                                <div class="card-body pt-0">
                                    <h3 class="bill-h3">THÔNG TIN NGƯỜI NHẬN</h3>
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
                                    <p class="my-2">HÌNH THỨC THANH TOÁN: <span class="type"></span> </p>
                                    <table class="table table-bordered">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Loại</th>
                                                <th>Đơn giá</th>
                                                <th>Giảm giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-content"></tbody>
                                    </table>
                                    <div>
                                        Tổng cộng: <span class="total"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center fw-bold">
                                        THANK YOU
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <section class="box-info mb-4 col-lg-4">
                <div class="container-fluid">
                    <h3 class="mt-1 info-banks">Thông tin thanh toán</h3>
                    <div class="banks mt-2">
                    </div>
                </div>
            </section>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/admin/orders/product.js') }}" type="module"></script>

    <script type="module">
        import { renderBanks } from "{{ asset('js/helper.js') }}";
        await renderBanks('.banks')

        const bankBox = $('.banks .bank_box')
        bankBox.removeClass()
        bankBox.addClass('col-12  bank_box')
    </script>
@endpush
