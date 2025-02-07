@extends('layouts.admin')
@php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
@endphp

@section('page-title')
    {{ __('Client Detail') }}
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ \Auth::user()->clientIdFormat($client->client_id) }}
            {{ __('Details') }}</h5>
    </div>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">{{ __('Client List') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Client Details') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __($user->name) ?? '--' }}</h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Email') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $user->email ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Mobile') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->mobile ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Address 1') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="col-6 text-right">{{ $client->address_1 ?? '--' }}</div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Address 2') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->address_2 ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('City') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->city ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('State') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->state ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Country') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->country ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Zip Code') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->zip_code ?? '--' }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Company Detail') }}</h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('ID') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ \Auth::user()->clientIdFormat($client->client_id) }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Company Name') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->company_name ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Web Site') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ $client->website }}" target="_blank">{{ $client->website ?? '--' }}</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Tax Number') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->tax_number ?? '--' }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label">{{ __('Note') }}</span>
                                </div>
                                <div class="col-6 text-right">
                                    {{ $client->notes ?? '--' }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
