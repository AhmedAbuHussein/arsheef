@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex align-items-center" style="height: 97vh">
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex justify-content-center mb-3">
                        <a href="#"><img src="{{ url('images/logo_auth.png') }}" alt="logo" style="width: 180px;" /></a>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mx-3">
                            <label for="email">{{ __('file.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mx-3">
                            <label for="password">{{ __('file.password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mx-3 mb-2">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('file.login') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <style>
        .custom-card{
            border-top-left-radius: 100px;
            border-bottom-right-radius: 100px;
            padding-bottom: 35px;
        }
    </style>
@endsection