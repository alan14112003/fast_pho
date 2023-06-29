@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/product.css') }}">
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}">
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Tables</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="modal" id="modal-categories" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Danh sách danh mục</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div>
                                <label for="" id="parent-label">Danh mục</label>
                            </div>
                            <form class="d-flex align-items-center" id="form-c-category">
                                <input type="hidden" name="parent_id" id="parent-id">
                                <input class="form-control" type="text" id="category_name_inp" name="name">
                                <button class="btn">Thêm</button>
                                <button type="reset" class="btn d-none" id="cancel-c-category">Hủy</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="h4 mb-0">Sửa sản phẩm</h3>
                            </div>
                            <div class="card-body pt-0">
                                <form id="form-update-comic" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table">
                                        <tbody>
                                            <tr class="form-group">
                                                <div class="d-flex">
                                                    <div class="col-4 pe-4">
                                                        <label for="name">Tên sản phẩm <span
                                                                class="c_red">(*)</span>:</label>
                                                        <input type="text" placeholder="Nhập tên sản phẩm.."
                                                            name="name" id="name" value=""
                                                            class="form-control mt-1">
                                                    </div>
                                                    <div class="col-4 pe-4">
                                                        <label for="image">Hình ảnh:</label>
                                                        <input type="file" name="image" id="image"
                                                            oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                            class="form-control mt-1">
                                                    </div>
                                                    <div class="col-4 pe-4">
                                                        <img src="" alt="" id="pic" height="100"
                                                            class="" style="cursor: pointer">
                                                        <div id="overlay" class="custom-file-input"></div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr class="form-group">
                                                <div class="d-flex mt-2  position-relative">
                                                    <div class="col-4 pe-4">
                                                        <label for="category_" class="mt-1 ps-0 col-12">
                                                            Danh mục:
                                                            <span class="btn btn-secondary position-absolute"
                                                                style="top: -15px; right: 25px"
                                                                onclick="$('#modal-categories').modal('show')">
                                                                Thêm mới
                                                            </span>
                                                        </label>
                                                        <select id="category_" class="form-control mt-1">
                                                        </select>
                                                    </div>
                                                    <div class="col-4 pe-4">
                                                        <label for="category__"></label>
                                                        <select id="category__" class="form-control mt-2">
                                                        </select>
                                                    </div>
                                                    <div class="col-4 pe-4">
                                                        <label for="category"></label>
                                                        <select name="category" id="category" class="form-control mt-2">
                                                        </select>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr class="form-group">
                                                <div class="d-flex mt-2">
                                                    <div class="col-8">
                                                        <div class="d-flex">
                                                            <div class="col-6 pe-4">
                                                                <label for="price">Giá thành:</label>
                                                                <input type="number" name="price" id="price"
                                                                    placeholder="VD: 100, 35, 128,..."
                                                                    class="form-control mt-1">
                                                            </div>
                                                            <div class="col-6 pe-4">
                                                                <label for="sale">Giảm giá:</label>
                                                                <input type="number" name="sale" id="sale"
                                                                    placeholder="VD: 25" class="form-control mt-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <tr>
                                                <div class="col-12 mt-3">
                                                    <label for="descriptions">Mô tả:</label>
                                                    <textarea name="descriptions" id="descriptions" rows="4" class="form-control mt-1 pb-3">
                                                    </textarea>
                                                </div>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs"
            id="footer">
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
    <script src="{{ asset('js/admin/products/update.js') }}" type="module"></script>
@endpush
