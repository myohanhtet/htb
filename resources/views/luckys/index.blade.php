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
              <div class="row">
                <div class="col-lg-6">
                  <form method="GET" action="{{ route('lucky.find') }}">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." name="lucky_no">
                    <span class="input-group-btn">
                      <button class="btn btn-success" type="submit">Go!</button>
                    </span>
                  </div><!-- /input-group -->
                  </form>
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">
                  <form method="GET" action="{{ route('lucky.edit') }}">
                  <div class="input-group">
                    <input type="number" class="form-control" placeholder="Search for..." name="id">
                    <span class="input-group-btn">
                      <button class="btn btn-success" type="submit">Edit</button>
                    </span>
                  </div><!-- /input-group -->
                  </form>
                </div><!-- /.col-lg-6 -->
              </div>
            </div>
        </div>

        @if(isset($filename))
          <div class="text-center">
            <embed src="{{ url('luckyinvoice/') .'/' . $filename }}" alt="pdf" width="1120" height="500" />
          </div>
        @endif
        
    </div>
@endsection
