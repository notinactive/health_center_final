@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1>افزودن کاربر جدید</h1> 
	</div>
</div>
<hr/>

@if(count($errors))
 <div class="alert alert-danger">
   <ul>
 @foreach($errors->all() as $error)
   <li>{{ $error }}</li>
 @endforeach
   </ul>
 </div>
@endif

<div class="row">
	<div class="col-lg-12" >


	<form action="<?=Url('/user'); ?>" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات کاربر را وارد نمایید.     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام</label>
								<div class="col-lg-7">
									<input type="text" name="fname" id="fname" class="form-control" placeholder="نام را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام خانوادگی</label>
								<div class="col-lg-7">
									<input type="text" name="lname" id="lname" class="form-control" placeholder="نام خانوادگی را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام کاربری (کد ملی)</label>
								<div class="col-lg-7">
									<input type="text" name="name" maxlength="10" id="name" class="form-control" placeholder="نام کاربری را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">رمز عبور</label>
								<div class="col-lg-7">
									<input type="password" name="password" id="password" class="form-control" placeholder="رمز عبور را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">آدرس ایمیل</label>
								<div class="col-lg-7">
									<input type="text" name="email" id="email" class="form-control" placeholder="آدرس ایمیل کاربر را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">شماره همراه</label>
								<div class="col-lg-7">
									<input type="text" name="mobile" maxlength="11" id="mobile" class="form-control" placeholder="شماره همراه کاربر را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">تلفن ثابت</label>
								<div class="col-lg-7">
									<input type="text" name="phone" id="phone" maxlength="11" class="form-control" placeholder="تلفن ثابت کاربر را وارد نمائید" />
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
									<textarea name="address" class="form-control" style="resize: none;" id="address" placeholder="آدرس پستی کاربر را وارد نمائید"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات مربوطه</label>
								<div class="col-lg-7">
									<textarea name="description" style="resize: none;" class="form-control" id="description" placeholder="توضیحات مربوطه را وارد نمائید"></textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" name="save_pro" id="save_pro" class="btn btn-primary btn-md" value="ثبت اطلاعات کاربر" />
			<a href="<?=Url('user'); ?>" class="btn btn-warning btn-md">مشاهده لیست کاربران</a>
		</div>

		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection