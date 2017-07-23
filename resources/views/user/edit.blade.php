@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3>ویرایش اطلاعات کاربری <span style="color: blue; font-size: 25px;"> "{{ $users->fname }} {{ $users->lname }}" </span> با نام کاربری (کد ملی)<span style="color: blue; font-size: 25px;">"{{ $users->name }}"</span></h3> 
	</div>
</div>
<hr/>
 
 @if($errors -> has('name'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('name') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('email'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('email') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('password'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('password') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('fname'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('fname') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('lname'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('lname') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('mobile'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('mobile') !!}                        
        </div>
    </div>
 @endif 

  @if($errors -> has('unit'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('unit') !!}                        
        </div>
    </div>
 @endif 

 @if($errors -> has('role'))
    <div class="panel-body">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! $errors->first('role') !!}                        
        </div>
    </div>
 @endif 

<div class="row">
	<div class="col-lg-12">

	<form action="<?=Url('user/'.$users->id); ?>" id="myform" method="post" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />
	   <input type="hidden" name="_method" value="PATCH" />

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات کاربر     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام</label>
								<div class="col-lg-7">
									<input type="text" name="fname" id="fname" value="{{ $users->fname }}" class="form-control" placeholder="نام را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام خانوادگی</label>
								<div class="col-lg-7">
									<input type="text" name="lname" id="lname" value="{{ $users->lname }}" class="form-control" placeholder="نام خانوادگی را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام کاربری (کد ملی)</label>
								<div class="col-lg-7">
									<input type="text" name="name" maxlength="10" value="{{ $users->name }}" id="name" class="form-control" placeholder="نام کاربری را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">رمز عبور</label>
								<div class="col-lg-7">
									<input type="password" name="password2" id="password2" class="form-control" placeholder="رمز عبور را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">آدرس ایمیل</label>
								<div class="col-lg-7">
									<input type="text" name="email" id="email" value="{{ $users->email }}" class="form-control" placeholder="آدرس ایمیل کاربر را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">شماره همراه</label>
								<div class="col-lg-7">
									<input type="text" name="mobile" maxlength="11" id="mobile" value="{{ $users->mobile }}" class="form-control" placeholder="شماره همراه کاربر را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">تلفن ثابت</label>
								<div class="col-lg-7">
									<input type="text" name="phone" id="phone" value="{{ $users->phone }}" maxlength="11" class="form-control" placeholder="تلفن ثابت کاربر را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">انتخاب نقش کاربر</label>
								<div class="col-lg-7">
									<select name="role" id="role" class="form-control">
										<option value="user">کاربر عادی</option>
										<option value="admin">مدیر سایت</option>
									</select>
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">انتخاب واحد مربوطه</label>
								<div class="col-lg-7">
									<select name="unit" id="unit" class="form-control">
									@foreach($units as $unit)
										<option value="{{ $unit-> id }}"> {{ $unit -> unitname }} </option>
									@endforeach	
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">آدرس پستی</label>
								<div class="col-lg-7">
									<textarea name="address" class="form-control" style="resize: none;" id="address" placeholder="آدرس پستی کاربر را وارد نمائید">{{ $users->address }}</textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات مربوطه</label>
								<div class="col-lg-7">
									<textarea name="description" style="resize: none;" class="form-control" id="description" placeholder="توضیحات مربوطه را وارد نمائید">{{ $users->description }}</textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" class="btn btn-primary btn-md" value=" ویرایش اطلاعات کاربر">
			<a href="<?=Url('user'); ?>" class="btn btn-warning btn-md">بازگشت به لیست کاربران</a>
		</div>
		
		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection