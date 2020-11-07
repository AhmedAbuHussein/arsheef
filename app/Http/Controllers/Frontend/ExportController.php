<?php

namespace App\Http\Controllers\Frontend;

use Box\Spout\Writer\Style\StyleBuilder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function index($type)
    {
        $account_type = Auth::guard('web')->user()->account_type;
        switch ($account_type) {
            case 'camera':              
                ob_end_clean();
                ob_start();
                $header_style = (new StyleBuilder())->setFontSize(14)->setBackgroundColor("EDEDED")->setFontName('Arial')->setFontBold()->build();
                $rows_style = (new StyleBuilder())->setFontName('Arial')->setFontSize(13)->build();

                return (new FastExcel($this->cameratExcel($type)))
                        ->headerStyle($header_style)
                        ->rowsStyle($rows_style)
                        ->download(date("d-m-Y")."_contracts.xlsx");
                break;
            case 'safety':
                    return $type;
                    break;
            default:
                ob_end_clean();
                ob_start();
                $header_style = (new StyleBuilder())->setFontSize(14)->setBackgroundColor("EDEDED")->setFontName('Arial')->setFontBold()->build();
                $rows_style = (new StyleBuilder())->setFontName('Arial')->setFontSize(13)->build();

                return (new FastExcel($this->consultaionExcel($type)))
                        ->headerStyle($header_style)
                        ->rowsStyle($rows_style)
                        ->download(date("d-m-Y")."_structure.xlsx");
                break;
        }
    }


    public function cameratExcel($type) {

        $user = Auth::guard('web')->user();
        $contracts = Contract::where(['type'=> $type, 'user_id'=> $user->id])->with(['items', 'user']);
        foreach ($contracts->cursor() as $index=>$contract) {
            yield  [
                "الرقم التسلسلي"            => $index +1, 
                "المتعاقد"              => $contract->owner  ,
                " رقم المبني"          => $contract->building_no,
                " الرقم الاضافي"          => $contract->second_no,
                " الرمز البريدي"          => $contract->postal_code,
                " الهاتف الجوال"          => $contract->phone,
                " المدينة"          => $contract->city,
                " الشارع"          => $contract->street,
                " الحي"          => $contract->neignborhood,
                "العناصر "          => $contract->pluckNameForItems(),
            ];
        }
    }

    public function consultaionExcel($type) {

        $user = Auth::guard('web')->user();
        $contracts = Structure::where(['type'=> $type, 'user_id'=> $user->id]);
        foreach ($contracts->cursor() as $index=>$contract) {
            yield  [
                "الرقم التسلسلي"            => $index +1, 
                "المتعاقد"              => $contract->owner  ,
                " رقم المبني"          => $contract->building_no,
                "  اسم المبني"          => $contract->building_name,
                " المدينة"          => $contract->city,
                " الشارع"          => $contract->street,
                " الحي"          => $contract->neignborhood,
                "الوصف "          => str_replace(["&nbsp;", "<br>"],["\0", "\n"] ,strip_tags($contract->details, '<br>')),
            ];
        }
    }
}
