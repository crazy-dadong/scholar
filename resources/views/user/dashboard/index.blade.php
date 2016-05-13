@extends('layout.user')

@section('meta')
    <!--suppress JSUnresolvedFunction -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                <button id="" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="继续"
                                        data-original-title="继续">
                                    <i class="fa fa-play"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"
                                        data-toggle="tooltip"
                                        title="取消" data-original-title="取消">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            <p>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">工作</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
                                    <span class="label label-primary pull-right">12</span></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                            <li><a href="#"><i class="fa fa-filter"></i> Junk <span
                                            class="label label-warning pull-right">65</span></a>
                            </li>
                            <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">学习</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                            <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">


                <div class="input-group input-group-lg" style="margin-bottom: 20px">
                    <span class="input-group-addon">新任务</span>
                    <input id="fast-create-task-name" type="text" class="form-control" title="任务名称">
                    <div class="input-group-btn">
                        <button id="fast-create-btn" type="button" class="btn btn-primary"><i class="fa fa-flash"></i>
                        </button>
                        <a type="button" class="btn btn-primary">向导</a>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">任务单</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i
                                                class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>任务名称</th>
                                <th>开始日期</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->plan_started_at }}</td>
                                    <td><span class="label label-success">待执行</span></td>
                                    <td>
                                        <a href="{{ URL::action('User\Task\WorkController@getIndex', ['task_id' => $task->id]) }}"
                                           class="btn btn-primary btn-sm">执行</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        {!! $tasks->render() !!}
                    </div>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
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
    </script>
@endsection