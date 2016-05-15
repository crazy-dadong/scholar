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
                用户管理
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
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    设置用户类型 <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a id="set-admin-btn" href="#">管理账户</a></li>
                                    <li><a id="set-normal-btn" href="#">普通账户</a></li>
                                    <li><a id="set-ban-btn" href="#">禁用</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>账户类型</th>
                                    <th>注册时间</th>
                                    <th>更新时间</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr class="table-tr" data-user-id="{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(empty($user->deleted_at))
                                                @if($user->is_admin == 1)
                                                    管理账户
                                                @else
                                                    普通账户
                                                @endif
                                            @else
                                                禁用账户
                                            @endif

                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
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
                                        第 {{ $users->currentPage() }} 页/共 {{ $users->lastPage() }} 页
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    {!! $users->render() !!}
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var getSelectTr = function () {

            var users = $(".table-bordered .info");
            var usersId = [];
            for(var i = 0; i < users.length; i++){
                usersId.push($(users[i]).attr('data-user-id'));
            }
            return usersId;
        };

        $(".table-tr").bind('click', function () {
            if($(this).prop('class').indexOf('info') == -1){
                $(this).addClass('info');
            }else{
                $(this).removeClass('info');
            }
        });

        $("#set-admin-btn").bind('click', function () {
            var usersId = getSelectTr();
            $.post("{{ action('Admin\User\IndexController@postUserAdmin') }}",
                    {
                        users_id: usersId
                    },
                    function (data, status) {
                        if (status == "success") {
                            location.reload();
                        }
                    }
            );
        });

        $("#set-normal-btn").bind('click', function () {
            var usersId = getSelectTr();
            $.post("{{ action('Admin\User\IndexController@postUserNormal') }}",
                    {
                        users_id: usersId
                    },
                    function (data, status) {
                        if (status == "success") {
                            location.reload();
                        }
                    }
            );
        });

        $("#set-ban-btn").bind('click', function () {
            var usersId = getSelectTr();
            $.post("{{ action('Admin\User\IndexController@postUserBan') }}",
                    {
                        users_id: usersId
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
