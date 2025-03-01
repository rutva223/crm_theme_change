{{ Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT']) }}
<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('subject', __('Subject')) }}
            {{ Form::text('subject', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('user_id', __('Employee')) }}
            {{ Form::select('user_id', $employees, null, ['class' => 'form-control multi-select', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('email', __('Email')) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('pipeline_id', __('Pipeline')) }}
            {{ Form::select('pipeline_id', $pipelines, null, ['class' => 'form-control multi-select', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('stage_id', __('Stage')) }}
            {{ Form::select('stage_id', ['' => __('Select Stages')], null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('sources', __('Sources')) }}
            {{ Form::select('sources[]', $sources, null, ['class' => 'form-control multi-select', 'id' => 'choices-multiple', 'multiple' => '', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('products', __('Items')) }}
            {{ Form::select('products[]', $products, explode(',', $lead->items), ['class' => 'form-control multi-select', 'id' => 'choices-multiple1', 'multiple' => '', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('phone_no', __('Phone No')) }}
            {{ Form::text('phone_no', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-12 mb-2">
            {{ Form::label('notes', __('Notes')) }}
            {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '2']) !!}
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
    {{ Form::submit(__('Update'), ['class' => 'btn  btn-primary']) }}
</div>

{{ Form::close() }}
@push('script-page')
    <script>
        var stage_id = '{{ $lead->stage_id }}';
        var pipeline_id = $('[name=pipeline_id]').val();
        getStages(pipeline_id);

        $(document).on("change", "#exampleModal select[name=pipeline_id]", function() {
            var currVal = $(this).val();
            getStages(currVal);
        });

        function getStages(id) {
            $.ajax({
                url: '{{ route('lead.json') }}',
                data: {
                    pipeline_id: id,
                    _token: $('meta[name="csrf-token"]').attr('content')

                },
                type: 'POST',
                success: function(data) {
                    var stage_cnt = Object.keys(data).length;
                    $("#stage_id").empty().append(
                        '<option value="" selected="selected">{{ __('Select Stages') }}</option>');
                    if (stage_cnt > 0) {
                        $.each(data, function(key, data) {
                            var select = '';
                            if (key == '{{ $lead->stage_id }}') {
                                select = 'selected';
                            }
                            $("#stage_id").append('<option value="' + key + '" ' + select + '>' + data +
                                '</option>');
                        });
                    }
                    $("#stage_id").val(stage_id);
                    $('#stage_id').multi - select({
                        placeholder: "{{ __('Select Stage') }}"
                    });
                }
            })
        }
    </script>
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
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
