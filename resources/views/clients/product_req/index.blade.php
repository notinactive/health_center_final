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
                                <div class="muted pull-right" style="font-family: b koodak;">لیست درخواست های کالا</div>
                                <div class="pull-left"><a href="<?=Url('client/product_req/create'); ?>" class="btn btn-warning" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">ثبت درخواست کالای جدید</a>
                                </div>
                            </div>

                            <div style="text-align: center; margin-left: 5%; margin-right: 2%;">
                            <div class="row" style="text-align: center;">
                        <div class="col-lg-12">
                             <div class="table-responsive">
                             <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr style="font-family: b koodak;">
                                                <th style="text-align: center;"> عملیات مورد نظر </th> 
                                                <th style="text-align: center;"> وضعیت انصراف </th>       
                                                <th style="text-align: center;"> وضعیت ثبت نهایی </th>
                                                <th style="text-align: center;"> وضعیت درخواست </th>       
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $sabads as $sabad )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">
                                                  @if($sabad->confirm == '0')                               
                                                    <a href="#" class="btn btn-danger btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $sabad->id }}">حذف</a>
                                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $sabad->id }}">ویرایش</a>
                                                    <a href="<?=Url('client/product_req/'.$sabad->id); ?>" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                                                    @else                                                   
                                                    <a href="<?=Url('client/product_req/'.$sabad->id); ?>" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                                                    @endif
                                                </td>

                                                  @if($sabad->cancel == '1')                               
                                                   <td style="text-align: center;"><span style="color: red;">انصراف داده شده</span></td>
                                                    @else                                                   
                                                    <td style="text-align: center;"><span style="color: black;">انصراف داده نشده</span></td>
                                                    @endif


                                                    @if( $sabad->confirm == '0' && $sabad->cancel=='0' )
                                                        <td style="text-align: center;"><a class="btn btn-success">ثبت نهایی</a></td>
                                                    @elseif( $sabad->confirm == '1')
                                                        <td style="color: green;text-align: center;"> ثبت نهایی شده </td>      
                                                    @endif                                      
                                                   

                                                    @if( $sabad->state_req == '0' )
                                                        <td style="color: black;text-align: center;"> تازه ثبت شده </td>
                                                    @elseif( $sabad->state_req == '1' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط مسئول واحد </td>
                                                    @elseif( $sabad->state_req == '2' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تأیید کننده  </td>
                                                    @elseif( $sabad->state_req == '3' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط مسئول اعتبار </td>
                                                    @elseif( $sabad->state_req == '4' )
                                                        <td style="color: black;text-align: center;"> تأییدشده توسط امور مالی </td>
                                                    @elseif( $sabad->state_req == '5' )
                                                        <td style="color: black;text-align: center;"> دریافت مجوز تصویب کننده </td>
                                                    @elseif( $sabad->state_req == '6' )
                                                        <td style="color: black;text-align: center;"> درخواست تکمیل شد </td>
                                                    @elseif( $sabad->state_req == '7' )
                                                        <td style="color: black;background: red; text-align: center;"> هنوز ثبت نهایی نشده است </td>
                                                    @endif                                                
                                                
                                                <td style="text-align: center;"> {{ jdate($sabad->created_at)->format('%B %d، %Y') }}  </td>
                                                <td style="text-align: center;"> {{ $sabad->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $sabads->render() !!}
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
