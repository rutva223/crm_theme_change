@extends('layouts.admin')
@php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
@endphp

@section('page-title')
    {{ __('Client Edit') }}
@endsection

@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"> {{ \Auth::user()->clientIdFormat($client->client_id) }}
            {{ __('Edit') }}</h5>
    </div>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">{{ __('Client List') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Client Edit') }}</li>
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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Personal Info</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Company Info</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                    {{ Form::model($client, ['route' => ['client.personal.update', $client->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                                        <form>
                                            <div class="row mt-3">
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('name', __('Name')) }}
                                                        {{ Form::text('name', $user->name, ['class' => 'form-control font-style', 'placeholder' => 'Enter Name']) }}
                                                        @error('name')
                                                            <span class="invalid-name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('mobile', __('Mobile')) }}
                                                        {{ Form::text('mobile', $client->mobile, ['class' => 'form-control', 'placeholder' => 'Enter Mobile']) }}
                                                        @error('mobile')
                                                            <span class="invalid-mobile" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('address_1', __('Address 1')) }}
                                                        {{ Form::textarea('address_1', $client->address_1, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter Address']) }}
                                                        @error('address_1')
                                                            <span class="invalid-address_1" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('address_2', __('Address 2')) }}
                                                        {{ Form::textarea('address_2', $client->address_2, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Enter Address']) }}
                                                        @error('address_2')
                                                            <span class="invalid-address_2" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="form-group ">
                                                        {{ Form::label('city', __('City')) }}
                                                        {{ Form::text('city', $client->city, ['class' => 'form-control', 'placeholder' => 'Enter City']) }}
                                                        @error('city')
                                                            <span class="invalid-city" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    {{ Form::label('state', __('State')) }}
                                                    {{ Form::text('state', $client->state, ['class' => 'form-control', 'placeholder' => 'Enter State']) }}
                                                    @error('state')
                                                        <span class="invalid-state" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    {{ Form::label('country', __('Country')) }}
                                                    {{ Form::text('country', $client->country, ['class' => 'form-control', 'placeholder' => 'Enter Country']) }}
                                                    @error('country')
                                                        <span class="invalid-country" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    {{ Form::label('zip_code', __('Zip Code')) }}
                                                    {{ Form::text('zip_code', $client->zip_code, ['class' => 'form-control', 'placeholder' => 'Enter Zip Code']) }}
                                                    @error('zip_code')
                                                        <span class="invalid-zip_code" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    {{ Form::label('zip_code', __('Avatar')) }}
                                                    <div class="card bg-gradient-primary hover-shadow-lg border-0">
                                                        <div class="card-body py-3">
                                                            <div class="row row-grid align-items-center">
                                                                <div class="col-lg-8">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar avatar-lg rounded-circle mr-3">
                                                                            <img @if (!empty($user->avatar)) src="{{ $profile . '/' . $user->avatar }}" @else avatar="{{ $user->name }}" @endif class="avatar rounded-circle avatar-lg">
                                                                        </a>
                                                                        <div class="media-body ms-3">
                                                                            <h5 class="text-dark mb-2">{{ $user->name }}</h5>
                                                                            <div>
                                                                                <div class="input-group">
                                                                                    <input type="file" class="form-control" id="file-1" name="profile" aria-describedby="inputGroupFileAddon04" aria-label="Upload" data-multiple-caption="{count} files selected"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                    {{ Form::model($client, ['route' => ['client.update.company', $client->user_id], 'method' => 'post']) }}
                                        <form>
                                            <div class="row mt-3">
                                                <div class="col-sm-12 mb-3">
                                                    <div class="form-group">
                                                        {!! Form::label('clt_id', __('Client ID')) !!}
                                                        {!! Form::text('clt_id', \Auth::user()->clientIdFormat($client->client_id), [
                                                            'class' => 'form-control',
                                                            'readonly',
                                                        ]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('company_name', __('Company Name')) }}
                                                        {{ Form::text('company_name', $client->company_name, ['class' => 'form-control', 'placeholder' => 'Enter  Company Name']) }}
                                                        @error('company_name')
                                                            <span class="invalid-company_name" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('website', __('Website')) }}
                                                        {{ Form::text('website', $client->website, ['class' => 'form-control', 'placeholder' => 'Enter Website']) }}
                                                        @error('website')
                                                            <span class="invalid-website" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('tax_number', __('Tax Number')) }}
                                                        {{ Form::text('tax_number', $client->tax_number, ['class' => 'form-control', 'placeholder' => 'Enter Tax Number']) }}
                                                        @error('tax_number')
                                                            <span class="invalid-tax_number" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <div class="form-group">
                                                        {{ Form::label('notes', __('Notes')) }}
                                                        {{ Form::textarea('notes', $client->notes, ['class' => 'form-control', 'placeholder' => 'Enter Notes', 'rows' => '3']) }}
                                                        @error('notes')
                                                            <span class="invalid-notes" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
