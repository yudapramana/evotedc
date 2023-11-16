<?php $__env->startSection('title'); ?><?php echo e(config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index)); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Formulir Data Kandidat</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right">
                    <fieldset disabled>
                        <div class="kt-portlet__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 ">
                                            <h3 class="kt-section__title kt-section__title-sm">Informasi Kandidat:</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3"></div>
                                        <div class="col-lg-9 ">
                                            <div class="form-group">
                                                <div class="kt-avatar kt-avatar--outline embed-responsive" id="kt_user_avatar_1" style="width: 138px; height: 138px;">
                                                    <img class="embed-responsive-item" src="<?php echo e(old('image', $detail->image)); ?>" id="holder" style="width: 138px; height: 138px;object-fit: cover;">
                                                    <label class="kt-avatar__upload" id="lfm" data-input="thumbnail" data-preview="holder">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="hidden" name="image" value="<?php echo e(old('image', $detail->image)); ?>" id="thumbnail">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Batal">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                                </div>
                                                <?php if($errors->has('image')): ?>
                                                    <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">* Nama Lengkap</label>
                                        <div class="col-lg-9 ">
                                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" name="name" type="text" value="<?php echo e(old('name', $detail->name)); ?>"  placeholder="Nama Lengkap" required>
                                            <?php if($errors->has('name')): ?>
                                                <div id="name-error" class="error invalid-feedback"><?php echo e($errors->first('name')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">* Nomor Urut</label>
                                        <div class="col-lg-9 ">
                                            <input class="form-control <?php echo e($errors->has('number') ? 'is-invalid' : ''); ?>" name="number" type="number" value="<?php echo e(old('number', $detail->number)); ?>"  placeholder="Nomor Urut" required>
                                            <?php if($errors->has('number')): ?>
                                                <div id="number-error" class="error invalid-feedback"><?php echo e($errors->first('number')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Back</a>&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/backend/candidates/view.blade.php ENDPATH**/ ?>