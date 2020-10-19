@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('admin.Employee') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.team.index') }}">{{ __('admin.Employee') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-body">
                
                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Name') }}</div>
                    <div class="col-md-8">{{ $employee->name_lang }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Details') }}</div>
                    <div class="col-md-8">{{ $employee->details_lang }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Social') }}</div>
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            <li class="list-group-item">{{ $employee->facebook }}</li>
                            <li class="list-group-item">{{ $employee->linkedin }}</li>
                            <li class="list-group-item">{{ $employee->twitter }}</li>
                        </ul>
                    </div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Last Update') }}</div>
                    <div class="col-md-8">{{ $employee->updated_at->diffForHumans() }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Image') }}</div>
                    <div class="col-md-8">
                        <img src="{{ url($employee->image) }}" style="max-width: 550px" alt="Image" />
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection