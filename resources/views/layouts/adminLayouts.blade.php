<!DOCTYPE html>
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <title>مدیریت تدارکات شبکه بهداشت </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="<?= Url('assets/plugins/bootstrap/css/bootstrap.rtl.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/css/theme.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/css/MoneAdmin.css'); ?>" />
    <link rel="stylesheet" href="<?= Url('assets/plugins/Font-Awesome/css/font-awesome.css'); ?>" />
    <link rel="shortcut icon" href="<?=Url('images/logo.png'); ?>" />
    <link href="<?= Url('assets/css/layout2.css'); ?>" rel="stylesheet" />
       <link href="<?= Url('assets/plugins/flot/examples/examples.css'); ?>" rel="stylesheet" />
       <link rel="stylesheet" href="<?= Url('assets/plugins/timeline/timeline.css'); ?>" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <script src="../../js/select2.min.js"></script>

       @yield('head')

</head>

<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >        

         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a class="navbar-brand">
                        <img src="<?= Url('assets/img/logo.png'); ?>" alt="" height="30" />
                        <h1 class="site-title">مدیریت تدارکات شبکه بهداشت</h1>
                    </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-left">

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li>
                            <a href="<?= Url('logout'); ?>"><i class="icon-signout"></i> خروج </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="right">
            <div class="media user-media well-small">
                <a class="user-link">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?= Url('images/user.png'); ?>" style="width: 70px; height: 70px;" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"></h5>
                    
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a href="<?= Url('index'); ?>" ><i class="icon-table"></i> داشبورد</a>                 
                </li>

                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-tasks"> </i> مدیریت درخواست کالا     
	   
                        <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="component-nav">
                       
                        <li class=""><a href="<?= Url('prequest/create'); ?>"><i class="icon-angle-left"></i> ایجاد درخواست جدید </a></li>

                         <li class=""><a href="<?= Url('prequest'); ?>"><i class="icon-angle-left"></i> نمایش و مدیریت درخواست ها </a></li>

                         <li class=""><a href=""><i class="icon-angle-left"></i> درخواست های انصرافی</a></li>

                         <li class=""><a href=""><i class="icon-angle-left"></i> درخواست های رد شده </a></li>
                        
                    </ul>
                </li>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav2">
                        <i class="icon-tasks"> </i> مدیریت درخواست خدمات     
       
                        <span class="pull-left">
                          <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="component-nav2">
                       
                        <li class=""><a href="<?= Url('srequest/create'); ?>"><i class="icon-angle-left"></i> ایجاد درخواست جدید </a></li>

                         <li class=""><a href="<?= Url('srequest'); ?>"><i class="icon-angle-left"></i> نمایش و مدیریت درخواست ها </a></li>

                         <li class=""><a href=""><i class="icon-angle-left"></i> درخواست های انصرافی</a></li>

                         <li class=""><a href=""><i class="icon-angle-left"></i> درخواست های رد شده </a></li>
                        
                    </ul>
                </li>


                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav2">
                        <i class="icon-pencil"></i> مدیریت کالاها
       
                        <span class="pull-left">
                            <i class="icon-angle-left"></i>
                        </span>
                         
                    </a>
                    <ul class="collapse" id="form-nav2">

                        <li class=""><a href="<?= Url('product/create'); ?>"><i class="icon-angle-left"></i> ایجاد کالای جدید </a></li>

                        <li class=""><a href="<?= Url('product'); ?>"><i class="icon-angle-left"></i> نمایش و مدیریت کالاها </a></li>

                    </ul>
                </li>



                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav2">
                        <i class="icon-table"></i> مدیریت خدمات 
       
                        <span class="pull-left">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="pagesr-nav2">
                        <li><a href="<?= Url('service/create'); ?>"><i class="icon-angle-left"></i> ثبت خدمت جدید </a></li>

                        <li><a href="<?= Url('service'); ?>"><i class="icon-angle-left"></i>نمایش و مدیریت خدمات</a></li>                        
                    </ul>
                </li>



                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav2">
                        <i class="icon-bar-chart"></i> مدیریت کاربران
       
                        <span class="pull-left">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="chart-nav2">

                        <li><a href="<?= Url('user/create'); ?>"><i class="icon-angle-left"></i> ایجاد کاربر جدید </a></li>
                        <li><a href="<?= Url('user'); ?>"><i class="icon-angle-left"></i>نمایش و مدیریت کاربران</a></li>
                        
                    </ul>
                </li>

                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav3">
                        <i class="icon-pencil"></i> مدیریت واحدهای خدماتی
       
                        <span class="pull-left">
                            <i class="icon-angle-left"></i>
                        </span>
                         
                    </a>
                    <ul class="collapse" id="form-nav3">

                        <li class=""><a href="<?= Url('unit/create'); ?>"><i class="icon-angle-left"></i> ایجاد واحد جدید </a></li>

                        <li class=""><a href="<?= Url('unit'); ?>"><i class="icon-angle-left"></i> نمایش و مدیریت واحدها </a></li>

                    </ul>
                </li>

                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#chart-nav3">
                        <i class="icon-bar-chart"></i> مدیریت گواهی ها
       
                        <span class="pull-left">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="chart-nav3">

                        <li><a href="{{ route('serv_certificate.index') }}"><i class="icon-angle-left"></i>نمایش و مدیریت گواهی انجام خدمت</a></li>

                        <li><a href=""><i class="icon-angle-left"></i>نمایش و مدیریت گواهی خرید کالا</a></li>
                        
                    </ul>
                </li>

                <li><a href="<?= Url('ticket'); ?>"><i class="icon-table"></i> مدیریت تیکت ها 
                </a></li>
            </ul>

        </div>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <div id="content">
            <div class="inner" style="min-height: 700px;">
                @yield('content')                    
            </div>
        </div>
        <!--END PAGE CONTENT -->


          <!-- RIGHT STRIP  SECTION -->
        <div id="left">            
            <div class="well well-small">
                <!--<ul class="list-unstyled">
                    <li>درخواست ارسالی : <span>230,000</span></li>
                    <li>درخواست موفق : <span>53,000</span></li>
                    <li>درخواست رد شده : <span>3,000</span></li>
                </ul>-->
            </div>
            <div class="well well-small">
                <a class="btn btn-block"> کلیدهای میانبر </a>
                <a href="{{ route('ticket') }}" class="btn btn-primary btn-block"> تیکت ها</a>
                <a href="{{ route('notcheck_product') }}" class="btn btn-info btn-block"> درخواست کالای بررسی نشده </a>
                <a href="{{ route('notcheck_service') }}" class="btn btn-danger btn-block"> درخواست خدمت بررسی نشده </a>
                <a href="{{ route('reject_service') }}" class="btn btn-success btn-block"> درخواست خدمت رد شده </a>                
                <a href="{{ route('reject_product') }}" class="btn btn-warning btn-block"> درخواست کالای رد شده </a>
                <a href="{{ route('user.index') }}" class="btn btn-default btn-block"> کاربران </a>
            </div>
          
        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>کلیه حقوق اپلیکیشن متعلق به <a style="text-decoration: none;">شبکه بهداشت خمینی شهر</a> می باشد.</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="<?= Url('assets/plugins/jquery-2.0.3.min.js'); ?>"></script>
     <script src="<?= Url('assets/plugins/bootstrap/js/bootstrap.rtl.js'); ?>"></script>
    <script src="<?= Url('assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?= Url('assets/plugins/flot/jquery.flot.js'); ?>"></script>
    <script src="<?= Url('assets/plugins/flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?= Url('assets/plugins/flot/jquery.flot.time.js'); ?>"></script>
     <script  src="<?= Url('assets/plugins/flot/jquery.flot.stack.js'); ?>"></script>
    <script src="<?= Url('assets/js/for_index.js'); ?>"></script>
    <script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
   
   @yield('script')
    <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
