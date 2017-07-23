@extends('layouts.adminLayouts')
@section('content')


                <div class="row">
                    <div class="col-lg-12">
                        <h1> داشبورد </h1>
                    </div>
                </div>
                  <hr /> 
             
                 <!--TABLE, PANEL, ACCORDION AND MODAL  -->
                          <div class="row">
                    <div class="col-lg-6">
                      
                        <div class="panel panel-primary">
                            <div class="panel-heading ">
                               رخدادهای تازه
                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-weight: bold;">درخواست خدمت جدید</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                               @if($services > 0)
                                            <span style="font-family: b nazanin; font-weight: bold; color: green;">
                                            {{ $services }} درخواست خدمت جدید ثبت شده است
                                            </span>
                                            @elseif($services =='0')
                                            <span style="font-family: b nazanin;">درخواست خدمت جدیدی ثبت نشده است</span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="font-weight: bold;" >درخواست کالای جدید</a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                            @if($products > 0)
                                            <span style="font-family: b nazanin; font-weight: bold; color: green;">
                                            {{ $products }} درخواست کالای جدید ثبت شده است
                                            </span>
                                            @elseif($products =='0')
                                            <span style="font-family: b nazanin;">درخواست کالای جدیدی ثبت نشده است</span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="font-weight: bold;">تیکت جدید</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                            @if($tickets > 0)
                                            <span style="font-family: b nazanin; font-weight: bold; color: green;">
                                            {{ $tickets }} تیکت جدید ثبت شده است
                                            </span>
                                            @elseif($tickets =='0')
                                            <span style="font-family: b nazanin;">تیکت جدیدی ثبت نشده است</span>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                آمار و اطلاعات جامع 
                            </div>
                            <div class="panel-body">
                                <button class="btn btn-primary btn-lg col-lg-5" data-toggle="modal" data-target="#myModal">
                                    اطلاعات درخواست ها
                                </button>
                                <a href="" class="col-lg-2"></a>
                                <button class="btn btn-primary btn-lg col-lg-5" data-toggle="modal" data-target="#myModal2">
                                   اطلاعات تیکت ها
                                </button>

                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">کلیه درخواست ها</h4>
                                            </div>
                                            <div class="modal-body">
                                                <span style="font-weight: bold;">درخواست های خدمت</span>
                                                <table>
                                                    <tr>
                                                        <td>درخواست های تکمیل شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $complete1 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های رد شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $reject1 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های در حال بررسی :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $current1 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های تازه ثبت شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $new1 }} عدد</span></td>
                                                    </tr>
                                                </table> 
                                                <hr style="font-weight: bold;">

                                                <span style="font-weight: bold;">درخواست های کالا</span>
                                                <table>
                                                    <tr>
                                                        <td>درخواست های تکمیل شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $complete2 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های رد شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $reject2 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های در حال بررسی :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $current2 }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>درخواست های تازه ثبت شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $new2 }} عدد</span></td>
                                                    </tr>
                                                </table> 
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">کلیه تیکت ها</h4>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                               <table>
                                                    <tr>
                                                        <td>تیکت های مشاهده نشده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $notseen_ticket }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تیکت های پاسخ داده نشده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $notanswer_ticket }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تیکت های مشاهده شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $seen_ticket }} عدد</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>تیکت های پاسخ داده شده :</td>
                                                        <td><span style="color: green; font-weight: bold; font-family: b nazanin;">{{ $answer_ticket }} عدد</span></td>
                                                    </tr>
                                                </table> 
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                 <!--TABLE, PANEL, ACCORDION AND MODAL  -->    


@endsection