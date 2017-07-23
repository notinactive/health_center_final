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
                                <div class="muted pull-right" style="font-family: b koodak;">جزئیات درخواست کالای {{ $product->codepaygiry }}</div>
                                <div class="pull-left"><a href="<?=Url('client/final_pro'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت</a>
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
                                            @foreach($details as $detail)
                                              <tr>
                                                @if($detail->description == '')
                                                <td style="font-family: b nazanin; text-align: center;"><span style="color: red;">توضیحی ثبت نشده است</span></td>
                                               @else
                                               <td style="font-family: b nazanin; text-align: center;">{{ $detail-> description}}</td>
                                               @endif 
                                                <td style="font-family: b nazanin; text-align: center;">{{ $detail-> count}}</td>
                                                <td style="font-family: b nazanin; text-align: center;">{!! getproname($detail-> products_id) !!}</td>
                                                
                                              </tr>
                                              @endforeach
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     
                    </div> 


                    <div class="row">
                        <div class="col-lg-12">
                          
                            <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2" style="font-family: b koodak;"> جزئیات درخواست <span style="color:blue;"></span></h4>
                                        </div>
                                        <div class="modal-body">                    
                                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; font-family: b koodak;">خدمت انتخابی </th>
                                                    <th style="text-align: center; font-family: b koodak;">مقدار برآورد شده</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($details as $detail)
                                              <tr>
                                                <td style="font-family: b nazanin; text-align: center;">{!! getproname($detail-> products_id) !!}</td>
                                                <td style="font-family: b nazanin; text-align: center;">{{ $detail-> count}}</td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" style="font-family: b koodak;" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>            
            </div>

@endsection

<?php

use App\Unit;
use App\Product;

function getunitname( $id )
{
    $unit = Unit::where('id', $id)->first()['unitname'];
    return $unit;
}

function getproname( $id )
{
    $service = Product::where('id', $id)->first()['name'];
    return $service;
}

?>