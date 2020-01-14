@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="box box-warning">
            <div class="box-body">
              @include('luckys.search')
            </div>
        </div>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
           <button class="btn btn-default" type="button">
            ပြေစာအမှတ် <span class="badge">{{ strtr($htb->id,Config('mmconverter.number.en_mya')) }}</span>
            </button><p></p>
               <div class="row">
                   {!! Form::model($htb, ['route' => ['htbs.update', $htb->id], 'method' => 'patch']) !!}

                        @include('luckys.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection