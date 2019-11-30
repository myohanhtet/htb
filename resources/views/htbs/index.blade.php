@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! ($ui_config['title'] == null ? "Title": $ui_config['title']) !!}</h1><br>
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
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