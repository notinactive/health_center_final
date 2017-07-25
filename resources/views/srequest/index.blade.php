@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h1> نمایش و مدیریت درخواست های خدمت <a href="<?= Url('srequest/create'); ?>" class="btn btn-success btn-sm btn-line">افزودن درخواست جدید </a> </h1> 
	</div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                تمامی درخواست های خرید خدمت 
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
                                <th style="text-align: center;"> گواهی خدمت </th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $services as $service )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $service->codesefaresh }} </td>
                                <td style="text-align: center;"> {{ $service->codepaygiry }} </td>
                                <td style="text-align: center;"> {{ jdate($service->created_at)->format('%B %d، %Y') }} </td>
                                <td style="text-align: center;"> {!! getunitname($service->unitname) !!} </td>
                                
                                @if( $service->state_req == '0' )
                                    <td style="color: black;background: yellow; text-align: center;"> تازه ثبت شده </td>
                                @elseif( $service->state_req == '1' )
                                    <td style="color: black;background: orange; text-align: center;"> تأییدشده توسط مسئول واحد </td>
                                @elseif( $service->state_req == '2' )
                                    <td style="color: black;background: blue; text-align: center;"> دریافت مجوز تأیید کننده  </td>
                                @elseif( $service->state_req == '3' )
                                    <td style="color: black;background: gray; text-align: center;"> تأییدشده توسط مسئول اعتبار </td>
                                @elseif( $service->state_req == '4' )
                                    <td style="color: black;background: purple; text-align: center;"> تأییدشده توسط امور مالی </td>
                                @elseif( $service->state_req == '5' )
                                    <td style="color: black;background: green; text-align: center;"> دریافت مجوز تصویب کننده </td>
                                @endif

                                 @if( $service->certificate==0 )
                                    <td style="color: black;text-align: center;">دارد</td>
                                @elseif( $service->certificate==1 )
                                    <td style="color: red;text-align: center;">ندارد</td>
                                @endif

                                <td style="text-align: center;">  
                                	<a href="#" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                    				
                                    @if($service->certificate==0)
                                    <a href="{{ route('cert.create' , ['id' => $service->id]) }}" class="btn btn-warning btn-sm btn-line">ثبت گواهی</a>
                                    @elseif($service->certificate==1)
                                    @endif
	                            </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               
            </div>

            {!! $services->render() !!}

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