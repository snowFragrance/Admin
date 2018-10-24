@extends("layouts.main")
@section("title","首页")
@section("content")

    <table class="table">
        <tr>
            <th>Id</th>
            <th>姓名</th>
            <th>密码</th>
            <th>金额</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->password}}</td>
                <td>{{$admin->money}}</td>
                <td>
                    <a href="{{route("admin.edit",$admin->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route("admin.del",$admin->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

