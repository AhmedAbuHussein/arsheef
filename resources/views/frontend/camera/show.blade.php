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
                <div class="col-md-5 custom-col border-right-custom">{{ __('file.second no') }}</div>
                <div class="col-md-7 custom-col">{{ $item->second_no }}</div>
            </div>
        </div>
    </div>
    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.postal code') }}</div>
                <div class="col-md-7 custom-col">{{ $item->postal_code }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.phone') }}</div>
                <div class="col-md-7 custom-col">{{ $item->phone }}</div>
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
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 custom-col">{{ __('file.receiver') }}</div>
                <div class="col-7 custom-col">{{ $item->receiver }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 custom-col">{{ __('file.commerical_register') }}</div>
                <div class="col-7 custom-col">{{ $item->commerical_register }}</div>
            </div>
        </div>
       
    </div>

    @if (!is_null($item->items) && count($item->items) > 0)
    
        <div class="row custom-row">
            <div class="col-md-12 custom-col delimiter-custom">{{ __('file.items') }}</div>
        </div>

        @foreach ($item->items as $value)
        <div class="row custom-row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5 custom-col">{{ __('file.name') }}</div>
                    <div class="col-md-7 custom-col">{{ $value['name']. " - " .$value['type'] }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5 custom-col">{{ __('file.quantity') }}</div>
                    <div class="col-md-7 custom-col">{{ $value['quantity'] }}</div>
                </div>
            </div>
        </div>
        @endforeach

    @else
    <div class="row custom-row">
        <div class="col-md-12 custom-col delimiter-custom-empty">{{ __('file.there are no items') }} <a class="custom-link" href="{{ route('items.create', ['type'=> $type, 'parent'=> $item]) }}">{{ __('file.create') }}</a></div>
    </div>
    @endif
    


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