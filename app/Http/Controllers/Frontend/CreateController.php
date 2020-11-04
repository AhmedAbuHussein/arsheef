<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
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
        return view('frontend.camera.create', compact('type'));
    }
    private function createSafety($type)
    {
        return view('frontend.safety.create', compact('type'));
    }
     private function createConsultation($type)
    {
        return view('frontend.consultaion.create', compact('type'));
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
        $this->validate($request, [
            'type'=> 'required|in:inst_scen,inst_cont,insp_scen,insp_cont',
            'owner'=> 'required|string|min:3|max:255',
            'phone'=> 'required|min:6|numeric',
            'date'=> 'required|string|date_format:Y-m-d H:i',
            'city'=> 'required|string|min:3',
            'neignborhood'=> 'required|string|min:3',
            'building_no'=> 'required|numeric',
            'second_no'=> 'required|numeric',
            'postal_code'=> 'required|numeric',
            'second_no'=> 'required|numeric',
            'attach_1'=> 'nullable|file',
            'attach_2'=> 'nullable|file',
        ]);
        $user = Auth::guard('web')->user();
        $data = $request->except(['_token', 'attach_1', 'attach_2']);
        if($request->hasFile('attach_1')){
            $name = uploadImage('attach_1', 'images/files');
            $data['attach_1'] = $name;
        }
        if($request->hasFile('attach_2')){
            $name = uploadImage('attach_2', 'images/files');
            $data['attach_2'] = $name;
        }
        $data['user_id']= $user->id;
        Contract::create($data);
        flash('تم اضافة عقد جديد');
        return redirect()->route('index', ['type'=> $type]);
    }
    


}
