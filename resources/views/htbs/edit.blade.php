@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
          {!! ($ui_config['title'] == null ? "Title":$ui_config['title']) !!}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-info">
           <div class="box-body">
            <button class="btn btn-default" type="button">
            {{ __('field.id no') }}<span class="badge">{{ strtr($htb->id,Config('mmconverter.number.en_mya')) }}</span>
            </button><p></p>
               <div class="row">
                   {!! Form::model($htb, ['route' => ['htbs.update', $htb->id], 'method' => 'patch']) !!}

                        @include('htbs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection