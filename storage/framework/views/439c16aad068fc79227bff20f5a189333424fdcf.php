<?php $__env->startSection('content'); ?>

<style>
    .container-fluid {
        height: 100vh !important;
        /* overflow-y: hidden; */
        /* don't show content that exceeds my height */
    }
</style>
<div class="container-fluid m-auto center" style="background-image:url('https://res.cloudinary.com/dezj1x6xp/image/upload/v1700066661/Proyek%20Pemira%20Undip%202023/Backgraund_Log_In_lkflmm.png'); background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    box-shadow: inset 0 0 0 1000px rgba(0,0,0,.4);
    background-size: cover; justify-content: center !important;">


    <div class="pt-6 pb-5">
        <h1 class="text-2xl md:text-3xl lg:text-4xl xl:text-4xl text-center text-white">
            Login Voting</h1>

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

    <div class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex pb-5"
        style="justify-content: center !important;">
        <?php if(count($errors) > 0): ?>
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6">
            <div class="card <?php echo e(count($errors) > 0 ? 'error' : 'primary'); ?> <?php echo e(session('current_member') ? 'success' : ''); ?> p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :
                </p>
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
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6">
            <div class="card <?php echo e(count($errors) > 0 ? 'error' : 'primary'); ?> <?php echo e(session('current_member') ? 'success' : ''); ?> p-6 pb-10"
                data-aos="fade-in">
                <p class="font-bold text-md sm:text-md md:text-lg lg:text-lg xl:text-lg text-gray-900">Keterangan :
                </p>
                <p class="text-gray-900 block text-sm sm:text-sm md:text-md lg:text-md xl:text-md">Hai <?php echo e($current_member->name); ?>, anda terdaftar sebagai peserta pemilihan<br>Silahkan klik
                    <strong>selanjutnya</strong> untuk memilih kandidat
                </p>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <form class="w-full flex-row sm:flex-row md:flex lg:md:flex xl:md:flex pb-5 mb-5" method="post"
        action="<?php echo e(route('home.vote.check')); ?>" style="justify-content: center !important;">
        <?php echo csrf_field(); ?>
        <div class="w-full sm:w-full md:w-4/6 lg:w-4/6 xl:w-4/6" data-aos="fade-in">
            <div class="w-full pr-0 sm:pr-0 md:pr-4 lg:pr-4 xl:pr-4">
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label
                        class="py-3 leading-tight text-white font-weight-bold w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">NIM
                        /
                        Voter
                        ID</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('nim') ? 'border-red-500' : ''); ?>"
                        type="text" name="nim" value="<?php echo e(old('nim', $current_member ? $current_member->nim : '')); ?>"
                        placeholder="Masukkan Voter ID yang terdaftar (NIM)" required>
                </div>
                <?php if(!session('current_member')): ?>
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="py-3 leading-tight text-white font-weight-bold w-1/6">Voter Key</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('voter_key') ? 'border-red-500' : ''); ?>"
                        type="text" name="voter_key"
                        value="<?php echo e(old('voter_key', $current_member ? $current_member->voter_key : '')); ?>"
                        placeholder="Masukan voter key yang telah diberikan" required>
                </div>
                <?php endif; ?>

                <?php if(session('current_member')): ?>
                
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="text-white py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Nama
                        Lengkap</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('name') ? 'border-red-500' : ''); ?>"
                        type="text" name="name" value="<?php echo e(old('name', $current_member ? $current_member->name : '')); ?>"
                        readonly disabled>
                </div>
                
                
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <label class="text-white py-3 leading-tight w-full sm:w-full md:w-1/6 lg:w-1/6 xl:w-1/6">Prodi -
                        Angkatan</label>
                    <input
                        class="input placeholder-gray-secondary opacity-75 w-full sm:w-full md:w-5/6 lg:w-5/6 xl:w-5/6 <?php echo e($errors->has('jurusan') ? 'border-red-500' : ''); ?>"
                        type="text" name="jurusan"
                        value="<?php echo e(old('jurusan', $current_member ? $current_member->jurusan : '')); ?>" readonly disabled>
                </div>
                

                <?php endif; ?>
                <div class="mb-3 flex-row sm:flex-row md:flex lg:md:flex xl:md:flex">
                    <div class="w-full center" style="
                    text-align: center;
                ">
                        <?php if(session('current_member')): ?>

                        <div class="center" style="justify-content: center">
                            <div style="display:inline-block"
                                class="btn px-6 <?php echo e(count($errors) > 0 ? 'error' : ''); ?> mx-auto w-full md:w-32 <?php echo e(session('current_member') ? 'success' : ''); ?>">
                                Data Valid
                            </div>
                            <button type="button" style="display:inline-block"
                                class="btn mx-auto w-full sm:w-full md:w-auto lg:w-auto xl:w-auto <?php echo e(session('current_member') ? 'active' : 'hover:border-gray-secondary hover:text-gray-secondary'); ?>"
                                id="<?php echo e(session('current_member') ? 'next_vote' : ''); ?>" <?php echo e(session('current_member')
                                ? '' : 'disabled'); ?>>Selanjutnya</button>
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
        </div>

    </form>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('extraJs'); ?>
    <script>
        $('#next_vote').click(function() {
            window.location.href = '<?php echo e(route('home.vote.detail')); ?>';
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/frontend/vote/index.blade.php ENDPATH**/ ?>