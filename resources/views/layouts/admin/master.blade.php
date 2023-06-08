<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        FAST PHO - Một Giải Pháp Chuyển đổi số Photocopy
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">

    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.default.css') }}" id="theme-stylesheet">
    @stack('styles')
</head>

<body>
    @include('layouts.admin.header')
    <div class="d-flex align-items-stretch">
        @include('layouts.admin.sidebar')
        @yield('content')
    </div>
    <div class="toast-container position-fixed p-3 top-0 end-0">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        </div>
    </div>
    {{-- @include('layouts.admin.footer') --}}
</body>
@include('libraries')
@stack('scripts')

</html>
