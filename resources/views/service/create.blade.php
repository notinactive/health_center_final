@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1>افزودن خدمت جدید</h1> 
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

<div class="row">
	<div class="col-lg-12" >


	<form action="<?=Url('/service'); ?>" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات خدمت را وارد نمایید.     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام خدمت</label>
								<div class="col-lg-7">
									<input type="text" name="name" id="name" class="form-control" placeholder="نام خدمت را وارد نمائید" value="{{ old('name') }}"/>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات خدمت</label>
								<div class="col-lg-7">
									<textarea name="description" class="ckeditor" id="description" placeholder="توضیحات خدمت را وارد نمائید">{{ old('description') }}</textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" name="save_pro" id="save_pro" class="btn btn-primary btn-md" value="ثبت اطلاعات خدمت" />
			<a href="<?=Url('service'); ?>" class="btn btn-warning btn-sm">مشاهده لیست خدمات</a>
		</div>

		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection