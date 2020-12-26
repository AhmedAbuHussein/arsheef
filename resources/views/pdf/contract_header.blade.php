<div class="container text-right" dir="rtl">
    <table >
        <tr>
            <td style="width: 34.35%">
                <h3 class="mb-10 text-center" style="color: #2ba9af">{{ optional($user->information)->establish_name }}</h3>
                <p class="mb-10 text-center"><span class="text-bold">السجل التجاري :</span><span>{{ arabicNumbers($user->information->commerical_register) }}</span></p>
                <p class="mb-10 text-center"><span class="text-bold"> ترخيص رقم :</span><span>{{  arabicNumbers($user->information->license_number) }}</span></p>
            </td>
            
            <td style="width: 31.33%">
                <img src="{{ asset($user->information->logo) }}" class="logo"/>
            </td>
            <td style="width: 34.31%">
                <p class="mb-10 text-bold mt-20 text-center">{{ $user->information->email }}</p>
                <p class="text-center">{{ arabicNumbers($user->information->phone) }}</p>
            </td>
        </tr>
    </table>
    <div class="border-bold mb-20"></div>
</div>

<style>
    @media print, screen {
        .container{
            width: 870px;
            margin: auto;
            padding-top: 25px;
        }
        .text-right {
            text-align: right !important;
        }
        .text-center {
            text-align: center !important;
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
        table {
            border-collapse: collapse;
            width: 100%;
        }
        .logo{
            display: block;
            max-width: 100%;
            height: 100px;
            margin: auto
        }
    }
</style>