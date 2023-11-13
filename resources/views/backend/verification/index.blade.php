@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

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
                            Daftar Anggota Terverifikasi
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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
{{--                                    <th>No Induk LPDP</th>--}}
                                    <th>Name</th>
{{--                                    <th>Email</th>--}}
                                    <th>Status</th>
                                    <th>Jenjang Studi</th>
                                    <th>Provinsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($list) == 0)
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data!</td>
                                    </tr>
                                @endif
                                @foreach($list as $key => $item)
                                    <tr>
                                        <td width="5%">{{ $key + $list->firstItem() }}</td>
{{--                                        <td>{{ $item->no_induk_lpdp }}</td>--}}
                                        <td>{{ $item->name }}</td>
{{--                                        <td>{{ $item->email }}</td>--}}
                                        <td>{{ ucfirst($item->academic_status) }}</td>
                                        <td>{{ $item->study->name }}</td>
                                        <td>{{ $item->state->name }}</td>
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
                                        {{ $list->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('backend.members.includes.modal')
@endsection


@section('extraJs')
    <script>
        $(document).ready(function() {
            $('#per_page').change(function() {
                $('#form-search').submit();
            });
        });
    </script>
@endsection
