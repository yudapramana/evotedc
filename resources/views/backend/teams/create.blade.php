@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Formulir Data TIM KPU</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.store') }}" >
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Nama Lengkap</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ old('name') }}"  placeholder="Nama Lengkap" required>
                                        @if($errors->has('name'))
                                            <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Jabatan</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" name="position" type="text" value="{{ old('position') }}"  placeholder="Jabatan" required>
                                        @if($errors->has('position'))
                                            <div id="position-error" class="error invalid-feedback">{{ $errors->first('position') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Jurusan</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department" type="text" value="{{ old('department') }}"  placeholder="Jurusan" required>
                                        @if($errors->has('department'))
                                            <div id="department-error" class="error invalid-feedback">{{ $errors->first('department') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Back</a>&nbsp;
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extraJs')
@endsection
