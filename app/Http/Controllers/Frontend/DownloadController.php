<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPoint;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function index($type, $item)
    {
        $user = Auth::guard('web')->user();
        $account_type = $user->account_type;
        switch ($account_type) {
            case 'camera':

               return $this->contractType($type, $item);

                break;
            
            default:
                $data = Structure::where(['user_id'=> $user->id, 'type'=> $type, 'id'=> $item])->first();
                if(!$data){
                    flash("لا يمكنك الولوج لهذه الصفحة");
                    return redirect()->route('index', ['type'=> $type]);
                }
                $title = $this->getTitle($type);
                return $this->handler($user, $data, $title, "pdf.structure");
                break;
        }
    }


    public function contractType($type, $item)
    {
        $user = Auth::guard('web')->user();
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            $data = ContractPoint::where(['user_id'=> $user->id, 'type'=> $type, 'id'=> $item])->with("user")->first();
            if(!$data){
                flash("لا يمكنك الولوج لهذه الصفحة");
                return redirect()->route('index', ['type'=> $type]);
            }
            $title = $this->getTitle($type);
            return $this->handler($user, $data, $title, "pdf.contract2", "pdf.contract_header");

        }else{
            $data = Contract::where(['user_id'=> $user->id, 'type'=> $type, 'id'=> $item])->with('items')->first();
            if(!$data){
                flash("لا يمكنك الولوج لهذه الصفحة");
                return redirect()->route('index', ['type'=> $type]);
            }
            $title = $this->getTitle($type);

            return $this->handler($user, $data, $title, "pdf.contract", "pdf.contract_header");
        }
    }

    public function handler($user, $data, $title, $view= "pdf.contract", $header = null)
    {
        
        $mpdf = new \Mpdf\Mpdf([
            'mode'          => 'utf-8',
            'format'        => 'A4',
            'default_font_size' => 10,
            'default_font'  => 'xbriyaz',
            'setAutoTopMargin'   => "stretch",
            "margin_top"=> 2,
            "margin_header"=> 2,
            'orientation'   => 'P',
        ]);

        if($header != null){
            $header_html = view($header, compact('user', 'data'))->render();
            $mpdf->SetHTMLHeader($header_html);
        }

        $view = view($view, compact('user', 'data', 'title'));
        $html = $view->render();        
       
        $mpdf->SetFooter('|{PAGENO} of {nbpg}|');
        $mpdf->WriteHTML($html);
        $mpdf->Output(time().".pdf", "D"); 
    }

    public function getTitle($type)
    {
        switch ($type) {
            case 'inst_scen':
                return "مشهد تركيب";
                break;
            case 'insp_scen':
                return "مشهد معاينة";
                break;
            case 'inst_cont':
                return "عقد تركيب النظام الامني";
                break;
            case 'insp_cont':
                return "عقد معاينة النظام الامني";
                break;
        }
        return "مشهد انجاز";
    }
}
