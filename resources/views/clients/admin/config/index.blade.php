@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}">
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Cài đặt</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cài đặt</li>
                </ol>
            </nav>
        </div>
        <div class="mt-2">
            <div class="mail-admin-box d-flex align-items-center">
                <label for="mail-admin-inp" class="me-2">Email admin: </label>
                <input type="text" id="mail-admin-inp">
                <button class="btn btn-sm btn-primary ms-1" id="mail-admin-btn">Đổi</button>
            </div>
        </div>
        <div class="mt-5">
            <a href="{{ route('admin.config.create_bank') }}" class="btn btn-primary">Thêm ngân hàng</a>
            <div class="table-responsive">
                <table class="table mb-0 table-striped table-hover">
                    <thead>
                        <tr>
                            <th>tt</th>
                            <th>Mã Qr</th>
                            <th>Thông tin</th>
                            <th>Ngày tạo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="body-content">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-5">
            <label for="about">Về chúng tôi: </label>
            <textarea id="about"></textarea>
            <button class="btn btn-primary mt-2" id="update-about-btn">Sửa thông tin về chúng tôi</button>
        </div>
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
    <script src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script src="{{ asset('richtexteditor/plugins/all_plugins.js') }}"></script>
    <script src="{{ asset('js/admin/config/mail_admin.js') }}" type="module"></script>
    <script src="{{ asset('js/admin/config/banks.js') }}" type="module"></script>
    <script src="{{ asset('js/admin/config/about.js') }}" type="module"></script>
@endpush
