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
    <form method="POST" enctype="multipart/form-data" action="{{ route('attach', ['type'=> $type, 'parent'=> $parent, 'file'=> $file]) }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="attach_{{ $file }}">{{ __('file.attach file') }}</label>
              <input type="file" name="attach_{{ $file }}" value="{{ old('attach_'.$file) }}" class="form-control" id="attach_{{ $file }}" />
              @error('attach_{{ $file }}')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <p>{{ __('file.current File') }}</p>
                {!! $oldFile? "<a download href='".asset($oldFile)."'>".__('file.download')."</a>" : '-----------------------' !!}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('file.process') }}</button>

    </form>

</div>
@endsection