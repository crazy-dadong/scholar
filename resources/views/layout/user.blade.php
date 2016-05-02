<!doctype html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@section('title')This is the master sidebar.@show</title>
    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
    @section('css')
    @show
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ URL::action('User\DashboardController@getIndex') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Scholar</b>任务管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/avatar/avatar.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ $user_name = auth()->user()['name'] }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/avatar/avatar.png" class="img-circle" alt="User Image">

                                <p>
                                    {{ $user_name }}
                                    <small>用户ID: {{ $user_name = auth()->user()['id'] }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">用户主页</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ URL::action('Auth\AuthController@getLogout') }}" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/avatar/avatar.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ $user_name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="搜索">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">导航</li>
                <li>
                    <a href="{{ URL::action('User\DashboardController@getIndex') }}">
                        <i class="fa fa-dashboard"></i> <span>控制台</span>
                        <small class="label pull-right bg-red">3</small>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @section('content-wrapper')
        @show
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer> -->
</div>

<script src="{{ elixir('js/core.js') }}"></script>
@section('js')
@show
</body>
</html>