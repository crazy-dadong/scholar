<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
</head>

<body class="hold-transition" style="background-image: url('/img/welcome-bg.jpg')">

<div class="login-box">
    <div class="login-logo">
        <a href="{{ URL::action('Welcome\IndexController@getIndex') }}">
            <small>欢迎使用</small>
            <b>Scholar</b>系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <h1 class="login-box-msg"><small>验证码：</small><code>{{ $emailToken }}</code> </h1>
    </div>
    <!-- /.login-box-body -->
</div>


<script src="{{ elixir('js/core.js') }}"></script>
</body>
</html>
