<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="Aplikasi pembelian makanan atau minuman online dari Cafe SMKN 6 JEMBER">
    <title>Cafe SMKN 6 JEMBER.</title>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/gh/dilsdev/ya@main/public/dist/js/tabler.min.js"></script> --}}
    {{-- <script rel="preload" src="https://cafe6.dils.my.id/livewire/livewire.js?id=770f7738"></script> --}}
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dilsdev/ya@main/public/dist/css/tabler.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css"> --}}


    <link rel="icon" type="image/png" href="{{ asset('asset/logo.png') }}">
    <style>
        /* @import url('https://rsms.me/inter/inter.css'); */

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    @if (Auth::user()->role == 'admin')
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark" style="background-color: #182433;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class=" navbar-brand navbar-brand-autodark">
                    <img loading="lazy" src="{{ asset('asset/logo.png') }}" width="50" alt="Tabler" class="">
                </h1>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                                    </svg> </span>
                                <span class="nav-link-title" style="color: white;">
                                    Home
                                </span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.menu') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EFEFEF">
                                        <path
                                            d="m175-120-56-56 410-410q-18-42-5-95t57-95q53-53 118-62t106 32q41 41 32 106t-62 118q-42 44-95 57t-95-5l-50 50 304 304-56 56-304-302-304 302Zm118-342L173-582q-54-54-54-129t54-129l248 250-128 128Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Menu
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pesanan') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                    </svg>
                                </span> <span class="nav-link-title" style="color: white;">
                                    Pesanan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pesananditerima') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="M650-160h40v-160h-40v160Zm100 0h40v-160h-40v160ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Daftar pesanan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pesananselesai') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Pesanan selesai
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pengiriman') }}">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Pengiriman
                                </span>
                            </a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false">
                              <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>
                              </span>
                              <span class="nav-link-title" style="color: white;">
                                Pengguna
                              </span>
                            </a>
                            <div class="dropdown-menu">
                              <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                  <a class="dropdown-item nav-link" style="color: rgb(219, 215, 215);" href="/admin/users">
                                    Daftar User
                                  </a>
                                  <a class="dropdown-item nav-link" style="color: rgb(219, 215, 215);" href="/admin/kurirs">
                                    Daftar Kurir
                                  </a>
                                  <a class="dropdown-item nav-link" style="color: rgb(219, 215, 215);" href="/admin/admins">
                                    Daftar Admin
                                  </a>
                                </div>
                              </div>
                            </div>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rekomendasi') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#fff">
                                        <path
                                            d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm0-80h640v-480H160v480Zm80-80h480L570-520 450-360l-90-120-120 160Zm-80 80v-480 480Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Rekomendasi
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.siswa') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EFEFEF">
                                        <path
                                            d="M280-600v-80h560v80H280Zm0 160v-80h560v80H280Zm0 160v-80h560v80H280ZM160-600q-17 0-28.5-11.5T120-640q0-17 11.5-28.5T160-680q17 0 28.5 11.5T200-640q0 17-11.5 28.5T160-600Zm0 160q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520q17 0 28.5 11.5T200-480q0 17-11.5 28.5T160-440Zm0 160q-17 0-28.5-11.5T120-320q0-17 11.5-28.5T160-360q17 0 28.5 11.5T200-320q0 17-11.5 28.5T160-280Z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title" style="color: white;">
                                    Daftar siswa
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link">
                                <span
                                    class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#EFEFEF">
                                        <path
                                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                                    </svg>
                                </span>
                                <form method="POST" class="nav-link-title" style="color: white;"
                                    action="{{ route('logout') }}">
                                    @csrf
                                    <a :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-header">
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <!-- Page pre-title -->
                                <div class="page-pretitle">
                                    CAFE SMKN 6 JEMBER
                                </div>
                                <h2 class="page-title">
                                    Enem Groceries
                                </h2>
                            </div>
                            <!-- Page title actions -->
                            <div class="col-auto ms-auto d-print-none">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div rel="preload"  class="page-body">
                {{ $slot }}
            </div>
        </div>
    @elseif (Auth::user()->role == 'user')
        @if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
            <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark"
                style="background-color: #182433;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="color: white"></span>
                    </button>
                    <h1 class=" navbar-brand navbar-brand-autodark">
                        <img loading="lazy" src="{{ asset('asset/logo.png') }}" width="40" alt="Tabler" class="">
                    </h1>
                    <div class="flex-row navbar-nav d-lg-none">
                        <div class="nav-item dropdown">
                            <a href="#" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url({{ asset('asset/profile.png') }})"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>Paweł Kuna</div>
                                    <div class="mt-1 small text-muted">UI Designer</div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="{{ route('user.profile') }}" class="dropdown-item">Profile</a>
                                <a href="{{ route('user.siswa') }}" class="dropdown-item">Verifikasi</a>
                                <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
                                    @csrf

                                    <a :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                        class="p-0 m-0 dropdown-item">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="sidebar-menu">
                        <ul class="navbar-nav pt-lg-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                                        </svg></span>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.menuall') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="m175-120-56-56 410-410q-18-42-5-95t57-95q53-53 118-62t106 32q41 41 32 106t-62 118q-42 44-95 57t-95-5l-50 50 304 304-56 56-304-302-304 302Zm118-342L173-582q-54-54-54-129t54-129l248 250-128 128Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Menu
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.keranjang') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#999999">
                                        <path
                                            d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                                    </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Keranjang
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.myorder') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        My Order
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.unpaid') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M650-160h40v-160h-40v160Zm100 0h40v-160h-40v160ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Belum di bayar
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        @else
            <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark"
                style="background-color: #182433;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class=" navbar-brand navbar-brand-autodark">
                        <img loading="lazy" src="{{ asset('asset/logo.png') }}" width="50" alt="Tabler" class="">
                    </h1>

                    <div class="collapse navbar-collapse" id="sidebar-menu">
                        <ul class="navbar-nav pt-lg-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.index') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                                        </svg> </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.menuall') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="m175-120-56-56 410-410q-18-42-5-95t57-95q53-53 118-62t106 32q41 41 32 106t-62 118q-42 44-95 57t-95-5l-50 50 304 304-56 56-304-302-304 302Zm118-342L173-582q-54-54-54-129t54-129l248 250-128 128Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Menu
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.keranjang') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Keranjang
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.myorder') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="m691-150 139-138-42-42-97 95-39-39-42 43 81 81ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        My Order
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.unpaid') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M650-160h40v-160h-40v160Zm100 0h40v-160h-40v160ZM240-600h480v-80H240v80ZM720-40q-83 0-141.5-58.5T520-240q0-83 58.5-141.5T720-440q83 0 141.5 58.5T920-240q0 83-58.5 141.5T720-40ZM120-80v-680q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v267q-19-9-39-15t-41-9v-243H200v562h243q5 31 15.5 59T486-86l-6 6-60-60-60 60-60-60-60 60-60-60-60 60Zm120-200h203q3-21 9-41t15-39H240v80Zm0-160h284q38-37 88.5-58.5T720-520H240v80Zm-40 242v-562 562Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Belum di bayar
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.profile') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Profile
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.siswa') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="m438-338 226-226-57-57-169 169-84-84-57 57 141 141Zm42 258q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-84q104-33 172-132t68-220v-189l-240-90-240 90v189q0 121 68 220t172 132Zm0-316Z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title" style="color: white;">
                                        Verifikasi
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                            viewBox="0 -960 960 960" width="24px" fill="#999999">
                                            <path
                                                d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                                        </svg>
                                    </span>
                                    <form method="POST" class="nav-link-title" style="color: white;"
                                        action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </aside>
        @endif


        <div class="page-wrapper">
            <div rel="preload" class="page-body">
                {{ $slot }}
            </div>
        </div>

        </div>
    @elseif (Auth::user()->role == 'kurir')
    <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark" style="background-color: #182433;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class=" navbar-brand navbar-brand-autodark">
                <img loading="lazy" src="{{ asset('asset/logo.png') }}" width="50" alt="Tabler" class="">
            </h1>
            <div class="collapse navbar-collapse" id="sidebar-menu">
                <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kurir.belumdikirim') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-160q-50 0-85-35t-35-85H40v-440q0-33 23.5-56.5T120-800h560v160h120l120 160v200h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85H360q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T280-280q0-17-11.5-28.5T240-320q-17 0-28.5 11.5T200-280q0 17 11.5 28.5T240-240ZM120-360h32q17-18 39-29t49-11q27 0 49 11t39 29h272v-360H120v360Zm600 120q17 0 28.5-11.5T760-280q0-17-11.5-28.5T720-320q-17 0-28.5 11.5T680-280q0 17 11.5 28.5T720-240Zm-40-200h170l-90-120h-80v120ZM360-540Z"/></svg>
                            </span>
                            <span class="nav-link-title" style="color: white;">
                                Belum di kirim
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kurir.sudahdikirim') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-160q-50 0-85-35t-35-85H40v-440q0-33 23.5-56.5T120-800h560v160h120l120 160v200h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85H360q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T280-280q0-17-11.5-28.5T240-320q-17 0-28.5 11.5T200-280q0 17 11.5 28.5T240-240ZM120-360h32q17-18 39-29t49-11q27 0 49 11t39 29h272v-360H120v360Zm600 120q17 0 28.5-11.5T760-280q0-17-11.5-28.5T720-320q-17 0-28.5 11.5T680-280q0 17 11.5 28.5T720-240Zm-40-200h170l-90-120h-80v120ZM360-540Z"/></svg>
                            </span>
                            <span class="nav-link-title" style="color: white;">
                                Sudah di kirim
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kurir.perludikirim') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-160q-50 0-85-35t-35-85H40v-440q0-33 23.5-56.5T120-800h560v160h120l120 160v200h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85H360q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T280-280q0-17-11.5-28.5T240-320q-17 0-28.5 11.5T200-280q0 17 11.5 28.5T240-240ZM120-360h32q17-18 39-29t49-11q27 0 49 11t39 29h272v-360H120v360Zm600 120q17 0 28.5-11.5T760-280q0-17-11.5-28.5T720-320q-17 0-28.5 11.5T680-280q0 17 11.5 28.5T720-240Zm-40-200h170l-90-120h-80v120ZM360-540Z"/></svg>
                            </span>
                            <span class="nav-link-title" style="color: white;">
                                Perlu dikirim
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div class="page-wrapper">
        <div class="page-header">
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">                            
                            <h2 class="page-title">
                                CAFE SMKN 6 JEMBER
                            </h2>
                            <div class="page-pretitle">
                                Kurir
                            </div>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div rel="preload"  class="page-body">
            {{ $slot }}
        </div>
    </div>
    @endif


    {{-- <!-- Libs JS -->
    <script src={{ asset('./dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }} defer></script>
    <script src={{ asset('./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }} defer></script>
    <script src={{ asset('./dist/libs/jsvectormap/dist/maps/world.js?1684106062') }} defer></script>
    <script src={{ asset('./dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }} defer></script>
    <!-- Tabler Core -->
    <script src={{ asset('./dist/js/tabler.min.js?1684106062') }} defer></script>
    <script src={{ asset('./dist/js/demo.min.js?1684106062') }} defer></script> --}}
</body>

</html>
