@extends('layouts.clientLayouts')

@section('top_menu')
         <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    
                    <div class="nav-collapse collapse">                       
                        <ul class="nav pull-right">

                            <a class="brand pull-right btn btn-info btn-sm" style="font-family: b koodak; margin-bottom: 5px;">پنل کاربری</a>

                        </ul>

                         <ul class="nav pull-left">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" style="font-family: b koodak; cursor: pointer;"><i class="icon-user"></i> نام کاربری <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                     <a tabindex="-1" href="login.html" style="font-family: b koodak;">خروج</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
@endsection

@section('main_menu')
 
                <div class="span2" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="<?=Url('client/index'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> داشبورد</a>
                        </li>
                       
                        <li>
                            <a href="<?=Url('client/product_req'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> مدیریت درخواست کالا</a>
                        </li>
                       
                        <li>
                            <a href="<?=Url('client/service_req'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> مدیریت درخواست خدمت</a>
                        </li>
                        
                        <li>
                            <a href="<?=Url('client/ticket/create'); ?>" style="font-family: b koodak;"><i class="icon-chevron-left"></i> ثبت تیکت برای تدارکات</a>
                        </li>

                        <li>
                            <a href="#" style="font-family: b koodak; "><span class="badge badge-success pull-left" style="margin-right: 5px;">812</span> پیگیری تیکت ها </a>
                        </li>

                        <li>
                            <a href="#"><span class="badge badge-info pull-left">27</span> Clients </a>
                        </li>

                        <li>
                            <a href="#"><span class="badge badge-info pull-left">1,234</span> Users </a>
                        </li>
                        
                        <li>
                            <a href="#"><span class="badge badge-info pull-left">2,221</span> Messages </a>
                        </li>
                        
                    </ul>
                </div>
@endsection

@section('statistics')
	               <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل درخواست های کالا و خدمات</div>
                                <div class="pull-left"><a href="<?=Url('client/details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $final }}">{{ $final }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های نهایی شده</a></span>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $reject }}">{{ $reject }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های رد شده</a></span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $confirm }}">{{ $confirm }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های تأیید شده</a></span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="{{ $process }}">{{ $process }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های در حال بررسی</a></span>

                                    </div>
                                </div>
                            </div>
                        </div>
@endsection

@section('statistics2')
                   <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل تیکت ها</div>
                                <div class="pull-left"><a href="<?=Url('client/ticket_details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $notseen }}">{{ $notseen }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های دیده نشده توسط تدارکات</a></span>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $notanswer }}">{{ $notanswer }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های پاسخ داده نشده</a></span>

                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $answer }}">{{ $answer }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">تیکت های پاسخ داده شده</a></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
@endsection

@section('statistics3')
                   <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">آمار و تحلیل درخواست های انصرافی</div>
                                <div class="pull-left"><a href="<?=Url('client/cancel_details'); ?>" class="badge badge-warning" style="font-family: b koodak;">مشاهده جزئیات</a>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $current }}">{{ $current }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف بلاتکلیف</a></span>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $cancel_confirm }}">{{ $cancel_confirm }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف تأیید شده</a></span>

                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="chart" data-percent="{{ $reject }}">{{ $reject }}%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info" style="font-family: b koodak;"><a style="color: white; text-decoration: none;">درخواست های انصراف رد شده</a></span>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
@endsection


