@extends('layouts.admin')
@php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
@endphp

@section('page-title')
    {{ __('Employee Detail') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">
            {{ \Auth::user()->employeeIdFormat($employee->employee_id) . ' ' . __('Details') }}</h5>
    </div>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">{{ __('Employee List') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Employee Details') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card card-fluid">
                <div class="card-header">
                    <h5>{{ $user->name }}</h5>
                </div>
                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('ID') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ \Auth::user()->employeeIdFormat($employee->employee_id) }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Date of Birth') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->dob) ? \Auth::user()->dateFormat($employee->dob) : '-' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Mobile') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $employee->mobile }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Emergency Contact') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $employee->emergency_contact }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Gender') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $employee->gender }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Address') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $employee->address }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-fluid">
                <div class="card-header">
                    <h5>{{ 'Company Detail' }}</h5>
                </div>
                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Department') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->departments) ? $employee->departments->name : '' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Designation') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->designations) ? $employee->designations->name : '' }}
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Date of Joining') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->joining_date) ? \Auth::user()->dateFormat($employee->joining_date) : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Date of Exit') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->exit_date) ? \Auth::user()->dateFormat($employee->exit_date) : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Salary Type') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->salaryType) ? $employee->salaryType->name : '' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Salary') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ \Auth::user()->priceFormat($employee->salary) }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-fluid">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Bank Detail') }}</h5>
                </div>
                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Account Holder Name') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty(!empty($employee->account_holder_name)) ? $employee->account_holder_name : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Account Number') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->account_number) ? $employee->account_number : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Bank Name') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->bank_name) ? $employee->bank_name : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Bank Identifier Code') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->bank_identifier_code) ? $employee->bank_identifier_code : '-' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Branch Location') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ !empty($employee->branch_location) ? $employee->branch_location : '-' }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
