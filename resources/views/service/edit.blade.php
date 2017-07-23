@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3>ویرایش اطلاعات <span style="color: blue; font-size: 22px;">"{{ $services->name }}"</span></h3> 
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
	<div class="col-lg-12">

	<form action="<?=Url('service/'.$services->id); ?>" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />
	   <input type="hidden" name="_method" value="PATCH" />
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات خدمت     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام خدمت</label>
								<div class="col-lg-7">
									<input type="text" name="name" id="name" value="{{ $services->name }}" class="form-control"/>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات خدمت</label>
								<div class="col-lg-7">
									<textarea name="description" class="ckeditor" id="description">{!! $services->name !!}</textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" class="btn btn-primary btn-md" value="ویرایش اطلاعات خدمت">
			<a href="<?=Url('service'); ?>" class="btn btn-warning btn-md">بازگشت به لیست خدمات</a>
		</div>
		
		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection