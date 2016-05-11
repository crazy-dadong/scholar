@extends('layout.user')

@section('css')
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <style type="text/css">
        .textarea {
            width: 100%;
            min-height: 125px;
            border: 1px solid rgb(221, 221, 221);
            padding: 10px;
            resize: none;
        }
    </style>
@endsection

@section('content-wrapper')

    <section class="content-header">
        <h1>
            工作面板
            <small>工作</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::action('User\Dashboard\DashboardController@getIndex') }}"><i
                            class="fa fa-dashboard"></i>
                    任务系统</a></li>
            <li class="active">工作</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row">
                    <div class="col-md-12">

                        <div class="box box-info">
                            <div class="box-header ui-sortable-handle" style="cursor: move;">
                                <i class="fa fa-tasks"></i>

                                <h3 class="box-title">{{ $task->name }}</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                            data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <div class="box-body">
                                <form action="#" method="post">
                                    {{--<div class="form-group">--}}
                                    {{--<input type="email" class="form-control" name="emailto" placeholder="Email to:">--}}
                                    {{--</div>--}}
                                    <div>
                                        <textarea class="textarea"
                                                  readonly="readonly"
                                                  title="任务描述">{{ $task->description }}</textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="box-footer clearfix">
                                <div class="btn-group pull-right" role="group" aria-label="...">
                                    <button id="cancel" type="button" class="btn btn-danger">取消
                                        <i class="glyphicon glyphicon-remove"></i></button>
                                    <button id="finish" type="button" class="btn btn-success">完成
                                        <i class="glyphicon glyphicon-ok"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">

        $(document).ready(function () {
            $("#finish").bind("click", function () {
                $.get("{{ URL::action('User\Task\TaskController@getFinish') }}",function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
            });
        });

    </script>

@endsection