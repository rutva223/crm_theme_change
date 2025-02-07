<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Client Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> <?php echo e(\Auth::user()->clientIdFormat($client->client_id)); ?>

            <?php echo e(__('Details')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Client List')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Client Details')); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__($user->name) ?? '--'); ?></h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Email')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($user->email ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Mobile')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->mobile ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Address 1')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="col-6 text-right"><?php echo e($client->address_1 ?? '--'); ?></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Address 2')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->address_2 ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('City')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->city ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('State')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->state ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Country')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->country ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Zip Code')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->zip_code ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Company Detail')); ?></h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('ID')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e(\Auth::user()->clientIdFormat($client->client_id)); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Company Name')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->company_name ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Web Site')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e($client->website); ?>" target="_blank"><?php echo e($client->website ?? '--'); ?></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Tax Number')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->tax_number ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Note')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->notes ?? '--'); ?>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/client/view.blade.php ENDPATH**/ ?>