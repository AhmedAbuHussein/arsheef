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
                        <li class="breadcrumb-item">
                            <a href="{{ route('items', ['type'=> $type,'parent'=>$parent]) }}">{{ __("file.items") }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.edit") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px">

    <form method="POST" action="{{ route('items.edit', ['type'=> $type, 'parent'=> $parent, 'item'=> $item->id]) }}">
        @csrf
        <input type="hidden" name="contract_id" value="{{ $parent }}">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">{{ __('file.name') }}<span class="required"> *</span></label>
            <input type="text" name="name" value="{{ old('name')??$item->name }}" class="form-control" id="name" required />
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="quantity">{{ __('file.quantity') }}<span class="required"> *</span></label>
            <input type="number" min="1" name="quantity" value="{{ old('quantity')??$item->quantity }}" class="form-control" id="quantity" required />
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="type">{{ __('file.type') }}<span class="required"> *</span></label>
            <input type="text" name="type" value="{{ old('type')??$item->type }}" class="form-control" id="type" required />
            @error('type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="details">{{ __('file.details') }}<span class="required"> *</span></label>
            <input type="text" name="details" value="{{ old('details')??$item->details }}" class="form-control" id="details" required />
            @error('details')
              <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="modal">{{ __('file.modal') }}<span class="required"> *</span></label>
                <input type="text" name="modal" value="{{ old('modal')??$item->modal }}" class="form-control" id="modal" required />
                @error('modal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="storage">{{ __('file.storage') }}</label>
              <input type="text" name="storage" value="{{ old('storage')??$item->storage }}" class="form-control" id="storage" />
              @error('storage')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
           
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
                <label for="other">{{ __('file.notes') }}</label>
                <textarea name="other" rows="4" class="form-control" id="other">{{ old('other')??$item->other }}</textarea>
                @error('other')
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
        .required{
            color: #800808;
        }
    </style>
@endsection