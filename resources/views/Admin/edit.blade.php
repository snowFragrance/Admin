@extends("layouts.main")

@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="用户名" name="name" value="{{$admin->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="{{$admin->password}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </div>
    </form>

@endsection
