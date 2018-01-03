@extends('layouts.public')

@section('bodyattr')class="gray-bg"@endsection

@section('body')

    <div class="wrapper wrapper-content">

        <div class="row m-b">
            <div class="col-sm-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{url('/admin/setting/adminusers')}}">管理员列表</a></li>
                        <li><a href="{{url('/admin/setting/adminusers/add')}}">添加管理员</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <form role="form" class="form-inline" method="get">
                            <div class="form-group">
                                <label class="sr-only">用户名</label>
                                <input type="text" name="username" placeholder="用户名" class="form-control" value="{{request('username')}}">
                            </div>
                            &nbsp;&nbsp;
                            <div class="form-group">
                                <label>注册时间</label>
                                <input placeholder="开始日期" class="form-control layer-date laydate-icon" id="start" type="text" name="created_at_from" value="{{request('created_at_from')}}"
                                       style="width: 140px;">
                                ~ <input placeholder="结束日期" class="form-control layer-date laydate-icon" id="end" type="text" name="created_at_to" value="{{request('created_at_to')}}"
                                         style="width: 140px;">
                            </div>
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">搜索</button>
                            <button type="button" class="btn btn-white" onclick="location.href='{{url('/admin/setting/adminusers')}}'">重置</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable">
                            <thead>
                            <tr role="row">
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>姓名</th>
                                <th class="sorting" orderby="created_at">注册时间</th>
                                <th class="sorting" orderby="updated_at">最后登录时间</th>
                                <th>最后登录IP</th>
                                <th>角色</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tr class="gradeA">
                                    <td>{{$user['uid']}}</td>
                                    <td>{{$user['username']}}</td>
                                    <td>{{$user['nickname']}}</td>
                                    <td>{{$user['created_at']}}</td>
                                    <td>{{$user['updated_at']}}</td>
                                    <td>{{$user['lastloginip']}}</td>
                                    <th>{{$user['groupname']}}</th>
                                    <td>
                                        @if($user->uid != 1)
                                        <a href="{{url('/admin/setting/adminusers/edit/' . $user['uid'])}}">编辑</a>
                                        | <a class="ajaxBtn" href="javascript:void(0);" uri="{{url('/admin/setting/adminusers/delete/' . $user['uid'])}}" msg="是否删除该用户？">删除</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="col-sm-12">
                                <div>共 {{ $users->total() }} 条记录</div>
                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{cdn('js/plugins/laydate/laydate.js')}}"></script>
    <script type="text/javascript">
        var start = {
            elem: "#start", format: "YYYY-MM-DD", max: laydate.now(),
            isclear: false,
            istoday: false,
            issure: false,
            choose: function (datas) {
                end.min = datas;
                end.start = datas;
            }
        };
        var end = {
            elem: "#end", format: "YYYY-MM-DD", max: laydate.now(),
            isclear: false,
            istoday: false,
            issure: false,
            choose: function (datas) {
                start.max = datas
            }
        };
        laydate(start);
        laydate(end);
    </script>
@endsection
