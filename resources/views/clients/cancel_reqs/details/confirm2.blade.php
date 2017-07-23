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
                                <div class="muted pull-right" style="font-family: b koodak;">جزئیات درخواست کالای انصرافی {{ $confirms->codepaygiry }}</div>
                                <div class="pull-left"><a href="{{ route('pcancel_confirm') }}" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت</a>
                                </div>
                            </div>

                            <div style="text-align: center; margin-left: 5%; margin-right: 2%;">
                            <div class="row" style="text-align: center;">
                        <div class="col-lg-12">
                             <div class="table-responsive">
                             <br>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                                <tr>
                                                <th style="text-align: center; font-family: b koodak;">توضیحات مربوطه</th>
                                                <th style="text-align: center; font-family: b koodak;">مقدار برآورد شده</th>
                                                <th style="text-align: center; font-family: b koodak;">کالای انتخابی </th>                                                  
                                                </tr>
                                            </thead>
                                        <tbody>                                            
                                            @foreach($confirm1 as $confirm)
                                              <tr>
                                                @if($confirm->description == '')
                                                <td style="font-family: b nazanin; text-align: center;"><span style="color: red;">توضیحی ثبت نشده است</span></td>
                                               @else
                                               <td style="font-family: b nazanin; text-align: center;">{{ $confirm->description}}</td>
                                               @endif 
                                                <td style="font-family: b nazanin; text-align: center;">{{ $confirm-> count}}</td>
                                                <td style="font-family: b nazanin; text-align: center;">{!! getproname($confirm-> products_id) !!}</td>
                                                
                                              </tr>
                                              @endforeach
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     
                    </div> 

                </div>            
            </div>

@endsection

<?php

use App\Product;

function getproname( $id )
{
    $service = Product::where('id', $id)->first()['name'];
    return $service;
}

?>