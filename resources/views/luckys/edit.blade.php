@extends('layouts.app')

@section('content')
    <section class="content-header">
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
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-info">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($htb, ['route' => ['htbs.update', $htb->id], 'method' => 'patch']) !!}

                        @include('luckys.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection