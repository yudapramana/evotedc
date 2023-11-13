@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Role's Detail</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Role's Information:</h3>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" value="{{ old('name') }}"  placeholder="Name" required>
                                                @if($errors->has('name'))
                                                    <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="kt-section">
                                    <h3 class="kt-section__title">
                                        Hak Akses Role
                                    </h3>
                                    <div class="kt-section__content">
                                        @foreach($menus as $item)
                                            @if($item->menu_type == 'divider')
                                                <div class="form-group">
                                                    <strong>{{ $item->name }}</strong>
                                                    @foreach($item->children as $subItem)
                                                        <br><label class="mt-3">{{ $subItem->name }}</label>
                                                        <div class="kt-checkbox-inline">
                                                            @foreach($subItem->permissions as $permission)
                                                                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                                                    <input type="checkbox" name="permission[]" value="{{ $permission->name }}"> {{ $permission->permission_label }}
                                                                    <span></span>
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif($item->menu_type == 'menu')
                                                <div class="form-group">
                                                    <strong>{{ $item->name }}</strong>
                                                    <div class="kt-checkbox-inline">
                                                        @foreach($item->permissions as $permission)
                                                            <label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
                                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}"> {{ $permission->permission_label }}
                                                                <span></span>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
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
