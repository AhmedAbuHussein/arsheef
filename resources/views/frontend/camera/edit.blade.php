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

            @foreach ($data->items as  $key=>$item)
            <div class="form-row">
              <h4 class="text-right text-muted col-12 bg-dark p-2">عنصر رقم {{ $loop->iteration }}</h4>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label >{{ __('file.name') }}</label>
              <input type="text" class="form-control"  name="items[{{ $item->id }}][name]" value="{{ $item->name }}" required />
            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.type') }}</label>
              @if ($item->type != 'بوصة')
              <input type="text" value="{{ $item->type }}" name="items[{{ $item->id }}][type]" class="form-control"/>

              @elseif($item->type == 'بوصة')
              <input type="number" name="items[{{ $item->id }}][details_info]" value="{{ old("items[$item->id]['details_info']")??$item->details_info}}" class="form-control"/>
              <input type="hidden" value="بوصة" name="items[{{ $item->id }}][type]" />
              <span class="details-span">بوصة</span>
              @endif
            </div>
            <div class="form-group col-md-4">
              <label >{{ __('file.quantity') }}</label>
              <input type="number" name="items[{{ $item->id }}][quantity]" value="{{ old("items[$item->id][quantity]")??$item->quantity }}" class="form-control" required />
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label>{{ __('file.details') }}</label>

              <input id="details" type="text" name="items[{{ $item->id }}][details]" value="{{ old("items[$item->id][details]")??$item->details }}" class="form-control" required />
              @if ($item->details_info == "ميجا بيكسل")
              <input type="hidden" value="ميجا بيكسل" name="items[{{ $item->id }}][details_info]" />
              <span class="details-span">ميجا بيكسل</span>
              @endif
              @if($item->details_info == 'قنوات')
              <input type="hidden" value="قنوات" name="items[{{ $item->id }}][details_info]" />
              <span class="details-span">قنوات </span>
              @endif

            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.modal') }}</label>
              <select name="items[{{ $item->id }}][modal]" class="form-control select2">
                <option {{ old("items[$item->id][modal]") == 'hikvision'?'selected':(is_null(old("items[$item->id][modal]")) && $item->modal == 'hikvision'? 'selected': '') }} value="hikvision">Hikvision</option>
                @if ($item->modal != 'hikvision')
                <option selected value="{{ $item->modal }}">{{ $item->modal }}</option>
                @endif
              </select>
            </div>


            @if ($item->storage)
            <div class="form-group col-md-4 custom">
              <label>{{ __('file.storage') }}</label>
              <input type="text" name="items[{{ $item->id }}][storage]" value="{{ old("items[$item->id][storage]")??$item->storage }}" class="form-control" />
              <select class="select2 details-span" name="items[{{ $item->id }}][storage_info]">
                <option {{ $item->storage_info == 'جيجابايت'?'selected':'' }} value="جيجابايت">جيجابايت</option>
                <option {{ $item->storage_info == 'تيرابايت'?'selected':'' }} value="تيرابايت">تيرابايت</option>
                <option {{ $item->storage_info == 'زيتابايت'?'selected':'' }} value="زيتابايت">زيتابايت</option>
              </select>
            </div>
            @endif

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
@section('script')
    <script>
        $(function() {
            $(".select2").select2({
              tags: true
            });
        });
    </script>
@endsection
@section('style')
<style>
  #details{
    position: relative;
  }
  .details-span{
    position: absolute;
    top: 30px;
    left: 6px;
    background: #343a40;
    padding: 6px 17px;
    color: white;
    font-weight: bold;
  }
  .custom .select2-container{
    width: 109px;
    position: absolute;
    top: 29px;
    left: 6px;
    height: 33px;
    border-radius: 0;
  }
  .custom .select2-container--default .select2-selection--single{
    height: 33px;
    border-radius: 0;
  }
  .custom .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered{
    background: #343a40;
    color: white;
    line-height: 33px;
  }
</style>
@endsection
