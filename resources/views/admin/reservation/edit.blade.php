@extends('layouts.admin')
@section('content')
<style>
    #label-img {
        padding: 20px;
        border: 1px solid #ddd;
        display: inline-block;
        width: 100%;
        text-align: center;
    }
    #label-img img{
        max-width: 100%;
    }
        #label-img+input[type='file']{
        width: 0;
        height: 0;
        border: none;
        opacity: 0;
    }

</style>
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
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Edit') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">

        <form action="{{ route('admin.reservation.edit', ['reservation'=> $reservation->id]) }}" method="post">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="user">{{ __('admin.User') }}</label>
                    <input type="text"  id="user" value="{{ $reservation->user->name }}" class="form-control" readonly />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="time">{{ __('admin.Reservation Date') }}</label>
                    <input type="text"  id="time" value="{{ $reservation->date.' - '.$reservation->time }}" class="form-control" readonly />
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="status">{{ __('admin.Status') }}</label>
                    <select class="form-control" name="status" required>
                        <option value="">-- Choose --</option>
                        @foreach ($status as $condition)
                        <option {{ ($reservation->status == $condition || old('status') == $condition)? 'selected':'' }} value="{{ $condition }}">{{ $condition }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center mb-4 mt-4">
                    <button type="submit" class="btn btn-purple btn-block"><i class="fa fa-send"></i> {{ __('admin.Process') }}</button>
                </div>

            </div>


        </form>

    </div>
@endsection