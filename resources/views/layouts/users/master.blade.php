<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        FAST PHO - Một Giải Pháp Chuyển đổi số Photocopy
    </title>
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    @include('libraries')
    @stack('styles')
</head>

<body>
    @include('layouts.users.header')
    @yield('content')
    @include('layouts.users.footer')
</body>
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
            $(this).find('.line1').stop().transition({
                rotate: 0
            }, 300);
            $(this).find('.line1').css({
                'top': '0%',
                'left': '0'
            });
            $(this).find('.line2').stop().show();
            $(this).find('.line3').stop().transition({
                rotate: 0
            }, 300);
            $(this).find('.line3').css({
                'top': '88%',
                'left': '0'
            });
            $('#msub-list').stop().slideUp();
        } else {
            $(this).addClass('cur');
            $(this).find('.line1').stop().transition({
                rotate: 45
            }, 300);
            $(this).find('.line1').css({
                'top': '13%',
                'left': '9%'
            });
            $(this).find('.line2').stop().hide();
            $(this).find('.line3').stop().transition({
                rotate: -45
            }, 300);
            $(this).find('.line3').css({
                'top': '92%',
                'left': '9%'
            });
            $('#msub-list').stop().slideDown();
        }
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
@stack('scripts')

</html>
