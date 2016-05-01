<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ URL::action('Home\IndexController@getIndex') }}" class="navbar-brand"><b>Scholar</b>任务管理</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    {{--<ul class="nav navbar-nav">--}}
                    {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
                    {{--<li><a href="#">Link</a></li>--}}
                    {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                    {{--<li><a href="#">Action</a></li>--}}
                    {{--<li><a href="#">Another action</a></li>--}}
                    {{--<li><a href="#">Something else here</a></li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a href="#">Separated link</a></li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li><a href="#">One more separated link</a></li>--}}
                    {{--</ul>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--<form class="navbar-form navbar-left" role="search">--}}
                    {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">--}}
                    {{--</div>--}}
                    {{--</form>--}}
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        {{-- 登录按钮 --}}
                        <li>
                            <a href="{{ URL::action('Auth\AuthController@getLogin') }}">登录</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper" style="background-image: url('/img/welcome-bg.jpg')">
        <div class="container" style="padding-top: 15px;">
            <div class="jumbotron row">
                <h2 class="text-center col-md-6 col-md-offset-3">
                    <b style="color: #3c8dbc;">Scholar</b>—您的私人任务助理
                </h2>
                <p class="text-center  col-md-6 col-md-offset-3">
                    现代生活喧嚣繁杂，Scholar帮你轻松简化一切，让生活更美好，让工作更省力。
                </p>
                <div class="col-md-4 col-md-offset-4">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-center">
                                <i class="ion ion-person-add"></i>
                                123
                                <i class="ion ion-arrow-graph-up-right"></i>
                                32
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-center">
                                <i class="ion ion-clipboard"></i>
                                128
                                <i class="ion ion-arrow-graph-up-right"></i>
                                12
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="row">
                        <div class="col-md-6"><a class="btn btn-primary btn-block" href="#" role="button">登录</a></div>
                        <div class="col-md-6"><a class="btn btn-primary btn-block" href="#" role="button">注册</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.2
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->
<script src="{{ elixir('js/core.js') }}"></script>
</body>
</html>
