<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', ''))</title>
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="estech developer">
    <meta property="og:title" content="@yield('title', config('app.name', ''))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('img/icon.png') }}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website" />
    @if (!config('app.debug'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128595187-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-128595187-2');
        </script>
    @endif

    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" />

    <link rel="stylesheet" href="{{ asset('__frontend/build/style.css?') . time() }}">
    <link href="{{ asset('css/style.css?') . time() }}" rel="stylesheet">
    <link href="{{ asset('fa/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    {!! NoCaptcha::renderJs() !!}
    <!--begin::Extra Style -->
    @yield('extraCss')
    <!--end::Extra Style -->
</head>
@if (config('app.debug'))
    <div class="corner-ribbon top-{{ session('lang')->direction == 'rtl' ? 'right' : 'left' }} fixed red shadow">{{ __('development') }}</div>
@endif

<body class="bg-orange-200 font-sans leading-normal tracking-normal">
    <a href="https://api.whatsapp.com/send?phone=089691648839" class="floating-btn" target="_blank">
        <i class="fab fa fa-whatsapp mt-4"></i>
    </a>

    {{-- @include('frontend.layouts.includes.header') --}}
    @yield('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" crossorigin="anonymous"></script>
    <script src="{{ asset('__frontend/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <!--begin::Extra Script -->
    @yield('extraJs')
    <!--end::Extra Script -->
</body>

</html>
