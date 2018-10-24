@extends("layouts.main")
@section("title","首页")
@section("content")

{{--    <a href="{{route("meal.add")}}" class="btn btn-success">添加</a>--}}

    <table class="table">
        <tr>
            <th>Id</th>
            <th>用户名</th>
            <th>套餐名</th>
            <th>消费金额</th>
            <th>消费日期</th>
        </tr>
        @foreach($records as $record)
            <tr>
                <td>{{$record->id}}</td>
                <td>{{$record->name}}</td>
                <td>{{$record->tname}}</td>
                <td>{{$record->money}}</td>
                <td>{{$record->updated_at}}</td>
                <td>
                    {{--<a href="{{route("meal.edit",$record->id)}}" class="btn btn-success">编辑</a>--}}
                    {{--<a href="{{route("meal.del",$record->id)}}" class="btn btn-danger">删除</a>--}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection

