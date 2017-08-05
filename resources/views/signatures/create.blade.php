@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3>افزودن اسکن امضاء جدید</h3> 
	</div>
</div>
<hr/>

 @if(count($errors) > 0)
   <div class="alert alert-danger">              
     <ul>
       @foreach($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
   </div>
 @endif
<div class="row">
	<div class="col-lg-12" >


	<form action="{{ route('signature.store') }}" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات اسکن را وارد نمایید.     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="user_id" class="control-label col-lg-3">نام صاحب امضاء</label>
								<div class="col-lg-7">
								  <select name="user_id" id="type" class="form-control">
					              	<option value="0">--------</option>
					              	@foreach( $users as $user )
					                <option value="{{ $user->id }}">{{ $user->fname }} {{ $user->lname }}</option>	        
					                @endforeach
					              </select>
								</div>
							</div>

							 <div class="form-group">
					            <label for="unit_id" class="control-label col-lg-3">واحد مربوطه</label>
					             <div class="col-lg-7">
					              <select name="unit_id" id="type" class="form-control">
					              	<option value="0">--------</option>
					              	@foreach( $units as $unit )
					                <option value="{{ $unit->id }}">{{ $unit->unitname }}</option>	        
					                @endforeach
					              </select>
					             </div> 
					         </div>

					         <div class="form-group">
					           <label for="image" class="control-label col-lg-3">آپلود اسکن امضاء</label>
                                <div class="col-lg-7">
					              <input type="file" name="image" id="image" style="margin-bottom: 10px;" class="form-control" placeholder="اسکن امضاء را وارد نمائید" value="{{ old('image') }}">     
					            </div>
					         </div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" name="save_pro" id="save_pro" class="btn btn-primary btn-md" value="ثبت اسکن امضاء" />
			<a href="<?=Url('signature'); ?>" class="btn btn-warning btn-sm">مشاهده لیست اسکن ها</a>
		</div>

		</form>

	</div>
</div>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection