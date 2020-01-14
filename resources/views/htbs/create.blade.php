@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           {!! ($ui_config['title'] == null ? "Title" :$ui_config['title']) !!}
        </h1><br>
        <a href="{{ route('htbs.index') }}" class="btn btn-success flat"> <i class="fa fa-backward" aria-hidden="true"></i> {{ __('field.back to table') }}</a>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-warning">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'htbs.store']) !!}

                        @include('htbs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
