<!DOCTYPE html>
<html lang="{{ session('lang')->locale }}" direction="{{ session('lang')->direction }}" style="direction: {{ session('lang')->direction }};">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'MATAGARUDA'))</title>
    <meta name="description" content="Login page admin matagaruda">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('__backend/css/pages/login/login-1'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('__backend/plugins/global/plugins.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/style.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('__backend/css/skins/header/base/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/header/menu/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/brand/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('__backend/css/skins/aside/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--begin::Extra Style -->
    @yield('extraCss')
    <!--end::Extra Style -->
</head>
<!-- end::Head -->
@if(config('app.debug'))
    <div class="corner-ribbon top-{{session('lang')->direction == 'rtl' ? 'right' : 'left'}} sticky red shadow">{{ __('development') }}</div>
@endif
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

            <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background: linear-gradient(333deg, rgba(207,148,4,1) 0%, rgba(255,180,0,1) 24%, rgba(255,180,0,1) 37%, rgba(158,112,0,1) 100%);">
                <div class="kt-grid__item mt-6">
                    <a href="#" class="kt-login__logo" style="margin-top: 100px;">
                        <img src="{{ asset('img/bg-login.svg') }}" style="max-height: 200px;left: 0">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver pt-4">
                    <div class="kt-grid__item">
                        <h3 class="kt-login__title">Dashboard Tim Pemilu</h3>
                    </div>
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info">
                    </div>
                </div>
            </div>

            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                <!--begin::Head-->
{{--                <div class="kt-login__head">--}}
{{--                    <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;--}}
{{--                    <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>--}}
{{--                </div>--}}

                <!--end::Head-->

                <!--begin::Body-->
                <div class="kt-login__body">

                    <!--begin::Signin-->
                    <div class="kt-login__form">
                        <div class="kt-login__title">
                            <img src="{{ asset('img/icon.png') }}" width="100">
                            <h3 class="text-warning">Masuk</h3>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!--begin::Action-->
                            <div class="kt-login__actions">
{{--                                <a href="#" class="kt-link kt-login__link-forgot">--}}
{{--                                    Forgot Password ?--}}
{{--                                </a>--}}
                                <button type="submit" class="btn btn-warning btn-elevate kt-login__btn-primary">Masuk</button>
                            </div>

                            <!--end::Action-->
                        </form>

                        <!--end::Form-->

                        <!--begin::Divider-->
{{--                        <div class="kt-login__divider">--}}
{{--                            <div class="kt-divider">--}}
{{--                                <span></span>--}}
{{--                                <span>OR</span>--}}
{{--                                <span></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <!--end::Divider-->

                        <!--begin::Options-->
{{--                        <div class="kt-login__options">--}}
{{--                            <a href="#" class="btn btn-primary kt-btn">--}}
{{--                                <i class="fab fa-facebook-f"></i>--}}
{{--                                Facebook--}}
{{--                            </a>--}}
{{--                            <a href="#" class="btn btn-info kt-btn">--}}
{{--                                <i class="fab fa-twitter"></i>--}}
{{--                                Twitter--}}
{{--                            </a>--}}
{{--                            <a href="#" class="btn btn-danger kt-btn">--}}
{{--                                <i class="fab fa-google"></i>--}}
{{--                                Google--}}
{{--                            </a>--}}
{{--                        </div>--}}

                        <!--end::Options-->
                    </div>

                    <!--end::Signin-->
                </div>

                <!--end::Body-->
            </div>

            <!--end::Content-->
        </div>
    </div>
</div>

<!-- end:: Page -->

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
<script src="{{ asset('__backend/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('__backend/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('__backend/js/pages/custom/login/login-1.js') }}" type="text/javascript"></script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
