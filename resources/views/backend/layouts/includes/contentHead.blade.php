<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">{{ (!empty($current_menu) && isset($current_menu[0])) ? $current_menu[0] : 'Beranda' }}</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                @if(!empty($current_menu) && isset($current_menu[1]))
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">{{ $current_menu[1] }}</a>
                @endif
                @if(!empty($current_menu) && isset($current_menu[2]))
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">{{ $current_menu[2] }}</a>
                @endif

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                @yield('additionalAction')
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a class="btn kt-subheader__btn-secondary">{{ date('D') }}, {{ date('d') }} - {{ date('M') }} - {{ date('Y') }}</a>
            </div>
        </div>
    </div>
</div>
