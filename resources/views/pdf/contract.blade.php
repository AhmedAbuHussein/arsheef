<div class="container text-right" style="padding-top: 0;" dir="rtl">
    <div class="content">
        <div class="header" style="width: 800px; margin:auto;">
           <div class="row">
                <div class="col-md-4"><div style="height: 2px;"></div></div>
                <div class="col-md-4">
                    <h3 class="title text-underline">{{ $title }}</h3>
                </div>
                <div class="col-md-4">
                    <div class="date-container">
                        <p class="date">{{ arabicNumbers($data->date->format('Y/m/d')) }}</p>
                        <p class="date" dir="rtl">{{  \Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', $data->date) }}</p>
                    </div>
                </div>
           </div>
            <div class="clear-fix"></div>
        </div>
        <div class="body">
            <p class="text text-bold text-underline">
                <span class="text-bold">تشهد </span>
                <span class="text-bold">مؤسسة {{ optional($user->information)->establish_name }}</span>
                <span>سجل تجاري رقم : </span>
                <span>{{ arabicNumbers($user->information->commerical_register) }}</span>
                <br>
                <span>رقم خطاب ترخيص مزاولة الانشطة الامنية :</span>
                <span>{{ arabicNumbers($user->information->license_number) }}</span>
            </p>
            <p class="text text-bold">
                <span>بانه تم {{ str_replace(["مشهد","عقد"],"",$title) }} النظام الامني كاميرات مراقبة امنية</span>
                <br>
                <span>لـ</span>
                <span>{{ $data->owner }}</span>
                <br>
                <span>سجل تجاري رقم : </span><span>{{ arabicNumbers($data->commerical_register) }}</span>
                <br>
                <span>رقم المبني : </span><span>{{ arabicNumbers($data->building_no) }}</span> &nbsp;&nbsp;&nbsp;&nbsp;
                <span>الرقم الاضافي : </span><span>{{ arabicNumbers($data->second_no) }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>الرمز البريدي : </span><span>{{ arabicNumbers($data->postal_code) }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>جوال رقم : </span><span>{{ arabicNumbers($data->phone) }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <br>
                <span>اسم الشارع : </span><span>{{ $data->street }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>المدينة : </span><span> {{ $data->city }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>الحي : </span><span>{{ $data->neignborhood }}</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </p>

             @if (!is_null($data->items) && count($data->items) > 0)

            <div class="table-container">
                <p class=" text-bold text-underline text-right text-up-table">جدول كميات ومواصفات كاميرات المراقبة وملحقاتها :-</p>
                <table class="text-right table-borderd" dir="rtl" lang="ar">
                    <thead>
                        <tr class="text-right">
                            <th>اسم الجهاز</th>
                            <th>العدد</th>
                            <th>النوع</th>
                            <th>المواصفات</th>
                            <th>سعة التخزين</th>
                            <th> الماركة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->items as $item)
                        @php
                            $type = "----";
                            $details = "----";
                            $storage = "----";
                            if($item->type == 'بوصة'){
                                $type = $item->details_info."-".$item->type ;
                            }else{
                                $type = $item->type;
                            }
                            if(is_numeric($item->details) && $item->type != 'بوصة'){
                                $details = $item->details ."-".$item->details_info;
                            }else{
                                $details = $item->details;
                            }

                            if($item->storage){
                                $storage = $item->storage."-".$item->storage_info;
                            }

                        @endphp
                        <tr>
                            <td>{{ $item->name??'------' }}</td>
                            <td> {{ arabicNumbers($item->quantity??0) }}</td>
                            <td>{{ $type }}</td>
                            <td>{{ $details  }}</td>
                            <td>{{ $storage  }}</td>
                            <td>{{ $item->modal??'------'  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <p class="text-under-table">
                <span>وعليه نقر بأن جميع الأجهزة مطابقة لما ورد بكراسة الشروط والمواصفات العامة لنظام المراقبة التلفزيونية المعتمد من وكالة التخطيط والتطوير الأمني لوزارة الداخلية .</span>
            </p>
            @endif
        </div>

        <table class="footer mt-10 mb-20">
            <tr class="no-border mb-10">
                <td class="no-border text-center" style="width: 33.33%;">
                    <p class="footer-text" style="font-weight: bold; margin-bottom: 30px; display:block">اسم المسئول</p>
                    <p class="footer-text">{{ $user->information->admin_name }}</p>
                </td>
                <td class="no-border text-center" style="width: 33.33%;">
                    <p class="footer-text" style="font-weight: bold;">توقيعـه</p>
                </td>

                <td class="no-border text-center" style="width: 33.33%;">
                    <p class="footer-text" style="font-weight: bold;">الختـــم </p>
                </td>
            </tr>
        </table>

    </div>

</div>

<style>
@media all {


.table-borderd {

    border: 2px solid #000;
    width: 100%;

}
.table-borderd tr th, .table-borderd tr td{
    text-align: center !important;
}
.table-borderd td, .table-borderd th {
  border: 1px solid #000000;
  padding: 10px 0;
}

.table-borderd tr:nth-child(even){background-color: #f2f2f2;}

.table-borderd th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #858585;
  color: white;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
[class*="col-"] {
    padding-top: 15px;
    padding-bottom: 15px;
    }

.col-md-4 {
    width: 33.33333333%;
    float: right;

}

div, p, span, h3, h4, h5, h2{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    text-align: center;
}

.container{
   width: 870px;
   margin: auto;
    padding-top: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
.text-right {
    text-align: right !important;
}

.text-center {
    text-align: center !important;
}

.text-left {
    text-align: left !important;
}

.logo{
    display: block;
    max-width: 100%;
    height: 100px;
    margin: auto
}

th, td {
    text-align: right !important;
    border-left: 2px solid #333;
}
tr{
    border-bottom: 2px solid #444;
}
.mb-20{
    margin-bottom: 20px !important;
}

.mb-10{
    margin-bottom: 10px !important;
}

.mt-20{
    margin-top: 20px !important;
}

.mt-10{
    margin-top: 10px !important;
}
.text-bold{
    font-weight: bold !important;
}
.border-bold{
    border-bottom: 8px solid #333;
}
.text-underline{
    text-decoration: underline;
}
.body .text{
    font-size: 15px;
    line-height: 33px;
}
.header .title{
    font-size: 22px;
    margin-bottom: 20px;
}

.header{
    position: relative;
}
.header .date-container {

}
.header .date-container .date{
    margin: 4px 0px;
    font-size: 13px;
    font-weight: bold;
}
.text-up-table{
    font-size: 18px;
    margin-bottom: 16px;
    margin-top: 20px;
}
.table-container{
    padding: 0 40px;
}
.text-under-table{
    padding: 3px 0px;
    text-decoration: underline;
    margin: 15px 40px 14px;
    text-align: right;
    font-size: 16px
}
.text-under-table span{
    background: #d4d4d4;
}

.footer-text {
    font-size: 18px;
    font-weight: bold;
    line-height: 45px;
}
.clear-fix{
    clear:both;
}
.no-border{
    border: none !important;
}
}
</style>
