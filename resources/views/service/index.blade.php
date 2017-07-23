@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1> نمایش و مدیریت خدمات <a href="<?= Url('service/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن خدمت جدید </a> </h1> 
	</div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                لیست خدمات موجود
            </div>
            <div class="panel-body">
                
        <form action="" id="myform" method="POST" class="form-horizontal">
           <input type="hidden" name="_token" value="{{csrf_token()}}" />

                <div class="row">
                    <div class="col-lg-12">                   
                            <div class="panel-body">
                                <div class="table-responsive">                           
                                    <div class="form-group">
                                       <table>
                                       <tr>
                                        <td style="width: 100px;"><label style="width: 150px;" for="name" class="control-label col-lg-4">جستجوی خدمت</label></td>
                                        <td style="width: 300px;"><select class="itemName form-control" name="name"></select></td>
                                        <td><input type="submit" id="search" class="btn btn-info btn-md" value="جستجو" /></td>
                                        <td ><a href="<?= Url('/service'); ?>" id="list" class="btn btn-success btn-md">مشاهده لیست کامل خدمات</a></td>                                  
                                        </div>
                                        </tr>
                                        </table>                  
                                    </div>
                                    <hr>
                                </div>
                            </div>
                    </div>
                </div>  

        </form>
        <div id="salam">
            <table class="table table-striped table-bordered table-hover">
                <thead id="thead">
                   
                </thead>
                <tbody id="tbody">
                    
                </tbody>
            </table>
        </div>

                <div class="table-responsive">                
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">نام خدمت </th>
                                <th style="text-align: center;">توضیحات خدمت</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $services as $service )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $service->name }} </td>
                               
                                @if( $service->description == '' )
                                <td style="text-align: center;"> <span style="color: red;">توضیحی برای این خدمت ثبت نشده است</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $service->description !!}</td>          
                                @endif

                                <td style="text-align: center;">  
                                	<a href="<?=Url('service/'.$service->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>
                    				<a href="#" class="btn btn-danger btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $service->id }}">حذف</a>
	                            </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               
            </div>

            <nav id="pagination">
            {!! $services->render() !!}
            </nav>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
    	@foreach( $services as $service )
        <div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2"> آیا از حذف "{{ $service->name }}"  اطمینان دارید ؟ </h4>
                    </div>
                    <div class="modal-body">                    
                    	<table>
                        <tr>
                            <td><img src="<?= Url('images/forbidden.png'); ?>" style="width: 45px; height: 45px;" /></td>
                            <td><span style="font-family: b koodak; font-weight: bold; color: red;">هشدار : در صورت حذف این خدمت ، کلیه سوابق آن را از دست خواهید داد !!</span></td>                            
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">                        
                        <form action="" method="POST">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">  
	                    	<input type="hidden" name="_method" value="DELETE">
	                    	<input type="submit" name="btndelete" value="حذف کردن" class="btn btn-danger">
	                	<button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">//for AutoComplete in product name


      $('.itemName').select2({

        placeholder: 'خدمتی انتخاب نمائید',

        ajax: {

          url: '/select3-autocomplete-ajax',

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

<?php $url10=Url('/search2'); ?>
<script>
          $(document).ready(function (event) { 
            $('#list').hide();
             $("#myform").on('submit',(function(event) {
                event.preventDefault(event);
               $('#salam').hide();                

               if($('.itemName').val()=="")
            {
                $('.itemName').css("background-color","red");
                $('#salam').hide();
                return false;
            }
            else
            {
                $('.itemName').css("background-color","#ffffff");
                var name=$('.itemName').val();
              
             
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                 $.ajax ({
                  type:"POST",
                  url:'<?= $url10 ?>',
                  data:{'name':name ,  "_token": "{{ csrf_token() }}"},
                  dataType:'JSON',
                    success: function(resp){
                       
                    $("#dataTables-example").hide();
                    
                     $("#salam").show();

                     $("#thead").html('<tr><th style="text-align: center;">نام خدمت </th><th style="text-align: center;">توضیحات خدمت</th><th style="text-align: center;"> عملیات مورد نظر </th></tr>');
                     var html= '';

                     $.each(resp,function(key){
                        html='<table class="table table-striped table-bordered table-hover"><tr>'+'<td style="text-align: center;">'+resp[key].name+'</td>';
                        html+='<td style="text-align: center; ">'+resp[key].description+'</td>';
                         html+='<td style="text-align: center;"><a href="<?=Url('service/'.$service->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>  <a href="#" class="btn btn-danger btn-sm btn-line">حذف</a></td>';
                         html+='</tr></table>';                        
                     })
                     $("#thead").show();                   
                    $("#tbody").html(html);
                    $("#pagination").hide();
                    $('#list').show(); 
                    }
                  });           
               
               return true;
               }
          }));       
          });        
          
          </script>
@endsection

<?php

use App\Unit;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}


?>