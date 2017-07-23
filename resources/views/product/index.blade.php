@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1> نمایش و مدیریت کالاها <a href="<?= Url('product/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن کالای جدید </a> </h1> 
	</div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                لیست کالاهای موجود
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
                                        <td style="width: 100px;"><label style="width: 100px;" for="name" class="control-label col-lg-4">جستجوی کالا</label></td>
                                        <td style="width: 300px;"><select class="itemName form-control" name="name"></select></td>
                                        <td><input type="submit" id="search" class="btn btn-info btn-md" value="جستجو" /></td>
                                        <td ><a href="<?= Url('/product'); ?>" id="list" class="btn btn-success btn-md">مشاهده لیست کامل کالاها</a></td>                                  
                                       
                                        </tr>
                                        </table>
                                         </div>                  
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
                                <th style="text-align: center;">نام کالا </th>
                                <th style="text-align: center;">توضیحات کالا</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $products as $product )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $product->name }} </td>
                               
                                @if( $product->description == '' )
                                <td style="text-align: center;"> <span style="color: red;">توضیحی برای این کالا ثبت نشده است</span> </td>
                                @else
                                    <td style="text-align: center; width: 500px;"> {!! $product->description !!}</td>          
                                @endif

                                <td style="text-align: center;">                                 	
                                  <form action="<?=Url('product/'.$product->id); ?>" method="POST" >
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                  <input type="hidden" name="_method" value="DELETE" />
                                  <a href="<?=Url('product/'.$product->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>
                                  <input type="submit" name="btndelete" value="حذف" class="btn btn-danger btn-sm btn-line">                    				
                            </form>
	                            </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               

            <nav id="pagination">
            {!! $products->render() !!}
            </nav>
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

<?php $url10=Url('/search'); ?>
<script> //For Search Products
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

                     $("#thead").html('<tr><th style="text-align: center;">نام کالا </th><th style="text-align: center;">توضیحات کالا</th><th style="text-align: center;"> تاریخ ثبت کالا </th><th style="text-align: center;"> تاریخ آخرین تغییر و ویرایش </th><</tr>');
                     var html= '';

                     $.each(resp,function(key){
                        html='<table class="table table-striped table-bordered table-hover"><tr>'+'<td style="text-align: center;">'+resp[key].name+'</td>';
                         html+='<td style="text-align: justify; direction:rtl;">'+resp[key].description+'</td>';
                         html+='<td style="text-align: center;">'+resp[key].created_at+'</td>';
                         html+='<td style="text-align: center;">'+resp[key].updated_at+'</td>';
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



<script type="text/javascript">// For Delete Product
   $(document).ready(function (event) {       
             $(".hello").on('click',(function(event) {
              var id = $(this).attr('id');
                event.preventDefault(event);
                                                
             alert(id);
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });

                 $.ajax ({
                  type:"POST",
                  url:"empty",
                  data: {'id':id, "_token": "{{ csrf_token() }}"},
                  dataType: "JSON",
                  success: function(resp){
                    if(resp === 0)
                    {
                      console.log(resp);
                      alert("Deleted");
                    }
                    else
                    {
                      console.log(resp);
                      alert("Not Deleted");
                    }                     
                    }
                  });           
               
               return true;               
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