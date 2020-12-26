<body>
<div class="container text-right" dir="rtl">
    <table>
        <tr class="no-border">
            <td style="width: 34.35%" class="no-border">
                <h3 class="mb-10 text-center" style="color: #2ba9af">{{ optional($user->information)->establish_name }}</h3>
                <p class="mb-10 text-center"><span class="text-bold">السجل التجاري :</span><span>{{ arabicNumbers($user->information->commerical_register) }}</span></p>
                <p class="mb-10 text-center"><span class="text-bold"> ترخيص رقم :</span><span>{{  arabicNumbers($user->information->license_number) }}</span></p>
            </td>
            
            <td style="width: 31.33%" class="no-border">
                <img src="{{ asset($user->information->logo) }}" class="logo"/>
            </td>
            <td style="width: 34.31%" class="no-border">
                <p class="mb-10 text-bold mt-20 text-center">{{ $user->information->email }}</p>
                <p class="text-center">{{ arabicNumbers($user->information->phone) }}</p>
            </td>
        </tr>
    </table>
    <div class="border-bold mb-20" style="clear: both"></div>
</div>

