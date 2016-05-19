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
                项目管理
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
                                    <th>项目名称</th>
                                    <th>模块总数</th>
                                    <th>所属用户</th>
                                    <th>状态</th>
                                    <th>更新时间</th>
                                    <th>创建时间</th>
                                </tr>
                                @foreach($projects as $project)
                                    <tr class="table-tr" data-task-id="{{ $project->id }}">
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->moduleCount }}</td>
                                        <td>{{ $project->user->name }}</td>
                                        <td>正常</td>
                                        <td>{{ $project->updated_at }}</td>
                                        <td>{{ $project->created_at }}</td>
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
                                        第 {{ $projects->currentPage() }} 页/共 {{ $projects->lastPage() }} 页
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    {!! $projects->render() !!}
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
