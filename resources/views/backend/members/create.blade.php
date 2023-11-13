@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Formulir Data Pemilih</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.store') }}" >
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">Informasi Pemilih:</h3>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Student Number</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('student_number') ? 'is-invalid' : '' }}" name="student_number" type="text" value="{{ old('student_number') }}"  placeholder="Student Number" required>
                                        @if($errors->has('student_number'))
                                            <div id="student_number-error" class="error invalid-feedback">{{ $errors->first('student_number') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ old('name') }}"  placeholder="Nama Lengkap" required>
                                        @if($errors->has('name'))
                                            <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" value="{{ old('email') }}"  placeholder="Email" required>
                                        @if($errors->has('email'))
                                            <div id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Educational Level</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control {{ $errors->has('study_id') ? 'is-invalid' : '' }}" name="study_id" required>
                                            <option value=""> :: pilih educational level</option>
                                            @foreach($studies as $item)
                                                <option value="{{ $item->id }}" {{ old('study_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('study_id'))
                                            <div id="state_id-error" class="error invalid-feedback">{{ $errors->first('study_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Faculty</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty" type="text" value="{{ old('faculty') }}"  placeholder="Faculty" required>
                                        @if($errors->has('faculty'))
                                            <div id="faculty-error" class="error invalid-feedback">{{ $errors->first('faculty') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Voter Key</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('voter_key') ? 'is-invalid' : '' }}" name="voter_key" type="text" value="{{ old('voter_key') }}"  placeholder="Voter Key" required>
                                        @if($errors->has('voter_key'))
                                            <div id="voter_key-error" class="error invalid-feedback">{{ $errors->first('voter_key') }}</div>
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
    <script>
    </script>
@endsection
