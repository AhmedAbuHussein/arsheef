
<div class="container text-right" style="margin-bottom: 0;" dir="rtl">
    <table>
        <tr class="no-border">
            <td style="width: 34.35%" class="no-border">
                <h3 class="mb-10 text-center" style="color: #2ba9af;text-align: center">{{ optional($user->information)->establish_name }}</h3>
                <p class="mb-10 text-center" style="text-align: center;width:100%"><span class="text-bold">السجل التجاري :</span><span>{{ arabicNumbers($user->information->commerical_register) }}</span></p>
                <p class="text-center" style="text-align: center;width:100%"><span class="text-bold"> ترخيص رقم :</span><span>{{  arabicNumbers($user->information->license_number) }}</span></p>
            </td>
            
            <td style="width: 31.33%" class="no-border">
                <img src="{{ asset($user->information->logo) }}" class="logo"/>
            </td>
            <td style="width: 34.31%" class="no-border">
                <p class="mb-10 text-bold mt-20 text-center" style="text-align: center">{{ $user->information->email }}</p>
                <p class="text-center" style="text-align: center;width:100%">{{ arabicNumbers($user->information->phone) }}</p>
            </td>
        </tr>
    </table>
    <div class="border-bold" style="clear: both; margin-bottom: 0"></div>
</div>

