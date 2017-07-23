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
		<h1> افزودن درخواست کالای جدید </h1> 
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
		                ثبت محتوای درخواست کالا     
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">			                    
		                	
		                	<div class="form-group">
		                	
		                	   <label for="service_name" class="control-label col-lg-2">نام کالا</label>
		                	   <label for="service_name" class="control-label col-lg-1"></label>
		                	    <label for="service_date" class="control-label col-lg-2">برآورد مقدار</label>
		                	    <label for="service_name" class="control-label col-lg-2"></label>
		                	    <label for="service_date" class="control-label col-lg-2">توضیحات مربوطه</label>
		                	    <label for="service_date" class="control-label col-lg-2"></label>
		                	    <br />
		                	    <br />
		                	    
		                <div id='TextBoxesGroup'>    
		                	<div id="TextBoxDiv1">
								<div class="col-lg-3">
									 <select class="itemName form-control" name="name"></select>
								</div>

								<div class="col-lg-3">
									 <input type="text" class="form-control" name="count" placeholder="مقدار مورد نظر را وارد نمائید">
								</div>

								<div class="col-lg-4">
									 <input type="text" class="form-control" name="description" placeholder="توضیحات مربوطه را وارد نمائید">
								</div>
								<div class="col-lg-2">
								  <input type="submit" class="btn btn-success btn-sm" name="btn_buy" id="btn_buy" value="افزودن به لیست خرید" />
								</div>
							</div>
						</div>									
								<br />
								<br />
								
							</div>
							<hr>

				<!--<input type='button' class="btn btn-info" value='افزودن ردیف' id='addButton'>
				<input type='button' class="btn btn-danger" value='حذف ردیف' id='removeButton'>
				<input type='button' value='مقدار تکست باکس' id='getButtonValue'>-->
					
					  <div id="salam">
			            <table class="table table-striped table-bordered table-hover">
			                <thead id="thead">
			                   
			                </thead>
			                <tbody id="tbody">
			                    
			                </tbody>
			            </table>
			        </div>

					 					
                   
		                </div>
		            </div>
		        </div>

		    </div>
		</div>
	
		<div class="form-actions" style="text-align:center;margin-bottom:80px;">
		   <input type="submit" value="ثبت نهایی درخواست" class="btn btn-primary btn-sm" />
		   <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">انصراف و بازگشت</a>
		</div>

		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2">حذف درخواست کالا</h4>
                    </div>
                    <div class="modal-body">                    
                    	<table>
                        <tr>
                            <td><img src="<?= Url('images/forbidden.png'); ?>" style="width: 45px; height: 45px;" /></td>
                            <td><span style="font-family: b koodak; font-weight: bold; color: red;">آیا از انصراف و حذف این درخواست اطمینان دارید</span></td>                            
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">                        
                      <form action="<?= Url('/preject'); ?>" method="POST">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">  
	                    	<input type="submit" name="btndelete" value="حذف درخواست" class="btn btn-danger">
	                	<button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                      </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <script type="text/javascript">//for AutoComplete in product name


      $('.itemName').select2({

        placeholder: 'کالایی انتخاب نمائید',

        ajax: {

          url: '/select2-autocomplete-ajax',

          dataType: 'json',

          delay: 250,

          processResults: function (data) {

            return {

              results:  $.map(data, function (item) {

                    return {

                        text: item.name,

                        id: item.id

                    }
                })
            };
          },
          cache: true
        }
      });
</script>


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




@section('script')
<script src="<?= Url('assets/plugins/jasny/js/bootstrap-fileupload.js'); ?>"></script>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
@endsection