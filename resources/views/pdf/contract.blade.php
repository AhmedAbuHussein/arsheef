
<div class="container text-right" dir="rtl">
    <div class="row mb-10">
        <div class="col-md-4">
            <div>
                <h3 class="mb-10">{{ optional($user->information)->establish_name }}</h3>
                <p class="mb-10"><span class="text-bold">السجل التجاري :</span><span>{{ arabicNumbers($user->information->commerical_register) }}</span></p>
                <p class="mb-10"><span class="text-bold"> ترخيص رقم :</span><span>{{  arabicNumbers($user->information->license_number) }}</span></p>
            </div>
        </div>
        <div class="col-md-4">
            <img src="{{ asset($user->information->logo) }}" class="logo"/>
        </div>
        <div class="col-md-4">
            <p class="mb-10 text-bold mt-20">{{ $user->information->email }}</p>
            <p>{{ arabicNumbers($user->information->phone) }}</p>
        </div>

    </div>
    <div class="border-bold mb-20" style="clear: both"></div>

    <div class="content">
        <div class="header" style="width: 800px; margin:auto;">
           <div class="row">
                <div class="col-md-4"><div style="height: 2px;"></div></div>
                <div class="col-md-4">
                    <h3 class="title text-underline"> مشهــد إنجـــاز</h3>
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
        <div class="body mb-20">
            <p class="text text-bold text-underline">
                <span>تشهد </span>
                <span>مؤسسة باكورة التقنية للمراقبة الامنية</span>
                <span>سجل تجاري رقم : </span>
                <span>{{ arabicNumbers($user->information->commerical_register) }}</span> 
                <br>
                <span>رقم خطاب ترخيص مزاولة الانشطة الامنية :</span>
                <span>{{ arabicNumbers($user->information->license_number) }}</span>
            </p>
            <p class="text text-bold">
                <span>بانه تم معاينة النظام الامني كاميرات مراقبة امنية</span>
                <br>
                <span>لـ</span>
                <span>شقق الاسلام للمواد الانشائية</span>
                <br>
                <span>سجل تجاري رقم : </span><span>{{ arabicNumbers($user->information->commerical_register) }}</span>
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

                
            <div class="table-container">
                <p class=" text-bold text-underline text-right text-up-table">جدول كميات ومواصفات كاميرات المراقبة وملحقاتها :-</p>
                <table class="text-right" dir="rtl" lang="ar" style="border: 3px solid #333;">
                    <thead style="border-bottom: 2px solid #333; background: #e6e5e5;">
                        <tr class="text-right">
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>الهاتف</th>
                            <th>الحي</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                        <tr>
                            <td>احمد شاكر</td>
                            <td>كفر الشيخ</td>
                            <td>{{ arabicNumbers("01153154445") }}</td>
                            <td>شنو</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <p class="text-under-table">
                <span>وعليه نقر بأن جميع الأجهزة مطابقة لما ورد بكراسة الشروط والمواصفات العامة لنظام المراقبة التلفزيونية المعتمد من وكالة التخطيط والتطوير الأمني لوزارة الداخلية .</span>
            </p>

        </div>

        <div class="footer mt-20">
            <div class="row mb-20">
                <div class="col-md-4">
                    <div>
                        <p class="footer-text">اسم المسئول</p>
                        <P class="footer-text">{{ $user->information->admin_name }}</P>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <p class="footer-text">توقيعـــــه</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div>
                        <p class="footer-text">الختــــــم </p>
                    </div>
                </div>
            </div>
            <div class="border-bold mb-10" style="clear: both"></div>
        </div>
    </div>
    
</div>

<style>
@media print, screen {

    *{
        font-family: 'Scheherazade';
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
    font-family: 'Scheherazade';
}

.container{
   width: 870px;
   margin: auto;
    padding-top: 25px;
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
    margin: 15px 40px 60px;
    text-align: right;
    font-size: 16px
}
.text-under-table span{
    background: #d4d4d4;
}

.footer-text {
    font-size: 14px;
    font-weight: bold;
    line-height: 45px;
}
.clear-fix{
    clear:both;
}
}
</style>
