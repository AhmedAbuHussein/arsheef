<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data = Contract::where(['id'=>$item, 'type'=> $type, 'user_id'=> $user->id])->first();
        if(!$data){
            flash("غير مسموح الولوج لهذا العنصر");
            return redirect()->route('index', ['type'=> $type]);
        }
        return view('frontend.camera.edit', compact('data', 'type'));
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
       ]);
       $user = Auth::guard('web')->user();
      $data = Contract::where(['id'=> $item, 'user_id'=> $user->id])->first();
      if(!$data){
        flash("غير مسموح التعديل علي هذا العنصر");
        return redirect()->route('index', ['type'=> $type]);
      }
      $data->update($request->except('_token'));
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
