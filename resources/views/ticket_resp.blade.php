@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
  <div class="row" >
    <h1>پاسخگویی به تیکت</h1> 
  </div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                 تیکت با شماره {{ $tickets->ticket_num }} و کد پیگیری {{ $tickets->codepaygiry }}
                 <a href="{{ route('ticket') }}" class="btn btn-warning btn-line" style="font-family: b koodak; margin-top: 0px; margin-right: 10px;">بازگشت به صفحه تیکت ها</a>
            </div>
            <div class="panel-body">
                
                <span style="font-family: b koodak;">متن تیکت :</span>
                <br>
                <span>{!! $tickets->content !!}</span>
                <br>
                
                <span style="font-family: b koodak;">تاریخ ثبت تیکت :</span>
                <br>
                <span style="color:green; font-weight: bold; font-family: b nazanin;">{{ jdate($tickets->created_at)->format('%B %d، %Y') }}</span>                
                <hr>

                @if($errors -> has('reply'))
                  <div class="panel-body">
                      <div class="alert alert-danger alert-dismissable" style="font-family: b nazanin; text-align: right;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! $errors->first('reply') !!}                        
                      </div>
                  </div>
                @endif 

                <span style="font-family: b koodak;">ثبت پاسخ تیکت </span>
                <br>
                <form action="{{ route('ticket_answer' , ['id'=>$tickets->id]) }}" id="myform" method="POST" class="form-horizontal">
                   <input type="hidden" name="_token" value="{{csrf_token()}}" />
                     <div class="row">
                       <div class="col-lg-12">                   
                            <div class="panel-body">
                                <div class="table-responsive">                           
                                    <div class="form-group">
                                      <label for="description" class="control-label col-lg-1" style="font-family: b koodak; text-align: right;">پاسخ :</label>
                                        <div class="col-lg-11">
                                            <textarea name="reply" class="ckeditor" id="content" placeholder="پاسخ تیکت را وارد نمائید"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions" style="text-align:center; font-family: b koodak;">
                                      <input type="submit" name="save_pro"style="font-family: b koodak;" id="save_pro" class="btn btn-success btn-md" value="ثبت پاسخ" />                                   
                                    </div>

                                  </div>
                                </div>
                            </div>
                        </div>
                     </div>  
                </form>
        
                <div class="table-responsive">                
                                            
                       
                </div>               

            <nav id="pagination">
           
            </nav>

</div>
    </div>
</div>

@endsection

<?php

use App\Unit;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}


?>