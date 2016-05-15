@extends('layout.user')


@section('meta')
    <!--suppress JSUnresolvedFunction -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker-bs3.css">
@endsection

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            任务管理
            <small>创建任务</small>
        </h1>
        <ol class="breadcrumb">
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-8 col-sm-offset-2">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">创建任务</h3>
                    </div>
                    <div class="box-body">
                        <!-- Date range -->
                        <form action="#" method="post" class="{{ action('User\Task\TaskController@postCreate') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="name">任务名称</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="请输入任务名称">
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label for="description">任务描述</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="请输入任务内容"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="module_id">任务模块</label>
                                <select name="module_id" id="module_id" class="form-control">
                                    @foreach($modules as $module)
                                        <option @if($module->id == $defaultModuleId) selected="selected" @endif value="{{ $module->id }}">{{ $module->name }}</option>
                                    @endforeach
                                </select>
                                <!--<span class="select2 select2-container select2-container&#45;&#45;default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection&#45;&#45;single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-31to-container"><span class="select2-selection__rendered" id="select2-31to-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
                            </div>
                            <!-- Date and time range -->
                            <div class="form-group">
                                <label>时间范围</label>
                                <div class="input-group">
                                    <input id="plan_started_at" name="plan_started_at" type="datetime"
                                           class="form-control" title="计划开始日期" style="width: 50%">
                                    <input id="plan_end_at" name="plan_end_at" type="datetime" class="form-control"
                                           title="计划结束日期" style="width: 50%">

                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                            <i class="fa fa-calendar"></i> 时间选择
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- /.form group -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">创建</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        </div>
    </section>
@endsection

@section('js')

    <script src="/plugins/moment/min/moment-with-locales.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
        $('#daterange-btn').daterangepicker(
                {
                    "locale": {
                        "format": "MM/DD/YYYY",
                        "separator": " - ",
                        "applyLabel": "确认",
                        "cancelLabel": "取消",
                        "fromLabel": "开始",
                        "toLabel": "结束",
                        "customRangeLabel": "自定义",
                        "daysOfWeek": [
                            "日",
                            "一",
                            "二",
                            "三",
                            "四",
                            "五",
                            "六"
                        ],
                        "monthNames": [
                            "一月",
                            "二月",
                            "三月",
                            "四月",
                            "五月",
                            "六月",
                            "七月",
                            "八月",
                            "九月",
                            "十月",
                            "十一月",
                            "十二月"
                        ],
                        "firstDay": 1
                    },
                    timePicker: true,
                    ranges: {
                        '今天': [moment(), moment().endOf('day')],
                        '明天': [moment().add(1, 'days').startOf('day'), moment().add(1, 'days').endOf('day')],
                        '一周': [moment(), moment().add(1, 'weeks').endOf('day')],
                        '一月': [moment(), moment().add(1, 'months').endOf('day')]
                    }
                },
                function (start, end) {
                    $("#plan_started_at").val(start.format('YYYY-MM-D H:mm:s'));
                    $("#plan_end_at").val(end.format('YYYY-MM-D H:mm:s'));
                }
        );
    </script>
@endsection