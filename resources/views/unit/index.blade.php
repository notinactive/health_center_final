@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
    <div class="row" >
        <h1> نمایش و مدیریت واحدهای عملیاتی <a href="<?= Url('user/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن واحد عملیاتی جدید </a> </h1> 
    </div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 لیست تمامی واحدهای عملیاتی موجود
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
                                        <td style="width: 100px;"><label style="width: 120px;" for="name" class="control-label col-lg-4">جستجوی واحد</label></td>
                                        <td style="width: 300px;"><select class="itemName form-control" name="name"></select></td>
                                        <td><input type="submit" id="search" class="btn btn-info btn-md" value="جستجو" /></td>
                                        <td ><a href="<?= Url('/unit'); ?>" id="list_view" class="btn btn-success btn-md">مشاهده لیست واحدهای عملیاتی</a></td>
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
                                <th style="text-align: center;">نام واحد عملیاتی </th>
                                <th style="text-align: center;">شماره تلفن</th>
                                <th style="text-align: center;">توضیحات مربوطه</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $units as $unit )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $unit->unitname }} </td>
                                @if( $unit->phone == '' )
                                <td style="text-align: center;"> <span style="color: red;">-----</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $unit->phone !!}</td>          
                                @endif
                                
                                @if( $unit->description == '' )
                                <td style="text-align: center;"> <span style="color: red;">-----</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $unit->description !!}</td>          
                                @endif
                               
                                <td style="text-align: center;">  
                                    <a href="<?=Url('unit/'.$unit->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>
                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $unit->id }}">مشاهده جزئیات</a>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               
            <nav id="pagination">
            {!! $units->render() !!}
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @foreach( $units as $unit )
        <div class="modal fade" id="delete{{ $unit->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2">اطلاعات مربوط به واحد عملیاتی <span style="color: blue; font-size: 20px;">"{{ $unit->unitname }}"</span>  </h4>
                    </div>
                    <div class="modal-body">                                                 
                          <label style="width: 120px;" for="name" class="control-label col-lg-4">نام واحد عملیاتی</label>
                           {{ $unit->unitname }}
                           <br />
                           <br />
                          <label style="width: 120px;" for="name" class="control-label col-lg-4">شماره تلفن واحد</label>
                           @if( $unit->phone == '' )
                                <td style="text-align: center;"> <span style="color: red;">شماره تلفنی ثبت نشده است</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $unit->phone !!}</td>          
                                @endif
                           <br />
                           <br />

                          <label style="width: 120px;" for="name" class="control-label col-lg-4">توضیحات مربوطه</label>
                          @if( $unit->description == '' )
                                <td style="text-align: center;"> <span style="color: red;">توضیحاتی ثبت نشده است</span> </td>
                                @else
                                    <td style="text-align: center;"> {!! $unit->description !!}</td>          
                                @endif
                           <br />
                           <br />
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

        placeholder: 'نام واحد موردنظر را وارد نمائید',

        ajax: {

          url: '/select5-autocomplete-ajax',

          dataType: 'json',

          delay: 250,

          processResults: function (data) {

            return {

              results:  $.map(data, function (item) {

                    return {

                        text: item.unitname,

                        id: item.id

                    }

                })

            };

          },

          cache: true

        }

      });


</script>

<?php $url10=Url('search3'); ?>
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

                             $("#thead").html('<tr><th style="text-align: center;"> نام واحد عملیاتی</th><th style="text-align: center;"> شماره تلفن </th><th style="text-align: center;"> توضیحات مربوطه </th><th style="text-align: center;"> عملیات مورد نظر </th></tr>');
                             var html= '';

                             $.each(resp,function(key){
                                 html='<table class="table table-striped table-bordered table-hover"><tr>'+'<td style="text-align: center;">'+resp[key].unitname+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].phone+'</td>';
                                 html+='<td style="text-align: center;">'+resp[key].description+'</td>';
                                 html+='<td style="text-align: center;"><a href="<?=Url('unit/'.$unit->id.'/edit'); ?>" class="btn btn-primary btn-sm btn-line">ویرایش</a>  <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $unit->id }}">مشاهده جزئیات</a></td>';
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