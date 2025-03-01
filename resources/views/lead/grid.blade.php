@extends('layouts.admin')

@section('page-title')
    {{ __('Lead') }}
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Lead') }}</li>
                </ol>
            </nav>
        </div>

        <div class="font-20 ms-auto">
            <a href="{{ route('lead.index') }}" class="btn btn-md btn-primary btn-icon m-1" data-bs-toggle="tooltip"
                data-bs-original-title="{{ __('Kanban View') }}">
                <i class="ti ti-layout-kanban text-white"></i>
            </a>
            @if (\Auth::user()->type == 'company')
                <a href="javascript:;" data-size="md" data-title="{{ __('Create New Lead') }}" class="btn btn-primary"
                    data-url="{{ route('lead.create') }}" data-ajax-popup="true" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="bx bx-plus"></i>Add
                </a>
            @endif
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <!-- <h5></h5> -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Stage') }}</th>
                                <th>{{ __('Users') }}</th>
                                @if (\Auth::user()->type == 'company' || \Auth::user()->type == 'employee')
                                    <th class="text-right">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($leads) > 0)
                                @foreach ($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->name }}</td>
                                        <td>{{ $lead->subject }}</td>
                                        <td>{{ !empty($lead->stage) ? $lead->stage->name : '' }}</td>
                                        <td>
                                            <div class="user-group">
                                                @foreach ($lead->users as $user)
                                                    <img @if (!empty($user->avatar)) src="{{ asset('/storage/uploads/avatar/' . $user->avatar) }}" @else avatar="{{ $user->name }}" @endif
                                                        class="" data-bs-toggle="tooltip"
                                                        title="{{ $user->name }}">
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="text-right d-flex order-actions">
                                            @if (\Auth::user()->type == 'company' || \Auth::user()->type == 'employee')
                                                <a href="{{ route('lead.show', \Crypt::encrypt($lead->id)) }}" data-url="#" data-bs-whatever="{{ __('View Lead') }}" data-bs-toggle="tooltip" title="View Lead" data-bs-original-title="{{ __('View Lead') }}">
                                                    <span class="blue"> <i class="lni lni-eye"></i>
                                                    </span>
                                                </a>
                                            @endif
                                            @if (\Auth::user()->type == 'company')
                                                <a href="javascript:;" data-size="lg" data-title="Edit Lead" class="ms-2"
                                                    data-url="{{ route('lead.edit', $lead->id) }}" style="color:blue"
                                                    data-ajax-popup="true" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="bx bx-edit"></i>
                                                </a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['lead.destroy', $lead->id]]) !!}
                                                <a href="javascript:;" style="color:red"
                                                    class="show_confirm ms-2 btn btn-sm">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="font-style">
                                    <td colspan="6" class="text-center">{{ __('No data available in table') }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
