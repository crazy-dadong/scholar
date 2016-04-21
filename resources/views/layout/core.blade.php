<!doctype html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@section('title')This is the master sidebar.@show</title>
    <link rel="stylesheet" href="{{ elixir('css/core.css') }}" />
    @section('css')
    @show
</head>
<body>

@section('content')
@show

<script src="{{ elixir('js/core.js') }}"></script>
@section('js')
@show
</body>
</html>