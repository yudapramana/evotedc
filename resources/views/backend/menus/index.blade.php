@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">List Menus</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <form method="POST" action="{{ route($route_index . '.delete') }}" id="form">
                                @csrf
                                <table class="table table-striped table-responsive-lg" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid mb-0"><input type="checkbox" id="check_all">&nbsp;<span></span></label>
                                        </th>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $key => $item)
                                        <tr>
                                            <th scope="row" class="align-middle" width="5%">
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid mb-0"><input type="checkbox" name="id[]" onclick="check_checked()" value="{{ $item->id }}">&nbsp;<span></span></label>
                                            </th>
                                            <td width="5%">{{ 1 + $key }}</td>
                                            <td width="30%">{{ $item->name }}</td>
                                            <td width="25%">{{ $item->icon }}</td>
                                            <td class="align-middle text-center" width="25%">
                                            <span style="overflow: visible; position: relative; width: 110px;">
                                                <a href="{{ route($route_index . '.view', $item->id) }}" title="Edit details" class="btn btn-sm btn-icon btn-icon-md btn-label-info">
                                                    <i class="la la-eye"></i>
                                                </a>
                                                @can('edit-' . $route_index)
                                                    <a href="{{ route($route_index . '.edit', $item->id) }}" title="Edit details" class="btn btn-sm btn-icon btn-icon-md btn-label-warning">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @endcan
                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalAction')
    @can('create-' . $route_index)
        <a href="{{ route($route_index . '.create') }}" class="btn btn-label-brand btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Create New" data-placement="bottom">
            <i class="la la-plus"></i>
            New Menu
        </a>
    @endcan
    @can('delete-' . $route_index)
        <button type="button" id="delete_button" class="btn btn-label-danger btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Remove" data-placement="bottom" style="display: none;">
            <i class="la la-trash"></i> Remove
        </button>
    @endcan
@endsection

@section('extraCss')
    <link href="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('extraJs')
    <script src="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
        $('#delete_button').click(function () {
            remove('form');
        });
        $('#datatable').dataTable();
    </script>
@endsection
