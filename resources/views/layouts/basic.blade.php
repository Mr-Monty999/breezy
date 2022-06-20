<!DOCTYPE html>
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $site['site_name'] }}</title>

    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('images/joker.png') }}">
</head>

<body>
    <header class="center-column">
        <div>
            <img class="img1" src="{{ asset('images/mascot.png') }}" alt="">
            <p class="head-title">{{ $site['site_name'] }}</p>
            <img class="img2" src="{{ asset('images/akm-gun.png') }}" alt="">
        </div>
        <img src="{{ asset('images/open.png') }}" alt="">
        <i id="menuBar" class="fas fa-bars menuBar"></i>
    </header>
    <div class="mynav" id="menu">
        <p class="title">{{ $site['site_name'] }}</p>
        <i id="closeMenu" class="fas fa-times"></i>
        <div>


            @if (Auth::guard('admin')->check())
                <a href="{{ route('dashboard.index') }}" class="btn btn-success bg-success">لوحة التحكم</a>
            @endif

            <a href="{{ URL('/') }}" class="text">الرئيسية</a>
            @php
                use App\Models\Item;
                $items = Item::all();
            @endphp
            @foreach ($items as $item)
                <a href="{{ route('home.get.products', ['id' => $item->id, 'name' => $item->item_name]) }}"
                    class="text">{{ $item->item_name }}</a>
            @endforeach
        </div>
    </div>
    <div class="showBar center-row">
        <span class="showText text">{{ $site['news'] }}</span>
    </div>
    <main>
        @yield('main')
    </main>
    <footer class="center-column">
        <div class="made center-row">
            <p>made by monty</p>
            <p class="fas fa-heart text-danger" style="margin-left: 5px"></p>
        </div>
        <div class="contact center-row">
            <p>contact:</p>
            <a target="_blank" href="https://www.facebook.com/KING231MONTSER">
                <p class="fab fa-facebook facebook"></p>
            </a>
        </div>
    </footer>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
