<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        FAST PHO - Nền Tảng Chuyển Đổi Số Photocopy
    </title>

    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    @stack('styles')
    <style>
        .toast {
            font-size: 0.475rem;
        }

        .toast-header {
            padding: .3rem .75rem;
        }

        .toast-body {
            padding: .45rem;
        }
    </style>
</head>

<body>
    @include('layouts.users.header')
    @yield('content')
    @include('layouts.users.footer')
    <div class="toast-container position-fixed p-3 bottom-0 end-0" style="z-index: 1070">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        </div>
    </div>
</body>
@include('libraries')
<script>
    $(".appbtn").on("click", function() {
        $(".app-alert").stop().show();
    })
    $(".app-alert .bg,.app-alert .closebtn").on("click", function() {
        $(".app-alert").stop().hide();
    })
    $('.lang-box').hover(function() {
        if (window.innerWidth > 1024) {
            $(this).find('.lang-dialog').stop().slideDown();
        }
    }, function() {
        if (window.innerWidth > 1024) {
            $(this).find('.lang-dialog').stop().slideUp();
        }
    })

    $('.lang-box .tit').on('click', function(e) {
        e.stopPropagation();
        var _this = $(this);
        if (window.innerWidth < 1025) {
            if (_this.parent().hasClass('on')) {
                _this.parent().removeClass('on');
                _this.next().stop().slideUp();
            } else {
                _this.parent().addClass('on');
                _this.next().stop().slideDown();
            }
        }
        $('.buy-box').removeClass('on');
        $('.nav-btn').removeClass('cur');
        $('.buy-box .sub,.m-nav').stop().slideUp();
    })



    $('#pc_nav_box li').hover(function() {
        $(this).find('.sub-box').stop().slideDown();
        $(this).find('.prosub-box').stop().slideDown();
    }, function() {
        $(this).find('.sub-box').stop().slideUp();
        $(this).find('.prosub-box').stop().slideUp();
    });


    $('#pcsearch_btn').click(function() {
        $('.header-wrap').addClass('search');
    })

    $('#search-close').click(function() {
        $('.header-wrap').removeClass('search');
    })


    $("#btn-bar").on('click', function() {
        if ($(this).hasClass('cur')) {
            $(this).removeClass('cur');
            $('#msub-list').stop().slideUp();
        } else {
            $(this).addClass('cur');
            $('#msub-list').stop().slideDown();
        }
    })

    let a = 0
    $('#type_btn').off('click').on('click', function() {
        $('.nybody.por').on('click', function() {
            if (a) {
                $('.moblie.prolist-wrap').removeClass('show');
                a++;
            } else {
                $('.moblie.prolist-wrap').off('click').on('click', function(e) {
                    if (!$(e.target).closest(".prole.bdb").length)
                        $(this).removeClass('show');
                })
            }
        })
        $('.moblie.prolist-wrap').addClass('show');
    })


    $("#sub-list li").on('click', function() {
        if ($(this).hasClass('cur')) {
            $(this).removeClass('cur');
            $(this).find("dd").stop().slideUp();
            $(this).siblings().find('dd').stop().slideUp();
        } else {
            $(this).addClass('cur').siblings().removeClass('cur');
            $(this).find("dd").stop().slideDown();
            $(this).siblings().find('dd').stop().slideUp();
        }
    })


    $(window).scroll(function() {
        var before = $(window).scrollTop();
        $(window).scroll(function() {
            var after = $(window).scrollTop();
            if (before < after && window.innerWidth > 1024 && before > 0) {
                $('header').addClass('headroom--unpinned');
                before = after;

                if (after > 20) {
                    $('.header-wrap').addClass('cur');
                } else {
                    $('.header-wrap').removeClass('cur');
                }
            };
            if (before > after && window.innerWidth > 1024) {
                if (after > 20) {
                    $('.header-wrap').addClass('cur');
                } else {
                    $('.header-wrap').removeClass('cur');
                }

                $('header').removeClass('headroom--unpinned');
                before = after;
            };
        })
    })
    $('.videoplay').click(function() {
        $('#somedialog').addClass('dialog--open');
        $('#somedialog').removeClass('dialog--close');
        var src = $(this).attr('data-video');
        $('#videoo').attr('src', "");
        $('#videoo').attr('src', src);
    })
    $('#somedialog .dialog__overlay').click(function() {
        $('#somedialog').removeClass('dialog--open');
        $('#somedialog').addClass('dialog--close');
        $('#videoo').load();
        $('#videoo').attr('src', "");
    })
    $('#somedialog .action').click(function() {
        $('#somedialog').removeClass('dialog--open');
        $('#somedialog').addClass('dialog--close');
        $('#videoo').load();
        $('#videoo').attr('src', "");
    })
</script>
<script type="module" src="{{ asset('js/users/header.js') }}"></script>
<script type="module" src="{{ asset('js/users/login.js') }}"></script>
<script type="module" src="{{ asset('js/users/logout.js') }}"></script>
@if (session()->has('error'))
    <script type="module">
    import { renderToast } from "{{ asset('js/helper.js') }}"
    renderToast({
        text: '{{ session()->get("error") }}',
        status: 'danger',
        title: 'Thất bại'
    })
    $('.header-action_account').addClass('show-action')
</script>
    @php
        session()->forget('error');
    @endphp
@endif
@stack('scripts')

</html>
