@extends('layouts.admin.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/product.css') }}">
@endpush
@section('content')
    <div class="page-content form-page">
        <!-- Page Header-->
        <div class="bg-dash-dark-2 py-4">
            <div class="container-fluid">
                <h2 class="h5 mb-0">Sản phẩm chi tiết</h2>
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
        <section class="tables py-0">
            <div class="container-fluid">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h3 class="h4 mb-0">Sửa sản phẩm chi tiết</h3>
                            </div>
                            <div class="card-body pt-0">
                                <form id="form-store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-xl-8 col-lg-8">
                                          <div class="row">
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="type">Loại sản phẩm <span
                                                  class="c_red">(*)</span>:</label>
                                                <input type="text" placeholder="Nhập loại sản phẩm.." name="type"
                                                  id="type" class="form-control mt-1">
                                              </div>
                                            </div>
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="image">Hình ảnh:</label>
                                                        <input type="file" name="image" id="image"
                                                            oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                            class="form-control mt-1">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row my-3">
                                            <div class="col-6">
                                              <div class="form-group">
                                                <label for="total">Số lượng:</label>
                                                            <input type="number" name="total" id="total"
                                                                placeholder="VD: 100, 35, 128,..."
                                                                class="form-control mt-1">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12 col-xl-4 col-lg-4">
                                          <img src="" alt="" id="pic"
                                              class="h-100" style="cursor: pointer; max-width: 100%">
                                          <div id="overlay" class="custom-file-input"></div>
                                      </div>
                                    </div>
                                  <button class="btn btn-primary mt-2">Xác nhận</button>
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
    <script type="module">
      import updateProduct from "{{ asset('js/admin/products/subs/update.js') }}"
      updateProduct('{{ $productId }}', '{{ $id }}')
    </script>
@endpush
