@extends('backend.layouts.app')

@section('title'){{ config('app.name', 'EXPLORIN') . ' | ' . strtoupper($route_index) }}@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">User's Detail</h3>
                    </div>
                </div>

                <form class="kt-form kt-form--label-right" method="POST" action="{{ route($route_index . '.update', $detail->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">User's Information:</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-3 col-lg-3"></div>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="form-group">
                                            <div class="kt-avatar kt-avatar--outline embed-responsive" id="kt_user_avatar_1" style="width: 138px; height: 138px;">
                                                <img src="{{ $detail->image ? asset($detail->image) : '' }}" class="embed-responsive-item" id="image" style="width: 138px; height: 138px;object-fit: cover;">
                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload Foto">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" id="uploadbtn">
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
                                    <label class="col-xl-3 col-lg-3 col-form-label">* First Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" name="first_name" type="text" value="{{ old('first_name', $detail->first_name) }}"  placeholder="First Name" required>
                                        @if($errors->has('first_name'))
                                            <div id="first_name-error" class="error invalid-feedback">{{ $errors->first('first_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Last Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" name="last_name" type="text" value="{{ old('last_name', $detail->last_name) }}"  placeholder="Last Name" required>
                                        @if($errors->has('last_name'))
                                            <div id="last_name-error" class="error invalid-feedback">{{ $errors->first('last_name') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Role</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}" name="role_id" required>
                                            <option value=""> :: select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role_id', count($detail->roles) > 0 ? $detail->roles->first()->id == $role->id : '') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('role_id'))
                                            <div id="role_id-error" class="error invalid-feedback">{{ $errors->first('role_id') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Username</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" type="text" value="{{ old('username', $detail->username) }}"  placeholder="User Name" required>
                                        @if($errors->has('username'))
                                            <div id="username-error" class="error invalid-feedback">{{ $errors->first('username') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="email" value="{{ old('email', $detail->email) }}"  placeholder="Email" required>
                                        @if($errors->has('email'))
                                            <div id="email-error" class="error invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" type="password" value="{{ old('password') }}"  placeholder="Password">
                                        @if($errors->has('password'))
                                            <div id="password-error" class="error invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Retype Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" name="confirm_password" type="password" value="{{ old('confirm_password') }}"  placeholder="Retype Password">
                                        @if($errors->has('confirm_password'))
                                            <div id="confirm_password-error" class="error invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" type="number" value="{{ old('phone', $detail->phone) }}"  placeholder="Phone">
                                        @if($errors->has('phone'))
                                            <div id="phone-error" class="error invalid-feedback">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">* Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" rows="3" placeholder="Address">{{ old('address', $detail->address) }}</textarea>
                                        @if($errors->has('address'))
                                            <div id="address-error" class="error invalid-feedback">{{ $errors->first('address') }}</div>
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
        $('#uploadbtn').change(function () {
            setThumbnail(this, 'image');
        });
    </script>
@endsection
