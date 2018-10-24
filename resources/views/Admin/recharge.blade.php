@extends("layouts.main")

@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="用户名" name="name" value="{{$user->name}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">money</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="请输入充值金额" name="money" value="">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">充值</button>
            </div>
        </div>
    </form>

@endsection
