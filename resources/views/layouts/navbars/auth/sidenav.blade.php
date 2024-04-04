
<script src="{{asset('assets/js/argon-dashboard.js')}}"></script>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home', ['auth' => 'admin']) }}"
            target="_blank">
            <img src="/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">

            <span class="ms-1 font-weight-bold">Money Kost</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home', ['auth' => 'admin']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Laundry</span>
                </a>
                <a class="nav-link" href="{{ route('pembayarankost', ['auth' => 'admin']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-chart-bar-32 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pembayaran Kost</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
