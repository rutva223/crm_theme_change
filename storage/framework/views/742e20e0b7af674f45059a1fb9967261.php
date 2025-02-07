<?php echo e(Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT'])); ?>

<?php
$plansettings = App\Models\Utility::plansettings();
?>
<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
        <div class="text-end">
            <a href="#" data-size="lg" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['lead'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate')); ?>" float-end>
                <span class="btn btn-primary btn-sm"> <i class="fas fa-robot">  <?php echo e(__('Generate With AI')); ?></span></i>
            </a>
        </div>
    <?php endif; ?>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('subject', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('user_id', __('Employee'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('user_id', $employees, null, ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('email', __('Email'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('pipeline_id', __('Pipeline'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('pipeline_id', $pipelines, null, ['class' => 'form-control multi-select', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('stage_id', __('Stage'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('stage_id', ['' => __('Select Stages')], null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('sources', __('Sources'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('sources[]', $sources, null, ['class' => 'form-control multi-select', 'id' => 'choices-multiple', 'multiple' => '', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('products', __('Items'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::select('products[]', $products, explode(',', $lead->items), ['class' => 'form-control multi-select', 'id' => 'choices-multiple1', 'multiple' => '', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-6">
        <?php echo e(Form::label('phone_no', __('Phone No'), ['class' => 'col-form-label'])); ?>

        <?php echo e(Form::text('phone_no', null, ['class' => 'form-control', 'required' => 'required'])); ?>

    </div>
    <div class="form-group col-md-12">
        <?php echo e(Form::label('notes', __('Notes'), ['class' => 'col-form-label'])); ?>

        <?php echo Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '2']); ?>

    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <?php echo e(Form::submit(__('Update'), ['class' => 'btn  btn-primary'])); ?>

</div>

<?php echo e(Form::close()); ?>

    <?php $__env->startPush('script-page'); ?>
    <script>

    var stage_id = '<?php echo e($lead->stage_id); ?>';
    var pipeline_id = $('[name=pipeline_id]').val();
    getStages(pipeline_id);

    $(document).on("change", "#exampleModal select[name=pipeline_id]", function() {
        var currVal = $(this).val();
        getStages(currVal);
    });

    function getStages(id) {

        $.ajax({
            url: '<?php echo e(route('lead.json')); ?>',
            data: {
                pipeline_id: id,
                _token: $('meta[name="csrf-token"]').attr('content')

            },
            type: 'POST',
            success: function(data) {
                var stage_cnt = Object.keys(data).length;
                $("#stage_id").empty().append(
                    '<option value="" selected="selected"><?php echo e(__('Select Stages')); ?></option>');
                if (stage_cnt > 0) {
                    $.each(data, function(key, data) {
                        var select = '';
                        if (key == '<?php echo e($lead->stage_id); ?>') {
                            select = 'selected';
                        }
                        $("#stage_id").append('<option value="' + key + '" ' + select + '>' + data +
                            '</option>');
                    });
                }
                $("#stage_id").val(stage_id);
                $('#stage_id').multi-select({
                    placeholder: "<?php echo e(__('Select Stage')); ?>"
                });
            }
        })
    }
</script>
<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script>
    if ($(".multi-select").length > 0) {
        $($(".multi-select")).each(function(index, element) {
            var id = $(element).attr('id');
            var multipleCancelButton = new Choices(
                '#' + id, {
                    removeItemButton: true,
                }
            );
        });
    }
</script>
<?php /**PATH C:\laragon\www\theme_change\crm_theme_change\resources\views/lead/edit.blade.php ENDPATH**/ ?>