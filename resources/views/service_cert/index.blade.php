@extends('layouts.adminLayouts')

@section('content')

<div class="col-lg-12">
	<div class="row" >
		<h3> نمایش و مدیریت گواهی های خدمت </h3> 
	</div>
</div>
<hr/>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                تمامی گواهی های خدمت 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="text-align: center;">شماره گواهی</th>
                                <th style="text-align: center;">شماره درخواست </th>
                                <th style="text-align: center;">تاریخ ثبت گواهی </th>
                                <th style="text-align: center;">واحد درخواست دهنده </th>
                                <th style="text-align: center;"> وضعیت گواهی </th>
                                <th style="text-align: center;"> عملیات مورد نظر </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach( $certificates as $certificate )
                            <tr class="gradeC">
                                <td style="text-align: center;"> {{ $certificate->cert_num }} </td>
                                <td style="text-align: center;"> {{ getreqid($certificate->request_id) }} </td>
                                <td style="text-align: center;"> {{ jdate($certificate->created_at)->format('%B %d، %Y') }} </td>
                                <td style="text-align: center;"> {!! getunitname($certificate->unit_id) !!} </td>
                                
                                @if( $certificate->state_cert == '0' )
                                    <td style="color: black;text-align: center;"> تازه ثبت شده </td>
                                @elseif( $certificate->state_cert == '1' )
                                    <td style="color: black;text-align: center;"> تأییدشده توسط دریافت کننده خدمات </td>                 
                                @elseif( $certificate->state_cert == '2' )
                                    <td style="color: black;text-align: center;"> تأیید شده توسط مسئول واحد </td>
                                @elseif( $certificate->state_cert == '3' )
                                    <td style="color: black;text-align: center;"> تأیید شده توسط مسئول تدارکات </td>
                                @elseif( $certificate->state_cert == '4' )
                                    <td style="color: black;text-align: center;"> تأیید شده توسط مسئول واحد </td>
                                @elseif($certificate->state_cert == '5') 
                                    <td style="color: black;background: red; text-align: center;"> رد شده است </td>       
                                @endif

                                <td style="text-align: center;">  
                                	<a href="#" class="btn btn-primary btn-sm btn-line">مشاهده جزئیات</a>
                    				
                                    @if($certificate->certificate!='5')
                                    <a href="{{ route('cert.create' , ['id' => $certificate->id]) }}" class="btn btn-warning btn-sm btn-line">ویرایش</a>
                                    @elseif($certificate->state_req=='5')
                                    @endif
	                            </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>               
            </div>

            {!! $certificates->render() !!}

        </div>
    </div>
</div>

@endsection

<?php

use App\Unit;
use App\Sreq;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}

function getreqid($id)
{
    $id = Sreq::where('id' , $id)->first()['codesefaresh'];
    return $id;
}


?>