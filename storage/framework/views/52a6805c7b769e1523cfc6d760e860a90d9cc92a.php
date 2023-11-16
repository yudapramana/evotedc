<?php $__env->startSection('title'); ?><?php echo e(config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index)); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            List users
                            <small>of explorin apps</small>
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <form method="POST" action="<?php echo e(route($route_index . '.delete')); ?>" id="form">
                                <?php echo csrf_field(); ?>
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid m-0"><input type="checkbox" id="check_all">&nbsp;<span></span></label>
                                        </th>
                                        <th>No</th>
                                        <th width="10%">Image</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row">
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid"><input type="checkbox" name="id[]" onclick="check_checked()" value="<?php echo e($item->id); ?>">&nbsp;<span></span></label>
                                            </th>
                                            <td><?php echo e(1 + $key); ?></td>
                                            <td>
                                                <a href="<?php echo e($item->image ? url($item->image) : asset('img/avatar.svg')); ?>" data-toggle="lightbox">
                                                    <img class="rounded" src="<?php echo e($item->image ? url($item->image) : asset('img/avatar.svg')); ?>" onerror="this.src='<?php echo e(asset('img/avatar.svg')); ?>'" style="max-width: 40px;">
                                                </a>
                                            </td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->phone? $item->phone : '-'); ?></td>
                                            <td><?php echo e($item->first_name ? $item->first_name : '-'); ?></td>
                                            <td><?php echo e($item->last_name ? $item->last_name : '-'); ?></td>
                                            <td><?php echo e($item->username ? $item->username : '-'); ?></td>
                                            <td>
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <a href="<?php echo e(route($route_index . '.view', $item->id)); ?>" title="Edit details" class="btn btn-sm btn-icon btn-icon-md btn-label-info">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-' . $route_index)): ?>
                                                    <a href="<?php echo e(route($route_index . '.edit', $item->id)); ?>" title="Edit details" class="btn btn-sm btn-icon btn-icon-md btn-label-warning">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additionalAction'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-' . $route_index)): ?>
        <a href="<?php echo e(route($route_index . '.create')); ?>" class="btn btn-label-brand btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Create New" data-placement="bottom">
            <i class="la la-plus"></i>
            Add User
        </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-' . $route_index)): ?>
        <button type="button" id="delete_button" class="btn btn-label-danger btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Remove" data-placement="bottom" style="display: none;">
            <i class="la la-trash"></i> Remove
        </button>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraCss'); ?>
    <link href="<?php echo e(asset('css/ekko-lightbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('__backend/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
    <script src="<?php echo e(asset('js/ekko-lightbox.js')); ?>"></script>
    <script src="<?php echo e(asset('__backend/plugins/custom/datatables/datatables.bundle.js')); ?>" type="text/javascript"></script>
    <script>
        $('#delete_button').click(function () {
            remove('form');
        });
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#datatable').dataTable();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\evote\resources\views/backend/users/index.blade.php ENDPATH**/ ?>