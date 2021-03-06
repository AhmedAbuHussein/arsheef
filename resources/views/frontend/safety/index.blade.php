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
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.{$type}") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 60px">
   
    <div class="row">
        <div class="col-md-4 mr-auto ml-auto">
            <a href="{{ route('create', ['type'=> $type]) }}" class="btn btn-purple btn-block"><i class="fa fa-plus"></i> {{ __('file.new') }}</a>
        </div>
    </div>
    <div class="content">
        <table id="table" class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>{{ __('file.name') }}</th>
                    <th>{{ __('file.phone') }}</th>
                    <th>{{ __('file.building no') }}</th>
                    <th>{{ __('file.street') }}</th>
                    <th>{{ __('file.city') }}</th>
                    <th>{{ __('file.control') }}</th>
                </tr>
            </thead>
            
            <tbody>

                @foreach ($items as $item)
                <tr class="text-center">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->building_no }}</td>
                    <td>{{ $item->street }}</td>
                    <td>{{ $item->city }}</td>
                  
                    <td>
                        <a class="btn btn-success" href="{{ route('edit', ['type'=> $type, 'item'=> $item->id]) }}"><i class="fa fa-edit"></i></a> 
                        <a class="btn btn-primary" href="{{ route('show', ['type'=> $type, 'item'=> $item->id]) }}"><i class="fa fa-eye"></i></a>
                        <a onclick="destroyUser(event, {{ $item->id }})" class="btn btn-danger" href="{{ route('destroy',['type'=> $type, 'item'=> $item->id]) }}"><i class="fa fa-close"></i></a>
                        <form id="distroy-form-{{ $item->id }}" action="{{ route('destroy',['type'=> $type, 'item'=> $item->id]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>  
                    </td>
                </tr>
            @endforeach 
                
            </tbody>
            
        </table> 
    </div>

</div>
@endsection
@section('script')
<script>
    function destroyUser(event, userid){
        event.preventDefault();
        let elm = document.getElementById(`distroy-form-${userid}`);
        swal({
            title: "{{ __('file.are you sure?') }}",
            text: "{{ __('file.after delete you can not restore this data') }}",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if(result) {
                 elm.submit();
            } 
        }).catch((err)=>{
            console.log(err);
        });
    }

    $(function () {
        try {
            $('#table').DataTable();
        } catch (error) {
            
        }
       

    })
</script>
@endsection