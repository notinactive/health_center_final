@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('assets/css/bootstrap-fileupload.min.css'); ?>" />
@endsection


@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1>افزودن واحد عملیاتی جدید</h1> 
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
	<div class="col-lg-12" >


	<form action="<?=Url('/unit'); ?>" id="myform" method="POST" class="form-horizontal">
	   <input type="hidden" name="_token" value="{{csrf_token()}}" />

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                مشخصات واحد عملیاتی را وارد نمایید.     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	    <label for="unitname" class="control-label col-lg-3">نام واحد</label>
								<div class="col-lg-7">
									<input type="text" name="unitname" id="unitname" class="form-control" placeholder="نام واحد را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="phone" class="control-label col-lg-3">تلفن واحد</label>
								<div class="col-lg-7">
									<input type="text" name="phone" id="phone" class="form-control" placeholder="شماره تلفن واحد را وارد نمائید" />
								</div>
							</div>

							<div class="form-group">
		                	    <label for="phone" class="control-label col-lg-3">نام استان</label>
								<div class="col-lg-7">
									<select id="province" name="province_id" class="form-control" data-action="<?=Url('/city'); ?>">
									    <option value="0" style="font-family: b nazanin;">لطفا یک استان انتخاب نمائید</option>
										@foreach($provinces as $province)
										<option value="{{ $province->id }}">{{ $province->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
		                	    <label for="phone" class="control-label col-lg-3">نام شهرستان</label>
								<div class="col-lg-7">
									<select id="city" name="city_id" class="form-control">

									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="description" class="control-label col-lg-3">توضیحات مربوطه</label>
								<div class="col-lg-7">
									<textarea name="description" class="ckeditor" id="description" placeholder="توضیحات مربوطه را وارد نمائید"></textarea>
								</div>
							</div>

		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
			<input type="submit" name="save_pro" id="save_pro" class="btn btn-primary btn-md" value="ثبت اطلاعات واحد" />
			<a href="<?=Url('product'); ?>" class="btn btn-warning btn-md">مشاهده لیست واحدهای عملیاتی</a>
		</div>

		</form>

	</div>
</div>

<script type="text/javascript">
	function getCities(th)
{
 
    selected_city = $('#city').attr('data-selected') || null;
 
 
    $('#city').html('').fadeIn(800).append('<option value="0">لطفا کمی صبر کنید ...</option>');
 
    $.ajax({
        type: "GET",
        data:{id:$(th).val()},
        url: $(th).data('action') ,
        dataType : 'json',
        success: function(data)
        {
        	
            $('#city').html('').fadeIn(800).append('<option value="0">انتخاب شهر</option>');
            $.each(data, function(i, city){
                if(selected_city == city.id) $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                else $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
            });
        },
        error : function(data)
        {
            console.log('province_city.js#getCities function error: #line : 30');
        }
    });
 
 
    return false; // avoid to execute the actual submit of the form.
}
 
/**
 * Load cities on state change
 */
$(document).on('change', '#province', function (e) {
    getCities(this);
});
</script>

@endsection


@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection