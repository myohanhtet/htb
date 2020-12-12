@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pathan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pathan, ['route' => ['pathans.update', $pathan->id], 'method' => 'patch']) !!}

                        @include('pathans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection