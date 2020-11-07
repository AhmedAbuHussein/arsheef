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
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.details") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px">

    <form method="POST" enctype="multipart/form-data" action="{{ route('create.details', ['type'=> $type, 'parent'=> $parent]) }}">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="form-row">
            <div class="form-group col-md-10 mr-auto ml-auto">
              <label for="details">{{ __('file.details') }}</label>
              <textarea name="details" class="form-control texteditor" id="details" required >{{ old('details')??$item->details }}</textarea>
              @error('details')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10 mr-auto ml-auto">
                <button type="submit" class="btn btn-block btn-primary">{{ __('file.process') }}</button>
            </div>
        </div>
    </form>

</div>
@endsection
@section('style')
    <style>
        .simditor .simditor-body, .editor-style{
            padding-right: 35px;
            padding-left: 35px;
        }
    </style>
@endsection