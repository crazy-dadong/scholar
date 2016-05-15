@extends('layout.admin')

@section('css')
    <style type="text/css">
        .developer:after {
            content: '';
            display: block;
            clear: both;
        }
        .developer span{
            float: left;
            display: block;
            margin: 0 15px;
        }
    </style>
@endsection

@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            后台管理
            <small>控制面板</small>
        </h1>
        <ol class="breadcrumb">
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion-android-contacts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">用户数量</span>
                        <span class="info-box-number">{{ $userCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-pie-graph"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">项目数量</span>
                        <span class="info-box-number">{{ $projectCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-stats-bars"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">模块数量</span>
                        <span class="info-box-number">{{ $moduleCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion-compass"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">任务数量</span>
                        <span class="info-box-number">{{ $taskCount }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">系统信息</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr>
                                <td style="width: 20%;">操作系统</td>
                                <td>{{ php_uname('s') }}</td>

                            </tr>
                            <tr>
                                <td>PHP运行方式</td>
                                <td>{{ php_sapi_name() }}</td>

                            </tr>
                            <tr>
                                <td>当前进程用户名：</td>
                                <td>{{ Get_Current_User() }}</td>

                            </tr>
                            <tr>
                                <td>PHP版本</td>
                                <td>{{ PHP_VERSION }}</td>
                            </tr>
                            <tr>
                                <td>Zend版本</td>
                                <td>{{ Zend_Version() }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-user"></i>
                        <h3 class="box-title">贡献者</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body developer">
                            <span >刘兆平</span>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection