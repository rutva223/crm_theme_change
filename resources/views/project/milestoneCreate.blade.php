{{ Form::open(['route' => ['project.milestone.store', $project->id]]) }}
@php
    $plansettings = App\Models\Utility::plansettings();
@endphp
<div class="row">
    @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
        <div class="text-end">
            <a href="#" data-size="lg" data-ajax-popup-over="true"
                data-url="{{ route('generate', ['project milestone']) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __('Generate') }}" data-title="{{ __('Generate') }}" float-end>
                <span class="btn btn-primary btn-sm"> <i class="fas fa-robot"> {{ __('Generate With AI') }}</span></i>
            </a>
        </div>
    @endif

    <div class="form-group  col-md-6">
        {{ Form::label('title', __('Title'), ['class' => 'col-form-label']) }}
        {{ Form::text('title', '', ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('status', __('Status'), ['class' => 'col-form-label']) }}
        {!! Form::select('status', $status, null, [
            'class' => 'form-control',
            'data-toggle' => 'select',
            'required' => 'required',
        ]) !!}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('start_date', __('Start Date'), ['class' => 'col-form-label']) }}
        {{ Form::date('start_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('due_date', __('Due Date'), ['class' => 'col-form-label']) }}
        {{ Form::date('due_date', new \DateTime(), ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group  col-md-6">
        {{ Form::label('cost', __('Cost'), ['class' => 'col-form-label']) }}
        {{ Form::number('cost', '', ['class' => 'form-control', 'required' => 'required', 'stage' => '0.01', 'Placeholder' => __('Enter Cost')]) }}
    </div>
</div>
<div class="row">
    <div class="form-group  col-md-12">
        {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
        {!! Form::textarea('description', null, [
            'class' => 'form-control',
            'rows' => '2',
            'placeholder' => __('Enter Description'),
        ]) !!}
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
    {{ Form::submit(__('Create'), ['class' => 'btn  btn-primary']) }}
</div>
{{ Form::close() }}
