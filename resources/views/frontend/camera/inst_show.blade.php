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
                <div class="col-5 custom-col">{{ __('file.username') }}</div>
                <div class="col-7 custom-col">{{ $item->username }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-5 custom-col border-right-custom">{{ __('file.est_name') }}</div>
                <div class="col-7 custom-col">{{ $item->est_name }}</div>
            </div>
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.date') }}</div>
                <div class="col-md-7 custom-col">{{ arabicNumbers($item->date->format('Y/m/d'))  }} - <span>{{ arabicNumbers(\Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', $item->date)) }}</span></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.start_date') }}</div>
                <div class="col-md-7 custom-col">{{ arabicNumbers($item->start_date->format('Y/m/d'))  }} - <span>{{ arabicNumbers(\Alkoumi\LaravelHijriDate\Hijri::DateShortFormat('ar', $item->date)) }}</span></div>
            </div>
        </div>
    </div>

    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.working_day') }}</div>
                <div class="col-md-7 custom-col">{{ $item->working_days }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col border-right-custom">{{ __('file.total_cost') }}</div>
                <div class="col-md-7 custom-col">{{ $item->total_cost }}</div>
            </div>
        </div>
    </div>
    <div class="row custom-row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.inside_camera') }}</div>
                <div class="col-md-7 custom-col">{{ $item->inside_camera }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-5 custom-col">{{ __('file.outside_camera') }}</div>
                <div class="col-md-7 custom-col">{{ $item->outside_camera }}</div>
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
                <div class="col-md-5 custom-col">{{ __('file.created date') }}</div>
                <div class="col-md-7 custom-col">{{ $item->created_at->format('Y-m-d H:i') }}</div>
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