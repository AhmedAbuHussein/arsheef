@extends('layouts.master')
@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{ __('file.dashboard') }}</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ __('file.dashboard') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid">
       
       <div class="row">

        <div class="col-md-3">
            <div class="box">
                <i class="fa fa-inbox" style="color: #3cafb4"></i>
                <span>{{ $items->where('type', 'inst_scen')->count() }}</span>
                <a href="{{ route('index', ['type'=> 'inst_scen']) }}">{{ __('file.installation scenes') }}</a>
            </div>
        </div>

           <div class="col-md-3">
               <div class="box">
                   <i class="fa fa-eye" style="color: #865f13"></i>
                   <span>{{ $items->where('type', 'insp_scen')->count() }}</span>
                   <a href="{{ route('index', ['type'=> 'insp_scen']) }}">{{ __('file.inspection scenes') }}</a>
               </div>
           </div>


           <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-contao" style="color: #3cafb4"></i>
                    <span>{{ $ins_cont->where('type', 'inst_cont')->count() }}</span>
                    <a href="{{ route('index', ['type'=> 'inst_cont']) }}">{{ __('file.installation contracts') }}</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="box">
                    <i class="fa fa-eye" style="color: #865f13"></i>
                    <span>{{ $ins_cont->where('type', 'insp_cont')->count() }}</span>
                    <a href="{{ route('index', ['type'=> 'insp_cont']) }}">{{ __('file.inspection contracts') }}</a>
                </div>
            </div>
        
       </div>

    </div>
@endsection

@section('style')
<style>
    .box{
        width: 100%;
        margin-bottom: 15px;
        min-height: 215px;
        background: #efefef;
        border-radius: 10px;
        padding: 20px;
        position: relative;
    }
    .box i{
        font-size: 70px;
    }
    .box span{
        position: absolute;
        top: 10px;
        right: 30px;
        font-size: 50pt;
    }
    .box a{
        position: absolute;
        bottom: 0;
        left:0;
        right: 0;
        width:100%;
        padding:10px;
        background: #eaeaea;
        text-align: center;
        font-size: 20px;
        transition: all 0.5s linear;
        color: #000;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
    }
    .box a:hover{
        background: #3cafb4;
        color: white;
    }
    .sidebar-nav ul .sidebar-item{
        width: auto;
    }
</style>
@endsection