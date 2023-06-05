@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/users/index.css') }}">
@endpush
@section('content')
    <div class="main-gif position-fixed">
        <div class="main-gif__bg"></div>
    </div>
    <div class="banner">
        <img src="{{ asset('images/slide_1.jpg') }}" alt="">
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/users/index.js') }}"></script>
@endpush
