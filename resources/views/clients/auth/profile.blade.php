@extends('layouts.users.master')
@section('content')
    @push('styles')
        <style>
            body {
                background: var(--main-color)
            }

            .form-control:focus {
                box-shadow: none;
                border-color: var(--main-color)
            }

            .profile-button {
                background: var(--main-color);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                opacity: .9;
                background: var(--main-color);
            }

            .form-control {
                font-size: inherit;
                line-height: inherit;
                padding: 4px 12px;
                margin-bottom: 12px;
            }
            .btn {
                font-size: inherit;
                line-height: inherit;
            }
        </style>
    @endpush
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3">
                    <img class="rounded-circle mt-5"
                         width="150px"
                         src="{{ asset('storage/' . auth()->user()->avatar) }}"
                         alt="hình ảnh {{ auth()->user()->name }}">
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-right">Thông tin cá nhân</h4>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label for="name">Họ và tên</label>
                            <input type="text"
                                   class="form-control"
                                   name="name" id="name"
                                   value="{{ auth()->user()->name }}">
                        </div>
                        <div class="col-md-12">
                            <label for="phone">Số điện thoại</label>
                            <input type="text"
                                   class="form-control" name="phone" id="phone"
                                   value="{{ auth()->user()->phone }}">
                        </div>

                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                   value="{{ auth()->user()->email }}">
                        </div>

                        <div class="col-md-12">
                            <label for="gender">Giới tính</label>
                            <select class="form-control" id="gender" name="gender">
                                @foreach($userGenderEnums as $name => $value)
                                    <option value="{{ $value }}"
                                            @if(auth()->user()->gender == $value) selected @endif
                                    >
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address" class="form-control" value="{{ auth()->user()->address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="province">Tỉnh</label>
                            <select name="province" class="form-control"
                                    id="province" data-code="{{ auth()->user()->province }}">

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="district">Quận/Huyện</label>
                            <select class="form-control" id="district"
                                    name="district" data-code="{{ auth()->user()->district }}">
                                <option value="null">Chọn quận / huyện</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="ward">Phường/Xã</label>
                            <select class="form-control" id="ward"
                                    name="ward" data-code="{{ auth()->user()->ward }}">
                                <option value="null">Chọn phường / xã</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <button class="btn btn-secondary me-1" type="reset">Reset</button>
                        <button class="btn btn-primary ms-1 profile-button">Sửa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/profile.js') }}" type="module"></script>
    @endpush
@endsection
