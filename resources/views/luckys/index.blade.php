@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! ($ui_config['title'] == null ? "Title" : $ui_config['title']) !!}</h1><br>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('htbs.create') }}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
            
            <div class="box-body">
              @include('luckys.search')
            </div>
        </div>

        @if(isset($filename))
          <div class="text-center">
            <embed src="{{ url('luckyinvoice/') .'/' . $filename }}" alt="pdf" width="1120" height="500" />
          </div>
        @endif
        
    </div>
@endsection
