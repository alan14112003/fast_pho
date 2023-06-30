@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/products/show.css') }}">
@endpush
@section('content')
    <div class="nybody">
        <div class="prodetail_sub antart_b">
            <div class="w1400">
                <a href="{{ route('index') }}">
                    Trang chủ
                </a>
                <span>&gt;</span>
                <a href="{{ route('products.index') }}">
                    Danh mục sản phẩm
                </a>
                <span>&gt;</span>
                <a class="a" id="category-name"></a>
            </div>
        </div>
        <div class="prode-show por">
            <a href="https://vn.deliworld.com/product/lists.html " class="antart_bo backlist poa">Quay lại</a>
            <div class="w1080 por mt-2">
                <div class="proshow_img wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="big_img" id="big_img">
                        <img alt="" src="">
                    </div>
                    <div class="small_img">
                        <div class="swiper-container small_swiper swiper-container-horizontal">
                        </div>
                    </div>
                </div>

                <div class="proshow_con poa antart_b por wow fadeInUp animated" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="title" id="p_name"></div>

                    <div class="proshow_box">
                        <div class="con_item">
                            <span class="price"></span>
                        </div>
                    </div>
                    <div class="proshow_box">
                        <div class="con_item a">
                            <span>Màu sắc: </span>
                        </div>
                        <div class="con_item colors container">
                        </div>
                    </div>
                    <div class="proshow_box full">
                        <div class="con_item a">
                            <span>Số lượng :</span>
                        </div>
                        <div class="con_item">
                            <div class="number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                <input class="quantity" min="1" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus"></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="#" class="contact_link _" id="add_cart">
                            Thêm vào giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="descriptions">

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/products/show.js') }}" type="module"></script>
@endpush
