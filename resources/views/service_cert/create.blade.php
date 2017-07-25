@extends('layouts.adminLayouts')



@section('head')
<link rel="stylesheet" href="<?= Url('../../assets/css/bootstrap-fileupload.min.css'); ?>" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')

<?php
use App\Product;
?>
<div class="col-lg-12">
	<div class="row" >
		<h3> ثبت گواهی خدمت برای درخواست با شماره<span style="color: blue; font-size: 22px;"> "{{ $services->codesefaresh }}"  </span><a href="" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#show{{ $services->id }}">مشاهده جزئیات درخواست </a> </h3> 
	</div>
</div>
<hr/>

<div class="row">
	<div class="col-lg-12" >

	<form id="form" action="" method="POST" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                ثبت گواهی انجام خدمت    
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	
		                	   <label for="service_name" class="control-label col-lg-2">شرح</label>
		                	   <label for="service_name" class="control-label col-lg-2"></label>
		                	    <label for="service_date" class="control-label col-lg-2">تعداد</label>
		                	    <label for="service_name" class="control-label col-lg-1"></label>
		                	    <label for="service_date" class="control-label col-lg-2">مبلغ کل (ریال)</label>
		                	    <label for="service_date" class="control-label col-lg-2"></label>
		                	    <br />
		                	    <br />
		                	    
		                <div id='TextBoxesGroup'>    
		                	<div id="TextBoxDiv1">
								<div class="col-lg-5">
									 <input type="text" name="description" class="form-control" placeholder="شرح را وارد نمائید">
								</div>

								<div class="col-lg-2">
									 <input type="text" class="form-control" name="count" placeholder="تعداد مورد نظر">
								</div>

								<div class="col-lg-3">
									 <input type="text" class="form-control" name="price" placeholder="مبلغ را وارد نمائید">
								</div>
								<div class="col-lg-2">
								  <input type="submit" class="btn btn-success btn-sm" name="btn_buy" id="btn_buy" value="افزودن به گواهی" />
								</div>
							</div>
						</div>									
								<br />
								<br />
								
							</div>
							<hr>
					
					  <div id="salam">
			            <table class="table table-striped table-bordered table-hover">
			                <thead id="thead">
			                   
			                </thead>
			                <tbody id="tbody">
			                    
			                </tbody>
			            </table>
			        </div>

						<div class="row">
		    <div class="col-lg-12">
		        
		        <div class="modal fade" id="show{{ $services->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		            <div class="modal-dialog">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                        <h4 class="modal-title" id="H2"> جزئیات درخواست {{ $services->codesefaresh }} </h4>
		                    </div>
		                    <div class="modal-body">                    
		                       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                            <tr>
		                                <th style="text-align: center;">سرویس انتخابی </th>
		                                <th style="text-align: center;">مقدار برآورد شده</th>
		                                <th style="text-align: center;">توضیحات مربوطه</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        @foreach( $details as $detail )
		                        <tr style="text-align: center;">
		                        	<td>{{ getservname($detail->services_id) }}</td>
		                        	<td>{{ $detail->count }}</td>
		                        	@if($detail->description == '')
		                        	<td><span style="font-family: b nazanin; color: red;">توضیحی ثبت نشده است</span></td>
		                        	@else
		                        	<td>{{ $detail->description }}</td>
		                        	@endif
		                        </tr>
		                        @endforeach
		                        </tbody>
		                    </table>
		                    </div>
		                    <div class="modal-footer">
		                        
		                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>                       

		                    </div>
		                </div>
		            </div>
		        </div>
		        
		    </div>
</div>					 					
                   
		                </div>
		            </div>
		        </div>

		    </div>
		</div>
	
		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
		   <input type="submit" value="ثبت نهایی گواهی" class="btn btn-primary btn-sm" />
		   <a href="{{ route('srequest.index') }}" class="btn btn-danger btn-sm" >انصراف و بازگشت</a>
		</div>

		</form>
	</div>
</div>

<?php $url10=Url('/add'); ?>
<script>
          $(document).ready(function (event) { 
			 $("#form").on('submit',(function(event) {
  			event.preventDefault();
  			$("#salam").hide();
  			if($('#name').val()=="")
  			{
  				$('#name').css("background-color","red");
				return false;
			}
			
			if($('#count').val()=="")
  			{
  				$('#name').css("background-color","#ffffff");
  				$('#count').css("background-color","red");
				return false;
			}			
						
			else
		{
			$('#name').css("background-color","#ffffff");
			$('#count').css("background-color","#ffffff");

			var myForm = document.getElementById('form');
			
				$.ajaxSetup({
					headers:{
						'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
					}
				});

			  	 $.ajax ({
				  type:"POST",
				  url:'<?= $url10 ?>',
				  data:  new FormData(myForm),
                  contentType: false,
                  cache: false,
                  processData:false,
				    success: function(resp){
                    
                     $("#salam").show();
                     console.log(resp);
                     $("#thead").html('<tr><th style="text-align: center;">نام کالا </th><th style="text-align: center;">مقدار برآورد شده</th><th style="text-align: center;"> عملیات موردنظر </th></tr>');
                     var html= '';
                     
                     $.each(resp,function(key){

                        html='<table class="table table-striped table-bordered table-hover"><tr>'+'<td style="text-align: center;">'+resp[key].name+'</td>';
                         html+='<td style="text-align: center;">'+resp[key].count+'</td>';
                         html+='<td style="text-align: center;"><a class="btn btn-warning btn-md">حذف</a></td>';
                         html+='</tr></table>';                        
                     })
                     $("#thead").show();                   
                    $("#tbody").html(html);
					}	
				  });			
			   
			   return true;
			   }

          })); 		 
          }); 		 
		  
          </script>

@endsection

<?php

use App\Service;

function getservname( $id )
{
    $service = Service::where('id', $id)->first()['name'];
    return $service;
}
?>

@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection