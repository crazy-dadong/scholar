<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ URL::action('Home\IndexController@getIndex') }}"><b>Scholar</b>系统</a>
    </div>

    <div class="register-box-body">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="callout callout-danger">{{ $error }}</p>
            @endforeach
        @else
            <p class="login-box-msg ">注册新会员</p>
        @endif

        <form action="{{ URL::action('Auth\AuthController@postRegister') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="邮箱">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="用户名">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="重复密码">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-group has-feedback">
                        <input type="text" name="email_token" class="form-control" placeholder="验证码">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>

                    </div>
                </div>
                <div class="col-xs-4">
                    <button id="get-email-token" class="btn btn-primary">获取验证码</button>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> 我同意 <a href="#">条款</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ URL::action('Auth\AuthController@getLogin') }}" class="text-center">我已经有会员资格</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
    $("#get-email-token").bind('click', function (e) {
        e.preventDefault();
        $(this).prop("disabled","disabled");
        var email = $("input[name='email']").val();

        $.get("{{ URL::action('Auth\AuthController@getToken') }}",
                {
                    email: email
                },function () {

                },'json');
    });
</script>
</body>
</html>
