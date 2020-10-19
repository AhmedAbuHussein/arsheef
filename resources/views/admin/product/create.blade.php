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
            <h4 class="page-title">{{ __('admin.Product') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.products.index') }}">{{ __('admin.Product') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Create') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid">

        <form action="{{ route('admin.products.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center">
                    <label for="nameen">{{ __('admin.Name In English') }}</label>
                    <input type="text" name="name[en]" id="nameen" value="{{ old('name.en') }}" class="form-control" placeholder="Item Name English" required>
                    @error('name.en')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center ">
                    <label for="namear">{{ __('admin.Name In Arabic') }}</label>
                    <input type="text" name="name[ar]" id="namear" value="{{ old('name.ar') }}" class="form-control" placeholder="Item Name Arabic" required>
                    @error('name.ar')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center ">
                    <label for="price">{{ __('admin.Price') }}</label>
                    <input type="number" min="1" name="price" id="price" value="{{ old('price') }}" class="form-control" placeholder="Item price" required>
                    @error('price')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center ">
                    <label for="detailsen">{{ __('admin.Details In English') }}</label>
                    <textarea rows="3" name="details[en]" id="detailsen" class="form-control" placeholder="Item details English" required>{{ old('details.en') }}</textarea>
                    @error('details.en')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center ">
                    <label for="detailsar">{{ __('admin.Details In Arabic') }}</label>
                    <textarea rows="3" name="details[ar]" id="detailsar" class="form-control" placeholder="Item details Arabic" required>{{ old('details.ar') }}</textarea>
                    @error('details.ar')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center ">
                    <label for="category_id">{{ __('admin.Category') }}</label>
                    <select class="form-control" name="category_id" required>
                        <option value="">-- Choose --</option>
                        @foreach ($categories as $category)
                        <option {{  (old('category_id') == $category->id)? 'selected':'' }} value="{{ $category->id }}">{{ $category->name_lang }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                </div>
            </div>
            <div class="row">
                    <div class="form-group col-md-6 offset-md-3 block-center  mb-3">
                        <label for="img" id="label-img">
                            <img style="cursor: pointer;" class="preview" src="" title="Choose image" />
                        </label>
            
                        <input type="file" class="form-control-file" name="image" id="img" accept="image/*" >
                        @error('image')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6 offset-md-3 block-center  mb-4 mt-4">
                    <button type="submit" class="btn btn-purple btn-block"><i class="fa fa-send"></i> {{ __('admin.Process') }}</button>
                </div>

            </div>


        </form>

    </div>
@endsection