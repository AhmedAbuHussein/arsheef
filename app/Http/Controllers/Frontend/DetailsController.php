<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function index($type, $parent)
    {
        $user = Auth::guard('web')->user();
        $item = Structure::where(['id'=>$parent, 'type'=>$type, 'user_id'=> $user->id])->first();
        if(!$item){
            flash('غير مسموح لك بعرض هذا العنصر');
            return redirect()->route('index', ['type'=> $type]);
        }
        return view('frontend.consultation.details', compact('type', 'parent', 'item'));
    }

    public function update(Request $request,$type, $parent)
    {
        $this->validate($request, [
            'type'=>'required|string|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'details'=> 'required|string'
        ]);
        $user = Auth::guard('web')->user();
        $item = Structure::where(['user_id'=> $user->id, 'type'=> $type , 'id'=> $parent])->first();
        if(!$item){
            flash('غير مسموح لك بالتعديل علي هذا العنصر');
            return redirect()->route('index', ['type'=> $type]);
        }
        $item->update(['details'=> $request->details]);
        flash("تم تعديل التفاصيل بنجاح")->success();
        return redirect()->route('index', ['type'=>$type]);
    }
}
