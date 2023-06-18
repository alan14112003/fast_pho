@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/product.css') }}">
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Slide</h2>
            </div>
        </div>
        <!-- Breadcrumb-->
        <div class="container-fluid py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3 px-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Slide</li>
                </ol>
            </nav>
        </div>
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="h4 mb-0">Sửa slide</h3>
                            </div>
                            <div class="card-body pt-0">
                                <form id="form-store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <label class="col-sm-3 form-label" for="formFile">File input</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="formFile" name="src" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="" alt="" id="pic" height="200"
                                                style="cursor: pointer; max-width: 100%">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label class="form-label" for="exampleInputPassword1">Chuyển hướng</label>
                                            <input class="form-control" id="exampleInputPassword1" name="redirect">
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="status">Trạng thái</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1">Bật</option>
                                                <option value="0">Tắt</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label" for="index">Vị trí</label>
                                            <select class="form-control" id="index" name="index">
                                            </select>
                                        </div>
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
    <script>
        $('#formFile').on('change', function() {
            $('#pic').removeAttr('src')
            $('#pic').attr('src', window.URL.createObjectURL(this.files[0]))
        })
        const slideId = '{{ $slideId }}'
    </script>
    <script src="{{ asset('js/admin/slides/update.js') }}" type="module"></script>
@endpush
