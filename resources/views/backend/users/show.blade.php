@extends('layouts.admin')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('file.users') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('file.home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.users.index', ['account_type'=> $type]) }}">{{ __('file.users') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('file.show') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 60px">
       
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">   
                        <div class="card-body">                    
                            <div class="row custom-row">
                                <div class="col-md-4"> {{ __('file.name') }}</div>
                                <div class="col-md-8">{{ $user->name }}</div>
                            </div>
                            <div class="row custom-row">
                                <div class="col-md-4"> {{ __('file.phone') }}</div>
                                <div class="col-md-8">{{ $user->phone ?? '--------------------' }}</div>
                            </div>

                            <div class="row custom-row">
                                <div class="col-md-4"> {{ __('file.expired_at') }}</div>
                                <div class="col-md-8">{{ $user->expired_at->diffForHumans() }}</div>
                            </div>

                            <div class="row custom-row">
                                <div class="col-md-4"> {{ __('file.account_type') }}</div>
                                <div class="col-md-8">{{ __("file.{$user->account_type}")}}</div>
                            </div>
    
                            <div class="row custom-row">
                                <div class="col-md-4">{{ __('file.image') }}</div>
                                <div class="col-md-8">
                                    <img src="{{ $user->image?url($user->image):'' }}" alt="image" style="width: 80%;border-radius:100%" />
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">                    
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.establish') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->establish_name?? '--------------------' }}</div>
                        </div>
                        
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.commerical_register') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->commerical_register?? '--------------------' }}</div>
                        </div>
                        
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.license_number') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->license_number?? '--------------------' }}</div>
                        </div>
    
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.establish_email') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->email?? '--------------------' }}</div>
                        </div>
                        
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.establish_phone') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->phone?? '--------------------' }}</div>
                        </div>
    
                
                        <div class="row custom-row">
                            <div class="col-md-4">{{ __('file.admin_name') }}</div>
                            <div class="col-md-8">{{ optional($user->information)->admin_name?? '--------------------'  }}</div>
                        </div>
    
                        <div class="row custom-row">
                            <div class="col-md-6">
                                <p>{{ __('file.logo') }}</p>
                                @if (is_object($user->information))
                                <img src="{{ url($user->information->logo) }}"  alt="establish logo" style="max-width: 80%;" />
                                @else
                                <p>-----------------------</p>
                                @endif
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('style')
    <style>
        .custom-row{
            padding: 15px 0;
            border-bottom: 1px solid #d3d3d3;
        }
        .custom-row:last-child{
            border-bottom: none;
        }
    </style>
@endsection