@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {!! ($ui_config['title'] == null ? "Title" : $ui_config['title']) !!}
        </h1>
    </section>
    <div class="content">
        <div class="box box-info">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('htbs.show_fields')
                    <a href="{!! route('htbs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
