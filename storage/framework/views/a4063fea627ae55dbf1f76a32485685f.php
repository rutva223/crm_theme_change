<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Category')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Category')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Category')); ?></li>
                </ol>
            </nav>
        </div>
        <?php if(\Auth::user()->type == 'company'): ?>
            <div class="font-20 ms-auto">
                <a href="javascript:;" data-size="md" data-title="<?php echo e(__('Create New category')); ?>" class="btn btn-primary"
                    data-url="<?php echo e(route('category.create')); ?>" data-ajax-popup="true" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="bx bx-plus"></i>Add
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('Category')); ?></th>
                                <th scope="col"><?php echo e(__('Type')); ?></th>
                                <?php if(\Auth::user()->type == 'company'): ?>
                                    <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="font-style"><?php echo e($category->name); ?></td>
                                    <td class="font-style">
                                        <?php echo e(__(\App\Models\Category::$categoryType[$category->type])); ?>

                                    </td>
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <td class="d-flex order-actions">
                                            <a href="javascript:;" data-size="md" data-title="Edit category" class="ms-2"
                                                data-url="<?php echo e(route('category.edit', $category->id)); ?>" style="color:blue"
                                                data-ajax-popup="true" data-toggle="modal" data-target="#exampleModal">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id]]); ?>

                                            <a href="javascript:;" style="color:red"
                                                class="show_confirm ms-2 btn btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/category/index.blade.php ENDPATH**/ ?>