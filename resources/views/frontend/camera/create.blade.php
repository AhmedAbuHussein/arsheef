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
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.create") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px">

    <form method="POST" enctype="multipart/form-data" action="{{ route('create', ['type'=> $type]) }}">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="owner">{{ __('file.owner') }}</label>
            <input type="text" name="owner" value="{{ old('owner') }}" class="form-control" id="owner" required />
            @error('owner')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="phone">{{ __('file.phone') }}</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" required />
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="date">{{ __('file.date') }}</label>
            <input type="text" name="date" value="{{ old('date') }}" class="form-control datetime" id="date" autocomplete="off" required />
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="city">{{ __('file.city') }}</label>
              <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" required />
              @error('city')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="neignborhood">{{ __('file.neignborhood') }}</label>
              <input type="text" name="neignborhood" value="{{ old('neignborhood') }}" class="form-control" id="neignborhood" required />
              @error('neignborhood')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="street">{{ __('file.street') }}</label>
                <input type="text" name="street" value="{{ old('street') }}" class="form-control" id="street" required />
                @error('street')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="commerical_register">{{ __('file.commerical_register') }}</label>
              <input type="text" name="commerical_register" value="{{ old('commerical_register') }}" class="form-control" id="commerical_register" required />
              @error('commerical_register')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="building_no">{{ __('file.building no') }}</label>
              <input type="text" name="building_no" value="{{ old('building_no') }}" class="form-control" id="building_no" required />
              @error('building_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="second_no">{{ __('file.second no') }}</label>
              <input type="text" name="second_no" value="{{ old('second_no') }}" class="form-control" id="second_no" required />
              @error('second_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="postal_code">{{ __('file.postal code') }}</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" id="postal_code" required />
                @error('postal_code')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="attach_1">{{ __('file.attach file') }}</label>
              <input type="file" name="attach_1" value="{{ old('attach_1') }}" class="form-control" id="attach_1" />
              @error('attach_1')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="attach_2">{{ __('file.attach file') }}</label>
                <input type="file" name="attach_2" value="{{ old('attach_2') }}" class="form-control" id="attach_2" />
                @error('attach_2')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="receiver">{{ __('file.receiver') }}</label>
              <input type="text" name="receiver" value="{{ old('receiver') }}" class="form-control" id="receiver" required />
              @error('receiver')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
        
            <button type="submit" class="btn btn-primary">{{ __('file.process') }}</button>
      </form>

</div>
@endsection
@section('script')
    <script>
        $(function() {

        });
    </script>
@endsection