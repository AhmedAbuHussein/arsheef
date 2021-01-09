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
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.edit") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px">

    <form method="POST" enctype="multipart/form-data" action="{{ route('edit', ['type'=> $type, 'item'=> $data->id]) }}">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="owner">{{ __('file.owner') }}</label>
            <input type="text" name="owner" value="{{ old('owner')??$data->owner }}" class="form-control" id="owner" required />
            @error('owner')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="building_name">{{ __('file.building name') }}</label>
            <input type="text" name="building_name" value="{{ old('building_name')??$data->building_name }}" class="form-control" id="building_name" required />
            @error('building_name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="date">{{ __('file.date') }}</label>
            <input type="text" name="date" value="{{ old('date')??$data->date->format('Y-m-d H:i') }}" class="form-control datetime" id="date" autocomplete="off" required />
            @error('date')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="city">{{ __('file.city') }}</label>
              <input type="text" name="city" value="{{ old('city')??$data->city }}" class="form-control" id="city" required />
              @error('city')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="neignborhood">{{ __('file.neignborhood') }}</label>
              <input type="text" name="neignborhood" value="{{ old('neignborhood')??$data->neignborhood }}" class="form-control" id="neignborhood" required />
              @error('neignborhood')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="street">{{ __('file.street') }}</label>
                <input type="text" name="street" value="{{ old('street')??$data->street }}" class="form-control" id="street" required />
                @error('street')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="receiver">{{ __('file.receiver') }}</label>
              <input type="text" name="receiver" value="{{ old('receiver')??$data->receiver }}" class="form-control" id="receiver" required />
              @error('receiver')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="building_no">{{ __('file.building no') }}</label>
              <input type="text" name="building_no" value="{{ old('building_no')??$data->building_no }}" class="form-control" id="building_no" required />
              @error('building_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4 text-center">
              <label for="attach_1">
                <img src="{{ asset($data->attach_1) }}" class="preview" />
              </label>
              <input style="width:0; height:0; visibility: hidden;" type="file" name="attach_1" value="{{ old('attach_1') }}" class="form-control" id="attach_1" accept="image/*" />
              @error('attach_1')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

          </div>
        
            <button type="submit" class="btn btn-primary">{{ __('file.process') }}</button>
      </form>

</div>
@endsection
@section('style')
    <style>
      .preview{
        width: 250px;
        padding: 5px;
        border-radius: 5px;
        min-height: 100px;
        background: #233242;
      }
    </style>

@endsection