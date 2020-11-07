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
                        <li class="breadcrumb-item">
                            <a href="{{ route('items', ['type'=> $type,'parent'=>$parent]) }}">{{ __("file.items") }}</a>
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
        <div class="col-md-3 custom-col">{{ __('file.contract') }}</div>
        <div class="col-md-9 custom-col">{{ $parent->owner }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.contract_date') }}</div>
        <div class="col-md-9 custom-col">{{ $parent->created_at->format('Y-m-d H:i') }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.is_contract_edit') }}</div>
        <div class="col-md-9 custom-col">{{ $parent->updated_at == $parent->created_at ? __('file.no_edit') : __('file.yes_edit')  }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.contract_edit') }}</div>
        <div class="col-md-9 custom-col">{{ $parent->updated_at->format('Y-m-d H:i') }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-12 custom-col delimiter-custom">{{ __('file.item_details') }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.name') }}</div>
        <div class="col-md-9 custom-col">{{ $item->name?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.quantity') }}</div>
        <div class="col-md-9 custom-col">{{ $item->quantity?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.type') }}</div>
        <div class="col-md-9 custom-col">{{ $item->type?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.storage') }}</div>
        <div class="col-md-9 custom-col">{{ $item->storage?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.modal') }}</div>
        <div class="col-md-9 custom-col">{{ $item->modal?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.details') }}</div>
        <div class="col-md-9 custom-col">{{ $item->details?? '------------------' }}</div>
    </div>
    <div class="row custom-row">
        <div class="col-md-3 custom-col">{{ __('file.other') }}</div>
        <div class="col-md-9 custom-col">{{ $item->other?? '------------------' }}</div>
    </div>

</div>
@endsection
@section('style')
    <style>
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
    </style>
@endsection