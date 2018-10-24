@extends("layouts.main")

@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">套餐名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="套餐名" name="name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="这个套餐的金额" name="money">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">添加</button>
            </div>
        </div>
    </form>

@endsection
