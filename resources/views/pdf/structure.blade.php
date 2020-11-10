
<body>
    <div class="container">
        <h3 class="text-center text-warning header">مشهد سلامة انشائية</h3>
        <p class="text-center date">بتاريخ <span>{{ \Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', $data->date) }}
            </span> -- <span> {{ arabicNumbers($data->date->format('Y/m/d')) }}</span>
        </p>
        <p class="text-center paragraph">قمنا نحن مكتب / شركة : <span> {{ optional($user->information)->establish_name }}</span></p>
        <p class="text-center paragraph">بالشخوص علي الطبيعة ومعاينة :  <span class="text-warning"> {{ $data->building_name }}</span></p>
        <p class="text-center paragraph">ملك للمواطن :  <span> {{ $data->owner }}</span></p>
        <p class="text-center paragraph">الواقع في / <span> {{ $data->city .' - '. $data->neignborhood .' - '. $data->street }}</span></p>
        <p class="text-center paragraph">مبني رقم  / <span> {{ arabicNumbers($data->building_no) }}</span></p>
        <div class="details text-right">
            {!! $data->details !!}
        </div>
        <div class="image text-center">
            <table>
                <tr>
                    <td>
                        <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_1) }}" />
                    </td>
                    @if(!is_null($data->attach_2) && substr_count(mime_content_type($data->attach_2), "image") > 0)
                    <td>
                        <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_2) }}" />
                    </td>
                    @endif
                </tr>
                <tr>
                    @if(!is_null($data->attach_3) && substr_count(mime_content_type($data->attach_3), "image") > 0)
                    <td>
                        <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_3) }}" />
                    </td>
                    @endif
                    @if(!is_null($data->attach_4) && substr_count(mime_content_type($data->attach_4), "image") > 0)
                    <td>
                        <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_4) }}" />
                    </td>
                    @endif
                </tr>
            </table>
            
        </div>
    </div>
    
<style>
@media print, screen {
    
    div, p, span, h3, h4, h5, h2{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
    .container{
       width: 870px;
       margin: auto;
        padding-top: 25px;
    }
    .text-center{
        text-align:center !important;
    }
    .text-right{
        text-align: right !important;
        direction: rtl !important;
    }
    .text-warning {
        color:#d2691e !important;
    }
    .header {
        font-size: 25px;
        text-decoration: underline;
        margin-bottom: 10px;
    }
    .date{
        margin-bottom: 10px;
        font-size: 15px;
    }
    .paragraph{
        font-size: 19px;
        font-weight: 600;
    }
    .details * {
        font-size: 1.11em;
    }
    table{
        width: 100%;
        direction: rtl;
    }
    td{
        text-align: center;
    }
    td img{
        min-width: 60%;
    }
   
}
    </style>
</body>
