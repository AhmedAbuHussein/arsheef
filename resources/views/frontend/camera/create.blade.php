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

          <hr>
          <h4 class="text-muted text-right my-2">العناصر</h4>
          <hr>
          {{-- items --}}

            @foreach (["كاميرا ثابته ip camera", "كاميرا ثابته ip camera", "جهاز تسجيل شبكي NVR", "شاشة عرض"] as  $key=>$cam)
            <div class="form-row">
              <h4 class="text-right text-muted col-12 bg-dark p-2">عنصر رقم {{ $key +1 }}</h4>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label >{{ __('file.name') }}</label>
              <input type="text" readonly class="form-control"  name="items[{{ $key }}][name]" value="{{ $cam }}" required />
            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.type') }}</label>
              @if ($key == 0)
                  <input type="text" value="داخلي" readonly name="items[{{ $key }}][type]" class="form-control"/>
              @elseif($key == 1)
              <input type="text" value="خارجي" readonly name="items[{{ $key }}][type]" class="form-control"/>
              @elseif($key == 2)
              <input type="text" value="NVR" readonly name="items[{{ $key }}][type]" class="form-control"/>
              @elseif($key == 3)
              <input type="number" name="items[{{ $key }}][details_info]" class="form-control"/>
              <input type="hidden" value="بوصة" name="items[{{ $key }}][type]" />
              <span class="details-span">بوصة</span>
              @endif
            </div>
            <div class="form-group col-md-4">
              <label >{{ __('file.quantity') }}</label>
              <input type="number" name="items[{{ $key }}][quantity]" value="{{ old("items[$key][quantity]") }}" class="form-control" required />
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
              <label>{{ __('file.details') }}</label>
              @if ($key == 0 || $key == 1)
              <input id="details" type="number" min="1" step="1" name="items[{{ $key }}][details]" value="{{ old("items[$key][details]") }}" class="form-control" required />
              <input type="hidden" value="ميجا بيكسل" name="items[{{ $key }}][details_info]" />
              <span class="details-span">ميجا بيكسل</span>
              @elseif($key == 2)
              <input id="details" type="number" min="1" step="1" name="items[{{ $key }}][details]" value="{{ old("items[$key][details]") }}" class="form-control" required />
              <input type="hidden" value="قنوات" name="items[{{ $key }}][details_info]" />
              <span class="details-span">قنوات </span>
              @else
              <input id="details" type="text" name="items[{{ $key }}][details]" value="{{ old("items[$key][details]") }}" class="form-control" required />
              @endif

            </div>

            <div class="form-group col-md-4">
              <label>{{ __('file.modal') }}</label>
              <select name="items[{{ $key }}][modal]" class="form-control select2">
                <option {{ old("items[$key][modal]") == 'hikvision' }} value="hikvision">Hikvision</option>
              </select>
            </div>


            @if ($key == 2)
            <div class="form-group col-md-4 custom">
              <label>{{ __('file.storage') }}</label>
              <input type="number" name="items[{{ $key }}][storage]" value="{{ old("items[$key][storage]") }}" class="form-control" />
              <select class="select2 details-span" name="items[{{ $key }}][storage_info]">
                <option value="جيجابايت">جيجابايت</option>
                <option value="تيرابايت">تيرابايت</option>
                <option value="زيتابايت">زيتابايت</option>
              </select>
            </div>
            @endif

            </div>

            @endforeach

            <items></items>


          <hr/>
          {{-- itesm --}}


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
