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

<nav class="navbar relative justify-center">


    <div>
        <img class="w-32 h-32" src="http://koeliah.com/wp-content/uploads/2018/05/undip.png" alt="Pemilihan">
    </div>
    <div>
        <img class="h-32"
            src="https://res.cloudinary.com/dezj1x6xp/image/upload/v1700062858/Proyek%20Pemira%20Undip%202023/Logo%20-%20logo/Logo_pemira_2023_pdbjdj.png"
            alt="Pemilihan">
    </div>


    <div clas="flex-grow">

    </div>
    
        <div class="pb-2 pl-5"
            style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:bolder;">

            
            <span class="text-5xl gr-dark-orange text-black">PEMILIHAN UMUM RAYA Tahun 2023</span> <br>
            <span class="text-3xl gr-dark-orange text-black">FAKULTAS EKONOMIKA DAN BISNIS</span> <br>
            <span class="text-3xl gr-dark-orange text-black">UNIVERSITAS DIPONEGORO</span> <br>
        </div>
        

    <div class="block lg:hidden">
        <button id="nav-toggle" class="nav-toggle">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>

    
</nav>


<div class="container m-auto mt-15 md:mt-18">
    <?php if(!session('finish_vote')): ?>
    <form id="voteform" method="post" action="<?php echo e(route('home.vote.store')); ?>" class="form-vote">


        <?php echo csrf_field(); ?>

        
        <div class="flex flex-wrap justify-center  mb-15">

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
                            style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:bolder;">
                            <?php echo e($item->name); ?></p>
                    </div>
                    <div class="object-center h-10 mt-8 flex">
                        <img src="<?php echo e($item->image); ?>" class="kandidat-frame object-cover">
                        <?php if($item->image_vice): ?>
                        <img src="<?php echo e($item->image_vice); ?>" class="kandidat-frame object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="text-center pb-10 pt-10 flex flex-col">

                        <button type="button" class="mx-auto btn-sm mt-8" onclick="vote(this)"
                            data-name="<?php echo e($item->name); ?>" data-identitas="<?php echo e($item->id); ?>"
                            data-sumref="#sumdata1">Vote</button>
                        <input type="radio" name="candidate1" value="<?php echo e($item->id); ?>" class="hidden">
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <div class="py-4 my-8 px-4 text-center">
            <input type="submit" class="mx-auto w-full btn active px-20 my-6 kirim-vote pulse" value="Kirim"
                style="background:white">
        </div>
    </form>
    <?php endif; ?>

    <?php if(session('finish_vote')): ?>
    <div class="text-center text-4xl font-extrabold font-serif italic mt-10">
        <p data-aos="fade-up">Terima kasih! Kamu telah berpartisipasi pada pesta demokrasi FEB Universitas Diponegoro
            Tahun 2023</p>
    </div>

    <div class="text-center text-2xl font-extrabold font-serif italic mt-10">
        <p data-aos="fade-up">Halaman ini akan kembali ke halaman login voting dalam waktu <span
                id="hitung-mundur"></span> detik ....</p>
    </div>

    <div class="text-center  font-extrabold font-serif italic mt-10">
        <p data-aos="fade-up">Atau Klik dibawah ini</p>
    </div>

    <div class="text-center text-4xl font-extrabold font-serif italic mt-10">
        <a href="<?php echo e(route('home.vote')); ?>"
            class="link-button <?php echo e(url()->current() == route('home.vote') || url()->current() == route('home.vote.detail') ? 'active' : ''); ?>">
            Vote
        </a>
    </div>
    <?php endif; ?>





</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraCss'); ?>
<link rel="stylesheet" href="<?php echo e(asset('__frontend/css/vote-detail.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<?php if(!session('finish_vote')): ?>
<script src="<?php echo e(asset('__frontend/js/vote-detail.js')); ?>"></script>
<?php else: ?>
<script>
    var t = 60000;


            var counter = 60;
            var interval = setInterval(function() {
                counter--;
                // Display 'counter' wherever you want to display it.
                if (counter <= 0) {
                    clearInterval(interval);
                    $('#timer').html("<h3>Count down complete</h3>");
                    return;
                } else {
                    $('#hitung-mundur').text(counter);
                    console.log("Timer --> " + counter);
                }
            }, 1000);

            setTimeout(function() {
                window.location.href = "/vote";
            }, t);
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/vote/detail.blade.php ENDPATH**/ ?>