<header class="header-wrap index">
    <div class="header-con por">
        <div class="w1780 f-cb">
            <div class="logo fl">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>

            <ul class="pc_nav_box poa antart_b" id="pc_nav_box">
                <li class="@if (isset($cur_page)) @if ($cur_page == 'index')active @endif @endif">
                    <a href="/" class="a">
                        Trang chủ
                    </a>
                </li>
                <li class="@if (isset($cur_page)) @if ($cur_page == 'photocopy')active @endif @endif">
                    <a href="{{ route('photocopy') }}" class="a">Photocopy</a>
                </li>
                <li class="@if (isset($cur_page)) @if ($cur_page == 'products') active @endif @endif">
                    <a href="{{ route('products.index') }}" class="a">Sản phẩm </a>
                    <div class="prosub-box poa">
                        <div id="prosub-box">
                        </div>
                    </div>
                </li>
                <li class="@if (isset($cur_page)) @if ($cur_page == 'about')active @endif @endif">
                    <a href="{{ route('about') }}" class="a">Về chúng tôi</a>
                </li>
            </ul>

            <div class="btn-bar por fr" id="btn-bar">
                <span class="line line1 poa"></span>
                <span class="line line2 poa"></span>
                <span class="line line3 poa"></span>
            </div>

            <div class="right_box fr">
                <div class="item por">
                    <div class="item_up">
                        <img src="{{ asset('icons/media.svg') }}" alt="">
                    </div>
                    <div class="item_option poa">
                        <div class="link">
                            <a href="https://www.facebook.com/profile.php?id=100092715771742"
                                target="_blank">Facebook</a>
                        </div>
                        <div class="link">
                            <a href="https://www.instagram.com/fastphovn" target="_blank">Instagram</a>

                        </div>
                        <div class="link">
                            <a href="https://www.youtube.com/channel/UCZ4d845dzB4xtMGWfoXCbsA"
                                target="_blank">Youtube&nbsp;</a>
                        </div>
                        <div class="link">
                            <a href="https://www.tiktok.com/@fastphovn" target="_blank">Tiktok</a>
                        </div>
                    </div>
                </div>
                <div class="item header-action header-action_cart" id="pccart_btn">
                    <div class="item_up">
                        <img src="{{ asset('images/shopping-cart.png') }}" alt="">
                    </div>
                    <div class="header-action_dropdown cart">
                        <span class="box-triangle">
                            <svg viewBox="0 0 20 9" role="presentation">
                                <path
                                    d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                    fill="#ffffff"></path>
                            </svg>
                        </span>
                        <div class="header-dropdown_content">
                            <div class="site-cart">
                                <div class="cart-ttbold">
                                    <p class="ttbold">Giỏ hàng</p>
                                </div>
                                <div class="cart-view clearfix">
                                    <div class="cart-view-scroll">
                                        <table id="cart-view">
                                            <tbody id="cart-body">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="line"></div>
                                    <div class="cart-view-total">
                                        <table class="table-total">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">TỔNG TIỀN:</td>
                                                    <td class="text-right" id="total-view-cart">0₫</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="/cart" class="linktocart button dark">Xem giỏ
                                                            hàng</a></td>
                                                    <td><a href="{{ route('cart.details') }}"
                                                            class="linktocheckout button dark">Thanh
                                                            toán</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item header-action header-action_account" id="">
                    <div class="item_up" style="position: relative; width: 30px">
                        @auth
                            <img src="{{ asset('storage/' . auth()->user()->avatar) . '?' . now() }}" class="rounded-circle"
                                style="position: absolute; width: 30px; height: 30px; max-height: none;" alt="">
                        @endauth
                        @guest
                            <img src="{{ asset('images/user.png') }}" alt="">
                        @endguest
                    </div>
                    <div class="header-action_dropdown user">
                        <span class="box-triangle">
                            <svg viewBox="0 0 20 9" role="presentation">
                                <path
                                    d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                    fill="#ffffff"></path>
                            </svg>
                        </span>
                        <div class="header-dropdown_content">
                            @auth
                                <div class="site_account site_account_info " id="siteNav-account">
                                    <div class="site_account_panel_list">
                                        <div class="site_account_info">
                                            <header class="site_account_header">
                                                <h2 class="site_account_title heading">Thông tin tài khoản</h2>
                                            </header>
                                            <ul>
                                                <li class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/' . auth()->user()->avatar) . '?' . now() }}"
                                                        class="rounded-circle" alt=""
                                                        style="width: 30px; height: 30px; max-height: none;">
                                                    <span class="ms-1">{{ auth()->user()->name }}</span>
                                                </li>
                                                <li><a href="{{ route('profile') }}">Tài khoản của tôi</a></li>
                                                <li><a href="{{ route('cart.history') }}">Lịch sử đơn hàng</a></li>
                                                <li><a id="logout-btn">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                            @guest
                                <div class="site_account " id="siteNav-account">
                                    <div class="site_account_panel_list">
                                        <div id="header-login-panel"
                                            class="site_account_panel site_account_default is-selected">
                                            <header class="site_account_header">
                                                <h2 class="site_account_title heading">Đăng nhập tài khoản</h2>
                                                <p class="site_account_legend">Nhập email và mật khẩu của bạn:</p>
                                            </header>
                                            <div class="site_account_inner">
                                                <form accept-charset="UTF-8" action="/account/login" id="customer_login"
                                                    method="post">
                                                    <input name="form_type" type="hidden" value="customer_login">
                                                    <input name="utf8" type="hidden" value="✓">

                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <input type="email" id="login-email"
                                                            class="form__field form__field--text" name="email"
                                                            required="required">
                                                        <label for="login-email"
                                                            class="form__floating-label">Email</label>
                                                    </div>
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <input type="password" id="login-password"
                                                            class="form__field form__field--text" name="password"
                                                            required="required" autocomplete="current-password">
                                                        <label for="login-password" class="form__floating-label">Mật
                                                            khẩu</label>
                                                        <span class="eye-pass"
                                                            style="position: absolute;
                                                            right: 10px;
                                                            bottom: 50%;
                                                            transform: translateY(50%);">
                                                            <img src="{{ asset('icons/eye.svg') }}" alt="">
                                                        </span>
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-login">Đăng nhập</button>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Khách hàng mới?
                                                        <a class="link" href="{{ route('register') }}">Tạo tài
                                                            khoản</a>
                                                    </p>
                                                    <p>Quên mật khẩu?
                                                        <button aria-controls="header-recover-panel" class="js-link link"
                                                            id="btn-show-recover">Khôi
                                                            phục mật khẩu</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="header-recover-panel" class="site_account_panel  site_account_sliding">
                                            <header class="site_account_header">
                                                <h2 class="site_account_title heading">Khôi phục mật khẩu</h2>
                                                <p class="site_account_legend">Nhập email của bạn:</p>
                                            </header>
                                            <div class="site_account_inner">
                                                <form id="form-recover" accept-charset="UTF-8" method="post">
                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <input type="email" id="recover-recover_email"
                                                            class="form__field form__field--text" name="email"
                                                            required="required">
                                                        <label for="recover-recover_email"
                                                            class="form__floating-label">Email</label>
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-recover">Khôi phục</button>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Bạn đã nhớ mật khẩu?
                                                        <button aria-controls="header-login-panel" class="js-link link"
                                                            id="btn-show-login">Trở về đăng nhập</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="msub-list " id="msub-list">
        <div class="list-wrap bdb">
            <ul class="list" id="sub-list">
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib" href="{{ route('index') }}">Trang chủ</a>
                        </dt>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib" href="{{ route('about') }}">Về chúng tôi</a>
                        </dt>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib" href="{{ route('photocopy') }}">Photocopy</a>
                        </dt>
                    </dl>
                </li>
                <li class="pro">
                    <dl id="mlist_pro">
                        <dt class="por">
                            <a class="dib">Sản phẩm </a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>
                        </dt>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
</header>
@push('scripts')
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
@endpush
