@extends('auth.layouts.login')
@section('tittle','login')
@section('content_login')
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="{{ route('login.perform') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus />
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div>
                            <input type="password" class="form-control"  name="password" value="{{ old('password') }}" placeholder="Password" required="required"/>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" >Log in</button>
                        </div>

                        <div class="clearfix"></div>

                    </form>
                </section>
            </div>

        </div>
    </div>
@endsection
