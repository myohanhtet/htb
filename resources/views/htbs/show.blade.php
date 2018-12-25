@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            ထန္းတပင္ေက်ာင္းတိုက္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္စာေရးတံမဲ ေလာင္းလွဴပူေဇာ္ပြဲ
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('htbs.show_fields')
                    <a href="{!! route('htbs.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
