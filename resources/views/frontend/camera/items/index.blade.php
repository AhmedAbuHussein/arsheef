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
                        <li class="breadcrumb-item active" aria-current="page">{{ __("file.items") }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 60px">
   
    <div class="row">
        <div class="col-md-4 mr-auto ml-auto">
            <a href="{{ route('items.create', ['type'=> $type, 'parent'=>$parent]) }}" class="btn btn-purple btn-block"><i class="fa fa-plus"></i> {{ __('file.new') }}</a>
        </div>
    </div>
    <div class="content">
        <table id="table" class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>{{ __('file.name') }}</th>
                    <th>{{ __('file.quantity') }}</th>
                    <th>{{ __('file.type') }}</th>
                    <th>{{ __('file.storage') }}</th>
                    <th>{{ __('file.modal') }}</th>
                    <th>{{ __('file.control') }}</th>
                </tr>
            </thead>
            
            <tbody>

                @foreach ($data as $item)
                <tr class="text-center">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->storage }}</td>
                    <td>{{ $item->modal }}</td>
                  
                    <td>
                        <a title="تعديل بيانات" class="btn btn-success" href="{{ route('items.edit', ['type'=> $type, 'parent'=> $parent, 'item'=> $item->id]) }}"><i class="fa fa-edit"></i></a> 
                        <a title="عرض البيانات" class="btn btn-primary" href="{{ route('items.show', ['type'=> $type, 'parent'=> $parent, 'item'=> $item->id]) }}"><i class="fa fa-eye"></i></a>
                        <a title="حذف البيانات" onclick="destroyUser(event, {{ $item->id }})" class="btn btn-danger" href="{{ route('items.destroy',['type'=> $type, 'parent'=> $parent, 'item'=> $item->id]) }}"><i class="fa fa-close"></i></a>
                        <form id="distroy-form-{{ $item->id }}" action="{{ route('items.destroy',['type'=> $type, 'parent'=> $parent, 'item'=> $item->id]) }}" method="POST" style="display: none;">
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