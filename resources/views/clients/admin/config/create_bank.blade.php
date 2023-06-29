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
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="h4 mb-0">Thêm ngân hàng</h3>
                            </div>
                            <div class="card-body pt-0">
                                <form id="form-store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4 pe-4">
                                            <label for="qr_code">Qr code:</label>
                                            <input type="file" name="qr_code" accept="image/*" id="qr_code"
                                                oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                class="form-control mt-1">
                                        </div>
                                        <div class="col-4 pe-4">
                                            <img src="" alt="" id="pic" height="100" class=""
                                                style="cursor: pointer">
                                            <div id="overlay" class="custom-file-input"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <label for="content">Thông tin:</label>
                                        <textarea name="content" id="content" rows="4" class="form-control mt-1 pb-3">
                                                    </textarea>
                                    </div>
                                    <button class="btn btn-primary">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support
                                            us at https://bootstrapious.com/donate. It is part of the license
                                            conditions. Thank you for understanding :)-->
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
    <script>
        new RichTextEditor("#content")
    </script>
    <script src="{{ asset('js/admin/config/create_bank.js') }}" type="module"></script>
@endpush
