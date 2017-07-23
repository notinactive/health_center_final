<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>پنل کاربری شبکه بهداشت</title>
        <!-- Bootstrap -->
        <link href="<?=Url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?=Url('bootstrap/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?=Url('vendors/easypiechart/jquery.easy-pie-chart.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?=Url('assets/styles.css" rel="stylesheet'); ?>" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="<?=Url('vendors/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
         @yield('head')
    </head>
    
    <body>
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
        <div class="container-fluid">
            <div class="row-fluid">               
                <!--/span-->
                <div class="span10" id="content">
                   
                    <div class="row-fluid">
                        <!-- block -->
                     @yield('statistics')
                     @yield('statistics2')
                     @yield('statistics3')
                        <!-- /block -->
                    </div>
                  @yield('bottom')
                    
                </div>

                @yield('main_menu')

            </div>
            <hr>
            <footer style="text-align: center;">
                <p style="font-family: b koodak;">کلیه حقوق اپلیکیشن متعلق به <a style="text-decoration: none;">شبکه بهداشت خمینی شهر</a> می باشد</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="<?=Url('/vendors/jquery-1.9.1.min.js'); ?>"></script>
        <script src="<?=Url('bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?=Url('vendors/easypiechart/jquery.easy-pie-chart.js'); ?>"></script>
        <script src="<?=Url('assets/scripts.js'); ?>"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        @yield('script')
    </body>

</html>