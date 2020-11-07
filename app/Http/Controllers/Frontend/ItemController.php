<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Item;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index($type, $item)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->itemCamera($type, $item);
                break;
            case 'safety':
                return $this->itemSafety($type, $item);
                break;
            default:
                return $this->itemConsultation($type, $item);
                break;
        }
    }

    private function itemCamera($type, $parent)
    {
        $data = Item::where('contract_id', $parent)->get();
        return view('frontend.camera.items.index', compact('data', 'type', 'parent'));
    }
    private function itemSafety($type, $parent)
    {
        $data = Item::where('contract_id', $parent)->get();
        return view('frontend.camera.items.index', compact('data', 'type', 'parent'));
    }
    private function itemConsultation($type, $parent)
    {
        $data = Structure::findOrFail($parent)->details;
        return view('frontend.consultation.items.index', compact('data', 'type', 'parent'));
    }


    public function create($type, $parent)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->itemCreateCamera($type, $parent);
                break;
            case 'safety':
                return $this->itemCreateSafety($type, $parent);
                break;
            default:
                return $this->itemCreateConsultation($type, $parent);
                break;
        }
    }

    public function show($type, $parent, $item)
    {
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
                $parent = Contract::findOrFail($parent);
                $item = Item::where(['user_id'=> $user->id, 'contract_id'=> $parent->id, 'id'=> $item])->first();
                return view('frontend.camera.items.show', compact('type', 'parent', 'item'));
                break;
            case 'safety':
                return $this->itemCreateSafety($type, $parent);
                break;
            default:
                return $this->itemCreateConsultation($type, $parent);
                break;
        }
    }

    private function itemCreateCamera($type, $parent)
    {
        return view('frontend.camera.items.create', compact('type', 'parent'));
    }
    


    public function store(Request $request, $type, $parent)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->itemStoreCamera($request, $type, $parent);
                break;
            case 'safety':
                return $this->itemStoreSafety($request, $type, $parent);
                break;
            default:
                return $this->itemStoreConsultation($request, $type, $parent);
                break;
        }
    }

    private function itemStoreCamera(Request $request, $type, $parent)
    {
        $this->validate($request, [
            'type'=> 'required|string',
            'contract_id'=> 'required|numeric|exists:contracts,id',
            'name'=> 'required|string',
            'quantity'=> 'required|numeric',
            'details'=> 'required|string',
            'modal'=> 'required|string',
            'storage'=> 'nullable|string',
            'other'=> 'nullable|string',
        ]);
       
        $data = $request->except('_token');
        $data['user_id'] = Auth::guard('web')->user()->id;
        Item::create($data);
        $contract = Contract::find($parent);
        flash("تم اضافة عنصر جديد الي العقد {$contract->owner}")->success();
        return redirect()->route('items', ['type'=> $type, 'parent'=> $parent]);
    }


    # edit 
    public function edit($type, $parent, $item)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->itemEditCamera($type, $parent, $item);
                break;
            case 'safety':
                return $this->itemEditSafety($type, $parent, $item);
                break;
            default:
                return $this->itemEditConsultation($type, $parent, $item);
                break;
        }
    }

    private function itemEditCamera($type, $parent, $item)
    {
        $user = Auth::guard('web')->user();
        $item = Item::where(['contract_id'=> $parent, 'id'=> $item, 'user_id'=> $user->id])->first();
        if($item){
            return view('frontend.camera.items.edit', compact('type', 'parent', 'item'));
        }
        flash("لا يمكنك الولوج لهذا العنصر")->error();
        return redirect()->route('home');
    }
    


    public function update(Request $request, $type, $parent, $item)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->itemUpdateCamera($request, $type, $parent, $item);
                break;
            case 'safety':
                return $this->itemUpdateSafety($request, $type, $parent, $item);
                break;
            default:
                return $this->itemUpdateConsultation($request, $type, $parent, $item);
                break;
        }
    }

    private function itemUpdateCamera(Request $request, $type, $parent, $item)
    {
        $this->validate($request, [
            'type'=> 'required|string',
            'contract_id'=> 'required|numeric|exists:contracts,id',
            'name'=> 'required|string',
            'quantity'=> 'required|numeric',
            'details'=> 'required|string',
            'modal'=> 'required|string',
            'storage'=> 'nullable|string',
            'other'=> 'nullable|string',
        ]);
        $user = Auth::guard('web')->user();
        $updatedItem = Item::where(['contract_id'=> $parent, 'id'=> $item, 'user_id'=> $user->id])->first();
        if($updatedItem){
            $data = $request->except('_token');
            $updatedItem->update($data);
            $contract = Contract::find($parent);
            flash("تم تعديل عنصر من عتقد  {$contract->owner}")->success();
            return redirect()->route('items', ['type'=> $type, 'parent'=> $parent]);
        }
        flash("لا يمكنك الولوج لهذا العنصر")->error();
        return redirect()->route('home');
    }



    public function destroy($type, $parent, $item)
    {
        $user = Auth::guard('web')->user();
        $updatedItem = Item::where(['contract_id'=> $parent, 'id'=> $item, 'user_id'=> $user->id])->first();
        if($updatedItem){
            $title = $updatedItem->name;
            $updatedItem->delete();
            $contract = Contract::find($parent);
            flash("تم حذف ({$title}) من عقد {$contract->owner}")->success();
            return redirect()->route('items', ['type'=> $type, 'parent'=> $parent]);
        }
        flash("لا يمكنك الولوج لهذا العنصر")->error();
        return redirect()->route('home');
    }

}
