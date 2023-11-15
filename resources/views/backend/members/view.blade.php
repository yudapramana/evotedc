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

                <form class="kt-form kt-form--label-right">
                    <fieldset disabled>
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
                                        <input class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" name="nim" type="text" value="{{ old('nim', $detail->nim) }}"  placeholder="NIM" required>
                                        @if($errors->has('nim'))
                                            <div id="student_number-error" class="error invalid-feedback">{{ $errors->first('nim') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ old('name',$detail->name) }}"  placeholder="Nama Lengkap" required>
                                        @if($errors->has('name'))
                                            <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" value="{{ old('email',$detail->email) }}"  placeholder="Email" required>
                                        @if($errors->has('email'))
                                            <div id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Voter Key</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('voter_key') ? 'is-invalid' : '' }}" name="voter_key" type="text" value="{{ old('voter_key', $detail->voter_key) }}"  placeholder="Voter Key" required>
                                        @if($errors->has('voter_key'))
                                            <div id="voter_key-error" class="error invalid-feedback">{{ $errors->first('voter_key') }}</div>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Back</a>&nbsp;
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
        const APISCITY = '{{ route('api.cities') }}';
        $(function() {
            $('#birthday').datepicker({
                format: 'dd/mm/yyyy',
            });

            $('#state_id').change(function () {
                const state_id = $(this).val();
                $('#city_id').empty();
                const option = '<option value=""> :: pilih kota / kabupaten</option>';
                $('#city_id').append(option);
                $.ajax({
                    type: "GET",
                    url: APISCITY,
                    data: { state_id: state_id },
                    cache: false,
                    error: function(err) {
                        swal.fire({
                            title: 'Error',
                            text: 'Maaf, terjadi kesalahan, silahkan coba lagi!',
                            type: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            confirmButtonClass: "btn btn-brand"
                        });
                    },
                    success: function(response){
                        const data = response.data;
                        if(response.error == false)
                        {
                            for(var i = 0; i < data.length; i ++) {
                                const option = '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                                $('#city_id').append(option);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
