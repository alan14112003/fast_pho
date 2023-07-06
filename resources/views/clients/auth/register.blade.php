@extends('layouts.users.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endpush
@section('content')
    <main class="mainContent-theme">
        <div class="layout-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-12 wrapbox-heading-account "
                        style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                ">
                        <div class="header-page clearfix">
                            <h1>Tạo tài khoản</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 wrapbox-content-account">
                        <div class="userbox">
                            <form accept-charset="UTF-8" action="{{ route('registering') }}" id="create_customer"
                                method="post">
                                @csrf
                                <div id="form-last_name" class="clearfix large_form">
                                    <label for="last_name" class="label icon-field"><i
                                            class="icon-login icon-user "></i></label>
                                    <input required type="text" value="" name="last_name" placeholder="Họ"
                                        id="last_name" class="text" size="30">
                                </div>
                                <div id="form-first_name" class="clearfix large_form">
                                    <label for="first_name" class="label icon-field"><i
                                            class="icon-login icon-user "></i></label>
                                    <input required type="text" value="" name="first_name" placeholder="Tên"
                                        id="first_name" class="text" size="30">
                                </div>
                                <div id="form-gender" class="clearfix large_form">
                                    @foreach ($userGenderArr as $value => $key)
                                        <input id="radio{{ $key }}" type="radio" value="{{ $key }}"
                                            name="gender">
                                        <label for="radio{{ $key }}">{{ $value }}</label>
                                    @endforeach
                                </div>
                                <div id="form-email" class="clearfix large_form">
                                    <label for="email" class="label icon-field"><i
                                            class="icon-login icon-envelope "></i></label>
                                    <input type="email" value="" placeholder="Email" name="email" id="email"
                                        class="text" size="30">
                                </div>
                                <div id="form-password" class="clearfix large_form large_form" style="position: relative">
                                    <label for="password" class="label icon-field"><i
                                            class="icon-login icon-shield "></i></label>
                                    <input required type="password" value="" placeholder="Mật khẩu" name="password"
                                        id="password" class="password text" size="30">
                                    <span class="eye-pass"
                                        style="    position: absolute;
                                                            right: 10px;
                                                            top: 50%;
                                                            transform: translateY(-50%);
                                                            cursor: pointer;
                                                            ">
                                        <img src="{{ asset('icons/eye.svg') }}" alt="">
                                    </span>
                                </div>
                                <div id="form-password" class="clearfix large_form large_form-mr10"
                                    style="position: relative">
                                    <label for="password" class="label icon-field"><i
                                            class="icon-login icon-shield "></i></label>
                                    <input required type="password" value="" placeholder="Nhập lại mật khẩu"
                                        id="re-password" class="re-password text" size="30">
                                    <span class="eye-pass"
                                        style="    position: absolute;
                                                            right: 10px;
                                                            top: 50%;
                                                            transform: translateY(-50%);
                                                            cursor: pointer;
                                                            ">
                                        <img src="{{ asset('icons/eye.svg') }}" alt="">
                                    </span>
                                </div>
                                <div class="clearfix action_account_custommer">
                                    <div class="action_bottom button dark">
                                        <button class="btn">Đăng ký</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script type="module" src="{{ asset('js/users/register.js') }}">
    </script>
@endpush
