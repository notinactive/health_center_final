@extends('layouts.adminLayouts')

@section('head')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="col-lg-12">
    <div class="row" >
        <h1> نمایش و مدیریت کاربران <a href="<?= Url('user/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن کاربر جدید </a> </h1> 
    </div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 لیست تمامی کاربران موجود
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
                                        <td style="width: 100px;"><label style="width: 120px;" for="name" class="control-label col-lg-4">جستجوی کاربر</label></td>
                                        <td style="width: 300px;"><select class="itemName form-control" name="name"></select></td>
                                        <td><input type="submit" id="search" class="btn btn-info btn-md" value="جستجو" /></td>
                                        <td ><a href="<?= Url('/user'); ?>" id="list_view" class="btn btn-success btn-md">مشاهده لیست کاربران</a></td>
                                        </tr>
                                        </table>                                 
                                        </div>
                                                         
                                    </div>
                                    <hr>
                                </div>
                            </div>
                    </div>
                </div> 

                @if( $message = session('user_create') )
                  <div class="alert alert-success" style="font-family: b nazanin; direction: rtl;">
                    {{ $message }}
                  </div>
                @endif 

                 @if( $message2 = session('user_edit') )
                  <div class="alert alert-success" style="font-family: b nazanin; direction: rtl;">
                    {{ $message2 }}
                  </div>
                 @endif

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
                                <th style="text-align: center;">نام </th>
                                <th style="text-align: center;">نام خانوادگی</th>
                                <th style="text-align: center;">نام کاربری (کد ملی)</th>
                                <th style="text-align: center;">آدرس ایمیل</th>
                                <th style="text-align: center;">نقش کاربری</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $users as $user )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $user->fname }} </td>
                                <td style="text-align: center;"> {{ $user->lname }} </td>
                                <td style="text-align: center;"> {{ $user->name }} </td>
                                @if( $user->email == '' )
                                <td style="text-align: center;"> <span style="color: red;">آدرس ایمیلی برای این کاربر ثبت نشده است</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $user->email !!}</td>          
                                @endif
                                
                                @if($user->role == 'admin')
                                <td style="text-align: center;">مدیر سایت</td>
                                @elseif($user->role == 'user')
                                <td style="text-align: center;">کاربر عادی</td>
                                @endif 

                                <td style="text-align: center;">  
                                    <a href="<?=Url('user/'.$user->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>
                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $user->id }}">مشاهده جزئیات</a>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               
            <nav id="pagination">
            {!! $users->render() !!}
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @foreach( $users as $user )
        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2">اطلاعات مربوط به نام کاربری (کد ملی) <span style="color: blue; font-size: 20px;">"{{ $user->name }}"</span>  </h4>
                    </div>
                    <div class="modal-body">                    
                        <table class="table">
                        <tr>
                            <td class="col-md-2" style="font-weight: bold;">نام : </td>
                            <td class="col-md-4">{{ $user->fname }}</td>
                            <td class="col-md-3" style="font-weight: bold;">نام خانوادگی :</td>
                            <td class="col-md-4">{{ $user->lname }}</td>                            
                        </tr>

                        <tr>
                            <td class="col-md-3" style="font-weight: bold;">نام کاربری: </td>
                            <td class="col-md-4">{{ $user->name }}</td>
                            <td class="col-md-2" style="font-weight: bold;">آدرس ایمیل :</td>
                            @if( $user->email == '' )
                                <td style="text-align: center;" class="col-md-4"> <span style="color: red;">ایمیلی ثبت نشده</span></td>
                            @else
                                <td style="text-align: center;" class="col-md-4"> {!! $user->email !!}</td>          
                            @endif                             
                        </tr>

                        <tr>
                            <td class="col-md-2" style="font-weight: bold;">تلفن ثابت : </td>
                            <td class="col-md-4">{{ $user->phone }}</td>
                            <td class="col-md-3" style="font-weight: bold;">شماره موبایل :</td>
                            <td class="col-md-4">{{ $user->mobile }}</td>                                 
                        </tr>

                        <tr>
                            <td class="col-md-2" style="font-weight: bold;">واحد فعالیت : </td>
                            <td class="col-md-4">{{ getunitname($user->unit) }}</td>
                            <td class="col-md-3" style="font-weight: bold;">نقش کاربری :</td>
                            @if($user->role == 'admin')
                            <td class="col-md-4">مدیر سایت</td>
                            @elseif($user->role == 'user')
                            <td class="col-md-4">کاربر عادی</td>
                            @endif                              
                        </tr>

                        <tr>
                            <td class="col-md-2" style="font-weight: bold;">آدرس پستی : </td>
                            @if( $user->address == '' )
                                <td style="text-align: center;" class="col-md-4"> <span style="color: red;">آدرسی ثبت نشده</span></td>
                            @else
                                <td style="text-align: center;" class="col-md-4"> {!! $user->address !!}</td>          
                            @endif 
                            <td class="col-md-2" style="font-weight: bold;">توضیحات :</td>
                            @if( $user->description == '' )
                                <td style="text-align: center;" class="col-md-4"> <span style="color: red;">توضیحی ثبت نشده</span></td>
                            @else
                                <td style="text-align: center;" class="col-md-4"> {!! $user->description !!}</td>          
                            @endif                              
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">                        
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script type="text/javascript">//for AutoComplete in product name


      $('.itemName').select2({

        placeholder: 'نام کاربری (کد ملی) موردنظر را وارد نمائید',

        ajax: {

          url: '/select4-autocomplete-ajax',

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

<?php $url10=Url('user/search_user'); ?>
<script>
          $(document).ready(function (event) { 
             $('#list_view').hide();
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
                             $('#list_view').show(); 
                             $("#dataTables-example").hide();
                            
                             $("#salam").show();

                             $("#thead").html('<tr><th style="text-align: center;">نام </th><th style="text-align: center;">نام خانوادگی</th><th style="text-align: center;"> نام کاربری (کد ملی)</th><th style="text-align: center;"> آدرس ایمیل </th><th style="text-align: center;"> نقش کاربر </th><th style="text-align: center;"> عملیات مورد نظر </th></tr>');
                             var html= '';

                             $.each(resp,function(key){
                                 html='<table class="table table-striped table-bordered table-hover"><tr>'+'<td style="text-align: center;">'+resp[key].fname+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].lname+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].name+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].email+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].role+'</td>';
                                 html+='<td style="text-align: center;"><a href="<?=Url('user/'.$user->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>  <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $user->id }}">مشاهده جزئیات</a></td>';
                                 html+='</tr></table>';                        
                             })
                            $("#thead").show();                   
                            $("#tbody").html(html);
                            $("#pagination").hide();
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