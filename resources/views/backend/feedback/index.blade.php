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
                            Daftar Kritik dan Saran
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Identitas</th>
                                    <th>Pesan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key => $item)
                                    <tr>
                                        <td width="5%">{{ 1 + $key }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}<br> {{ $item->phone  }}</td>
                                        <td>{{ $item->message  }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('extraCss')
    <link href="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('extraJs')
    <script src="{{ asset('__backend/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>
        $('#datatable').dataTable();
    </script>
@endsection
