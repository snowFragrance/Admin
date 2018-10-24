@extends("layouts.main")
@section("title","首页")
@section("content")

    <a href="{{route("meal.add")}}" class="btn btn-success">添加</a>

    <table class="table">
        <tr>
            <th>Id</th>
            <th>套餐名</th>
            <th>金额</th>
            <th>操作</th>
        </tr>
        @foreach($meals as $meal)
            <tr>
                <td>{{$meal->id}}</td>
                <td>{{$meal->name}}</td>
                <td>{{$meal->money}}</td>
                <td>
                    <a href="{{route("meal.edit",$meal->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route("meal.del",$meal->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

