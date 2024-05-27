<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "style="overflow: auto;"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="{{url('/img/logo-ct-dark.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Money Kost</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <!-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> -->
        <ul class="navbar-nav">
            <li class="nav-item">
                @if(Auth::user()->auth == "admin")
                    <a class="nav-link {{ str_contains(request()->url(), 'dashboardmain') == true ? 'active' : '' }}" href="{{route('dashboard', ['auth' => 'admin']) }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-pie-35 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                    <a class="nav-link {{ str_contains(request()->url(), 'kelolaDataCustomer') == true ? 'active' : '' }}" href="{{ route('kelola.data.customer', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Customer</span>
                    </a>
                    <a class="nav-link {{ str_contains(request()->url(), 'kelolapembayaranmakanan') == true ? 'active' : '' }}" href="{{ route('kelola-pembayaranmakanan', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Makanan</span>
                    </a>
                @else(Auth::user()->auth == "customer")
                    <a class="nav-link {{ str_contains(request()->url(), 'dashboardmain') == true ? 'active' : '' }}" href="{{route('dashboard_customer', ['auth' => 'customer']) }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-pie-35 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                @endif
                <a class="nav-link {{ str_contains(request()->url(), 'pembayaranlaundry') == true ? 'active' : '' }}" href="{{ route('pembayaran', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Laundry</span>
                </a>

                <a class="nav-link {{ str_contains(request()->url(), 'pembayarankost') == true ? 'active' : '' }}" href="{{ route('pembayarankost', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Kost</span>
                </a>

                <a class="nav-link {{ str_contains(request()->url(), 'pembayaranlistrik') == true ? 'active' : '' }}" href="{{ route('pembayaranlistrik', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cloud-download-95 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Listrik</span>
                </a>

                <a class="nav-link {{ str_contains(request()->url(), 'pembayaranwifi') == true ? 'active' : '' }}" href="{{ route('pembayaranwifi', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-spaceship text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Wifi</span>
                </a>

                <a class="nav-link {{ str_contains(request()->url(), 'menumakanan') == true ? 'active' : '' }}" href="{{ route('menumakanan', ['auth' => Auth::user()->auth]) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-shop text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu Makanan</span>
                </a>

            </li>
            <li class="nav-item">
                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <svg class="ni text-danger text-sm opacity-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
                        </div>
                        <span class="nav-link-text ms-1">Log out</span>
                    </a>
            
                </form>
            </li>
        </ul>
    </div>
</aside>

