<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAST PHO - Đăng nhập quản trị viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
</head>

<body class="authentication-bg" data-layout-config="{&quot;darkMode&quot;:false}">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="{{ route('admin.index') }}" style="color: #fff" class="lc1_5">
                                <h3>Fast Pho Company</h3>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li class="list-style-circle">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="form-login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" id="email" required=""
                                        placeholder="Enter your email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge" style="position: relative;">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password" name="password">
                                        <span class="eye-pass"
                                            style="    position: absolute;
                                                            right: 10px;
                                                            top: 50%;
                                                            transform: translateY(-50%);
                                                            cursor: pointer;
                                                            z-index: 5;
                                                            ">
                                            <img src="{{ asset('icons/eye.svg') }}" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary"> Log In </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-alt">
        <p style="font-size: 14px; font-weight: bold;" class=".bg-primary">
            © 2023 Fast Pho Company
        </p>
    </footer>
</body>
@include('libraries')
<script src="{{ asset('js/admin/login.js') }}" type="module"></script>

<script>
    $('.eye-pass').off('click').on('click', function() {
        $(this).toggleClass('active')
        if ($(this).hasClass('active')) {
            $(this).parent().find('input').attr('type', 'text')
            return
        }
        $(this).parent().find('input').attr('type', 'password')
    })
</script>

</html>
