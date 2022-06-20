<!doctype html>
<html lang="ar" dir="rtl">

@php
use App\Models\Setting;
$site = Setting::first();

if ($site == null) {
    $site['site_name'] = null;
    $site['phone'] = null;
    $site['news'] = null;
}

@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>لوحة تحكم {{ $site['site_name'] }}</title>




    <!-- Bootstrap core CSS -->

    <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.rtl.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('home') }}">{{ $site['site_name'] }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="عرض/إخفاء لوحة التنقل">
            <span class="navbar-toggler-icon"></span>
        </button>

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav style="top:0%" id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column justify-content-center align-items-center">
                        <li class="nav-item">
                            <a class="nav-link btn btn-success text-white" aria-current="page"
                                href="{{ route('home') }}">
                                <span data-feather="home"></span>
                                الصفحة الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">
                                <span data-feather="home"></span>
                                لوحة التحكم
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('item.index') }}">
                                <span data-feather="file"></span>
                                الاصناف
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">
                                <span data-feather="shopping-cart"></span>
                                المنتجات
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.privacy') }}">
                                <span data-feather="bar-chart-2"></span>
                                الخصوصية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('setting.index') }}">
                                <span data-feather="layers"></span>
                                الاعدادات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="{{ route('dashboard.logout') }}">
                                <span data-feather="layers"></span>
                                تسجيل خروج
                            </a>
                        </li>
                    </ul>



                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('title')</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">

                    </div>
                </div>
                @yield('content')


            </main>
        </div>
    </div>



    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
