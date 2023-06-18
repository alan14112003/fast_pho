@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/products/index.css') }}">
@endpush
@section('content')
    <div class="nybody por">
        <div class="moblie prolist-wrap">
            <div class="prole bdb">
                <div class="title">
                    <span id="prole_return">&lt; Return</span>
                    <span class="title-t">Categories</span>
                </div>
                <div class="antart_b allproduct" data-id="0" style="color:#333">Tất cả sản phẩm</div>
                <ul class="pcpro_list" id="mpro_list">
                </ul>
            </div>
        </div>
        <div class="prolist-wrap por f-cb">
            <div class="prole bdb fl">
                <div class="antart_b allproduct" data-id="0" style="color:#333">Tất cả sản phẩm</div>
                <ul class="pcpro_list" id="pcpro_list">
                </ul>
            </div>
            <div class="prori fr">
                <a href="javascript:;" class="type-btn" id="type_btn">Categories</a>
                <div class="prori_title wow fadeInUp por animated" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="title antart_b" id="pro_title">
                        <!--          -->
                    </div>
                    <div class="term-box sort" id="sort_box">
                        <span class="antart_b term_title">Loại</span>

                        <div class="ico-box">
                            @foreach ($arrFilter as $val => $key)
                                <div class="ico-item" data-id="{{ $key }}">
                                    <div class="ico"></div>
                                    <span>{{ $val }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="term-box sort por" id="fliter_box">

                    </div>


                    <div class="search_box poa">
                        <input type="text" placeholder="Tìm kiếm " class="text_input" id="search_input">
                        <div class="sub_btn" id="prosearch_btn">
                            <img src="https://vn.deliworld.com/bocstatic/web/img/head_ico2.svg?v=v16 " alt="">
                        </div>
                    </div>

                </div>

                <div class="prori_main" id="ajax-wrap">
                    <ul class="prolist_list f-cb">
                    </ul>
                    <div class="pagination p1">
                        <ul>
                            <a href="#" id="first-paginate">
                                <li>&lt;&lt;</li>
                            </a>
                            <a href="#" id="pre-paginate">
                                <li></li>
                            </a>
                            <a href="#" class="is-active" id="current-paginate">
                                <li></li>
                            </a>
                            <a href="#" id="next-paginate">
                                <li></li>
                            </a>
                            <a href="#" id="last-paginate">
                                <li>&gt;&gt;</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/products/index.js') }}" type="module"></script>
@endpush
