<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Project Create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Project Create')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('project.index')); ?>"><?php echo e(__('Project List')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Create Project')); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <?php echo e(Form::open(['url' => 'project', 'class' => 'mt-4'])); ?>

    <div class="card">
        <div class="card-body">
            <?php
                $plansettings = App\Models\Utility::plansettings();
            ?>
            <div class="row">
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('title', __('Project Title'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Project Title')])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('category', __('Category'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('category', $categories, '', ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('price', __('Price'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::number('price', null, ['class' => 'form-control', 'required' => 'required', 'stage' => '0.01', 'placeholder' => __('Price')])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::date('start_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('due_date', __('Due Date'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::date('due_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('lead', __('Lead'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('lead', $leads, null, ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('client', __('Client'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('client', $clients, '', ['class' => 'form-control multi-select'])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('employee', __('Employee'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('employee[]', $employees, null, [
                        'class' => 'form-control multiple-select',
                        'multiple' => 'multiple',
                        'required' => 'required',
                    ])); ?>

                </div>
                <div class="form-group col-md-4">
                    <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::select('status', $projectStatus, null, ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

                </div>
                <div class="form-group col-md-12">
                    <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => __('Description')])); ?>

                </div>
                <div class="modal-footer pr-0">
                    <input type="button" value="<?php echo e(__('Close')); ?>"
                        onclick="location.href = '<?php echo e(route('project.index')); ?>';" class="btn btn-light">
                    <?php echo e(Form::submit(__('Create'), ['class' => 'btn  btn-primary'])); ?>

                </div>
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/project/create.blade.php ENDPATH**/ ?>