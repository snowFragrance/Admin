<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\meal;
use App\Models\record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        //1.找到所有
        $admins=Admin::all();
        //2. 显示并传递数据
        return view("admin.index",compact('admins'));
    }

    public function reg(Request $request)
    {
        if ($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required"
            ]);
            $data['password'] = bcrypt($data['password']);
            Admin::create($data);
            return redirect()->route("admin.login")->with("success","注册成功");
        }
        return view("admin.reg");
    }

    public function edit(Request $request,$id)
    {
        $admin = Admin::find($id);
        $this->authorize('update', $admin);

        if ($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required"
            ]);
            $data['password'] = bcrypt($data['password']);
            $admin->update($data);
            return redirect()->intended(route("admin.index"))->with("success","修改成功");
        }
        return view("admin.edit",compact("admin"));
    }

    public function del($id)
    {
        //如果没有找到，会友好提示
        $admin=Admin::findOrFail($id);
        $admin->delete($id);
        return redirect()->route("admin.index")->with("success","删除成功");
    }

    public function login(Request $request)
    {
        //判断提交方式
        if ($request->isMethod("post")){
            //验证
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required"
            ]);

            //判断账号或密码是否正确
            if (Auth::guard("admin")->attempt($data,$request->has("remember"))){
                //跳转
                return redirect()->intended(route("admin.index"))->with("success","登录成功");
            }
//                dd($data);
                //3.返回失败
                return redirect()->back()->withInput()->with("danger","账号或密码错误");

        }
        //引入登录界面
        return view("admin.login");
    }

    public function logout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("admin.login");
    }

    public function user()
    {
        $users = User::all();
        return view("admin.user",compact("users"));
    }

    public function userAdd(Request $request)
    {
        if ($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required"
            ]);
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return redirect()->route("admin.user")->with("success","添加成功");
        }
        return view("admin.userAdd");
    }

    public function userEdit(Request $request,$id)
    {
        $user = User::find($id);
        if ($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "password"=>"required"
            ]);
            $data['password'] = bcrypt($data['password']);
            $user->update($data);
            return redirect()->route("admin.user")->with("success","修改成功");
        }
        return view("admin.userEdit",compact("user"));
    }

    public function userDel($id)
    {
        //如果没有找到，会友好提示
        $user=User::findOrFail($id);
        $user->delete($id);
        return redirect()->route("admin.user")->with("success","删除成功");
    }

    public function recharge(Request $request,$id)
    {
        $user = User::find($id);

        if ($request->isMethod("post")){
            $this->validate($request,[
                "money" => "required|integer|numeric|min:1",
            ]);
            DB::table('users')->where("id","$id")->increment('money',$request->post("money"));
            return redirect()->route("admin.user")->with("success","充值成功");
        }
        return view("admin.recharge",compact("user"));
    }

    public function consume(Request $request,$id)
    {
        $user = User::find($id);
        //得到所有套餐数据
        $tc = meal::all();
        if ($request->isMethod("post")){
//            dd($request->post());
            $meal = meal::find($request->post("id"));
//            dd();
            if ($meal["money"] > $user["money"]){
                return redirect()->route("admin.consume",$user["id"])->with("danger","余额不足");
            }
            DB::table('users')->where("id",$id)->decrement('money',$meal["money"]);
            $data["name"] = $user["name"];
            $data["tname"] = $meal["name"];
            $data["money"] = $meal["money"];
            $data["uId"] = $user["id"];
//            dd($data);
            record::create($data);
            return redirect()->route("admin.user")->with("success","消费成功");
        }
        return view("admin.consume",compact("user","tc"));
    }

    public function ar(Request $request,$id)
    {
        $admin = Admin::find($id);

        if ($request->isMethod("post")) {
            $this->validate($request, [
                "money" => "required|integer|numeric|min:1",
            ]);
            DB::table("admins")->where("id","$id")->increment("money",$request->post("money"));
            return redirect()->route("admin.index")->with("success","充值成功");
        }

        return view("admin.ar",compact("admin"));
    }

}
