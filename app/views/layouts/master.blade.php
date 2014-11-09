<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Selia POS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        {{ HTML::style('AdminLTE/css/AdminLTE.css') }}
    <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Selia Store Manager
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-heart-o"></i>
                                                        <span class="label label-danger">*</span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="header">Tell a friend about Selia Pos</li>
                                                        <li>
                                                            <!-- inner menu: contains the actual data -->
                                                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                                            </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; z-index: 99; right: 1px; height: 188.679245283019px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                                                        </li>
                                                        <li class="footer">
                                                            <a href="#">View Sample email</a>
                                                        </li>
                                                    </ul>
                                                </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{Confide::user()->first_name.' '.Confide::user()->last_name}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                {{ HTML::image('img/avatar3.png', 'User Image', array('class' => 'img-circle')) }}
                                    <p>
                                        {{Confide::user()->first_name.' '.Confide::user()->last_name}} - Store Manager
                                     </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">POS</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Support</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                    <a href="{{{ URL::to('/users/logout') }}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                             {{ HTML::image('img/avatar3.png', 'User Image', array('class' => 'img-circle')) }}
                                </div>
                        <div class="pull-left info">
                            <p>Hello, {{Confide::user()->first_name}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="{{{ URL::to('/dashboard') }}}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/taxes') }}}">
                                <i class="fa fa-money"></i> <span>Taxes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/store_locations') }}}">
                                <i class="fa fa-hospital-o"></i> <span>Stores</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{{ URL::to('/departments') }}}">
                                <i class="fa fa-th"></i> <span>Departments</span>
                             </a>
                        </li>
                        <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-edit"></i> <span>Items</span>
                                                        <i class="fa pull-right fa-angle-left"></i>
                                                    </a>
                                                    <ul class="treeview-menu" style="display: none;">
                                                        <li><a href="{{{ URL::to('/items') }}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Item List </a></li>
                                                        <li><a href="{{{ URL::to('/dimensions') }}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Item Variants </a></li>
                                                        <li><a href="{{{ URL::to('/items/create') }}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> New Item </a></li>
                                                        <li><a href="{{{ URL::to('/comingsoon') }}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Print Tag/Barcode</a></li>
                                                    </ul>
                                                </li>
                        <li>
                            <a href="{{{ URL::to('/comingsoon') }}}">
                               <i class="fa  fa-list"></i> <span>Inventory</span>
                            </a>
                        </li>
                        <li>
                             <a href="/comingsoon">
                               <i class="fa   fa-ticket"></i> <span>Promotions</span>
                            </a>
                        </li>
                        <li class="treeview">
                                                    <a href="#">
                                                        <i class="fa fa-bar-chart-o"></i>
                                                        <span>Sales Reports</span>
                                                        <i class="fa pull-right fa-angle-left"></i>
                                                    </a>
                                                    <ul class="treeview-menu" style="display: none;">
                                                        <li><a href="pages/UI/general.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Transactions</a></li>
                                                        <li><a href="pages/UI/icons.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> By Store</a></li>
                                                        <li><a href="pages/UI/buttons.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> By Department</a></li>
                                                        <li><a href="pages/UI/sliders.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> By Item</a></li>
                                                        <li><a href="pages/UI/timeline.html" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> By Employee</a></li>
                                                    </ul>
                                                </li>


                        <li>
                            <a href="/comingsoon">
                               <i class="fa  fa-user"></i> <span>Employees</span>
                            </a>
                        </li>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       @yield('header-main')
                        <small>@yield('header-small')</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        @yield('breadcrumb-list')
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <!-- Bootstrap -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        {{ HTML::script('AdminLTE/js/AdminLTE/app.js') }}

    </body>
</html>