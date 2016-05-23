@extends('layout.user')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/plugins/cropper/dist/cropper.min.css') }}">
@endsection


@section('content-wrapper')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            用户设置
            <small>基本设置</small>
        </h1>
        {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li class="active">Dashboard</li>--}}
        {{--</ol>--}}
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">头像
                            <small>选择一张个人正面照片作为头像，让其他成员更容易认识你。</small>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3"
                                           placeholder="Password">
                                    <input id="file" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <img id="image" src="/avatar/avatar.png">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Sign in</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                    <div class="img-preview preview-lg" style="overflow: hidden; max-height: 120px; max-width: 120px;">
                        <img src="/avatar/avatar.png">
                    </div>
                    <button id="get-cropper-data" type="submit" class="btn btn-default">获取图片信息</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('/plugins/cropper/dist/cropper.min.js') }}"></script>
    <script type="text/javascript">
        //        $.fn.cropper.setDefaults({
        //
        //        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#get-cropper-data").bind("click", function () {

            var $image = $("#image");
            var data = $image.cropper('getData');
            $.get("{{ action('User\Settings\IndexController@getImg') }}", data);
        });
        $("#file").bind("change", function () {
            var $this = $(this);
            console.log($this.val());
            var $image = $('#image');
            $image.prop('src', $this.val());
            $image.cropper({
                aspectRatio: 1,
                viewMode: 1,
                preview: '.img-preview',
                crop: function (e) {
//                showImg.css("width: 328.889px; height: 185px; min-width: 0px !important; min-height: 0px !important; max-width: none !important; max-height: none !important; margin-left: -116.507px; margin-top: -0.19392px; transform: rotate(0deg) scale(1, 1);");
                    // Output the result data for cropping image.
//                console.log(e.x);
//                console.log(e.y);
//                console.log(e.width);
//                console.log(e.height);
//                console.log(e.rotate);
//                console.log(e.scaleX);
//                console.log(e.scaleY);
//                console.log($(this).cropper('getData'));
                }
            });
        });
    </script>
@endsection
