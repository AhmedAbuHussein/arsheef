<div class="container text-right" dir="rtl">
    <div class="content">
        <div class="header" style="width: 800px; margin:auto;">
           <div class="row">
                <div class="col-md-4"><div style="height: 2px;"></div></div>
                <div class="col-md-4">
                    <h3 class="title text-underline">{{ $title }}</h3>
                </div>
                <div class="col-md-4">
                    <div class="date-container">
                        <p class="date">{{ arabicNumbers(Carbon\Carbon::now()->format('Y/m/d')) }}</p>
                        <p class="date" dir="rtl">{{  \Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', Carbon\Carbon::now()) }}</p>
                    </div>
                </div>
           </div>
            <div class="clear-fix"></div>
        </div>
        <div class="body">
            <p>الحمد لله وحده والصلاة والسلام علي رسول الله, ففي يوم <span>{{ Carbon\Carbon::now()->format("L") }}</span> الموافق <span>{{  \Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', Carbon\Carbon::now()) }}</span>
            اجتمع الطرفان:</p>
            <p>طرف اول مؤسسة <span>باكورة التقنية</span> ويمثله (<span>ا/احمد شاكر</span>)</p>
            <p>طرف ثاني / <span>مركز الشراء</span></p>
            <p><i style="text-decoration: underline">واتفق الطرفان علي:</i></p>
            <ol>
                <li>يقوم الطرف الاول بتركيب النظام الأمني لكاميرات المراقبة حسب الموصف المذكور في الفاتورة الموفقةمع العقد.</li>
                <li>اسم الموقع/ </li>
                <li>
                    <table class="no-border">
                        <tr>
                            <td class="no-border" style="width: 50%">قيمة الفاتورة:</td>
                            <td class="no-border" style="width: 50%">يتم دفعها مقدم العقد.</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                في حال كان المبلغ اكثر من 5000 ريال فإنه يكون علي دفعتين, مقدم 70% (&nbsp; &nbsp; &nbsp; &nbsp;) أثناء توقيع العقد, ومؤخر 30% (&nbsp; &nbsp; &nbsp;&nbsp;) يتم إستلامها في نفس يوم تسليم العمل
                            </td>
                        </tr>
                    </table>
                </li>
                <li>يوم وتاريخ البدء في تنفيذ العقد هو </li>
                <li>مدة تنفيذ العمل &nbsp;&nbsp;&nbsp;&nbsp; يوم/ايام عمل</li>
                <li>يلتزم الطرف الاول بالبدء بالتنفيذ بعد توقيع العقد والاتفاق علي اليوم والتاريخ المناسب في العقد وفي حال لم يتم البدء في نفس الوقت المحدد فللطرف الثاني الحق في فسخ العقد</li>
                <li>يتم توزيع الكاميرات والنقاط كالتالي
                    <table>
                        <tr>
                            <td>عدد &nbsp;&nbsp;&nbsp;&nbsp; كاميرا خارجية</td>
                            <td>عدد &nbsp;&nbsp;&nbsp;&nbsp; كاميرا داخلية</td>
                        </tr>
                    </table>
                </li>
                <li>ضمان لمدة عامين علي الكاميرات ضد عيوب التصنيع فقط ولايشمل الصيانة وفي حال تعطل احد الاجهزة
                    أو الكاميرات لعيوب التصنيع فيلتزم الطرف الثاني بإحضارها لمقر المؤسسة
                </li>
                <li>لا يسمح للطرف الثاني بعد توقيع العقد بتغيير موقع تركيب الكاميرات أو
                    باستحداث اضافة جديدة علي العمل المتفق عليه في هذا العقد وفي حال رغبة بالتغيير فانه يلتزم
                    بدفع قيمة فوراً بعد الاتفاق علي مبلغ من الطرفين بحيث لا يقل عن <span> {{ arabicNumbers(100) }}</span>
                    ريال للتغير علي الكاميرا الواحده ويكون سعر الاضافة الجديدة حسب الفاتورة التي سيتم اصدارها
                </li>
                <li>شرط جزائي علي الطرفين في حال عدم تعاون الطرف الثاني مع الطرف الاول فإن الطرف الثاني
                    يتحمل قيمة <span>{{  arabicNumbers(200) }}</span> ريال عن كل يوم تاخير تسبب فيه كما انه في حال تاخر الطرف الاول عن تسليم العمل في الوقت المحدد فإنه يلتزم بدفع مبلغ <span>{{  arabicNumbers(200) }}</span>ريال عن كل يوم
                </li>
                <li>المؤسسة غير مسؤولة عن توقف تطبيق الجوال او تحديثه او اعطال الشبكة او اي ضرر اخؤ ويلتزم
                    الطرف الثاني بتوفير النت قبل البدء في العمل ولا يحق له مطالبه الطرف الاول بالرجوع لموقع العمل لربط الكاميرات علي النت إلا بمقابل مالي
                </li>
            </ol>
        </div>

        <pagebreak></pagebreak>
        <div class="header" style="width: 800px; margin:auto;">
            <div class="row">
                 <div class="col-md-4"><div style="height: 2px;"></div></div>
                 <div class="col-md-4">
                     <h3 class="title text-underline">{{ $title }}</h3>
                 </div>
                 <div class="col-md-4">
                     <div class="date-container">
                         <p class="date">{{ arabicNumbers(Carbon\Carbon::now()->format('Y/m/d')) }}</p>
                         <p class="date" dir="rtl">{{  \Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', Carbon\Carbon::now()) }}</p>
                     </div>
                 </div>
            </div>
             <div class="clear-fix"></div>
         </div>
         <div class="body">
            <ol>
                <li>بعد الاتفاق وتوقيع العقد فانه لا يحق للمستفيد إيقاف العمل او ارجاع الكاميرات 
                    الا بدفع مبلغ <span>{{ arabicNumbers(1500) }}</span> ريال + قيمة العمل الذي تم ويشمل (قيمة اعمال التركيب وقيمة الاغراض التي فتحت) وفي حال تاخرالطرف الاول عن مدة تنفيذ العقد فانه يحق للطرف الثاني 
                    ان يخصم من المتبقي للطرف الاول عن كل يوم تاخر مبلغ <span>{{ arabicNumbers(300) }}</span> ريال وذلك في حال لم يكن تعطيل العمل من الطرف الثاني
                </li>
                <li>المؤسسة غير ملتزمة بتوفير الحفريات والنقاط الكهربائية ومستلزماتها في منطقة العمل 
                    وفي حال رغبة المستفيد (الطرف الثاني) في تاسيس نقاط كهربائية او حفريات فانه يتم الاتفاق عليها خارج العقد
                </li>
                <li>يلتزم الطرف الثاني بالتوقيع علي تسليم العمل في هذا العقد فور الانتهاء من العمل</li>
                <li>يلتزم الطرف الثاني بدفع المبلغ المتبقي ال 30% بعد تسليم العمل مباشرة</li>
                <li>يلتزم الطرف الثاني بتوفير اي اضافات غير مذكورة في الفاتوره</li>
                <li>يتحمل الطرف الثاني مسئولية عدم تسليم مخطط التمديدات الكهربائية وغيرها</li>
                <li>في حال كان موقع الطرف الثاني يبعد عن مقر المؤسسة اكثر من <span>{{ arabicNumbers(50) }}</span> كيلو فانه يلتزم الطرف الاول بتأمين السكن والمعيشة للفنيين او المعيشة فقط في حال عدم احتياج سكن</li>
                <li>يلتزم الطرف الثاني بالتوقيع علي استمارة كروكي الموقع والمرفقة مع الفاتورة</li>
                <li>يتوفر هذا العقد من نسختين لكل طرف نسخة واحدة</li>
                <li>يتم تحويل مبلغ الفاتورة علي حسابات المؤسسة 
                    <table class="no-border">
                        <tr class="no-border">
                            <td class="no-border" style="width: 50%;">حساب الراجحي <span>{{ arabicNumbers(1231231231311331) }}</span></td>
                            <td class="no-border" style="width: 50%;">حساب الاهلي <span>{{ arabicNumbers(9895695599959559) }}</span></td>
                        </tr>
                    </table>
                </li>
                <li></li>
            </ol>

                <p>طرف اول مؤسسة <span>باكورة التقنية</span></p>
                <p>ويمثلها المدير العام/ <span>احمد شاكر</span></p>
                <p>التوقيع/</p>
                <br>
                <br>
                <br>
                <p>طرف ثاني/ </p>
                <p>ممثل الطرف الثاني/ <span>احمد شاكر</span></p>
                <p>التوقيع/</p>
                
                <p class="text-left"><i>وعلي ذلك تم الاتفاق والتوقيع وبالله التوفيق.</i></p>
         </div>

    </div>
</div>

<style>
@media print, screen {

.table-borderd {
 
    border: 2px solid #000;
    width: 100%;

}
.table-borderd tr th, .table-borderd tr td{
    text-align: center !important;
}
.table-borderd td, .table-borderd th {
  border: 1px solid #000000;
  padding: 13px 0;
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
</body>