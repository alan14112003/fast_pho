<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center p-4">
        <img class="avatar shadow-0 img-fluid rounded-circle"
            src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="...">
        <div class="ms-3 title">
            <h1 class="h5 mb-1">{{ auth()->user()->name }}</h1>
            <p class="text-sm text-gray-700 mb-0 lh-1">Admin</p>
        </div>
    </div>
    <span class="text-uppercase text-gray-600 text-xs mx-3 px-2 heading mb-2">Main</span>
    <ul class="list-unstyled">
        <li class="sidebar-item {{ $currentPage === 'home' ? 'active' : '' }}"><a class="sidebar-link"
                href="{{ route('admin.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#real-estate-1"> </use>
                </svg><span>Trang chủ </span></a></li>
        <li class="sidebar-item {{ $currentPage === 'slide' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('admin.slides.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#sales-up-1"> </use>
                </svg><span>Slide </span></a>
        </li>
        <li class="sidebar-item {{ $currentPage === 'config' ? 'active' : '' }}"><a class="sidebar-link"
                href="{{ route('admin.config.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#portfolio-grid-1"> </use>
                </svg><span>Cài đặt </span></a></li>
        <li class="sidebar-item {{ $currentPage === 'product' ? 'active' : '' }}">
            <a class="sidebar-link" href="{{ route('admin.products.index') }}">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#sales-up-1"> </use>
                </svg><span>Sản phẩm </span></a>
        </li>
        <li class="sidebar-item {{ $currentPage === 'order' ? 'active' : '' }}"><a class="sidebar-link"
                href="#exampledropdownDropdown" data-bs-toggle="collapse">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                    <use xlink:href="#browser-window-1"> </use>
                </svg><span>Đơn hàng </span></a>
            <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                <li><a class="sidebar-link" href="{{ route('admin.orders.photos') }}">Photocopy</a></li>
                <li><a class="sidebar-link" href="{{ route('admin.orders.products') }}">Sản phẩm</a></li>
            </ul>
        </li>
    </ul>
</nav>
