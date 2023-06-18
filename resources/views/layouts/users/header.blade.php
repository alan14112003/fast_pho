<header class="header-wrap index">
    <div class="header-con por">
        <div class="w1780 f-cb">
            <div class="logo fl">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </div>

            <ul class="pc_nav_box poa antart_b" id="pc_nav_box">
                <li>
                    <a href="/" class="a">
                        Trang chủ
                    </a>
                <li>
                    <a href="" class="a">Photocopy</a>
                </li>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="a">Sản phẩm </a>
                    <div class="prosub-box poa">
                        <div id="prosub-box">
                        </div>
                    </div>
                </li>
                <li>
                    <a href="" class="a">Về chúng tôi</a>

                    <div class="sub-box"
                        style="width: 250%; display: none; height: 68px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
                        <a href="">Hồ sơ công ty</a>


                        <a href="">Trách nhiệm xã hội</a>
                    </div>
                </li>
                <li>
                    <a href="https://vn.deliworld.com/contact/contact_us.html " class="a">Liên hệ </a>
                    <div class="sub-box">
                        <a href="https://vn.deliworld.com/contact/contact_us.html ">Liên hệ chúng tôi</a>
                        <a href="https://vn.deliworld.com/contact/join.html ">Tham gia với chúng tôi</a>
                    </div>
                </li>
            </ul>

            <div class="btn-bar por fr" id="btn-bar">
                <span class="line line1 poa"></span>
                <span class="line line2 poa"></span>
                <span class="line line3 poa"></span>
            </div>

            <div class="right_box fr">
                <div class="item" id="pcsearch_btn">
                    <img src="{{ asset('icons/head_ico2.svg') }}" alt="">
                </div>
                <div class="item por">
                    <div class="item_up">
                        <img src="{{ asset('icons/media.svg') }}" alt="">
                    </div>
                    <div class="item_option poa">
                        <div class="link">
                            <a href="" target="_blank">Facebook</a>
                        </div>
                        <div class="link">
                            <a href="" target="_blank">Instagram</a>

                        </div>
                        <div class="link">
                            <a href="" target="_blank">Youtube&nbsp;</a>
                        </div>
                        <div class="link">
                            <a href="" target="_blank">Tiktok</a>
                        </div>
                    </div>
                </div>
                <div class="item header-action header-action_cart" id="pccart_btn">
                    <img src="{{ asset('images/shopping-cart.png') }}" alt="">
                    <div class="header-action_dropdown">
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
                                    <a class="hide-cart">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                            xml:space="preserve">
                                            <g>
                                                <path
                                                    d="M500,442.7L79.3,22.6C63.4,6.7,37.7,6.7,21.9,22.5C6.1,38.3,6.1,64,22,79.9L442.6,500L22,920.1C6,936,6.1,961.6,21.9,977.5c15.8,15.8,41.6,15.8,57.4-0.1L500,557.3l420.7,420.1c16,15.9,41.6,15.9,57.4,0.1c15.8-15.8,15.8-41.5-0.1-57.4L557.4,500L978,79.9c16-15.9,15.9-41.5,0.1-57.4c-15.8-15.8-41.6-15.8-57.4,0.1L500,442.7L500,442.7z">
                                                </path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="cart-view clearfix">
                                    <div class="cart-view-scroll">
                                        <table id="cart-view">
                                            <tbody id="cart-body">
                                                {{-- <tr class="item-cart_empty">
                                                    <td>
                                                        <div class="svgico-mini-cart"> <svg width="81"
                                                                height="70" viewBox="0 0 81 70">
                                                                <g transform="translate(0 2)" stroke-width="4"
                                                                    stroke="#1e2d7d" fill="none" fill-rule="evenodd">
                                                                    <circle stroke-linecap="square" cx="34"
                                                                        cy="60" r="6"></circle>
                                                                    <circle stroke-linecap="square" cx="67"
                                                                        cy="60" r="6"></circle>
                                                                    <path
                                                                        d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                    </path>
                                                                </g>
                                                            </svg></div> Hiện chưa có sản phẩm
                                                    </td>
                                                </tr> --}}
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
                                                    <td><a href="/checkout" class="linktocheckout button dark">Thanh
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
                <div class="item header-action header-action_account" id="pccart_btn">
                    <img src="{{ asset('images/user.png') }}" alt="">
                    <div class="header-action_dropdown ">
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
                                                <li><span>{{ auth()->user()->name }}</span></li>
                                                <li><a href="/account">Tài khoản của tôi</a></li>
                                                <li><a href="/account/addresses">Danh sách địa chỉ</a></li>
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
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-login">Đăng nhập</button>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Khách hàng mới?
                                                        <a class="link" href="{{ route('register') }}">Tạo tài khoản</a>
                                                    </p>
                                                    <p>Quên mật khẩu?
                                                        <button aria-controls="header-recover-panel"
                                                            class="js-link link">Khôi phục mật khẩu</button>
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
                                                <form accept-charset="UTF-8" action="/account/recover" method="post">
                                                    <input name="form_type" type="hidden"
                                                        value="recover_customer_password">
                                                    <input name="utf8" type="hidden" value="✓">

                                                    <div class="form__input-wrapper form__input-wrapper--labelled">
                                                        <input type="email" id="recover-recover_email"
                                                            class="form__field form__field--text" name="email"
                                                            required="required">
                                                        <label for="recover-recover_email"
                                                            class="form__floating-label">Email</label>
                                                        <div class="sitebox-recaptcha">
                                                            This site is protected by reCAPTCHA and the Google
                                                            <a href="https://policies.google.com/privacy" target="_blank"
                                                                rel="noreferrer">Privacy Policy</a>
                                                            and <a href="https://policies.google.com/terms"
                                                                target="_blank" rel="noreferrer">Terms of Service</a>
                                                            apply.
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="form__submit button dark"
                                                        id="form_submit-recover">Khôi phục</button>
                                                </form>
                                                <div class="site_account_secondary-action">
                                                    <p>Bạn đã nhớ mật khẩu?
                                                        <button aria-controls="header-login-panel"
                                                            class="js-link link">Trở về đăng nhập</button>
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
            <div class="search-dialog f-cb poa">
                <form action="" method="get" id="form-search" class="search f-cb">
                    <input type="text" name="q" autocomplete="off" placeholder="Tìm kiếm ">
                    <input type="submit" value="">
                </form>
                <a href="javascript:;" class="search-close" id="search-close"></a>
            </div>
        </div>
    </div>

    <div class="msub-list " id="msub-list">
        <div class="list-wrap bdb">
            <ul class="list" id="sub-list">
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib" href="/">Trang chủ</a>
                        </dt>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib">Về chúng tôi</a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>
                        </dt>
                        <dd>
                            <a href="https://vn.deliworld.com/about/profile.html ">Về tập đoàn Deli</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/about/profile.html ">Về Deli Việt Nam và Công ty TNHH TM
                                Long Á</a>
                        </dd>

                        <dd>
                            <a href="https://vn.deliworld.com/about/profile.html ">Văn hóa doanh nghiệp</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/about/profile.html ">Sản xuất</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/about/social.html ">Trách nhiệm xã hội</a>
                        </dd>
                    </dl>
                </li>
                <li class="pro">
                    <dl>
                        <dt class="por">
                            <a class="dib">Sản phẩm </a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>
                        </dt>
                        <dd>
                            <a href="https://vn.deliworld.com/product/lists/6049.html?0 "
                                class="second_title antart_b">
                                Dụng cụ thể thao </a>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib">Phòng tin tức</a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>
                        </dt>
                        <dd>
                            <a href="https://vn.deliworld.com/news/lists.html ">Trung tâm tin tức</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/news/media.html ">Truyền thông xã hội</a>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">

                            <a class="dib">Hệ Thống kinh doanh</a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>


                        </dt>
                        <dd>
                            <a href="https://vn.deliworld.com/tt.html ">Kênh truyền thống</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/tmdt.html ">kênh thương mại điện tử</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/lpdeli.html ">Mini game</a>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="por">
                            <a class="dib">Liên hệ </a>
                            <div class="ico por">
                                <div class="line line1"></div>
                                <div class="line line2"></div>
                            </div>
                        </dt>
                        <dd>
                            <a href="https://vn.deliworld.com/contact/contact_us.html ">Liên hệ chúng tôi</a>
                        </dd>
                        <dd>
                            <a href="https://vn.deliworld.com/contact/join.html ">Tham gia với chúng tôi</a>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
</header>
