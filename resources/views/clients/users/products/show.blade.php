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
            <div class="w1080 por">
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
                        <div class="con_item">
                            <span>Màu sắc: </span>
                        </div>
                        <div class="con_item colors container">
                        </div>
                    </div>
                    <div class="proshow_box full">
                        <div class="con_item">
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
                        <a href="#" class="contact_link" id="go_to_cart">
                            Mua hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="samepor">
            <div class="w1400 por">
                <div class="title wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Kết nối
                </div>
                <ul class="prolist_list f-cb wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                    <li class="fl por antart_b">
                        <a href="https://vn.deliworld.com/product/detail/19871.html ">
                            <div class="hoverimg js-m imgwidth por animate">
                                <img class="img"
                                    src="http://pcm.deliworld.com/ProductImages/basic-images/thumbnail/300x300/100120194%23EC00520/4%23EC00520%20RED.png"
                                    alt="">
                                <div class="ico poa">
                                </div>
                            </div>

                            <div class="cont">
                                Deli#EC00520 Bút chì 2 đầu 24 màu - 1/24/144 </div>
                            <!-- <div class="new-tip tov">EC00520</div> -->
                            <div class="new-tip">Bút chì màu | </div>
                        </a>
                    </li>
                    <li class="fl por antart_b">
                        <a href="https://vn.deliworld.com/product/detail/19870.html ">
                            <div class="hoverimg js-m imgwidth por animate">
                                <img class="img"
                                    src="http://pcm.deliworld.com/ProductImages/basic-images/thumbnail/300x300/100120196%23EC00500/4%23EC00500%20ASST.png"
                                    alt="">
                                <div class="ico poa">
                                </div>
                            </div>

                            <div class="cont">
                                Deli#EC00500 Bút chì 2 đầu 12 màu - 1/24/240 </div>
                            <!-- <div class="new-tip tov">EC00500</div> -->
                            <div class="new-tip">Bút chì màu | </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-wrap antart_b wow fadeInUp animated" id="subnav_tab"
            style="visibility: visible; animation-name: fadeInUp;">
            <div class="nav-container">
                <div class="nav-item cur">
                    Graphic details
                </div>
                <div class="nav-item">
                    Download
                </div>
            </div>
        </div>

        <div class="prode-main" style="display: block;">
            <div class="w1080" style="text-align:center">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_06.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_05.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_04.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_03.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_02.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_01.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_06.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_05.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_04.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_03.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_02.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_01.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_06.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_05.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_04.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_03.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_02.jpg"
                    alt="">
                <img src="http://pcm.deliworld.com/ProductImages/e-commerce-detailed-images/100120194%23EC00520/100120194%23EC00520_01.jpg"
                    alt="">
            </div>
        </div>


        <div class="prode-main" style="display: none;">
            <div class="w1080">
                <div class="prode-tab js-m fadep animate" id="prode_tab">
                </div>

                <div class="prode_con">
                </div>
                <div class="prode_con">
                </div>

                <div class="prode_con">
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/products/show.js') }}" type="module"></script>
@endpush
