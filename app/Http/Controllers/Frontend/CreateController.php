<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPoint;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{

    public function create($type)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->createCamera($type);
                break;
            case 'safety':
                return $this->createSafety($type);
                break;
            default:
            return $this->createConsultation($type);
                break;
        }
    }

    private function createCamera($type)
    {
        switch($type){
            case "inst_cont":
                 return view('frontend.camera.inst_create', compact('type'));
                break;
            case "insp_cont":
                 return view('frontend.camera.inst_create', compact('type'));
                break;

            case "inst_scen":
                return view('frontend.camera.create', compact('type'));
                    break;
            case "insp_scen":
                return view('frontend.camera.create', compact('type'));
                break;
        }
        abort(404);
    }

    private function createSafety($type)
    {
        return view('frontend.safety.create', compact('type'));
    }

     private function createConsultation($type)
    {
        return view('frontend.consultation.create', compact('type'));
    }

    public function store(Request $request, $type)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->storeCamera($request, $type);
                break;
            case 'safety':
                    return $this->storeSafety($request, $type);
                    break;
            default:
            return $this->storeConsultation($request, $type);
                break;
        }
    }

    private function storeCamera(Request $request, $type)
    {
        switch($type){
            case "inst_cont":
                return $this->createContCont($request, $type);
                break;
            case "insp_cont":
                return $this->createContCont($request, $type);
                break;

            case "inst_scen":
                return $this->createScenCont($request, $type);
                    break;
            case "insp_scen":
                return $this->createScenCont($request, $type);
                break;
        }
        abort(404);
    }

    public function createContCont(Request $request, $type)
    {

        $this->validate($request, [
            'type'=> 'required|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'username'=> 'required|string|min:2|max:255',
            'est_name'=> 'required|string|max:255',
            'date'=> 'required|string|date_format:Y-m-d H:i',
            'start_date'=> 'required|string|date_format:Y-m-d H:i',
            'total_cost'=> 'required|numeric',
            'working_days'=> 'required|numeric',
            'inside_camera'=> 'required|numeric',
            'outside_camera'=> 'required|numeric',
            "receiver"=> "required|string",
        ]);
        $user = Auth::guard('web')->user();
        $data = $request->except(['_token']);
        $data['user_id']= $user->id;
        ContractPoint::create($data);
        flash('تم اضافة عقد جديد');
        return redirect()->route('index', ['type'=> $type]);

    }

    public function createScenCont(Request $request, $type)
    {

        $this->validate($request, [
            'type'=> 'required|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'owner'=> 'required|string|min:3|max:255',
            'phone'=> 'required|min:6|numeric',
            'date'=> 'required|string|date_format:Y-m-d H:i',
            'city'=> 'required|string|min:3',
            'street'=> 'required|string|min:3',
            'neignborhood'=> 'required|string|min:3',
            'building_no'=> 'required|numeric',
            'second_no'=> 'required|numeric',
            'postal_code'=> 'required|numeric',
            "commerical_register"=> 'required|numeric',
            "items"=> "nullable|array",
            "items.*.name"=>"required|string",
            "items.*.quantity"=>"required|numeric",
            "items.*.type"=>"required|string",
            "items.*.details"=>"required|string",
            "items.*.modal"=>"nullable|string",
            "items.*.storage"=>"nullable|string",
            "receiver"=> "required|string",
            'attach_1'=> 'nullable|file',
            'attach_2'=> 'nullable|file',
        ]);
        $user = Auth::guard('web')->user();
        $data = $request->except(['_token', 'attach_1', 'attach_2', 'items']);
        if($request->hasFile('attach_1')){
            $name = uploadImage('attach_1', 'images/files');
            $data['attach_1'] = $name;
        }
        if($request->hasFile('attach_2')){
            $name = uploadImage('attach_2', 'images/files');
            $data['attach_2'] = $name;
        }
        $data['user_id']= $user->id;
        $contract = Contract::create($data);
        foreach ($request->items as $item) {
            $item['user_id'] = $user->id;
            $contract->items()->create($item);
        }

        flash('تم اضافة عقد جديد');
        return redirect()->route('index', ['type'=> $type]);
    }


    private function storeConsultation(Request $request, $type)
    {
        $this->validate($request, [
            'type'=> 'required|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'owner'=> 'required|string|min:3|max:255',
            'building_name'=> 'required|string',
            'date'=> 'required|string|date_format:Y-m-d H:i',
            'city'=> 'required|string|min:3',
            'street'=> 'required|string|min:3',
            'neignborhood'=> 'required|string|min:3',
            'building_no'=> 'required|numeric',
            "receiver"=> "required|string",
            "items"=> "nullable|array",
            "items.*.name"=>"required|string",
            "items.*.quantity"=>"required|numeric",
            "items.*.type"=>"required|string",
            "items.*.details"=>"required|string",
            "items.*.modal"=>"nullable|string",
            "items.*.storage"=>"nullable|string",
            'attach_1'=> 'nullable|image|mimes:jpeg,jpg,png,gif',
            'attach_2'=> 'nullable|file',
            'attach_3'=> 'nullable|file',
        ]);
        $user = Auth::guard('web')->user();
        $data = $request->except(['_token', 'attach_1', 'attach_2', 'attach_3']);

        if($request->hasFile('attach_1')){
            $name = uploadImage('attach_1', 'images/structure');
            $data['attach_1'] = $name;
        }

        if($request->hasFile('attach_2')){
            $name = uploadImage('attach_2', 'images/structure');
            $data['attach_2'] = $name;
        }

        if($request->hasFile('attach_3')){
            $name = uploadImage('attach_3', 'images/structure');
            $data['attach_3'] = $name;
        }

        $data['user_id']= $user->id;
        $structure = Structure::create($data);
        flash('تم اضافة عقد جديد');
        return redirect()->route('index', ['type'=> $type]);
    }


    public function attachShow($type, $parent, $file)
    {
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
                $item = Contract::where(['user_id'=> $user->id, 'id'=> $parent, 'type'=> $type])->first();
                if(!$item) abort(404);
                $oldFile = $item->{"attach_$file"};
                return view('frontend.camera.attach', compact('type', 'parent', 'file', 'oldFile'));
                break;
            case 'safety':
                break;
            default:
                $item = Structure::where(['user_id'=> $user->id, 'id'=> $parent, 'type'=> $type])->first();
                if(!$item) abort(404);
                $oldFile = $item->{"attach_$file"};
                return view('frontend.consultation.attach', compact('type', 'parent', 'file', 'oldFile'));
                break;
        }
    }


    public function uploadFile(Request $request, $type, $parent, $file)
    {
        $this->validate($request, [
            "attach_$file"=> 'required|file'
        ]);
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
                $item = Contract::where(['user_id'=> $user->id, 'id'=> $parent, 'type'=> $type])->first();
                if(!$item) abort(404);
                $oldFile = $item->{"attach_$file"};
                if($request->has("attach_$file")){
                    $name = uploadImage("attach_$file", "images/files", $oldFile);
                }
                $item->update([
                    "attach_$file"=> $name
                ]);
                break;
            case 'safety':
                break;
            default:
                $item = Structure::where(['user_id'=> $user->id, 'id'=> $parent, 'type'=> $type])->first();
                if(!$item) abort(404);
                $oldFile = $item->{"attach_$file"};
                if($request->has("attach_$file")){
                    $name = uploadImage("attach_$file", "images/structure", $oldFile);
                }
                $item->update([
                    "attach_$file"=> $name
                ]);
                break;
        }
        flash("تـم الحاق الملف بنجاح")->success();
        return redirect()->route('index', ['type'=> $type]);
    }

}
