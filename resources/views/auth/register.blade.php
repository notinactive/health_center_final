@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row" style="direction: rtl; text-align: justify;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-family: b koodak;">فرم ثبت نام کاربران</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-2 control-label"></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus maxlength="10">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="name" class="col-md-2 control-label" style="font-family: b nazanin;">کد ملی</label>
                            <label for="name" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-2 control-label" style="font-family: b nazanin;">آدرس ایمیل</label>
                            <label for="email" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="password" class="col-md-2 control-label" style="font-family: b nazanin;">رمز عبور</label>
                              <label for="password" class="col-md-2 control-label"></label>
                        </div>                 

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                            <label for="password-confirm" class="col-md-2 control-label" style="font-family: b nazanin;">تأیید رمز عبور</label>
                            <label for="password-confirm" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                            <label for="fname" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control" name="fname">

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="fname" class="col-md-2 control-label" style="font-family: b nazanin;">نام</label>
                              <label for="fname" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                            <label for="lname" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control" name="lname">

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="lname" class="col-md-2 control-label" style="font-family: b nazanin;">نام خانوادگی</label>
                              <label for="lname" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
                            <label for="unit" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <select id="unit" class="form-control" name="unit">
                                    
                                        <option value="2">واحد کیفی</option>
                                        <option value="3">واحد تعمیرات</option>
                                        <option value="4">واحد تجهیزات</option>
                                        <option value="5">واحد خرید</option>
                                    
                                </select>  

                                @if ($errors->has('unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="unit" class="col-md-2 control-label" style="font-family: b nazanin;">واحد فعالیت</label>
                              <label for="unit" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" maxlength="11">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="phone" class="col-md-2 control-label" style="font-family: b nazanin;">شماره تلفن</label>
                              <label for="phone" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" maxlength="11">

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="mobile" class="col-md-2 control-label" style="font-family: b nazanin;">شماره موبایل</label>
                              <label for="mobile" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" style="resize: none;"></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="address" class="col-md-2 control-label" style="font-family: b nazanin;">آدرس</label>
                              <label for="address" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label"></label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" style="resize: none;"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="description" class="col-md-2 control-label" style="font-family: b nazanin;">توضیحات</label>
                              <label for="description" class="col-md-2 control-label"></label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4" style="text-align: center;">
                                <button type="submit" class="btn btn-primary" style="font-family: b koodak;">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
