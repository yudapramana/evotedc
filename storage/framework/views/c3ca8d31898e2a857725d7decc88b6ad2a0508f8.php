<?php $__env->startSection('content'); ?>
<div class="container m-auto mt-8 md:mt-8">
    <h2 class="text-center text-5xl font-bold pt-4"><?php echo e(strtoupper(config('app.name'))); ?></h2>
    <h4 class="text-center text-3xl font-bold pt-4"
        style="text-transform: uppercase; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:bolder;">
        Pemilihan Umum Raya dan Suksesi Fakultas Ekonomi dan Bisnis <br>
        Universitas Diponegoro Tahun 2023
    </h4>
    <div class="mb-2 mt-4 flex flex-col align-center justify-center">
        
        <nav class="navbar relative justify-center" style="background: none !important; box-shadow:none !important">
            
            <img class="h-64"
                src="https://res.cloudinary.com/kemenagpessel/image/upload/c_crop,w_715/v1669613484/eVote/LOGO_PEMIRA_pgxcpf.png"
                alt="Pemilihan">
            
        </nav>

        <div class="mt-0 px-4 mb-0">
            <div class="text-center pt-8">
                <a class="link-button" href="<?php echo e(route('home.candidates')); ?>">Lihat Kandidat</a>
            </div>
            <div class="text-center pt-4 pb-8">
                <a class="link-button" href="<?php echo e(route('home.vote')); ?>">Vote Sekarang</a>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <h2 class="text-center text-2xl font-bold">#PEMIRAFEBUNDIP2023</h2>
        <h2 class="text-center text-2xl"><i class="fab fa fa-phone mt-4"></i> 089691648839 </h2>
        <h2 class="text-center text-2xl"><i class="fab fa fa-envelope mt-4"></i> <a
                href="mailto:pemirafebundip.official@gmail.com " target="_blank">pemirafebundip.official@gmail.com </a>
        </h2>
        
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('extraJs'); ?>
        <script></script>
        <?php $__env->stopSection(); ?>



        
        
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/home/index.blade.php ENDPATH**/ ?>