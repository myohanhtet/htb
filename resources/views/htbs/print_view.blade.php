@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! $ui_config['title'] !!}</h1><br>
        <h1 class="pull-right">

            <a class="btn btn-success pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('htbs.create') !!}">Next <i class="fa fa-forward" aria-hidden="true"></i></a>
           <a class="btn btn-primary pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('htbs.edit', $htb->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
           <a class="btn btn-success pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('htbs.index') !!}"> <i class="fa fa-backward" aria-hidden="true"></i> Back To Table</a>

           <div class="pull-left" style="margin-top: -10px;margin-bottom: 5px">
            <form method="GET" action="{{ route('lucky.edit') }}">
                <div class="col-md-3">
                <div class="input-group">
                 <input type="number" class="form-control" placeholder="Search for..." name="id">
                  <span class="input-group-btn">
                    <button class="btn btn-success" type="submit">Edit</button>
                  </span>
                </div><!-- /input-group -->
                </div>
            </form>
        </div>

        </h1>
        
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        
        <div class="clearfix"></div>

            <div class="text-center">
                <object data="{{ url('invoice/') .'/' .$filename }}" type="application/pdf" width="1120" height="500">
                    <p>Cannot load PDF</p>
                </object>
            </div>
  
        </div>
        
    </div>
@endsection

