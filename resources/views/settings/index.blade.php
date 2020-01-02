@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Settings</h1>
        <h1 class="pull-right">
           <a class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('settings.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ route('doner.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="fileinput" name="donerlist">
                      <p class="help-block">Doner list upload Name,Address,Email,Phone</p>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <div class="box box-warning">
            <div class="box-body">
                    @include('settings.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

