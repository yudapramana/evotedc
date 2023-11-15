@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Menu's Detail</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.update', $detail->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Menu's Information:</h3>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xs-3 col-lg-3 col-form-label">* Name</label>
                                            <div class="col-lg-9 col-xs-6">
                                                <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-success mb-0" role="tablist">
                                                    @foreach($languages as $key => $language)
                                                        <li class="nav-item">
                                                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#lang_{{ $language->locale }}" role="tab">{{ $language->language }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach($languages as $key => $language)
                                                        <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="lang_{{ $language->locale }}" role="tabpanel">
                                                            <small class="text-muted">{{ $language->language }} {{ __('content') }}</small>
                                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name[{{ $language->locale }}]" type="text" value="{{$detail->getByKeyAttribute('name', $language->locale)}}"  placeholder="Name">
                                                            @if($errors->has('name'))
                                                                <div id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                                                            @endif
                                                            <div class="kt-separator kt-separator--dashed m-0 mt-2"></div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Type</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control {{ $errors->has('menu_type') ? 'is-invalid' : '' }}" name="menu_type" required>
                                                    <option value="" {{ old('menu_type', $detail->menu_type) == '' ? 'selected' :'' }}> :: select type</option>
                                                    <option value="menu" {{ old('menu_type', $detail->menu_type) == 'menu' ? 'selected' :'' }}>Menu</option>
                                                    <option value="divider" {{ old('menu_type', $detail->menu_type) == 'divider' ? 'selected' :'' }}>Divider</option>
                                                </select>
                                                @if($errors->has('menu_type'))
                                                    <div id="menu_type-error" class="error invalid-feedback">{{ $errors->first('menu_type') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Parent</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" name="parent_id">
                                                    <option value="0"> :: no parent</option>
                                                    @foreach($menus as $menu)
                                                        <option value="{{ $menu->id }}" {{ old('parent_id', $detail->parent_id) == $menu->id ? 'selected' :'' }}>{{ $menu->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('parent_id'))
                                                    <div id="parent_id-error" class="error invalid-feedback">{{ $errors->first('parent_id') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Slug</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug" type="text" value="{{ old('slug', $detail->slug) }}"  placeholder="Slug">
                                                @if($errors->has('slug'))
                                                    <div id="slug-error" class="error invalid-feedback">{{ $errors->first('slug') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">* Route Name</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{ $errors->has('route_name') ? 'is-invalid' : '' }}" name="route_name" type="text" value="{{ old('route_name', $detail->route_name) }}"  placeholder="Route Name">
                                                @if($errors->has('route_name'))
                                                    <div id="route_name-error" class="error invalid-feedback">{{ $errors->first('route_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Icon</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" name="icon" type="text" value="{{ old('icon', $detail->icon) }}"  placeholder="Icon">
                                                @if($errors->has('icon'))
                                                    <div id="icon-error" class="error invalid-feedback">{{ $errors->first('icon') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Status</label>
                                            <div class="col-lg-9 col-xl-9">
                                            <span class="kt-switch kt-switch--sm kt-switch--icon">
                                                <label>
                                                    <input type="checkbox" name="status" class="update-status" value="1" {{ old('status', $detail->status) == 1 ? 'checked': ''}}><span></span>
                                                </label>
                                            </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="kt-section__title kt-section__title-sm">Permission:</h3>
                                            </div>
                                        </div>

                                        <div id="permission_repeater">
                                            <div id="list_reapeater">
                                                @foreach($detail->permissions as $key => $permission)
                                                    <div class="form-group row">
                                                        <div class="col-10">
                                                            <input class="form-control {{ $errors->has('permission_name') ? 'is-invalid' : '' }}" name="permission_name[]" type="text" value="{{ old('permission_name', $permission->permission_label) }}"  placeholder="Name" required>
                                                            @if($errors->has('permission_name'))
                                                                <div id="permission_name-error" class="error invalid-feedback">{{ $errors->first('permission_name') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="col-2">
                                                            @if($key > 0)
                                                                <button type="button" onclick="removeElement(this)" class="btn btn-danger btn-sm btn-icon pull-right"><i class="fa fa-trash"></i></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <button type="button" id="button_repeater" class="btn btn-primary btn-sm btn-icon pull-right"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
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


    <div class="form-group row" id="item_repeater"style="display: none;">
        <div class="col-10">
            <input class="form-control {{ $errors->has('permission_name') ? 'is-invalid' : '' }}" name="permission_name[]" type="text" value="{{ old('permission_name') }}"  placeholder="Name" required>
            @if($errors->has('permission_name'))
                <div id="permission_name-error" class="error invalid-feedback">{{ $errors->first('permission_name') }}</div>
            @endif
        </div>
        <div class="col-2">
            <button type="button" onclick="removeElement(this)" class="btn btn-danger btn-sm btn-icon pull-right"><i class="fa fa-trash"></i></button>
        </div>
    </div>
@endsection

@section('extraJs')
    <script>
        function removeElement(el) {
            $(el).parent().parent().remove();
        }
        $(function() {
            $( document ).ready(function() {
                $('#button_repeater').click(function () {
                    $('#item_repeater').clone().appendTo('#list_reapeater').slideDown('slow');
                });
            });
        });
    </script>
@endsection
