@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            ထန္းတပင္ေက်ာင္းတိုက္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္စာေရးတံမဲ ေလာင္းလွဴပူေဇာ္ပြဲ
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-yellow">

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
