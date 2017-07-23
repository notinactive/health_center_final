@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
  <div class="row" >
    <h1>مدیریت تیکت ها</h1> 
  </div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                 لیست تمامی تیکت های ثبت شده
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
                                        <td style="width: 100px;"><label style="width: 120px;" for="name" class="control-label col-lg-4">جستجوی تیکت ها براساس تاریخ</label></td>
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

        </form>
     
                @if( $message = session('message') )
                  <div class="alert alert-success">
                    {{ $message }}
                  </div>
                @endif
                <div class="table-responsive">                
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">تاریخ ثبت تیکت </th>
                                <th style="text-align: center;">شماره تیکت </th>
                                <th style="text-align: center;">کد پیگیری</th>
                                <th style="text-align: center;">واحد ارسال کننده</th>
                                <th style="text-align: center;">اولویت</th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $tickets as $ticket )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ jdate($ticket->created_at)->format('%B %d، %Y') }} </td>
                                <td style="text-align: center;"> {{ $ticket->ticket_num }} </td>
                                <td style="text-align: center;"> {{ $ticket->codepaygiry }} </td>
                                <td style="text-align: center;"> {{ getunitname($ticket->unit_id) }} </td>

                                @if( $ticket->olaviat == '0' )
                                <td style="text-align: center;"> <span style="color: red; font-family: b nazanin;">بدون اولویت</span> </td>
                                @elseif( $ticket->olaviat == '1' )
                                    <td style="text-align: center;"><span style="color: black; font-family: b nazanin;">اولویتی کم</span></td>
                                @elseif( $ticket->olaviat == '2' )
                                    <td style="text-align: center;"><span style="color: black; font-family: b nazanin;">اولویتی متوسط</span></td>
                                @elseif( $ticket->olaviat == '3' )
                                    <td style="text-align: center;"><span style="color: black; font-family: b nazanin;">اولویتی زیاد</span></td>  
                                @endif

                                                         
                                <td style="text-align: center;">  
                                    @if($ticket->reply_code=='0')
                                    <a href="<?=Url('ticket_resp/'.$ticket->id); ?>" class="btn btn-primary btn-sm btn-line">پاسخگوئی</a>
                                    <a href="#" onclick="{{seen($ticket->id)}}" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $ticket->id }}">مشاهده جزئیات</a>
                                    @elseif($ticket->reply_code=='1')
                                    <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $ticket->id }}">مشاهده جزئیات</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               

            <nav id="pagination">
            {!! $tickets->render() !!}
            </nav>

</div>
    </div>
</div>


<div class="row">
                        <div class="col-lg-12"> 
                          @foreach( $tickets as $ticket )                           
                            <div class="modal fade" id="delete{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2" style="font-family: b koodak;">جزئیات تیکت با شماره<span style="color:blue; direction: rtl; text-align: justify;"> "{{ $ticket->ticket_num }}" </span></h4>
                                        </div>
                                        <div class="modal-body">                    
                                        <span style="font-family: b koodak; direction: rtl; float: right;"> عنوان تیکت :</span>
                                          <br>
                                          <span style="font-family: b nazanin; direction: rtl; text-align: justify;">
                                              {{ $ticket->title }}
                                          </span>
                                          <br>
                                          <span style="font-family: b koodak; direction: rtl; float: right;"> متن تیکت :</span>
                                          <br>
                                         
                                          <span style="font-family: b nazanin; direction: rtl; text-align: justify;">
                                              {!! $ticket->content !!}
                                          </span>
                                          <br>
                                          
                                          <span style="font-family: b koodak; direction: rtl; float: right; color: red"> تاریخ ثبت : {{ jdate($ticket->created_at)->format('%B %d، %Y') }}</span>
                                          <br>
                                          <br>
                                          <hr>
                                           <span style="font-family: b koodak; direction: rtl; float: right;"> پاسخ تیکت :</span>
                                          <br>

                                          @if($ticket->reply_code =='1')
                                           <span style="font-family: b nazanin; direction: rtl; text-align: justify;">{!! $ticket->reply !!}</span> 
                                          <br>
                                          <br>
                                          <span style="font-family: b koodak; direction: rtl; float: right; color: green;"> تاریخ پاسخگویی : {{ jdate($ticket->reply_date)->format('%B %d، %Y') }}</span>
                                          @elseif($ticket->reply_code =='0')                                   
                                          <span style="font-family: b nazanin; direction: rtl; text-align: justify; color: red;">پاسخی برای این تیکت ثبت نشده است</span> 
                                          @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="font-family: b koodak;" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>
@endsection

<?php

use App\Unit;
use App\Ticket;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}

function seen($id)
{
  $seen = Ticket::find($id);
  $seen->seen = 1;
  $seen->update();
}


?>