<footer class="py-10 center" style="background:brown; justify-content:center">

    <ul class="list-reset lg:flex justify-center flex-1 items-center font-light pb-5">
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

    <p class="text-white text-sm text-center">© 2023 DukungCalonmu.com | BacaroconsultantLTD</p>
    <p class="text-white text-xs text-center">Server time: <?php echo e(date('Y-m-d H:i:s')); ?></p>
    
</footer><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/layouts/includes/footer.blade.php ENDPATH**/ ?>