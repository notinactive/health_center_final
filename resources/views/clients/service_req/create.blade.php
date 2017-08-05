@extends('layouts.clientLayouts')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('statistics')
	        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">ثبت درخواست خدمت جدید</div>
                                <div class="pull-left"><a href="<?=Url('client/service_req'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت به لیست درخواست ها</a>
                                </div>
                            </div>

                            <div style="text-align: center; margin-left: 5%; margin-right: 2%;">
                        <form id="form" action="<?=Url('client/add'); ?>" method="POST" class="form-horizontal">
                            <div class="row" style="text-align: center;">
                          <div class="col-lg-12">

                             <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                        <thead>
                                            <tr style="font-family: b koodak;">
                                                <th style="text-align: center;"></th>
                                                <th style="text-align: center;"> توضیحات مربوطه </th>       
                                                <th style="text-align: center;"> برآورد مقدار </th>
                                                <th style="text-align: center;"> نام خدمت </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td>
                                                    <input type="submit" style="font-family: b koodak;" name="send" id="send" value="افزودن به لیست خرید" class="btn btn-success btn-md" />
                                               </td>

                                                <td style="text-align: center;">
                                                 <input type="text" name="description" style="text-align: right; font-family: b nazanin;" id="description" value="{{ old('description') }}"/>
                                                </td>

                                                <td style="text-align: center;"><input type="text" style="text-align: right; font-family: b nazanin;" name="count" id="count" value="{{ old('count') }}"/>
                                                </td>
                                                <td style="text-align: center;">
                                                    <select id="products_id" name="products_id" style="font-family: b nazanin; text-align: right;">
                                                        @foreach( $services as $service )
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>                                              
                                            </tr>
                                        </tbody>
                                    </table>                                    
                                    <br>
                                    <br>
                                    <br>
                                    <hr>
                            <div style="text-align:center;margin-bottom:80px;">
                               <input type="submit" value="ثبت نهایی درخواست" class="btn btn-info btn-sm" style="font-family: b koodak;"/>
                                               <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#delete" style="font-family: b koodak;">ذخیره و بازگشت</a>
                            </div> 

                           </div>
                        </div>
                   
                    </div>                    

                 </div>            
            </div>            

         </form>



<?php $url10=Url('client/add'); ?>
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
                     alert(resp);
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
