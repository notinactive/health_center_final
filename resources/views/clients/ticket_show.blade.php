
@extends('layouts.clientLayouts')

@section('main_menu')
 
                <div class="span2" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="<?=Url('client/index'); ?>" style="font-family: b koodak;"><i class="icon-chevron-right"></i> داشبورد</a>
                        </li>
                       
                        <li>
                            <a href="<?=Url('client/product_req'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> مدیریت درخواست کالا</a>
                        </li>
                       
                        <li>
                            <a href="<?=Url('client/service_req'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> مدیریت درخواست خدمت</a>
                        </li>

                        <li>
                            <a href="tables.html" style="font-family: b koodak;"><i class="icon-chevron-left"></i> درخواست های رد شده</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-success pull-left">731</span> Orders</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-success pull-left">812</span> Invoices</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-left">27</span> Clients</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-left">1,234</span> Users</a>
                        </li>
                        <li>
                            <a href="#"><span class="badge badge-info pull-left">2,221</span> Messages</a>
                        </li>
                        
                    </ul>
                </div>
@endsection

@section('statistics')
	        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">لیست تیکت های ارسالی</div>
                                <div class="pull-left"><a href="<?=Url('client/ticket/create'); ?>" class="btn btn-success" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">ثبت تیکت جدید</a>
                                </div>
                            </div>

                            <div style="text-align: center; margin-left: 5%; margin-right: 2%;">
                            <div class="row" style="text-align: center;">
                        <div class="col-lg-12">
                             <div class="table-responsive">
                             <br>
                             @if( $message = session('user_message') )
                              <div class="alert alert-success" style="font-family: b nazanin; direction: rtl;">
                                {{ $message }}
                              </div>
                             @endif
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr style="font-family: b koodak;">
                                                <th style="text-align: center;"> عملیات مورد نظر </th>        
                                                <th style="text-align: center;"> وضعیت پاسخگوئی </th>
                                                <th style="text-align: center;"> اولویت تیکت </th>
                                                <th style="text-align: center;"> متن تیکت </th>
                                                <th style="text-align: center;"> عنوان تیکت </th>
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach( $tickets as $ticket )                                
                                           
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">                               
                                                    
                                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#show{{ $ticket->id }}">مشاهده جزئیات</a>
                                                </td>
                                                    @if( $ticket->seen == '0' )
                                                        <td style="color: red; text-align: center;"> هنوز مشاهده نشده است </td>
                                                    @elseif( $ticket->seen = '1' && $ticket->reply_code == '0')
                                                        <td style="color: orange; text-align: center;"> مشاهده شده ، پاسخگوئی نشده </td>
                                                    @elseif( $ticket->seen = '1' && $ticket->reply_code == '1')
                                                        <td style="color: green; text-align: center;"> مشاهده شده ، پاسخگوئی شده </td>
                                                    @endif 

                                                     @if( $ticket->olaviat == '0' )
                                                        <td style="color: red; text-align: center;"> اولویتی مشخص نشده </td>
                                                    @elseif( $ticket->olaviat == '1')
                                                        <td style="color: black; text-align: center;"> اولویت کم</td>
                                                    @elseif( $ticket->olaviat == '2')
                                                        <td style="color: black; text-align: center;"> اولویت متوسط</td>
                                                    @elseif( $ticket->olaviat == '3')
                                                        <td style="color: black; text-align: center;"> اولویت زیاد</td>
                                                    @endif                                         
                                                
                                                <td style="text-align: center; font-family: b nazanin;"> {!! $ticket->content !!} </td>
                                                <td style="text-align: center;"> {{ $ticket->title }} </td>
                                                <td style="text-align: center;"> {{ jdate($ticket->created_at)->format('%B %d، %Y') }} </td>
                                                <td style="text-align: center;"> {{ $ticket->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $tickets->render() !!}
                    </div> 

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

use App\Unit;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}


?>