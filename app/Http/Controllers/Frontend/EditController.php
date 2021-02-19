<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPoint;
use App\Models\Item;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Contains;

class EditController extends Controller
{
    public function edit($type, $item)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->editCamera($type, $item);
                break;
            case 'safety':
                return $this->editSafety($type, $item);
                break;
            default:
                return $this->editConsultation($type, $item);
                break;
        }
    }

    public function update(Request $request, $type, $item)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->updateCamera($request, $type, $item);
                break;
            case 'safety':
                return $this->updateSafety($request, $type, $item);
                break;
            default:
                return $this->updateConsultation($request, $type, $item);
                break;
        }
    }

    # helper methods edit pages
    private function editCamera($type, $item)
    {
        $user = Auth::guard('web')->user();
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            $data = ContractPoint::where(['id'=>$item, 'type'=> $type, 'user_id'=> $user->id])->first();
            if(!$data){
                flash("غير مسموح الولوج لهذا العنصر");
                return redirect()->route('index', ['type'=> $type]);
            }
            return view('frontend.camera.inst_edit', compact('data', 'type'));
        }else{
            $data = Contract::where(['id'=>$item, 'type'=> $type, 'user_id'=> $user->id])->with('items')->first();
            if(!$data){
                flash("غير مسموح الولوج لهذا العنصر");
                return redirect()->route('index', ['type'=> $type]);
            }

            return view('frontend.camera.edit', compact('data', 'type'));
        }


    }

    private function editSafety($type, $item)
    {
        $user = Auth::guard('web')->user();
        $data = Contract::where(['id'=>$item, 'type'=> $type, 'user_id'=> $user->id])->first();
        if(!$data){
            flash("غير مسموح الولوج لهذا العنصر");
            return redirect()->route('index', ['type'=> $type]);
        }
        return view('frontend.safety.edit', compact('data', 'type'));
    }

    private function editConsultation($type, $item)
    {
        $user = Auth::guard('web')->user();
        $data = Structure::where(['id'=>$item, 'type'=> $type, 'user_id'=> $user->id])->first();
        if(!$data){
            flash("غير مسموح الولوج لهذا العنصر");
            return redirect()->route('index', ['type'=> $type]);
        }
        return view('frontend.consultation.edit', compact('data', 'type'));
    }


    #helper methods UPdate pages
    private function updateCamera(Request $request, $type, $item)
    {
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            return $this->createContCont($request, $type, $item);
        }else{
           return $this->updateInsCont($request, $type, $item);
        }
    }

    public function createContCont(Request $request, $type, $item)
    {

        $this->validate($request, [
            'type'=> 'required|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'username'=> 'required|string|min:2|max:255',
            'est_name'=> 'required|string|max:255',
            'date'=> 'required|string|date_format:Y-m-d H:i:s',
            'start_date'=> 'required|string|date_format:Y-m-d H:i:s',
            'total_cost'=> 'required|numeric',
            'working_days'=> 'required|numeric',
            'inside_camera'=> 'required|numeric',
            'outside_camera'=> 'required|numeric'
        ]);
        $user = Auth::guard('web')->user();
        $data = ContractPoint::where(['id'=> $item, 'user_id'=> $user->id])->first();
       if(!$data){
         flash("غير مسموح التعديل علي هذا العنصر");
         return redirect()->route('index', ['type'=> $type]);
       }
       $data->update($request->except('_token'));
       flash('تم تحديث البيانات بنجاح')->success();
       return redirect()->route('index', ['type'=> $type]);

    }

    public function updateInsCont(Request $request, $type, $item)
    {

        $this->validate($request, [
            'date'=> 'required|date_format:Y-m-d H:i',
            'owner'=> 'required|string|min:3',
            'city'=> 'required|string|min:3',
            'street'=> 'required|string|min:3',
            'neignborhood'=> 'required|string|min:3',
            'phone'=> 'required|string|min:6',
            'postal_code'=> 'required|numeric',
            'second_no'=> 'required|numeric',
            "commerical_register"=> 'required|numeric',
            'building_no'=> 'required|numeric',
            "items"=> "nullable|array",
            "items.*.name"=>"required|string",
            "items.*.quantity"=>"required|numeric",
            "items.*.type"=>"required|string",
            "items.*.details"=>"required|string",
            "items.*.modal"=>"nullable|string",
            "items.*.storage"=>"nullable|string",
        ]);
        $user = Auth::guard('web')->user();
       $data = Contract::where(['id'=> $item, 'user_id'=> $user->id])->first();
       if(!$data){
         flash("غير مسموح التعديل علي هذا العنصر");
         return redirect()->route('index', ['type'=> $type]);
       }
       $data->update($request->except('_token', 'items'));
       foreach ($request->items as $key=>$item) {
           Item::where('id', $key)->update($item);
       }
       flash('تم تحديث البيانات بنجاح')->success();
       return redirect()->route('index', ['type'=> $type]);
    }

    private function updateConsultation(Request $request, $type, $item)
    {
        $this->validate($request, [
            'date'=> 'required|date_format:Y-m-d H:i',
            'owner'=> 'required|string|min:3',
            'street'=> 'required|string|min:3',
            'city'=> 'required|string|min:3',
            'neignborhood'=> 'required|string|min:3',
            'building_name'=> 'required|string|min:3',
            'building_no'=> 'required|numeric',
            "items"=> "nullable|array",
            "items.*.name"=>"required|string",
            "items.*.quantity"=>"required|numeric",
            "items.*.type"=>"required|string",
            "items.*.details"=>"required|string",
            "items.*.modal"=>"nullable|string",
            "items.*.storage"=>"nullable|string",
            "attach_1"=> 'required|image|mimes:jpg,jpeg,png,gif,bmp'
        ]);
        $data = $request->except(['_token', 'attach_1']);
        $user = Auth::guard('web')->user();
        $updated =  Structure::where(['user_id'=> $user->id, 'id'=>$item])->first();
        if(!$updated) {
            flash("غير مسموح التعديل علي هذا العنصر");
            return redirect()->route('index', ['type'=> $type]);
          }
        if($request->hasFile('attach_1')){
            $old = public_path($updated->attach_1);
            $name = uploadImage('attach_1', 'images/structure', $old);
            $data['attach_1'] = $name;
        }
        $updated->update($data);
        flash('تم تحديث البيانات بنجاح')->success();
        return redirect()->route('index', ['type'=> $type]);
    }


}
