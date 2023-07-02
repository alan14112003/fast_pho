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
    <div class="container" style="margin-top: 2rem;">
        <section class="box">
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
                    </tr>
                    </thead>
                    <tbody id="body-content-photo">
                    </tbody>
                </table>
            </div>
        </section>
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
                    </tr>
                    </thead>
                    <tbody id="body-content-product">
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/cart/history.js') }}" type="module"></script>
@endpush
