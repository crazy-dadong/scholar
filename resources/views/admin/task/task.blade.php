@extends('layout.admin')

@section('meta')
    <!--suppress JSUnresolvedFunction -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <style type="text/css">
        .pagination {
            margin: 0;
        }
    </style>
@endsection

@section('content-wrapper')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                任务管理
                <small>面板</small>
            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <!-- Single button -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>任务名称</th>
                                    <th>项目名</th>
                                    <th>模块名</th>
                                    <th>用户名</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                </tr>
                                @foreach($tasks as $task)
                                    <tr class="table-tr" data-task-id="{{ $task->id }}">
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->project_name }}</td>
                                        <td>{{ $task->module_name }}</td>
                                        <td>{{ $task->project_name }}</td>
                                        <td>@if($task->status == 1)
                                                执行中
                                            @elseif($task->status == 2)
                                                完成
                                            @elseif($task->status == 3)
                                                未完成
                                            @elseif($task->status == 4)
                                                修改
                                            @else
                                                未执行
                                            @endif
                                        </td>
                                        <td>{{ $task->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        第 {{ $tasks->currentPage() }} 页/共 {{ $tasks->lastPage() }} 页
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    {!! $tasks->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </section>
    </div>
@endsection

@section('js')
    {{--<script type="text/javascript">--}}
    {{--$.ajaxSetup({--}}
    {{--headers: {--}}
    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--}--}}
    {{--});--}}

    {{--var getSelectTr = function () {--}}

    {{--var tasks = $(".table-bordered .info");--}}
    {{--var tasksId = [];--}}
    {{--for(var i = 0; i < tasks.length; i++){--}}
    {{--tasksId.push($(tasks[i]).attr('data-task-id'));--}}
    {{--}--}}
    {{--return tasksId;--}}
    {{--};--}}

    {{--$(".table-tr").bind('click', function () {--}}
    {{--if($(this).prop('class').indexOf('info') == -1){--}}
    {{--$(this).addClass('info');--}}
    {{--}else{--}}
    {{--$(this).removeClass('info');--}}
    {{--}--}}
    {{--});--}}

    {{--$("#set-admin-btn").bind('click', function () {--}}
    {{--var tasksId = getSelectTr();--}}
    {{--$.post("{{ action('Admin\task\IndexController@posttaskAdmin') }}",--}}
    {{--{--}}
    {{--tasks_id: tasksId--}}
    {{--},--}}
    {{--function (data, status) {--}}
    {{--if (status == "success") {--}}
    {{--location.reload();--}}
    {{--}--}}
    {{--}--}}
    {{--);--}}
    {{--});--}}

    {{--$("#set-normal-btn").bind('click', function () {--}}
    {{--var tasksId = getSelectTr();--}}
    {{--$.post("{{ action('Admin\task\IndexController@posttaskNormal') }}",--}}
    {{--{--}}
    {{--tasks_id: tasksId--}}
    {{--},--}}
    {{--function (data, status) {--}}
    {{--if (status == "success") {--}}
    {{--location.reload();--}}
    {{--}--}}
    {{--}--}}
    {{--);--}}
    {{--});--}}

    {{--$("#set-ban-btn").bind('click', function () {--}}
    {{--var tasksId = getSelectTr();--}}
    {{--$.post("{{ action('Admin\Task\IndexController@posttaskBan') }}",--}}
    {{--{--}}
    {{--tasks_id: tasksId--}}
    {{--},--}}
    {{--function (data, status) {--}}
    {{--if (status == "success") {--}}
    {{--location.reload();--}}
    {{--}--}}
    {{--}--}}
    {{--);--}}
    {{--});--}}
    {{--</script>--}}
@endsection
