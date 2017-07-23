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
                                <div class="muted pull-right" style="font-family: b koodak;">لیست درخواست های خدمت در حال بررسی</div>
                                <div class="pull-left"><a href="<?=Url('client/details'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت به صفحه آمارها</a>
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
                                                <th style="text-align: center;"> وضعیت درخواست </th>
                                                <th style="text-align: center;"> واحد درخواست دهنده </th>
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $services as $service )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;"> 
                                                @if($service->cancel == '0' )
                                                <a href="#" class="btn btn-warning btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $service->id }}">ثبت انصراف</a>
                                                @elseif($service->cancel == '1')
                                                
                                                @endif                              
                                                    
                                                <a href="<?=Url('client/process1/'.$service->id); ?>" class="btn btn-info btn-sm btn-line">مشاهده جزئیات</a>
                                                </td>
                                                    @if( $service->cancel == '0' )
                                                        <td style="color: green; text-align: center;"> انصراف داده نشده</td>
                                                    @elseif( $service->cancel == '1' )
                                                        <td style="color: red; text-align: center;"> انصراف داده شد </td>
                                                    @endif
                                                
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
                                                    @elseif( $service->state_req == '6' )
                                                        <td style="color: black;background: green; text-align: center;"> تکمیل شده ، ارسال برای خرید </td>   
                                                    @endif
                                                
                                                <td style="text-align: center;"> {{ getunitname($service->unitname) }} </td>
                                                <td style="text-align: center;"> {{ $service->created_at }} </td>
                                                <td style="text-align: center;"> {{ $service->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $services->render() !!}
                    </div> 


                    <div class="row">
                        <div class="col-lg-12">
                            @foreach( $services as $service )
                            <div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2" style="font-family: b koodak;"> آیا از ثبت انصراف برای درخواست <span style="color:blue;">{{ $service->codepaygiry }} </span> اطمینان دارید ؟</h4>
                                        </div>
                                        <div class="modal-body">                    
                                          <span style="font-family: b koodak;"> هشدار !! با ثبت انصراف ، این درخواست از چرخه بررسی و اخذ تأییدیه ها حذف می گردد <img src="<?=Url('images/stop.png'); ?>" style="width: 50px; height: 50px;"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?= Url('client/service_req/'.$service->id); ?>" method="POST">
                                            <button type="button" style="font-family: b koodak;" class="btn btn-default" data-dismiss="modal">بستن</button>    

                                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                              <input type="hidden" name="_method" value="PATCH" />
                                              <input type="submit" value="ثبت انصراف درخواست" style="font-family: b koodak;" class="btn btn-warning">                  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>            
            </div>

@endsection

<?php

use App\Unit;
use App\Service;
use App\Requestservice;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}

function getservname( $id )
{
    $service = Service::where('id', $id)->first()['name'];
    return $service;
}

?>