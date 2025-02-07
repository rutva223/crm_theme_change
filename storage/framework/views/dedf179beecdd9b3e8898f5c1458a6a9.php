<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Client')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Client')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Client Detail')); ?></li>
                </ol>
            </nav>
        </div>

        <div class="font-20 ms-auto">
            <a href="javascript:;" data-size="md" data-title="<?php echo e(__('Create New Client')); ?>" class="btn btn-primary"
                data-url="<?php echo e(route('client.create')); ?>" data-ajax-popup="true" data-toggle="modal"
                data-target="#exampleModal">
                <i class="bx bx-plus"></i>Add
            </a>
        </div>
    </div>

    <div class="row">
        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 col-sm-4">
                <div class="card hover-shadow-lg">
                    <div class="card-header border-0 pb-0 pt-2 px-3">
                        <div class="row">
                            <div class="col-6  text-right">
                                <span class="badge bg-primary p-2 px-3 rounded"><?php echo e(\Auth::user()->clientIdFormat(!empty($client->clientDetail) ? $client->clientDetail->client_id : '')); ?></span>
                            </div>
                            <div class="col-6  text-end">
                                <div class="actions">
                                    <?php if($client->is_active == 1): ?>
                                        <div class="dropdown action-item">
                                            <a href="#" class="action-item " data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-horizontal-rounded font-22"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="<?php echo e(route('client.edit', $client->id)); ?>" class="dropdown-item"
                                                    data-bs-whatever="<?php echo e(__('Edit Client')); ?>">
                                                    <i class="ti ti-edit"> </i> <?php echo e(__('Edit')); ?></a>

                                                <a href="<?php echo e(route('client.show', \Crypt::encrypt($client->id))); ?>"
                                                    class="dropdown-item" data-bs-whatever="<?php echo e(__('View Client')); ?>">
                                                    <i class="ti ti-eye"></i> <?php echo e(__('View')); ?></a>

                                                <a href="javascript:;" data-size="md" data-title="<?php echo e(__('Reset Password')); ?>" class="dropdown-item" data-url="<?php echo e(route('client.reset', \Crypt::encrypt($client->id))); ?>" data-ajax-popup="true" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="ti ti-lock"></i> <?php echo e(__('Reset Password')); ?>

                                                </a>

                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['client.destroy', $client->id]]); ?>

                                                <a href="#!" class="show_confirm dropdown-item">
                                                    <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                </a>
                                                <?php echo Form::close(); ?>

                                                <?php if($client->is_enable_login == 1): ?>
                                                    <a href="<?php echo e(route('client.login', \Crypt::encrypt($client->id))); ?>"
                                                        class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-danger"> <?php echo e(__('Login Disable')); ?></span>
                                                    </a>
                                                <?php elseif($client->is_enable_login == 0 && $client->password == null): ?>
                                                    <a href="#"
                                                        data-url="<?php echo e(route('client.reset', \Crypt::encrypt($client->id))); ?>"
                                                        data-ajax-popup="true" data-size="md"
                                                        class="dropdown-item login_enable"
                                                        data-title="<?php echo e(__('New Password')); ?>" class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('client.login', \Crypt::encrypt($client->id))); ?>"
                                                        class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="actions d-flex justify-content-between px-4">
                                            <a href="#" data-toggle="tooltip"
                                                data-original-title="<?php echo e(__('Lock')); ?>"
                                                class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                <i class="bx bx-lock"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body user-card text-center client-box">
                        <div class="avatar-parent-child">
                            <img <?php if(!empty($client->avatar)): ?> src="<?php echo e($profile . '/' . $client->avatar); ?>" <?php else: ?> avatar="<?php echo e($client->name); ?>" <?php endif; ?>
                                class="avatar  rounded-circle avatar-lg" style="width:80px;">

                        </div>
                        <h5 class="h6 mt-4 mb-0"><?php echo e($client->name); ?></h5>
                        <a href="#" class=" text-sm text-muted"><?php echo e($client->email); ?></a>

                    </div>

                    <?php if($client->lastlogin): ?>
                        <div class="row justify-content-between align-items-center mt-2">
                            <div class="col text-center">
                                <span class="d-block h6 mb-2" data-bs-toggle="tooltip"
                                    data-bs-original-title="<?php echo e(__('Last Login')); ?>"><?php echo e($client->lastlogin); ?></span>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row justify-content-between align-items-center mt-4">
                            <div class="col text-center">
                                <span class="d-block h6 mb-2" data-bs-toggle="tooltip"
                                    data-bs-original-title="<?php echo e(__('Last Login')); ?>"><?php echo e($client->lastlogin); ?></span>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#password_switch', function() {
            if ($(this).is(':checked')) {
                $('.ps_div').removeClass('d-none');
                $('#password').attr("required", true);

            } else {
                $('.ps_div').addClass('d-none');
                $('#password').val(null);
                $('#password').removeAttr("required");
            }
        });
        $(document).on('click', '.login_enable', function() {
            setTimeout(function() {
                $('.modal-body').append($('<input>', {
                    type: 'hidden',
                    val: 'true',
                    name: 'login_enable'
                }));
            }, 2000);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/client/index.blade.php ENDPATH**/ ?>