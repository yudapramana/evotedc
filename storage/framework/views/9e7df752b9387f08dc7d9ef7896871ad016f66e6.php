<nav class="navbar relative justify-center">
    

    <div>
        <img class="w-16 h-16" src="http://koeliah.com/wp-content/uploads/2018/05/undip.png" alt="Pemilihan">
    </div>
    <div>
        <img class="h-16"
            src="https://res.cloudinary.com/kemenagpessel/image/upload/c_crop,w_715/v1669613484/eVote/LOGO_PEMIRA_pgxcpf.png"
            alt="Pemilihan">
    </div>


    <div>
        <img class="h-16"
            src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_MSA_avawfa.png"
            alt="Manajemen">
    </div>
    <div>
        <img class="h-16"
            src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_-_DESC_crng1v.png"
            alt="Ekonomi">
    </div>
    <div>
        <img class="w-16 h-16"
            src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/Logo_KMA-1_hpozjc.png"
            alt="Akuntansi">
    </div>
    <div>
        <img class="w-16 h-16"
            src="https://res.cloudinary.com/kemenagpessel/image/upload/v1669613484/eVote/LOGO_HMEI_vzjat9.png"
            alt="Ekonomi Islam">
    </div>

    <div clas="flex-grow">

    </div>
    
        <div class="pb-2 pl-5"
            style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight:bolder;">

            
            <span class="text-5xl gr-dark-orange text-black">PEMIRA DAN SUKSESI 2023</span> <br>
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

    <div class="flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center font-light">

            <li class="mt-2 sm:mt-2 md:mt-2 lg:mt-0 xl:mt-0">
                <a href="<?php if(request()->segment(1) == 'vote'): ?> <?php echo e(route('home')); ?> <?php else: ?>  <?php echo e(route('home.vote')); ?> <?php endif; ?>"
                    class="link-button <?php echo e(url()->current() == route('home.vote') || url()->current() == route('home.vote.detail') ? 'active' : ''); ?>">
                    <?php if(request()->segment(1) == 'vote'): ?>
                    Home
                    <?php else: ?>
                    Vote
                    <?php endif; ?>
                </a>
            </li>
            
        </ul>
    </div>
</nav><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/layouts/includes/header.blade.php ENDPATH**/ ?>