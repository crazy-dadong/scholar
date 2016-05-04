<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
</head>

<body class="hold-transition login-page" style="background-image: url('/img/welcome-bg.jpg')">

<div class="login-box">
    <div class="login-logo">
        <a href="{{ URL::action('Welcome\IndexController@getIndex') }}"><b>Scholar</b>系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="callout callout-danger">{{ $error }}</p>
            @endforeach
        @else
            <p class="login-box-msg ">请登录</p>
            @endif
        </p>

        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="邮箱">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> 记住我
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <a href="#">忘记密码</a><br>
        <a href="{{ URL::action('Auth\AuthController@getRegister') }}" class="text-center">注册新用户</a>

    </div>
    <!-- /.login-box-body -->
</div>


<script src="{{ elixir('js/core.js') }}"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
