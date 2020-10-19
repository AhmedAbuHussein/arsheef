@extends('layouts.admin')
@section('content')
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('admin.Order') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Order') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="content">
            <table id="table" class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>{{ __('admin.Last Update') }}</th>
                        <th>{{ __('admin.User') }}</th>
                        <th>{{ __('admin.Price') }}</th>
                        <th>{{ __('admin.Status') }}</th>
                        <th>{{ __('admin.Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($orders as $product)
                        <tr>
                            <td style="line-height: 67px;">{{ $product->updated_at->diffForHumans() }}</td>
                            <td style="line-height: 67px;">{{ $product->user->name }}</td>
                            <td style="line-height: 67px;">{{ $product->price }}</td>
                            <td style="line-height: 67px;">{{ $product->status }}</td>
                            <td style="line-height: 67px;">
                                <a href="{{ route('admin.orders.show', ['order'=> $product]) }}" class="btn btn-primary">{{ __('admin.Show') }}</a>
                                <a href="{{ route('admin.orders.edit', ['order'=> $product]) }}" class="btn btn-success">{{ __('admin.Edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                
            </table> 
        </div>
        <script>
            $(function () {
                $('#table').DataTable();
            })
        </script>
    </div>
    
@endsection