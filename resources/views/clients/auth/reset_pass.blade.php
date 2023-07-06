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
    <link rel="stylesheet" href="{{ asset('css/reset_pass.css') }}">
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
    <div class="main">
        <header class="site_account_header">
            <h2 class="site_account_title heading">Thay đổi mật khẩu</h2>
            <p class="site_account_legend">Nhập mật khẩu mới và xác nhận:</p>
        </header>
        <div class="site_account_inner">
            <form accept-charset="UTF-8" id="form-reset-pass" method="post">
                <input name="form_type" type="hidden" value="customer_login">
                <input name="utf8" type="hidden" value="✓">

                <div class="form__input-wrapper form__input-wrapper--labelled">
                    <input type="password" id="password" class="form__field form__field--text" name="password"
                        required="required">
                    <label for="login-email" class="form__floating-label" style="">Mật khẩu</label>
                </div>
                <div class="form__input-wrapper form__input-wrapper--labelled">
                    <input type="password" id="re-password" class="form__field form__field--text" name="re-password"
                        required="required" autocomplete="current-password">
                    <label for="login-password" class="form__floating-label">Nhập lại mật
                        khẩu</label>
                </div>
                <button type="submit" class="form__submit button dark" id="form_submit-login">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
    <div class="toast-container position-fixed p-3 bottom-0 end-0" style="z-index: 1070">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        </div>
    </div>
</body>
@include('libraries')
<script src="{{ asset('js/users/reset_pass.js') }}" type="module"></script>

</html>
