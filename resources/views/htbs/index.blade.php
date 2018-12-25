@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">ထန္းတပင္ေက်ာင္းတိုက္၊ (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္စာေရးတံမဲ ေလာင္းလွဴပူေဇာ္ပြဲ</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="#">Edit</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('htbs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@include('htbs.model')
@endsection

@push('scripts')
    <script>

        $('#showProject').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget)
              var recipient = button.data('whatever') 
              var modal = $(this)
              // modal.find('.modal-title').text(data.subdomains[0].name)
              modal.find('.del_id').val(recipient)
              
        });

    </script>
@endpush