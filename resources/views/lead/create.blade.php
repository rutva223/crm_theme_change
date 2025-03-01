{{ Form::open(['url' => 'lead']) }}
<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('subject', __('Subject')) }}
            {{ Form::text('subject', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('user_id', __('Employee')) }}
            {{ Form::select('user_id', $employees, '', ['class' => 'form-control multi-select', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6 mb-3">
            {{ Form::label('email', __('Email')) }}
            {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('phone_no', __('Phone No')) }}
            {{ Form::text('phone_no', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
    {{ Form::submit(__('Create'), ['class' => 'btn  btn-primary']) }}
</div>

{{ Form::close() }}
