
@if ($data->attach_1 != null)
<div class="table-container image text-center" style="margin-top: 35px">
    <table style="page-break-inside: avoid">
        <tr class="no-border">
            <td colspan="2" class="no-border">
                <p class=" text-bold text-underline text-right text-up-table">الصور الملحقة بالعقد:-</p>
            </td>
        </tr>
        <tr class="no-border">
            <td class="text-center no-border">
                <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_1) }}" />
            </td>
            @if(!is_null($data->attach_2) && substr_count(mime_content_type($data->attach_2), "image") > 0)
            <td class="text-center no-border">
                <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_2) }}" />
            </td>
            @endif
        </tr>
        <tr>
            @if(!is_null($data->attach_3) && substr_count(mime_content_type($data->attach_3), "image") > 0)
            <td class="text-center no-border">
                <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_3) }}" />
            </td>
            @endif
            @if(!is_null($data->attach_4) && substr_count(mime_content_type($data->attach_4), "image") > 0)
            <td class="text-center no-border">
                <img style="max-width: 100%; max-height:300px; margin-top:30px" src="{{ asset($data->attach_4) }}" />
            </td>
            @endif
        </tr>
    </table>
    
</div>
@endif
