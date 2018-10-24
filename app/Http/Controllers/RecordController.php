<?php

namespace App\Http\Controllers;

use App\Models\record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class RecordController extends Controller
{
    //
    public function index(Request $request,$id)
    {
        //1.找到所有
        $records = DB::select('select * from records where uId = :id',[':id'=>$id]);
        if (!$records){
            return redirect()->route("admin.user")->with("info","暂无记录");
        }
//        $records = DB::table('records');
        //2. 显示并传递数据
        return view("record.index",compact('records'));
    }

    public function del($id)
    {
        $record=record::findOrFail($id);
//        dd($record);
        $record->delete($id);
        return redirect()->intended(route("record.index",$record["uId"]))->with("success","删除成功");
    }
}
