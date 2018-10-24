@extends("layouts.main")

@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="用户" name="name" value="{{$user->name}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">余额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="余额" name="moeny" value="{{$user->money}}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">套餐</label>
            <div class="col-sm-10">
                <select name="id" id="" class="form-control">
                    <option value=""> --请选择套餐--</option>
                    @foreach($tc as $t)
                        <option value="{{$t->id}}">{{$t->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">购买</button>
            </div>
        </div>
    </form>

@endsection
