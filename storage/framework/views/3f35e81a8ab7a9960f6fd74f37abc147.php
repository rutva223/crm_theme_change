<?php echo e(Form::open(['url' => 'category'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12 mb-3">
            <?php echo e(Form::label('name', __('Name'))); ?>

            <?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('type', __('Category Type'))); ?>

            <?php echo e(Form::select('type', $types, null, ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Create'), ['class' => 'btn  btn-primary'])); ?>

</div>
<?php echo e(Form::close()); ?>


<?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/category/create.blade.php ENDPATH**/ ?>