<?php $__env->startSection('content'); ?>
<div class="container m-auto md:mt-18">

    <div class="pt-6 pb-5">
        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-4xl">Vote</h1>

        </p>
    </div>

    
    
    <?php if(!\Carbon\Carbon::now()->between($start_time, $end_time)): ?>
    <div class="my-10">
        <?php if(\Carbon\Carbon::now()->lt($end_time)): ?>
        <p data-aos="fade-up">Pemungutan suara belum dibuka.</p>
        <?php else: ?>
        <p data-aos="fade-up">Pemungutan suara telah ditutup.</p>
        <?php endif; ?>
    </div>
    <?php else: ?>
    <form class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex" method="post"
        action="<?php echo e(route('home.vote.check')); ?>">
        <?php echo csrf_field(); ?>
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6" data-aos="fade-in">
            <div class="w-full pr-0 sm:pr-0 md:pr-4 lg:pr-4 xl:pr-4">
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">NIM / Voter ID</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('nim') ? 'border-red-500' : ''); ?>"
                        type="text" name="nim" value="<?php echo e(old('nim', $current_member ? $current_member->nim : '')); ?>"
                        placeholder="Masukkan Voter ID yang terdaftar (NIM)" required>
                </div>
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-1/6">Voter Key</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('voter_key') ? 'border-red-500' : ''); ?>"
                        type="text" name="voter_key"
                        value="<?php echo e(old('voter_key', $current_member ? $current_member->voter_key : '')); ?>"
                        placeholder="Masukan voter key yang telah diberikan" required>
                </div>

                <?php if(session('current_member')): ?>
                
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Nama Lengkap</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('name') ? 'border-red-500' : ''); ?>"
                        type="text" name="name" value="<?php echo e(old('name', $current_member ? $current_member->name : '')); ?>"
                        readonly disabled>
                </div>
                
                
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Prodi -
                        Angkatan</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('jurusan') ? 'border-red-500' : ''); ?>"
                        type="text" name="jurusan"
                        value="<?php echo e(old('jurusan', $current_member ? $current_member->jurusan : '')); ?>" readonly disabled>
                </div>
                

                <?php endif; ?>
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <div class="w-full">
                        <?php if(session('current_member')): ?>
                        <div
                            class="btn px-6 <?php echo e(count($errors) > 0 ? 'error' : ''); ?> mx-auto w-full md:w-32 <?php echo e(session('current_member') ? 'success' : ''); ?>">
                            Data Valid
                        </div>
                        <button type="button"
                            class="btn mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto <?php echo e(session('current_member') ? 'active' : 'hover:border-gray-secondary hover:text-gray-secondary'); ?>"
                            id="<?php echo e(session('current_member') ? 'next_vote' : ''); ?>" <?php echo e(session('current_member') ? ''
                            : 'disabled'); ?>>Selanjutnya</button>
                        <?php else: ?>
                        <button type="submit"
                            class="btn px-6 <?php echo e(count($errors) > 0 ? 'error' : ''); ?> mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto <?php echo e(session('current_member') ? 'success' : ''); ?>">
                            Cek Validasi
                        </button>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <?php if(count($errors) > 0): ?>
        <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
            <div class="card <?php echo e(count($errors) > 0 ? 'error' : 'primary'); ?> <?php echo e(session('current_member') ? 'success' : ''); ?> p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                <?php if($errors->has('nim')): ?>
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md"><?php echo e($errors->first('email')); ?></p>
                <?php endif; ?>
                <?php if($errors->has('voter_key')): ?>
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md"><?php echo e($errors->first('voter_key')); ?></p>
                <?php endif; ?>
                <?php if($errors->has('g-recaptcha-response')): ?>
                <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md"><?php echo e($errors->first('g-recaptcha-response')); ?></p>
                <?php endif; ?>
                <?php if($errors->has('member')): ?>
                <p class="text-gray-900 block break-all text-sm sm:text-sm md:text-md lg:text-md xl:text-md"><?php echo e($errors->first('member')); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php elseif(count($errors) == 0 && !$current_member): ?>
        <?php else: ?>
        <div class="w-full sm:w-full md:w-2/6 lg:w-2/6 xl:w-2/6 pl-0 sm:pl-0 md:pl-4 lg:pl-4 xl:pl-4 mb-6">
            <div class="card <?php echo e(count($errors) > 0 ? 'error' : 'primary'); ?> <?php echo e(session('current_member') ? 'success' : ''); ?> p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :</p>
                <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">Hai <?php echo e($current_member->name); ?>, anda terdaftar sebagai peserta pemilihan<br>Silahkan klik
                    <strong>selanjutnya</strong> untuk memilih kandidat
                </p>
            </div>
        </div>
        <?php endif; ?>
    </form>
    <?php endif; ?>

    <div class="mb-6">
        
        
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<script>
    $('#next_vote').click(function() {
            window.location.href = '<?php echo e(route('home.vote.detail')); ?>';
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/vote/index.blade.php ENDPATH**/ ?>