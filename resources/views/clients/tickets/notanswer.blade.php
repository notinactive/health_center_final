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
                                <div class="muted pull-right" style="font-family: b koodak;">لیست تیکت های پاسخ داده نشده</div>
                                <div class="pull-left"><a href="<?=Url('client/ticket_details'); ?>" class="btn btn-danger" style="font-family: b koodak; margin-top: 0px; margin-bottom: 3px;">بازگشت به صفحه آمارها</a>
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
                                                <th style="text-align: center;"> اولویت تیکت </th>        
                                                <th style="text-align: center;"> عنوان تیکت </th>
                                                <th style="text-align: center;"> تاریخ ثبت </th>
                                                <th style="text-align: center;"> کد پیگیری </th>              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach( $notanswers as $notanswer )
                                            <tr class="gradeC" style="font-family: b koodak;">
                                                <td style="text-align: center;">                               
                                                <a href="#" class="btn btn-info btn-sm btn-line" data-toggle="modal" data-target="#delete{{ $notanswer->id }}">مشاهده جزئیات</a>
                                                </td>
                                                 
                                                 @if( $notanswer->olaviat == '0' )
                                                        <td style="color: red; text-align: center;">اولویتی انتخاب نشده است</td>
                                                 @elseif( $notanswer->olaviat == '1' )
                                                        <td style="color: black; text-align: center;"> اولویت کم</td>
                                                 @elseif( $notanswer->olaviat == '2' )
                                                        <td style="color: black; text-align: center;"> اولویت متوسط</td>
                                                 @elseif( $notanswer->olaviat == '3' )
                                                        <td style="color: black; text-align: center;"> اولویت زیاد</td>       
                                                 @endif 

                                                <td style="text-align: center;"> {{ $notanswer->title }} </td>
                                                <td style="text-align: center;"> {{ jdate($notanswer->created_at)->format('%B %d، %Y') }} </td>
                                                <td style="text-align: center;"> {{ $notanswer->codepaygiry }} </td>                                              
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                 </div> 
                            </div>
                     {!! $notanswers->render() !!}
                    </div> 


                    <div class="row">
                        <div class="col-lg-12"> 
                          @foreach( $notanswers as $notanswer )                           
                            <div class="modal fade" id="delete{{ $notanswer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H2" style="font-family: b koodak;"><span style="color:blue; direction: rtl; text-align: justify;">"{{ $notanswer->codepaygiry }}" </span>جزئیات تیکت با کد پیگیری </h4>
                                        </div>
                                        <div class="modal-body">                    
                                          <span style="font-family: b koodak; direction: rtl; float: right;"> متن تیکت :</span>
                                          <br>
                                         
                                          <span style="font-family: b nazanin; direction: rtl; text-align: justify;">
                                              {!! $notanswer->content !!}
                                          </span>
                                          <br>
                                          
                                          <span style="font-family: b koodak; direction: rtl; float: right; color: red"> تاریخ ثبت : {{ jdate($notanswer->created_at)->format('%B %d، %Y') }}</span>
                                          <br>
                                          <hr>

                                          <span style="font-family: b nazanin; font-weight: bold; color: orange; direction: rtl; text-align: justify;">
                                              این تیکت توسط واحد تدارکات مشاهده شده اما هنوز هیچ پاسخی برای آن ثبت نشده است
                                          </span>
                                                                                                                   
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
                </div>            
            </div>

@endsection
