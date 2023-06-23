@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
@endpush
@section('content')
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
            <div class="swiper-slide" style="background-color: black">
                @if($slide->redirect !== null)
                    <a href="{{ $slide->redirect }}">
                @endif
                <div class="swiper-content">
                    <div class="banner">
                        <img src="{{ asset("storage/{$slide->src}") }}"
                             style="object-fit: cover; height: 100vh; width: 100%"
                             alt="{{ $slide->id . $slide->src }}">
                    </div>
                </div>
                @if($slide->redirect !== null)
                    </a>
                @endif
            </div>
            @endforeach
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
