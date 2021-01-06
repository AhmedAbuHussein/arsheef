<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPoint;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
                $items = Contract::where(['user_id'=> $user->id])->get();
                break;
            case 'safety':
                $items = Contract::where(['user_id'=> $user->id])->get();
                break;
            default:
                $items = Structure::where(['user_id'=> $user->id])->get();
                break;
        }
        
        return view('frontend.index', compact('items'));
    }

    public function index($type)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':
                return $this->indexCamera($type);
                break;
            case 'safety':
                    return $this->indexSafety($type);
                    break;
            default:
            return $this->indexConsultation($type);
                break;
        }
    }

    private function indexCamera($type)
    {
        $user = Auth::guard('web')->user();
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            $items = ContractPoint::where(['user_id'=> $user->id, 'type'=> $type])->get();
        }else{
            $items = Contract::where(['user_id'=> $user->id, 'type'=> $type])->get();
        }

        return view('frontend.camera.index', compact('items', 'type'));
    }

    private function indexSafety($type)
    {
        $user = Auth::guard('web')->user();
        $items = Contract::where(['user_id'=> $user->id, 'type'=> $type])->get();
        return view('frontend.safety.index', compact('items', 'type'));
    }

    private function indexConsultation($type)
    {
        $user = Auth::guard('web')->user();
        $items = Structure::where(['user_id'=> $user->id, 'type'=> $type])->get();
        return view('frontend.consultation.index', compact('items', 'type'));
    }

    public function destroy($type, $item)
    {
        $user = Auth::guard('web')->user();
        switch ($user->account_type) {
            case 'camera':
               $this->deleteCamera($type, $item);
                break;
            case 'safety':
                flash("لم يتم اضفاه هذه الفئه بعد");
                break;
            default:
                $item = Structure::where(['id'=> $item, 'type'=>$type, 'user_id'=>$user->id])->first();
                if(!$item){
                    flash("لا يمكنك حذف هذا العنصر")->error();
                    return redirect()->back();
                }
                for ($i=1; $i < 5; $i++) { 
                    if($item->{"attach_$i"}){
                        deleteFileFromStorage($item->{"attach_$i"});
                    }
                }
                $item->delete();
                flash("تم حذف العقد بنجاح")->success();
                break;
        }
        return redirect()->back();
    }

    public function deleteCamera($type, $item)
    {
        $user = Auth::guard('web')->user();
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            $item = ContractPoint::where(['id'=> $item, 'type'=>$type, 'user_id'=>$user->id])->first();
            if(!$item){
                flash("لا يمكنك حذف هذا العنصر")->error();
                return redirect()->back();
            }
            $item->delete();
        }else{
            $item = Contract::where(['id'=> $item, 'type'=>$type, 'user_id'=>$user->id])->first();
            if(!$item){
                flash("لا يمكنك حذف هذا العنصر")->error();
                return redirect()->back();
            }
            for ($i=1; $i < 5; $i++) { 
                if($item->{"attach_$i"}){
                    deleteFileFromStorage($item->{"attach_$i"});
                }
            }
            $item->delete();
        }
        flash("تم حذف العقد بنجاح")->success();
    }
}
