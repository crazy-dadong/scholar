@extends('layout.user')

@section('meta')
    <!--suppress JSUnresolvedFunction -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <style>
        .task-list {
            cursor: pointer;
        }
    </style>
@endsection

@section('content-wrapper')
    <section class="content-header">
        <h1>
            控制台
            <small>控制面板</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::action('User\Dashboard\DashboardController@getIndex') }}"><i
                            class="fa fa-dashboard"></i>
                    任务系统</a></li>
            <li class="active">控制台</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            @if($execTask)
                <div class="col-md-12">
                    <div class="box box-warning collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <span>您正在执行：</span>
                                {{ $execTask->name }}
                            </h3>

                            <div class="box-tools pull-right">

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                        data-toggle="tooltip"
                                        title="详细" data-original-title="详细">
                                    <i class="fa fa-plus"></i></button>
                                <a href="{{ action('User\Task\WorkController@getIndex', ['task_id' => $execTask->id]) }}" type="button"
                                   class="btn btn-box-tool" data-toggle="tooltip" title="继续"
                                   data-original-title="继续">
                                    <i class="fa fa-play"></i></a>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"
                                        data-toggle="tooltip"
                                        title="取消" data-original-title="取消">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <textarea class="form-control" title="任务描述" readonly="readonly">{{ $execTask->description }}</textarea>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-3">
                @foreach($projects as $project)
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $project->name }}</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool create-module-btn"
                                        data-project-id="{{ $project->id }}" data-toggle="modal"
                                        data-target="#create-module-modal">
                                    创建
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($modules as $module)
                                    @if($module->project_id == $project->id)
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-circle-o text-green"></i> {{ $module->name }}
                                                <span class="label label-primary pull-right">
                                                    {{ $tasks->where('module_id', $module->id)->count() }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                @endforeach
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="input-group input-group-lg" style="margin-bottom: 20px">
                    <span class="input-group-addon">新任务</span>
                    <input id="fast-create-task-name" type="text" class="form-control" title="任务名称">
                    <div class="input-group-btn">
                        <button id="fast-create-btn" type="button" class="btn btn-primary"><i class="fa fa-flash"></i>
                        </button>
                        <a href="{{ action('User\Task\TaskController@getCreate') }}" class="btn btn-primary">创建</a>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">任务单</h3>

                        <div class="box-tools">
                            {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                                {{--<input type="text" name="table_search" class="form-control pull-right"--}}
                                       {{--placeholder="搜索">--}}

                                {{--<div class="input-group-btn">--}}
                                    {{--<button type="submit" class="btn btn-default"><i--}}
                                                {{--class="fa fa-search"></i></button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>任务名称</th>
                                <th>模块</th>
                                <th>开始日期</th>
                            </tr>
                            @foreach($tasks as $task)
                                <tr class="task-list" data-href="{{ URL::action('User\Task\WorkController@getIndex', ['task_id' => $task->id]) }}">
                                    <td>{{ $task->name }}</td>
                                    <td>
                                        <span class="label label-success">{{ $module->find($task->module_id)->name }}</span>
                                    </td>
                                    <td>{{ $task->plan_started_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('modal')
    <div id="create-module-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">新模块</h4>
                </div>
                <div class="modal-body">
                    <form id="module-create-from" href="{{ action('User\Task\ModelController@postCreate') }}" method="post">
                        <input type="hidden" class="form-control" name="project_id">
                        <div class="form-group">
                            <label for="module-name" class="control-label">名称</label>
                            <input type="text" name="name" class="form-control" id="module-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button id="module-create-btn" type="button" class="btn btn-primary">保存</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 快速创建任务
        $("#fast-create-btn").bind("click", function () {
            var fastCreateTaskName = $("#fast-create-task-name").val();

            $.post("{{ action('User\Task\TaskController@postFastCreate') }}",
                    {
                        name: fastCreateTaskName
                    },
                    function (data, status) {
                        if (status == "success") {
                            location.reload();
                        }
                    }
            );
        });

        // 创建模块
        $('#create-module-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var projectId = button.attr("data-project-id");

            $(this).find('[name="project_id"]').val(projectId);
        });

        $("#module-create-btn").bind('click', function () {
            $("#module-create-from").submit();
        });
        $('#module-create-from').bind("submit", function (e) {
            e.preventDefault();
            var $this = $(this);
            var data = $this.serialize();
            if($this.attr("method") == 'post'){
                $.post( $this.attr("href"),
                        data,
                        function (data, status) {
                            if (status == "success") {
                                location.reload();
                            }
                        }
                );
            }

        });

        $(".task-list").bind('click', function() {
            location.href = $(this).attr("data-href");
        });
    </script>
@endsection