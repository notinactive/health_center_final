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
                                <div class="muted pull-right" style="font-family: b koodak;">لیست درخواست های کالای انصرافی رد شده</div>
                                <div class="pull-left"><a href="<?=Url('client/cancel_details'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت به صفحه آمارها</a>
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
                                                <th style="text-align: center;"> تاریخ رد انصراف </th>   
                                                <th style="text-align: center;"> تاریخ ثبت انصراف </th>
                                                <th style="text-align: center;"> وضعیت درخواست </th>
                                                <th style="text-align: center;"> تاریخ ثبت درخواست کالا</th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $cancel_confirms as $cancel_confirm )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">                               
                                                <a href="{{ route('creject2' , ['id' => $cancel_confirm->id]) }}" class="btn btn-info btn-sm btn-line">مشاهده جزئیات</a>
                                                </td>

                                                 <td style="text-align: center;"> {{ jdate($cancel_confirm->cancel_reject_date)->format('%B %d، %Y') }}</td>

                                                 <td style="text-align: center;"> {{ jdate($cancel_confirm->cancel_date)->format('%B %d، %Y') }}</td>
                                                   
                                                    @if( $cancel_confirm->state_req == '0' )
                                                        <td style="color: black;text-align: center;">این درخواست تازه ثبت شده است </td>
                                                    @elseif( $cancel_confirm->state_req == '1' )
                                                        <td style="color: black; text-align: center;">این درخواست توسط مسئول واحد تأیید شده است</td>
                                                    @elseif( $cancel_confirm->state_req == '2' )
                                                        <td style="color: black;text-align: center;">این درخوسات ، مجوز تأیید کننده را دریافت نموده است  </td>
                                                    @elseif( $cancel_confirm->state_req == '3' )
                                                        <td style="color: black;text-align: center;">این درخواست توسط مسئول اعتبار تأیید شده است</td>
                                                    @elseif( $cancel_confirm->state_req == '4' )
                                                        <td style="color: black;text-align: center;">این درخواست توسط امور مالی تأیید شده است</td>
                                                    @elseif( $cancel_confirm->state_req == '5' )
                                                        <td style="color: black;text-align: center;">این درخواست ، مجوز تصویب کننده را دریافت نموده است</td>                                     
                                                    @endif
                                                
                                                <td style="text-align: center;"> {{ jdate($cancel_confirm->created_at)->format('%B %d، %Y') }}</td>
                                                <td style="text-align: center;"> {{ $cancel_confirm->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $cancel_confirms->render() !!}
                    </div> 


                    <div class="row">
                        <div class="col-lg-12">
                            @foreach( $cancel_confirms as $cancel_confirm )
                            <div class="modal fade" id="delete{{ $cancel_confirm->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2" style="font-family: b koodak;"> آیا از ثبت انصراف برای درخواست <span style="color:blue;">{{ $cancel_confirm->codepaygiry }} </span> اطمینان دارید ؟</h4>
                                        </div>
                                        <div class="modal-body">                    
                                          <span style="font-family: b koodak;"> هشدار !! با ثبت انصراف ، این درخواست از چرخه بررسی و اخذ تأییدیه ها حذف می گردد <img src="<?=Url('images/stop.png'); ?>" style="width: 50px; height: 50px;"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?= Url('client/service_req/'.$cancel_confirm->id); ?>" method="POST">
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

