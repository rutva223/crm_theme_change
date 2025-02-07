@extends('layouts.admin')
@php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
@endphp
@push('css-page')
@endpush
@push('script-page')
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
@endpush
@section('page-title')
    {{ __('Employee Edit') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ __('Employee Edit') }}</h5>
    </div>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">{{ __('Employee List') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Employee Edit') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Personal Info</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Company Info</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Bank Info</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    {{ Form::model($employee, ['route' => ['employee.personal.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('name', __('Name')) }}
                                                    {{ Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Name']) }}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('mobile', __('Mobile')) }}
                                                    {{ Form::number('mobile', $employee->mobile, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Mobile']) }}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('emergency_contact', __('Emergency Contact')) }}
                                                    {{ Form::text('emergency_contact', $employee->emergency_contact, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Emergency Contact']) }}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('dob', __('Date of Birth')) !!}
                                                    {!! Form::date('dob', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group ">
                                                    {!! Form::label('gender', __('Gender')) !!}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="Male" id="customCheckinlh1"
                                                                    {{ $employee->gender == 'Male' ? 'checked' : 'checked' }}>
                                                                <label class="form-check-label" for="customCheckinlh1">
                                                                    {{ __('Male') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gender" value="Female" id="customCheckinlh2"
                                                                    {{ $employee->gender == 'Female' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="customCheckinlh2">
                                                                    {{ __('Female') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mt-3  mb-3">
                                                <div class="card bg-gradient-primary hover-shadow-lg border-0">
                                                    <div class="card-body py-3">
                                                        <div class="row row-grid align-items-center">
                                                            <div class="col-lg-12">
                                                                <div class="media align-items-center">
                                                                    <a href="#"
                                                                        class="avatar avatar-lg rounded-circle mr-3">
                                                                        <img @if (!empty($user->avatar)) src="{{ $profile . '/' . $user->avatar }}" @else avatar="{{ $user->name }}" @endif
                                                                            class="avatar  rounded-circle avatar-lg"
                                                                            style="width:60px">
                                                                    </a>
                                                                    <div class="media-body ms-3">
                                                                        <h5 class="text-dark mb-2">
                                                                            {{ $user->name }}</h5>
                                                                        <div>
                                                                            <div class="input-group">
                                                                                <input type="file" class="form-control"
                                                                                    id="file-1" name="profile"
                                                                                    aria-describedby="inputGroupFileAddon04"
                                                                                    aria-label="Upload"
                                                                                    data-multiple-caption="{count} files selected"
                                                                                    multiple />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12  mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('address', __('Address')) }}
                                                    {{ Form::textarea('address', $employee->address, ['class' => 'form-control', 'required' => 'required', 'rows' => '3']) }}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{ Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center']) }}
                                            </div>
                                        </div>
                                    </form>
                                    {{ Form::close() }}
                                </div>

                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                    {{ Form::model($employee, ['route' => ['employee.company.update', $employee->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('emp_id', __('Employee ID')) !!}
                                                    {!! Form::text('emp_id', $employeesId, ['class' => 'form-control', 'readonly']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                {{ Form::label('branch_id', __('Branch')) }}
                                                {{ Form::select('branch_id', $branches, null, ['class' => 'form-control select', 'required' => 'required', 'id' => 'branch_id']) }}
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                {{ Form::label('department_id', __('Department'), ['placeholder' => 'Select Department']) }}
                                                <select class=" select form-control " id="department_id"
                                                    name="department_id" required="required">
                                                    <option value="">{{ __('Select any Department') }}</option>
                                                    @foreach ($departmentData as $key => $val)
                                                        <option value="{{ $key }}"
                                                            {{ $key == $employee->department ? 'selected' : '' }}>
                                                            {{ $val }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 mb-3">
                                                {{ Form::label('designation_id', __('Designation')) }}
                                                <select class="select form-control " id="designation_id"
                                                    name="designation_id" required="required"></select>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div cla`s="form-group">
                                                    {!! Form::label('joining_date', __('Date of Joining')) !!}
                                                    {!! Form::date('joining_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('exit_date', __('Date of Exit')) !!}
                                                    {!! Form::date('exit_date', !empty($employee->exit_date) ? null : '', [
                                                        'class' => 'form-control',
                                                        'required' => 'required',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group ">
                                                    {{ Form::label('salary_type', __('Salary Type')) }}
                                                    {{ Form::select('salary_type', $salaryType, null, ['class' => 'form-control multi-select']) }}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('salary', __('Salary')) !!}
                                                    {!! Form::number('salary', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{ Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center']) }}
                                            </div>
                                        </div>
                                    </form>
                                    {{ Form::close() }}
                                </div>
                                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                    {{ Form::model($employee, ['route' => ['employee.bank.update', $employee->user_id], 'method' => 'post']) }}
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('account_holder_name', __('Account Holder Name')) !!}
                                                    {!! Form::text('account_holder_name', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Account Holder Name',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('account_number', __('Account Number')) }}
                                                    {!! Form::text('account_number', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Account Number',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {{ Form::label('bank_name', __('Bank Name')) }}
                                                    {!! Form::text('bank_name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Bank Name']) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('bank_identifier_code', __('Bank Identifier Code')) !!}
                                                    {!! Form::text('bank_identifier_code', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Bank Identifier Code',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('branch_location', __('Branch Location')) !!}
                                                    {!! Form::text('branch_location', null, [
                                                        'class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Branch Location',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{ Form::submit(__('Update'), ['class' => 'btn btn-primary d-flex align-items-center']) }}
                                            </div>
                                        </div>
                                    </form>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('script-page')
    <script type="text/javascript">
        $(document).on('change', '#branch_id', function() {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(branch_id) {
            var data = {
                "branch_id": branch_id,
                "_token": "{{ csrf_token() }}",
            }

            $.ajax({
                url: '{{ route('employee.getdepartment') }}',
                method: 'POST',
                data: data,
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append(
                        '<option value="" disabled>{{ __('Select any Department') }}</option>');

                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                    $('#department_id').val('');
                }
            });
        }
    </script>
    <script type="text/javascript">
        function getDesignation(did) {
            $.ajax({
                url: '{{ route('employee.json') }}',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append(
                        '<option value="">{{ __('Select any Designation') }}</option>');

                    $.each(data, function(key, value) {
                        var select = '';
                        if (key == '{{ $employee->designation }}') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' +
                            value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            var d_id = $('#department_id').val();
            var designation_id = '{{ $employee->designation }}';
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });
    </script>
@endpush
