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

<div class="container" style="margin-top: 60px">
   <div class="row col-md-8 ml-auto mr-auto">
       <form style="width: 100%" action="{{ route('profile.edit', ['type'=>$type]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('file.name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name')??$user->name }}" class="form-control" placeholder="{{ __('file.type name') }}" required />
                @error('name')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">{{ __('file.email') }}</label>
                <input type="email" id="email" name="email" value="{{ old('email')??$user->email }}" class="form-control" placeholder="{{ __('file.type email') }}" required />
                @error('email')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">{{ __('file.phone') }}</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone')??$user->phone }}" class="form-control" placeholder="{{ __('file.type phone') }}" required />
                @error('phone')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('file.password') }}</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="{{ __('file.type password') }}" />
                @error('password')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">{{ __('file.password confirmation') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="{{ __('file.type password confirmation') }}" />
                @error('password_confirmation')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="img" id="label-img">
                    <img style="cursor: pointer;" class="preview" src="{{ is_null($user->image)?'':url($user->image) }}" title="Choose image" />
                </label>
                <input type="file" class="form-control-file" name="image" id="img" accept="image/*" @if(is_null($user->image)) required @endif>
                @error('image')
                    <div class="text-danger text-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block">{{ __('file.process') }}</button>
            </div>

        </form>
   </div>

</div>
@endsection