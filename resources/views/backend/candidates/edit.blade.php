@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Formulir Data Kandidat</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.update', $detail->id) }}" >
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 ">
                                        <h3 class="kt-section__title kt-section__title-sm">Informasi Kandidat:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3 col-lg-3"></div>
                                    <div class="col-lg-9 ">
                                        <div class="form-group">
                                            <div class="kt-avatar kt-avatar--outline embed-responsive" id="kt_user_avatar_1" style="width: 138px; height: 138px;">
                                                <img class="embed-responsive-item" src="{{ old('image', $detail->image) }}" id="holder" style="width: 138px; height: 138px;object-fit: cover;">
                                                <label class="kt-avatar__upload" id="lfm" data-input="thumbnail" data-preview="holder">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="hidden" name="image" value="{{ old('image', $detail->image) }}" id="thumbnail">
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Batal">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('image'))
                                                <small class="text-danger">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Nama Lengkap</label>
                                    <div class="col-lg-9 ">
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ old('name', $detail->name) }}"  placeholder="Nama Lengkap" required>
                                        @if($errors->has('name'))
                                            <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Nomor Urut</label>
                                    <div class="col-lg-9 ">
                                        <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number" type="number" value="{{ old('number', $detail->number) }}"  placeholder="Nomor Urut" required>
                                        @if($errors->has('number'))
                                            <div id="number-error" class="error invalid-feedback">{{ $errors->first('number') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Jenjang Pendidikan</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control {{ $errors->has('study') ? 'is-invalid' : '' }}" name="study" type="text" value="{{ old('study', $detail->study) }}"  placeholder="Pendidikan" required>
                                        @if($errors->has('study'))
                                            <div id="study-error" class="error invalid-feedback">{{ $errors->first('study') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Fakultas</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}" name="faculty" type="text" value="{{ old('faculty', $detail->faculty) }}"  placeholder="Fakultas" required>
                                        @if($errors->has('faculty'))
                                            <div id="faculty-error" class="error invalid-feedback">{{ $errors->first('faculty') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Jurusan</label>
                                    <div class="col-lg-9 col-xl-9">
                                        <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" name="department" type="text" value="{{ old('department', $detail->department) }}"  placeholder="Jurusan" required>
                                        @if($errors->has('department'))
                                            <div id="department-error" class="error invalid-feedback">{{ $errors->first('department') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Visi</label>
                                    <div class="col-lg-9 ">
                                        <textarea class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}" name="vision" rows="8" placeholder="Visi" required>{{ old('vision', $detail->vision) }}</textarea>
                                        @if($errors->has('vision'))
                                            <div id="vision-error" class="error invalid-feedback">{{ $errors->first('vision') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Misi</label>
                                    <div class="col-lg-9 " id="list_mission">
                                        @foreach(old('mission', $detail->missions) as $item)
                                            <div class="row mt-3" id="mission_item">
                                                <div class="col-10">
                                                    <textarea class="form-control {{ $errors->has('mission') ? 'is-invalid' : '' }}" name="mission[]" rows="3" placeholder="Misi" required>{{ $item->mission }}</textarea>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" class="btn btn-sm btn-icon btn-icon-md btn-label-danger" onclick="removeSelf(this)">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if(old('mission', $detail->missions) == null || count(old('mission', $detail->missions)) == 0)
                                            <div class="row" id="mission_item">
                                                <div class="col-10">
                                                    <textarea class="form-control {{ $errors->has('mission') ? 'is-invalid' : '' }}" name="mission[]" rows="3" placeholder="Misi" required>{{ old('mission') }}</textarea>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" class="btn btn-sm btn-icon btn-icon-md btn-label-danger" onclick="removeSelf(this)">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @if($errors->has('mission'))
                                                <small class="text-danger">{{ $errors->first('mission') }}</small>
                                            @endif
                                        @endif
                                        @if($errors->has('mission'))
                                            <small class="text-danger">{{ $errors->first('mission') }}</small>
                                        @endif
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="button" id="add_mission" class="pull-right btn btn-sm btn-success">
                                            <i class="flaticon2-plus-1"></i> Tambah Isian Misi
                                        </button>
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
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        function removeSelf(el) {
            $(el).parent().parent().remove();
        }

        $(function() {
            $('#lfm').filemanager('image');
            $('#btn-pdf').filemanager('file');
            $('#thumbnail').change(function () {
                $('#holder').attr('src', $(this).val());
            });
            $('#input-pdf').change(function () {
                $('#viewer-pdf').attr('src', $(this).val());
                $('#viewer-pdf').show('slow');
            });
            $('#add_mission').click(function () {
                let new_mission = $('#mission_item').clone();
                new_mission.addClass('mt-3');
                new_mission.find('textarea').val('');
                new_mission.hide();
                new_mission.appendTo('#list_mission').slideDown('slow');
            });
        });
    </script>
@endsection
