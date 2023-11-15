<!DOCTYPE html>
<html lang="<?php echo e(session('lang')->direction); ?>" direction="<?php echo e(session('lang')->direction == 'rtl' ? 'rtl' : ''); ?>" style="<?php echo e(session('lang')->direction == 'rtl' ? 'direction: rtl' : ''); ?>;">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', config('app.name', 'matagaruda')); ?></title>
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', config('app.name', 'matagaruda')); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:image" content="<?php echo e(asset('img/icon.png')); ?>" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website" />

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->


    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="<?php echo e(asset('__backend/plugins/global/plugins.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('__backend/css/style.bundle'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="<?php echo e(asset('__backend/css/skins/header/base/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('__backend/css/skins/header/menu/light'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('__backend/css/skins/brand/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('__backend/css/skins/aside/dark'. (session('lang')->direction == 'rtl' ? '.rtl' : '') .'.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/style.css?')); ?>" rel="stylesheet">

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="<?php echo e(asset('img/icon.png')); ?>" />

    <!--begin::Extra Style -->
    <?php echo $__env->yieldContent('extraCss'); ?>
    <!--end::Extra Style -->
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<!-- begin:: Page -->

<?php if(config('app.debug')): ?>
    <div class="corner-ribbon top-<?php echo e(session('lang')->direction == 'rtl' ? 'right' : 'left'); ?> sticky red shadow"><?php echo e(__('development')); ?></div>
<?php endif; ?>

<!-- begin:: Header Mobile -->
<?php echo $__env->make('backend.layouts.includes.headerMobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <?php echo $__env->make('backend.layouts.includes.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
            <?php echo $__env->make('backend.layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- end:: Header -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Subheader -->
                <?php echo $__env->make('backend.layouts.includes.contentHead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- end:: Subheader -->

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            <?php echo $__env->make('backend.layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php echo $__env->make('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('__backend/plugins/global/plugins.bundle.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('__backend/js/scripts.bundle.js')); ?>" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->


<script src="<?php echo e(asset('js/index.js')); ?>"></script>
<!--end::Page Vendors -->

<!--begin::Extra Script -->
<?php echo $__env->yieldContent('extraJs'); ?>
<!--end::Extra Script -->

</body>

<!-- end::Body -->
</html>
<?php /**PATH C:\MAMP\htdocs\evote\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>