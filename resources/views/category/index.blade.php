@extends('layouts.admin')

@section('page-title')
    {{ __('Category') }}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{ __('Category') }}</h5>
    </div>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Category') }}</li>
                </ol>
            </nav>
        </div>
        @if (\Auth::user()->type == 'company')
            <div class="font-20 ms-auto">
                <a href="javascript:;" data-size="md" data-title="{{ __('Create New category') }}" class="btn btn-primary"
                    data-url="{{ route('category.create') }}" data-ajax-popup="true" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="bx bx-plus"></i>Add
                </a>
            </div>
        @endif
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Type') }}</th>
                                @if (\Auth::user()->type == 'company')
                                    <th scope="col" class="text-right">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="font-style">{{ $category->name }}</td>
                                    <td class="font-style">
                                        {{ __(\App\Models\Category::$categoryType[$category->type]) }}
                                    </td>
                                    @if (\Auth::user()->type == 'company')
                                        <td class="d-flex order-actions">
                                            <a href="javascript:;" data-size="md" data-title="Edit category" class="ms-2"
                                                data-url="{{ route('category.edit', $category->id) }}" style="color:blue"
                                                data-ajax-popup="true" data-toggle="modal" data-target="#exampleModal">
                                                <i class="bx bx-edit"></i>
                                            </a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id]]) !!}
                                            <a href="javascript:;" style="color:red"
                                                class="show_confirm ms-2 btn btn-sm">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            {!! Form::close() !!}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
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
