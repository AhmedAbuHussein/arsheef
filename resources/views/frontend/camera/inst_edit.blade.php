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

    <form method="POST" enctype="multipart/form-data" action="{{ route('edit', ['type'=> $type, 'item'=> $data->id]) }}">
        @csrf
        <input type="hidden" name="type" value="{{ $type }}">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="username">{{ __('file.username') }}</label>
            <input type="text" name="username" value="{{ old('username')??$data->username }}" class="form-control" id="username" required />
            @error('username')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="est_name">{{ __('file.est_name') }}</label>
            <input type="text" name="est_name" value="{{ old('est_name')??$data->est_name }}" class="form-control" id="est_name" required />
            @error('est_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="date">{{ __('file.date') }}</label>
            <input type="text" name="date" value="{{ old('date')??$data->date }}" class="form-control datetime" id="date" autocomplete="off" required />
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="start_date">{{ __('file.start_date') }}</label>
            <input type="text" name="start_date" value="{{ old('start_date')??$data->start_date }}" class="form-control datetime" id="start_date" autocomplete="off" required />
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
            <div class="form-group col-md-4">
              <label for="total_cost">{{ __('file.total_cost') }}</label>
              <input type="number" min="1" name="total_cost" value="{{ old('total_cost')??$data->total_cost }}" class="form-control" id="total_cost" required />
              @error('total_cost')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="working_days">{{ __('file.working_day') }}</label>
                <input type="number" min="0" step="1" name="working_days" value="{{ old('working_days')??$data->working_days }}" class="form-control" id="working_days" required />
                @error('working_days')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inside_camera">{{ __('file.inside_camera') }}</label>
              <input type="number" min="0" step="1" name="inside_camera" value="{{ old('inside_camera')??$data->inside_camera }}" class="form-control" id="inside_camera" required />
              @error('inside_camera')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="outside_camera">{{ __('file.outside_camera') }}</label>
              <input type="text" min="0" step="1" name="outside_camera" value="{{ old('outside_camera')??$data->outside_camera }}" class="form-control" id="outside_camera" required />
              @error('outside_camera')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
          </div>

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

        });
    </script>
@endsection