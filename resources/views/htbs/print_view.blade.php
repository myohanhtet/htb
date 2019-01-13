@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">ထန္းတပင္ေက်ာင္းတိုက္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္စာေရးတံမဲ ေလာင္းလွဴပူေဇာ္ပြဲ</h1><br>
        <h1 class="pull-right">

            <a class="btn btn-success pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('htbs.create') !!}">Next <i class="fa fa-forward" aria-hidden="true"></i></a>
           <a class="btn btn-primary pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('htbs.edit', $htb->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
           <a class="btn btn-success pull-right flat" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('htbs.index') !!}"> <i class="fa fa-backward" aria-hidden="true"></i> Back To Table</a>

           
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        
        <div class="clearfix"></div>

            <div class="text-center">
                <embed src="{{ url('invoice/') .'/' .$filename }}" alt="pdf" width="1120" height="500" />
            </div>
  
        </div>
        
    </div>
@endsection

