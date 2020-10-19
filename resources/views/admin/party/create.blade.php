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
            <h4 class="page-title">{{ __('admin.Parties') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.parties.index') }}">{{ __('admin.Parties') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Create') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">

        <form action="{{ route('admin.parties.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="owner">{{ __('admin.Owner') }}</label>
                    <input type="text" name="owner" id="owner" value="{{ old('owner') }}" class="form-control" placeholder="Party Owner" required>
                    @error('owner')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">

                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="event">{{ __('admin.Event') }}</label>
                    <input type="text" name="event" id="event" value="{{ old('event') }}" class="form-control" placeholder="eg: Birthday Party" required>
                    @error('event')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="link">{{ __('admin.URL') }}</label>
                    <input type="url" name="link" id="link" value="{{ old('link') }}" class="form-control" placeholder="URL of Youtube party or video link">
                    @error('link')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center mb-3">
                    <label for="img" id="label-img">
                        <img style="cursor: pointer;" class="preview" src="" title="Choose image" />
                    </label>
        
                    <input type="file" class="form-control-file" name="image" id="img" accept="image/*" required>
                    @error('image')
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