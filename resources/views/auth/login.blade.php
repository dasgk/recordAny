@extends('layouts.public')

@section('title', '登录')
<link rel="stylesheet" href="{{cdn('css/login.css'.$_static_update)}}">
@section('body')
    <div style="margin-top:166px;">
        <div class="aw-login-box">
            <div class="mod-body clearfix">
                <div class="content pull-left">
                    <h2>点滴记录网  </h2>
                    <form id="login_form" method="post"  action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <ul style="list-style:none;margin-top:51px">
                            <li>
                                <input type="text" name="username" class="form-control" placeholder="手机/邮箱/用户名"
                                       required="" value="{{ old('username') }}"/>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                     <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </li>
                            <li>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" class="form-control" placeholder="密码"
                                           required="">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </li>
                            <li class="last">
                                <button type="submit" class="pull-right btn btn-large btn-primary">登 录</button>
                                <label>
                                    <input type="checkbox" value="1" name="remember">
                                    记住我							</label>
                                <a href="{{ url('/password/reset') }}">忘记密码了？</a>
                            </li>
                        </ul>
                    </form>
                </div>

                    <div class="side-bar pull-left">
                        <h3>第三方账号登录</h3>
                        <a href="http://wenda.ghostchina.com/account/openid/sina/" class="btn btn-block btn-weibo"><i
                                    class="icon icon-weibo"></i> 新浪微博登录</a>
                        <a href="http://wenda.ghostchina.com/account/openid/qq_login/" class="btn btn-block btn-qq"> <i
                                    class="icon icon-qq"></i> QQ登录</a>
                    </div>

            </div>
        </div>
    </div>
@endsection
