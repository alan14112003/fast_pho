@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
@endpush
@section('content')
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-color: black">
                <div class="swiper-content">
                    <div class="banner">
                        <img src="{{ asset('images/slide_1.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-color: yellowgreen">
                <div class="swiper-content">
                </div>
            </div>
            <div class="swiper-slide" style="background-color: yellow">
                <div class="swiper-content">
                </div>
            </div>
            <div class="swiper-slide" style="background-color: yellow">
                <div class="swiper-content">
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="main-gif position-fixed">
        <div class="main-gif__bg"></div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/users/index.js') }}"></script>
@endpush
