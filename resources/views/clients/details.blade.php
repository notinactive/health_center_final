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
                                <a class="dropdown-toggle" data-toggle="dropdown" style="font-family: b koodak;"><i class="icon-user"></i> نام کاربری <i class="caret"></i>
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
                                <div class="muted pull-right" style="font-family: b koodak;">درخواست های در حال بررسی</div>                                
                            </div>

                            <div class="block-content collapse in">
                            <div class="span3">
                                <a href="<?=Url('client/process_pro'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های کالای در حال بررسی</a>
                            </div>
                            <div class="span3">
                                <a href="<?=Url('client/process_serv'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های خدمت در حال بررسی</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $process }}">{{ $process }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">درخواست های در حال بررسی</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">درخواست های تأیید شده</div>                                
                            </div>
                            <div class="block-content collapse in">
                            <div class="span3">
                                <a href="<?=Url('client/confirm_pro'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های کالای تأیید شده</a>
                            </div>
                            <div class="span3">
                                <a href="<?=Url('client/confirm_serv'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های خدمت تأیید شده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $confirm }}">{{ $confirm }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">درخواست های تأیید شده</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                             <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">درخواست های رد شده</div>                                
                            </div>
                            <div class="block-content collapse in">
                            <div class="span3">
                                <a href="<?=Url('client/reject_pro'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های کالای رد شده</a>
                            </div>
                            <div class="span3">
                                <a href="<?=Url('client/reject_serv'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های خدمت رد شده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $reject }}">{{ $reject }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">درخواست های رد شده</span></span>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <br />

                             <div class="navbar navbar-inner block-header">
                                <div class="muted pull-right" style="font-family: b koodak;">درخواست های نهایی شده</div>                                
                            </div>
                            <div class="block-content collapse in">
                           <div class="span3">
                                <a href="<?=Url('client/final_pro'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های کالای نهایی شده</a>
                            </div>
                            <div class="span3">
                                <a href="<?=Url('client/final_service'); ?>" class="btn btn-info btn-md" style="font-family: b koodak; margin-top: 30%;">درخواست های خدمت نهایی شده</a>
                            </div>
                            <div class="span6">
                                    <div class="chart" data-percent="{{ $final }}">{{ $final }}%</div>
                                    <div class="chart-bottom-heading" id="final"><span class="label label-info" style="font-family: b koodak;"><span style="color: white;">درخواست های نهایی شده</span></span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions" style="text-align:center;margin-bottom:80px;">
                           <a href="<?=Url('client/index'); ?>" class="btn btn-danger btn-sm" style="font-family: b koodak;">بازگشت به صفحه داشبورد</a>
                        </div>
@endsection
