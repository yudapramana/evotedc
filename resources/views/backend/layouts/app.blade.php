<!DOCTYPE html>
<html lang="{{ session('lang')->direction }}" direction="{{ session('lang')->direction == 'rtl' ? 'rtl' : '' }}" style="{{session('lang')->direction == 'rtl' ? 'direction: rtl' : ''}};">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'matagaruda'))</title>
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="">
    <meta property="og:title" content="@yield('title', config('app.name', 'matagaruda'))" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('img/icon.png') }}" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website" />

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
{{--    <link href="{{ asset('__backend/plugins/custom/fullcalendar/fullcalendar.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />--}}

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('__backend/plugins/global/plugins.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/style.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('__backend/css/skins/header/base/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/header/menu/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/brand/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/aside/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css?') }}" rel="stylesheet">

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" />

    <!--begin::Extra Style -->
    @yield('extraCss')
    <!--end::Extra Style -->
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->

@if(config('app.debug'))
    <div class="corner-ribbon top-{{session('lang')->direction == 'rtl' ? 'right' : 'left'}} sticky red shadow">{{ __('development') }}</div>
@endif

<!-- begin:: Header Mobile -->
@include('backend.layouts.includes.headerMobile')
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        @include('backend.layouts.includes.aside')
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            @include('backend.layouts.includes.header')
            <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->
                @include('backend.layouts.includes.contentHead')
                <!-- end:: Subheader -->

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    @yield('content')
                </div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            @include('backend.layouts.includes.footer')
            <!-- end:: Footer -->
        </div>
    </div>
</div>
<!-- end:: Page -->

<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>
<!-- end::Scrolltop -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>
<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
<script src="{{ asset('__backend/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('__backend/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
{{--<script src="{{ asset('__backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('__backend/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('js/index.js') }}"></script>
<!--end::Page Vendors -->

<!--begin::Extra Script -->
@yield('extraJs')
<!--end::Extra Script -->

</body>

<!-- end::Body -->
</html>
