@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3> نمایش و مدیریت درخواست های کالا <a href="<?= Url('prequest/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن درخواست جدید </a> </h3> 
	</div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                تمامی درخواست های خرید کالا 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">کد درخواست</th>
                                <th style="text-align: center;">کد پیگیری </th>
                                <th style="text-align: center;">تاریخ ثبت</th>
                                <th style="text-align: center;">واحد درخواست دهنده</th>
                                <th style="text-align: center;"> وضعیت درخواست </th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $sabads as $sabad )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $sabad->codesefaresh }} </td>
                                <td style="text-align: center;"> {{ $sabad->codepaygiry }} </td>
                                <td style="text-align: center;"> {{ jdate($sabad->created_at)->format('%B %d، %Y') }} </td>
                                <td style="text-align: center;"> {!! getunitname($sabad->unitname) !!} </td>
                                
                                @if( $sabad->state_req == '0' )
                                    <td style="color: black;background: yellow; text-align: center;"> تازه ثبت شده </td>
                                @elseif( $sabad->state_req == '1' )
                                    <td style="color: black;background: orange; text-align: center;"> تأییدشده توسط مسئول واحد </td>
                                @elseif( $sabad->state_req == '2' )
                                    <td style="color: black;background: blue; text-align: center;"> دریافت مجوز تأیید کننده  </td>
                                @elseif( $sabad->state_req == '3' )
                                    <td style="color: black;background: gray; text-align: center;"> تأییدشده توسط مسئول اعتبار </td>
                                @elseif( $sabad->state_req == '4' )
                                    <td style="color: black;background: purple; text-align: center;"> تأییدشده توسط امور مالی </td>
                                @elseif( $sabad->state_req == '5' )
                                    <td style="color: black;background: green; text-align: center;"> دریافت مجوز تصویب کننده </td>
                                @endif

                                <td style="text-align: center;">  
                                	<a href="{{ route('prequest.show' , ['id' => $sabad->id]) }}" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                    				<!--<a href="#" class="btn btn-warning btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $sabad->id }}">تعلیق</a>-->
	                            </td>
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

<div class="row">
    <div class="col-lg-12">
        @foreach( $sabads as $sabad )
        <div class="modal fade" id="show{{ $sabad->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2"> جزئیات درخواست {{ $sabad->codesefaresh }} </h4>
                    </div>
                    <div class="modal-body">                    
                       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">کالای انتخابی </th>
                                <th style="text-align: center;">مقدار برآورد شده</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
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


<div class="row">
	<div class="col-lg-12">
    	@foreach( $sabads as $sabad )
        <div class="modal fade" id="delete{{ $sabad->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H2"> آیا از حذف درخواست {{ $sabad->codesefaresh }}  اطمینان دارید ؟ </h4>
                    </div>
                    <div class="modal-body">
                    
                    	<table>
                        <tr>
                            <td><img src="<?= Url('images/stop.png'); ?>" style="width: 50px; height: 50px;" /></td>
                            <td><span style="font-family: b koodak; font-weight: bold; color: red;">هشدار : در صورت حذف این درخواست، کلیه سوابق و محتویات آن را از دست خواهید داد !!</span></td>                            
                        </tr>
                    </table>
                    </div>
                    <div class="modal-footer">                        
                        <form action="<?= Url('admin/prequest/'.$sabad->id); ?>" method="POST">
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
@endsection

<?php

use App\Unit;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}


?>