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

    <form method="POST" action="{{ route('edit', ['type'=> $type, 'item'=> $data->id]) }}">
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
            <label for="phone">{{ __('file.phone') }}</label>
            <input type="text" name="phone" value="{{ old('phone')??$data->phone }}" class="form-control" id="phone" required />
            @error('phone')
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
            <div class="form-group col-md-3">
              <label for="commerical_register">{{ __('file.commerical_register') }}</label>
              <input type="text" name="commerical_register" value="{{ old('commerical_register')??$data->commerical_register }}" class="form-control" id="commerical_register" required />
              @error('commerical_register')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="building_no">{{ __('file.building no') }}</label>
              <input type="text" name="building_no" value="{{ old('building_no')??$data->building_no }}" class="form-control" id="building_no" required />
              @error('building_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
              <label for="second_no">{{ __('file.second no') }}</label>
              <input type="text" name="second_no" value="{{ old('second_no')??$data->second_no }}" class="form-control" id="second_no" required />
              @error('second_no')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="postal_code">{{ __('file.postal code') }}</label>
                <input type="text" name="postal_code" value="{{ old('postal_code')??$data->postal_code }}" class="form-control" id="postal_code" required />
                @error('postal_code')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <hr>
          <h4 class="text-muted text-right my-2">العناصر</h4>
          <hr>
          {{-- items --}}
          
            @foreach ($data->items as  $key=>$cam)
            <div class="form-row">
              <h4 class="text-right text-muted col-12 bg-dark p-2">عنصر رقم {{ $key +1 }}</h4>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label >{{ __('file.quantity') }}</label>
              <input type="text" readonly class="form-control"  name="items[{{ $key }}][name]" value="{{ $cam['name'] }}" required />
            </div>
            
            <div class="form-group col-md-4">
              <label >{{ __('file.quantity') }}</label>
              <input type="text" name="items[{{ $key }}][quantity]" value="{{ old("items[$key][quantity]")??$cam['quantity'] }}" class="form-control" required />
            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.type') }}</label>
              <select name="items[{{ $key }}][type]" required class="form-control">
                <option value="">اختار النوع</option>
                <option {{ $cam['type'] == 'داخلي'?'selected':'' }} value="داخلي">{{ 'داخلي' }}</option>
                <option {{ $cam['type'] == 'خارجي'?'selected':'' }} value="خارجي">{{ 'خارجي' }}</option>
                <option {{ $cam['type'] == 'NVR'?'selected':'' }} value="NVR">{{ 'NVR' }}</option>
                <option {{ $cam['type'] == '32 بوصة'?'selected':'' }} value="32 بوصة">{{ '32 بوصة' }}</option>
              </select>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label>{{ __('file.details') }}</label>
              <input type="text" name="items[{{ $key }}][details]" value="{{ old("items[$key][details]")??$cam['details'] }}" class="form-control" required />
            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.modal') }}</label>
              <input type="text" name="items[{{ $key }}][modal]" value="{{ old("items[$key][modal]")??$cam['modal'] }}" class="form-control" />
            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.storage') }}</label>
              <input type="text" name="items[{{ $key }}][storage]" value="{{ old("items[$key][storage]")??$cam['storage'] }}" class="form-control" />
            </div>
            </div>
            
            @endforeach
          <hr/>
          {{-- itesm --}}

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="receiver">{{ __('file.receiver') }}</label>
              <input type="text" name="receiver" value="{{ old('receiver')??$data->receiver }}" class="form-control" id="receiver" required />
              @error('receiver')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
          </div>
        
            <button type="submit" class="btn btn-primary">{{ __('file.process') }}</button>
      </form>

</div>
@endsection
