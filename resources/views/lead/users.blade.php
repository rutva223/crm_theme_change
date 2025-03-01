{{ Form::model($lead, ['route' => ['lead.users.update', $lead->id], 'method' => 'post']) }}
<div class="modal-body">
    <div class="row">
        <div class="form-label col-md-12">
            {{ Form::label('name', __('User')) }}
            {{ Form::select('users[]', $users, null, [
                'class' => 'form-control multiple-select',
                'multiple' => 'multiple',
                'required' => 'required',
            ]) }}
        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
    {{ Form::submit(__('Add'), ['class' => 'btn  btn-primary']) }}
</div>
{{ Form::close() }}

