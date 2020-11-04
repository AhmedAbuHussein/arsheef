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
                return $this->handler($user, $data);
                break;
            
            default:
                # code...
                break;
        }
    }

    public function handler($user, $data)
    {
        
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font_size' => 0,
            'default_font' => 'Scheherazade',//'Scheherazade',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 10,
            'margin_bottom' => 10,
            'margin_header' => 9,
            'margin_footer' => 9,
            'orientation' => 'P',
        ]);
          
        $view = view('pdf.contract', compact('user', 'data'));
        $html = $view->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output("test.pdf", "D"); 
    }
}
