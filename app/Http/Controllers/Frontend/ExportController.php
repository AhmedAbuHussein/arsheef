<?php

namespace App\Http\Controllers\Frontend;

use Alkoumi\LaravelHijriDate\Hijri;
use Box\Spout\Writer\Style\StyleBuilder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\ContractPoint;
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
        if(in_array($type, ['inst_cont', 'insp_cont'])){
            $contracts = ContractPoint::where(['type'=> $type, 'user_id'=> $user->id]);
            foreach ($contracts->cursor() as $index=>$contract) {
                yield  [
                    "الرقم التسلسلي"            => $index +1, 
                    "المتعاقد"              => $contract->username  ,
                    " المؤسسة"          => $contract->est_name,
                    "  تاريخ التعاقد"          => $contract->date . " - ". Hijri::DateShortFormat('ar', $contract->date),
                    "تاريخ تنفيذ العقد"          => $contract->start_date . " - ". Hijri::DateShortFormat('ar', $contract->start_date),
                    "التكلفة الكلية"          => $contract->total_cost,
                    " عدد ايام العمل"          => $contract->working_days,
                    "عدد الكاميرات الداخلية"          => $contract->inside_camera,
                    " عدد الكاميرات الخارجية"          => $contract->outside_camera,
                ];
            }
        }else{
            $contracts = Contract::where(['type'=> $type, 'user_id'=> $user->id])->with(['items']);
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
                ];
            }
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
                "الوصف "          => str_replace(["&nbsp;", "<br>"],["\0", "\r"] ,strip_tags($contract->details, '<br>')),
            ];
        }
    }
}
