<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Record Anything You Want</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 230px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Record Anything You Want
        </div>

        <div class="links">
            @if (Auth::check())
                <a href="{{url("/article/show_new_record?p=c")}}">New Record</a>
            @else
                <a href="javascript:void(0)" onclick="showLoginPage()">Login</a>
            @endif
            <a href="{{url("/article/content?p=c")}}">Just Look</a>
        </div>
    </div>
</div>
<!-- 用户登录 Modal 开始****************-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:400px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-align:center">用户登录</h4>
            </div>

            <div class="form-inline" style="text-align:center"  method="post">
                <input type="hidden" name="p" value="c">

                <br>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon" style="height:45px">***</div>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="请输入手机号" required style="width:200px;height:45px">
                        <div class="input-group-addon">***</div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon" style="height:45px">***</div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码" required style="width:200px;height:45px">
                        <div class="input-group-addon">***</div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="input-group">
                     <label id="tips" style="color:red"></label>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <button  class="btn btn-primary" onclick="do_login();" style="width:277px;height:45px">登录</button>
                    </div>
                </div>
            </div>
            <br>
            <ul class="list-inline duoxuan" style="text-align: center">
                <li>没有账号？<a href="javascript:void(0)" onclick="showRegister();">立即注册</a></li>
                <li><a href="/user/login/forgot_password">忘记密码？</a></li>
            </ul>
            <br>
            <h4 class="text-center">第三方登录</h4>
            <div class="control-group">
                <div class="controls">
                    <ul class="list-inline qt-login">
                        <li><a class="dl-qq" href="/api/oauth/login/type/qq"> <!--<i class="fa fa-qq"></i>--></a></li>
                        <li><a class="dl-wb" href="/api/oauth/login/type/sina"><!--<i class="fa fa-weibo"></i>--></a></li>
                        <li><a class="dl-wx" href="/api/oauth/login/type/wx"><!--<i class="fa fa-weixin"></i>--></a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
            </div>
        </div>
    </div>
</div>
<!-- 用户登录 Modal 结束****************-->
<!-- 用户注册 Modal 开始****************-->
<div class="modal fade" id="registerModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:400px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="text-align:center">用户注册</h4>
            </div>

            <div class="form-inline" style="text-align:center" action="{{url('user/register')}}" method="post">
                <input type="hidden" name="p" value="c">

                <br>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon" style="height:45px">***</div>
                        <input type="text" class="form-control" id="register_user_name" name="register_user_name" placeholder="请输入手机号" required style="width:200px;height:45px">
                        <div class="input-group-addon">***</div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon" style="height:45px">***</div>
                        <input type="password" class="form-control" name="register_password" id="register_password" placeholder="请输入密码" required style="width:200px;height:45px">
                        <div class="input-group-addon">***</div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <label id="register_tips" style="color:red"></label>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <button  class="btn btn-primary" style="width:277px;height:45px" onclick="do_register()">注册</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
            </div>
        </div>
    </div>
</div>
<!-- 用户注册 Modal 结束****************-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
<script >
    function showLoginPage() {
        $('#myModal').modal('toggle');
        $("#tips").html('');
    }
    function showRegister() {
        $('#myModal').modal('hide');
        $('#registerModel').modal('toggle');
        $("#register_tips").html('');
    }
    function do_login() {
        $.ajax({
            type: "post",
            url: "{{url('/user/login?p=c')}}",
            async: false,
            data: {"user_name": $("#user_name").val(),"password":$("#password").val(),   "_token":"{{csrf_token()}}"},
            success: function (data) {
                if(data != 'success'){
                    $("#tips").html(data);
                    return;
                }
               alert('登陆成功');
            }
        });
    }

    function do_register() {
        $.ajax({
            type: "post",
            url: "{{url('/user/register?p=c')}}",
            async: false,
            data: {"register_user_name": $("#register_user_name").val(),"register_password":$("#register_password").val(),
                "_token":"{{csrf_token()}}"},
            success: function (data) {

                if(data != 'success'){
                    $("#register_tips").html(data);
                    return;
                }
                alert('注册成功');
            }
        });
    }
</script>
</body>
</html>
