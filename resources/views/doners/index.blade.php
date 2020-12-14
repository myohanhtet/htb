@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Doners</h1>
        <h1 class="pull-right">
           <a class="btn box-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('doners.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                    @include('doners.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

