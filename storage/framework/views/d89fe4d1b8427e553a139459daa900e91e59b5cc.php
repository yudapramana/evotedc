<?php $__env->startSection('content'); ?>

<style>
    .manajemen {
        background-image: linear-gradient(135deg, #d25f4a, #e3a86e) !important;
    }

    .akuntansi {
        background-image: linear-gradient(135deg, #3f497b, #3498db) !important;
    }

    .ekonomi-islam {
        background-image: linear-gradient(135deg, #2b7913, #49a143) !important;
    }

    .ekonomi {
        background-image: linear-gradient(135deg, #182362, #3043c5) !important;
    }
</style>


<div class="container m-auto mt-24 md:mt-18">
    <?php if(count($candidates1) == 0): ?>
    <div class="text-center p-20">
        <h1 class="text-gray-secondary text-xl">Belum ada data kandidat!</h1>
    </div>
    <?php else: ?>
    <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">PEMILIHAN UMUM RAYA FEB UNDIP 2023
    </h2>
    <div class="flex flex-wrap justify-center  mb-20">

        <?php $__currentLoopData = $candidates1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="py-2 px-2 w-full md:w-1/2">
            <div class="object-center h-12">
                <div class="frame-number">
                    <h1 class="text-5xl m-auto"><?php echo e($item->number); ?></h1>
                </div>
            </div>
            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                <div class="kandidat-container">
                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto"
                        style="font-family: 'Courier New', Courier, monospace!important"><?php echo e($item->name); ?></p>
                </div>
                <div class="object-center h-10 mt-8 flex">
                    <img src="<?php echo e($item->image); ?>" class="kandidat-frame object-cover">
                    <?php if($item->image_vice): ?>
                    <img src="<?php echo e($item->image_vice); ?>" class="kandidat-frame object-cover">
                    <?php endif; ?>
                </div>
                <div class="text-center pb-10 pt-10 flex flex-col">
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


    
    <div class="flex flex-wrap justify-center">
        <?php $__currentLoopData = $candidates2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <h2 class="text-center text-4xl font-extrabold font-serif italic pt-4 pb-8 mb-4">SUKSESI <?php echo e(strtoupper($key)); ?>

            DI LINGKUP FEB UNDIP 2023 </h2>

        <?php $__currentLoopData = $cans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="py-2 px-2 w-full md:w-1/2 mb-20">
            <div class="object-center h-12">
                <div class="frame-number">
                    <h1 class="text-5xl m-auto"><?php echo e($item->number); ?></h1>
                </div>
            </div>
            <div class="rounded-large overflow-hidden shadow-lg bg-white">
                <div
                    class="kandidat-container <?php if($item->jurusan == 'Manajemen'): ?> manajemen <?php endif; ?> <?php if($item->jurusan == 'Akuntansi'): ?> akuntansi <?php endif; ?> <?php if($item->jurusan == 'Ekonomi Islam'): ?> ekonomi-islam <?php endif; ?> <?php if($item->jurusan == 'Ekonomi'): ?> ekonomi <?php endif; ?>">
                    <p class="text-center pt-24 text-white px-6 text-2xl mx-auto"
                        style="font-family: 'Courier New', Courier, monospace!important"><?php echo e($item->name); ?></p>
                </div>
                <div class="object-center h-10 mt-8 flex">
                    <img src="<?php echo e($item->image); ?>" class="kandidat-frame object-cover">
                    <?php if($item->image_vice): ?>
                    <img src="<?php echo e($item->image_vice); ?>" class="kandidat-frame object-cover">
                    <?php endif; ?>
                </div>
                <div class="text-center pb-10 pt-10 flex flex-col">

                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    




    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/candidates/index.blade.php ENDPATH**/ ?>