<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contract;
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
                $data = Contract::with('items')->findOrFail($item);
                $title = $this->getTitle($type);
                return $this->handler($user, $data, $title);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function handler($user, $data, $title)
    {
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 10,
            'default_font' => 'xbriyaz',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_header' => 6,
            'margin_footer' => 6,
            'orientation' => 'P',
        ]);
          
        $view = view('pdf.contract', compact('user', 'data', 'title'));
        $html = $view->render();
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
                return "عقد تركيب";
                break;
            case 'insp_cont':
                return "عقد معاينة";
                break;
        }
        return "مشهد انجاز";
    }
}
