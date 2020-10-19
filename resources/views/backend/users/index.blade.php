@extends('layouts.admin')
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
                            <a href="{{ route('admin.index') }}">{{ __('file.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('file.users') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 offset-md-4 block-center">
            <a href="{{ route('admin.users.create') }}" class="btn btn-purple btn-block"><i class="fa fa-product-hunt"></i> {{ __('file.new') }}</a>
        </div>
    </div>

    <div class="content">
        <table id="table" class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>{{ __('file.name') }}</th>
                    <th>{{ __('file.phone') }}</th>
                    <th>{{ __('file.expired at') }}</th>
                    <th>{{ __('file.control') }}</th>
                </tr>
            </thead>
            
            <tbody>

                @foreach ($users as $user)
                <tr class="text-center">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->expired_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.users.edit', ['user'=> $user->id]) }}"><i class="fa fa-edit"></i></a> 
                        <a class="btn btn-primary" href="{{ route('admin.users.show', ['user'=> $user->id]) }}"><i class="fa fa-eye"></i></a>
                        <a onclick="event.preventDefault(); document.getElementById('distroy-form-{{ $user->id }}').submit();" class="btn btn-danger" href="{{ route('admin.users.destroy', ['user'=> $user->id]) }}"><i class="fa fa-close"></i></a>
                        <form id="distroy-form-{{ $user->id }}" action="{{ route('admin.users.destroy', ['user'=> $user->id]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>  
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