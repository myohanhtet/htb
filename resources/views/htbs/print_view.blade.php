@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">ထန္းတပင္ေက်ာင္းတိုက္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္စာေရးတံမဲ ေလာင္းလွဴပူေဇာ္ပြဲ</h1><br>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('htbs.create') !!}">Next</a>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('htbs.edit', $htb->id) }}">Edit</a>

           
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        
        <div class="clearfix"></div>
        <!-- <div class="box box-primary"> -->
            <!-- <div class="box-body"> -->

                <!-- <div class="row"> -->
                    <!-- <div class="col-md-6"> -->
                        
                    <!-- </div> -->
                    <!-- <div class="col-md-6"> -->
                        <embed src="{{ url('invoice/') .'/' .$filename }}" alt="pdf" width="1120" height="500" />
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
