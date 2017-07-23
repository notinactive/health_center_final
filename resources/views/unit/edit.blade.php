@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3>ویرایش اطلاعات <span style="color: blue; font-size: 22px;">"{{ $units->unitname }}"</span></h3> 
	</div>
</div>
<hr/>

 @if($errors -> has('unitname'))
                <div class="panel-body">
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! $errors->first('unitname') !!}                        
                    </div>
                </div>
                @endif 
<div class="row">
	<div class="col-lg-12">


	<form action="<?=Url('unit/'.$units->id); ?>" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />
	   <input type="hidden" name="_method" value="PATCH" />
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات واحد عملیاتی     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="name" class="control-label col-lg-3">نام واحد عملیاتی</label>
								<div class="col-lg-7">
									<input type="text" name="unitname" id="unitname" value="{{ $units->unitname }}" class="form-control"/>
								</div>
							</div>

							<div class="form-group">
		                	    <label for="phone" class="control-label col-lg-3">تلفن واحد</label>
								<div class="col-lg-7">
									<input type="text" name="phone" id="phone" maxlength="11" value="{{ $units->phone }}" class="form-control"/>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات واحد</label>
								<div class="col-lg-7">
									<textarea name="description" class="ckeditor" id="description">{!! $units->description !!}</textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" class="btn btn-primary btn-md" value=" ویرایش اطلاعات واحد">
			<a href="<?=Url('unit'); ?>" class="btn btn-warning btn-md">بازگشت به لیست واحدها</a>
		</div>
		
		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection