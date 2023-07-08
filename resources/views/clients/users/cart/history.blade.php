@extends('layouts.users.master')
@push('styles')
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
    <div class="container mb-5" style="margin-top: 2.5rem;">
        <section class="box-info">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Chú ý!</strong> *Bạn vui lòng đợi trong giây lát, nhân viên sẽ gọi đến để xác
                nhận đơn hàng.
                Sau khi kết thúc cuộc gọi, bạn vui lòng bấm "<img src="{{ asset('icons/eye.svg') }}" />" để xem chi tiết hóa
                đơn đơn hàng
            </div>
        </section>
        <div class="row">
            <div class="col-lg-6">
                <section class="box mt-3">
                    <h2 class="title">Lịch sử photo copy</h2>
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Số photo</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày tạo</th>
                                    <th>Tình trạng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="body-content-photo">
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="box mt-3">
                    <h2 class="title">Lịch sử mua hàng</h2>
                    <div class="table-responsive">
                        <table class="table mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Số sp</th>
                                    <th>Thanh toán</th>
                                    <th>Ngày tạo</th>
                                    <th>Tình trạng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="body-content-product">
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/cart/history.js') }}" type="module"></script>
@endpush
