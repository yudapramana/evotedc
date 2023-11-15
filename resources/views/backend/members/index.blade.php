@extends('backend.layouts.app')

@section('title')
    {{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Daftar Pemilih
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <form class="row mb-4" id="form-search">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <select class="form-control" name="per_page" id="per_page">
                                                <option value="10" {{ $list->perPage() == 10 ? 'selected' : '' }}>10</option>
                                                <option value="25" {{ $list->perPage() == 25 ? 'selected' : '' }}>25</option>
                                                <option value="50" {{ $list->perPage() == 50 ? 'selected' : '' }}>50</option>
                                                <option value="100" {{ $list->perPage() == 100 ? 'selected' : '' }}>100</option>
                                            </select>
                                        </div>
                                        <label class="col-4 col-form-label"> entri / halaman</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" value="{{ $keyword }}" placeholder="Temukan di sini...">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="{{ route($route_index . '.delete') }}" id="form">
                                @csrf
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid m-0"><input type="checkbox" id="check_all">&nbsp;<span></span></label>
                                            </th>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $key => $item)
                                            <tr>
                                                <th scope="row" width="5%">
                                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid"><input type="checkbox" name="id[]" onclick="check_checked()" value="{{ $item->id }}">&nbsp;<span></span></label>
                                                </th>
                                                <td width="5%">{{ $key + $list->firstItem() }}</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td width="10%">
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
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        Menampilkan {{ $list->firstItem() }} sampai {{ $list->lastItem() }} dari {{ $list->total() }} entri
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                            {{-- {{ $list->links() }} --}}
                                            {{ $list->links('vendor.pagination.bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('backend.members.includes.modal')
@endsection

@section('additionalAction')
    @can('create-' . $route_index)
        <a href="{{ route($route_index . '.create') }}" class="btn btn-label-brand btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Tambah" data-placement="bottom">
            <i class="la la-plus"></i>
            Tambah Pemilih
        </a>

        <button class="btn btn-label-success btn-bold btn-sm btn-icon-h kt-margin-l-10" data-placement="bottom" data-toggle="modal" data-target="#exampleModal">
            <i class="la la-file-excel-o"></i>
            Import Excel
        </button>
    @endcan
    @can('delete-' . $route_index)
        <button type="button" id="delete_button" class="btn btn-label-danger btn-bold btn-sm btn-icon-h kt-margin-l-10" data-toggle="kt-tooltip" title="Hapus" data-placement="bottom" style="display: none;">
            <i class="la la-trash"></i> Hapus
        </button>
    @endcan
@endsection


@section('extraCss')
    <link href="{{ asset('css/ekko-lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('extraJs')
    <script src="{{ asset('js/ekko-lightbox.js') }}"></script>
    <script src="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#delete_button').click(function() {
                remove('form');
            });
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
            $('#per_page').change(function() {
                $('#form-search').submit();
            });
        });
    </script>
@endsection
