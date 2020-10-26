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
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.users.index', ['account_type'=> $type]) }}">{{ __('file.users') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('file.edit') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 60px">
       <div class="row">
           <div class="col-md-6 mr-auto ml-auto">
                <form action="{{ route('admin.users.edit', ['account_type'=> $type, 'user'=> $user->id]) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('file.name') }}</label>
                        <input type="text"  id="name" value="{{ old('name')?? $user->name }}" class="form-control"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('file.email') }}</label>
                        <input type="email"  id="email" value="{{ old('email')?? $user->email }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ __('file.phone') }}</label>
                        <input type="text"  id="phone" value="{{ old('phone')?? $user->phone }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="expired_at">{{ __('file.expired_at') }}</label>
                        <input type="text" name="expired_at" id="expired_at" autocomplete="off" value="{{ old('expired_at')??$user->expired_at }}" class="form-control" placeholder="{{ __('file.please enter account expired date') }}" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-block btn-dark">{{ __('file.process') }}</button>
                    </div>
                
                </form>
           </div>
       </div>

    </div>
    @endsection
    @section('script')
        <script>
            $(function(){
                $('#expired_at').datetimepicker({
                    format:'Y-m-d H:i',
                    lang: 'ar',
                    theme: 'dark'
                });
            });
        </script>
    @endsection