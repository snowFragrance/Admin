@extends("layouts.main")
@section("title","套餐编辑")
@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">套餐名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="套餐名" name="name" value="{{$meal->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="套餐金额" name="money" value="{{$meal->money}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </div>
    </form>

@endsection
