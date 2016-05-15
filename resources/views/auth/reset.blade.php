<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ elixir('css/core.css') }}"/>
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
</head>
<body class="hold-transition register-page" style="background-image: url('/img/welcome-bg.jpg')">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ URL::action('Welcome\IndexController@getIndex') }}"><b>Scholar</b>系统</a>
    </div>

    <div class="register-box-body">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <p class="callout callout-danger">{{ $error }}</p>
            @endforeach
        @else
            <p class="login-box-msg ">重置密码</p>
        @endif

        <form action="{{ URL::action('Auth\PasswordController@postReset') }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="邮箱">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="新密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-flat">重置密码</button>

        </form>

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
</script>
</body>
</html>
