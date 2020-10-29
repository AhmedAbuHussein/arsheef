@extends('layouts.master')
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
                            <a href="{{ route('home') }}">{{ __('file.home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('profile') }}">{{ __('file.profile') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('file.edit') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 60px">
   <div class="row col-md-10 ml-auto mr-auto">
       <form style="width: 100%" action="{{ route('profile.edit', ['type'=>$type]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- establish name and admin name --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="establish_name">{{ __('file.establish name') }}</label>
                        <input type="text" id="establish_name" name="establish_name" value="{{ old('establish_name')??optional($user->information)->establish_name }}" class="form-control" placeholder="{{ __('file.establish name') }}" required />
                        @error('establish_name')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="admin_name">{{ __('file.admin name') }}</label>
                        <input type="text" id="admin_name" name="admin_name" value="{{ old('admin_name')??optional($user->information)->admin_name }}" class="form-control" placeholder="{{ __('file.admin name') }}" required />
                        @error('admin_name')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
           <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">{{ __('file.email') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email')??optional($user->information)->email }}" class="form-control" placeholder="{{ __('file.type email') }}" required />
                        @error('email')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">{{ __('file.phone') }}</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone')??optional($user->information)->phone }}" class="form-control" placeholder="{{ __('file.type phone') }}" required />
                        @error('phone')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
               </div>
           </div>

           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="commerical_register">{{ __('file.commerical register') }}</label>
                        <input type="number" id="commerical_register" name="commerical_register" value="{{ old('commerical_register')??optional($user->information)->commerical_register }}" class="form-control" placeholder="{{ __('file.commerical register') }}" required />
                        @error('commerical_register')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="license_number">{{ __('file.license number') }}</label>
                        <input type="number" id="license_number" name="license_number" value="{{ old('license_number')??optional($user->information)->license_number }}" class="form-control" placeholder="{{ __('file.license number') }}" required />
                        @error('license_number')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="form-group">
                        <label for="img" id="label-img">
                            <img style="cursor: pointer;" class="preview" src="{{ is_null($user->information)?'':url($user->information->logo) }}" title="Choose image" />
                        </label>
                        <input type="file" class="form-control-file" name="logo" id="img" accept="image/*" @if(is_null(optional($user->information)->logo)) required @endif>
                        <small id="emailHelp" class="form-text text-muted">{{ __('file.logo helper') }}</small>
                        @error('logo')
                            <div class="text-danger text-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block">{{ __('file.process') }}</button>
                    </div>
                </div>
            </div>
        </form>
   </div>

</div>
@endsection