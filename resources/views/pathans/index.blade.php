@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pathans</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pathans.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <h1>Amount: {{ $pathans['amount'] }}, Material Amount: {{ $pathans['mtl_amount'] }}</h1>
        <div class="box box-warning">
            <div class="box-body">
                    @include('pathans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

