@extends("layouts.main")
@section("title","首页")
@section("content")
    <a href="{{route("admin.userAdd")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>姓名</th>
            <th>密码</th>
            <th>金额</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->money}}</td>
                <td>
                    <a href="{{route("admin.recharge",$user->id)}}" class="btn btn-success">充值</a>
                    <a href="{{route("admin.consume",$user->id)}}" class="btn btn-danger">消费</a>
                    <a href="{{route("admin.userEdit",$user->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route("admin.userDel",$user->id)}}" class="btn btn-danger">删除</a>
{{--                    <a href="{{route("admin.record",$user->id)}}" class="btn btn-success">消费记录</a>--}}
                    <a href="{{route("record.index",$user->id)}}" class="btn btn-success">消费记录</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

