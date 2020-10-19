@extends('layouts.admin')
@section('content')
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('admin.Users') }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}">{{ __('admin.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('admin.Users') }}</li>
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
                        <th>{{ __('admin.Name') }}</th>
                        <th>{{ __('admin.Phone') }}</th>
                        <th>{{ __('admin.Email') }}</th>
                        <th>{{ __('admin.Control') }}</th>
                    </tr>
                </thead>
                
                <tbody>

                    @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.users.edit', ['user'=> $user->id]) }}"><i class="fa fa-edit"></i> {{ __('admin.Edit') }}</a> 
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