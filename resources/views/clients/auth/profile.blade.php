@extends('layouts.users.master')
@section('content')
    @push('styles')
        <style>
            body {
                background: #f7f8f9;
            }

            .form-control:focus {
                box-shadow: none;
                border-color: var(--main-color)
            }

            .profile-button,
            .submit-change-pass,
            .btn-change-pass {
                background: var(--main-color);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                opacity: .9;
                background: var(--main-color);
            }

            .btn-change-avatar {
                background: var(--main-color);
                color: #fff
            }

            .btn-change-avatar:hover {
                color: #fff
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

            .container {
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            }

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
    @endpush
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 image-box">
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('storage/' . auth()->user()->avatar) . '?' . now() }}"
                        data-default="{{ asset('storage/' . auth()->user()->avatar) . '?' . now() }}"
                        alt="hình ảnh {{ auth()->user()->name }}">
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>

                    <div class="mt-2">
                        <label for="avatar_change" class="btn btn-sm btn-change-avatar">Đổi ảnh</label>
                        <input type="file" style="display: none" id="avatar_change" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-right">Thông tin cá nhân</h4>

                        <button type="button" class="btn btn-primary btn-change-pass" data-bs-toggle="modal"
                            data-bs-target="#changePasswordModal">
                            Đổi mật khẩu
                        </button>
                        <!-- The Modal -->
                        <div class="modal fade" id="changePasswordModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h3 class="modal-title">Đổi mật khẩu</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form id="form-change-password">
                                            <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <label for="old_password">Mật khẩu cũ</label>
                                                    <input type="password" class="form-control" name="old_password"
                                                        id="old_password">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="new_password">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                        id="new_password">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="confirm_password">Nhập lại mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="confirm_password"
                                                        id="confirm_password">
                                                </div>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <button class="btn btn-sm submit-change-pass btn-primary">Đổi</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="form-update-profile">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-12">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" id="phone"
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
                                    @foreach ($userGenderEnums as $name => $value)
                                        <option value="{{ $value }}"
                                            @if (auth()->user()->gender == $value) selected @endif>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ auth()->user()->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="province">Tỉnh</label>
                                <select name="province" class="form-control" id="province"
                                    data-code="{{ auth()->user()->province }}">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="district">Quận/Huyện</label>
                                <select class="form-control" id="district" name="district"
                                    data-code="{{ auth()->user()->district }}">
                                    <option value="null">Chọn quận / huyện</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="ward">Phường/Xã</label>
                                <select class="form-control" id="ward" name="ward"
                                    data-code="{{ auth()->user()->ward }}">
                                    <option value="null">Chọn phường / xã</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button class="btn btn-primary ms-1 profile-button">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/profile.js') }}" type="module"></script>
        @push('scripts')
            <script type="module">
          import { renderToast } from "{{ asset('js/helper.js') }}"
          import { CHANGE_AVATAR } from "{{ asset('js/url.js') }}"

            $('#avatar_change').on('change', function() {
                $('.image-box img').attr('src', $('.image-box img').data('default'))
                const file = $(this)[0].files[0]
                if (!file) {
                    return
                }
                
                const image = URL.createObjectURL(file)
                $('.image-box img').attr('src', image)

                const formData = new FormData()
                formData.append('_method', 'PUT')
                formData.append('avatar', $(this)[0].files[0])
                
                $.ajax({
                    url: CHANGE_AVATAR,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            renderToast({
                                title: 'Thành công',
                                text: response.message,
                            })
                        }
                    },
                    error: function(response) {
                        renderToast({
                            status: 'danger',
                            title: 'Lỗi',
                            text: response.responseJSON.message
                        })
                    }
                })
            })
        </script>
        @endpush
    @endpush
@endsection
