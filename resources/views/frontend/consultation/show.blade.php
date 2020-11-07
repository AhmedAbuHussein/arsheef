@extends('layouts.master')
@section('content')
    
   
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __("file.{$type}") }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">{{ __('file.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('index', ['type'=> $type]) }}">{{ __("file.{$type}") }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.show") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px">

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 custom-col">{{ __('file.contract') }}</div>
                <div class="col-7 custom-col">{{ $item->owner }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 custom-col border-right-custom">{{ __('file.city') }}</div>
                <div class="col-7 custom-col">{{ $item->city }}</div>
            </div>
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.street') }}</div>
                <div class="col-md-7 custom-col">{{ $item->street }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.neignborhood') }}</div>
                <div class="col-md-7 custom-col">{{ $item->neignborhood }}</div>
            </div>
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.building no') }}</div>
                <div class="col-md-7 custom-col">{{ $item->building_no }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col border-right-custom">{{ __('file.building name') }}</div>
                <div class="col-md-7 custom-col">{{ $item->building_name }}</div>
            </div>
        </div>
    </div>
    

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.contract_date') }}</div>
                <div class="col-md-7 custom-col">{{ $item->created_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col border-right-custom">{{ __('file.is_contract_edit') }}</div>
                <div class="col-md-7 custom-col">{{ $item->updated_at == $item->created_at ? __('file.no_edit') : __('file.yes_edit')  }}</div>
            </div>
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.contract_edit') }}</div>
                <div class="col-md-7 custom-col">{{ $item->updated_at->format('Y-m-d H:i') }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.date in contract') }}</div>
                <div class="col-md-7 custom-col">{{ arabicNumbers($item->date->format('Y/m/d'))  }} - <span>{{ arabicNumbers(\Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', $item->date)) }}</span></div>
            </div>
        </div>
    </div>
    <div class="row custom-row">
        <div class="col-md-12 custom-col delimiter-custom">{{ __('file.details') }}</div>
    </div>

    <div class="row custom-row">
        <div class="col-12">
            {!! $item->details?? "<p class='text-center my-3'>لا يوجد تفاصيل للعرض <a href='".route('create.details', ['parent'=> $item->id, 'type'=> $type])."'>انشاء</a></p>" !!}
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-12 custom-col delimiter-custom">{{ __('file.attaches') }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.attach_1') }}</div>
                <div class="col-md-7 custom-col">{!! $item->attach_1? "<a download href='".asset($item->attach_1)."'>".__('file.download')."</a>" : '-----------------------' !!}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.attach_2') }}</div>
                <div class="col-md-7 custom-col">{!! $item->attach_2? "<a download href='".asset($item->attach_2)."'>".__('file.download')."</a>" : '-----------------------' !!}</div>
            </div>
        </div>
    </div>
    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.attach_3') }}</div>
                <div class="col-md-7 custom-col">{!! $item->attach_3? "<a download href='".asset($item->attach_3)."'>".__('file.download')."</a>" : '-----------------------' !!}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.attach_4') }}</div>
                <div class="col-md-7 custom-col">{!! $item->attach_4? "<a download href='".asset($item->attach_4)."'>".__('file.download')."</a>" : '-----------------------' !!}</div>
            </div>
        </div>
    </div>


</div>
@endsection
@section('style')
    <style>
        .custom-link {
            color: #c3c3c3;
            text-decoration: underline;
        }
       .custom-row{
            border-bottom: 2px solid #ddd;
       } 
       .custom-col{
            padding-top: 10px;
            padding-bottom: 10px;
       }
       .custom-row:nth-child(odd){
           background:#fff;
       }
       .delimiter-custom {
        background: #1d2c3c;
        text-align: center;
        color: white;
        font-size: 19px;
        border-radius: 12px;
       }
       .delimiter-custom-empty{
        background: #ad4242;
        text-align: center;
        color: white;
        font-size: 19px;
        border-radius: 12px;
       }
       .border-right-custom {
            border-right: 2px solid #dcdcdc;
       }
    </style>
@endsection