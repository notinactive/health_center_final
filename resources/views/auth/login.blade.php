@extends('layouts.app')

@section('content')
<div id="container">
    <div class="row">
        <div class="col-md-12 ">
            <div>
                <div>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="login" style="padding-left: 25%;">ورود به پنل</div>
                        <div class="username-text">نام کاربری</div>
                        <div class="password-text">رمز عبور</div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  username-field">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password-field">

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}><label for="remember-me">مرا به خاطر بسپار</label>
                                    
                        <div class="forgot-usr-pwd"><a class="forgot-usr-pwd" href="{{ url('/password/reset') }}">رمز عبور خود را فراموش کرده ام</a> </div>

                        <input type="submit" name="submit" style="font-family: b koodak;" value="ورود" />
                               
                    </form>
                </div>
            </div>
        </div>
</div>
</div>
@endsection
