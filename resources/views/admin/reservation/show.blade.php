@extends('layouts.admin')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('admin.Reservation') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.reservation.index') }}">{{ __('admin.Reservation') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Show') }}</li>
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
                    <div class="col-md-4">{{ __('admin.Reserved By') }}</div>
                    <div class="col-md-8">{{ $reservation->user->name }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.User Phone') }}</div>
                    <div class="col-md-8">{{ $reservation->user->phone }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Reserved For') }}</div>
                    <div class="col-md-8">{{ $reservation->name }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Reserved For.. Phone') }}</div>
                    <div class="col-md-8">{{ $reservation->phone }}</div>
                </div>


                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Person No.') }}</div>
                    <div class="col-md-8">{{ $reservation->persons  }}  {{ __('admin.Person') }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Reservation Type') }}</div>
                    <div class="col-md-8">{{ $reservation->type }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Reservation Date') }}</div>
                    <div class="col-md-8">{{ $reservation->date. " - ". $reservation->time }}</div>
                </div>

                <div class="row py-3" style="border-bottom: 1px solid #ddd">
                    <div class="col-md-4">{{ __('admin.Status') }}</div>
                    <div class="col-md-8">{{ $reservation->status }}</div>
                </div>

            </div>
        </div>
    </div>
@endsection