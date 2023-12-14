@extends('auth.layouts.auth')
@section('tittle','admin')
@section('content_register')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Register</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="post" action="{{ route('register.perform') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <span class="section">Personal Info</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" type="text" value="{{ old('name') }}" required="required" autofocus />
                                    @if ($errors->has('name'))
                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="email" required="required" type="email" value="{{ old('email') }}" autofocus/></div>
                                @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Address<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" class='email' name="address" required='required' value="{{ old('email') }}" autofocus/></div>
                                @if ($errors->has('address'))
                                    <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="tel" class='tel' name="phone_number" required='required' data-validate-length-range="8,20" value="{{ old('phone_number') }}" autofocus/></div>
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger text-left">{{ $errors->first('phone_number') }}</span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Job</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="job" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                            <input type="radio" name="job" value="owner" class="join-btn"> Owner
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                                            <input type="radio" name="job" value="karyawan" class="join-btn"> Karyawan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="text" name="username" value="{{ old('username') }}"  required="required" autofocus/></div>
                                    @if ($errors->has('username'))
                                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="password" id="password1" name="password"value="{{ old('password_confirmation') }}"  required="required"/>
                                    @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                    <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
													<i id="slash" class="fa fa-eye-slash"></i>
													<i id="eye" class="fa fa-eye"></i>
												</span>
                                </div>
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Confirm Password<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"  required="required" />
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
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
@endsection
