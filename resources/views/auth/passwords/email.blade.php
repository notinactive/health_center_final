@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div id="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="login" style="padding-left: 25%;">بازیابی رمز عبور</div>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="username-text">آدرس ایمیل</div>

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} password-field">

                        </div>
                        <br>

                        <input type="submit" name="submit" style="font-family: b koodak;" value="بازیابی" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
