<?php

namespace App\Http\Controllers;

use App\Models\meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    //
    public function index()
    {
        //1.找到所有
        $meals=meal::all();
        //2. 显示并传递数据
        return view("meal.index",compact('meals'));
    }

    public function edit(Request $request,$id)
    {
        $meal = meal::find($id);
        if ($request->isMethod("post")){
//            dd($request->post());
            $data = $this->validate($request,[
                "name"=>"required",
                "money"=>"required|numeric|min:1"
            ]);
//            dd($data);
            $meal->update($data);
            return redirect()->intended(route("meal.index"))->with("success","修改成功");
        }
        return view("meal.edit",compact("meal"));
    }

    public function del($id)
    {
        //如果没有找到，会友好提示
        $meal=meal::findOrFail($id);
        $meal->delete($id);
        return redirect()->route("meal.index")->with("success","删除成功");
    }

    public function add(Request $request)
    {
        if ($request->isMethod("post")){
            $data = $this->validate($request,[
                "name"=>"required",
                "money"=>"required|numeric|min:1"
            ]);
            meal::create($data);
            return redirect()->route("meal.index")->with("success","添加成功");
        }
        return view("meal.add");
    }
}
