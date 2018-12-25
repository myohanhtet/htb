@extends('layouts.app')

@section('content')
    <section class="content-header">

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        
        <div class="row">
          <div class="col-md-3">
              <div class="box box-danger">
              <div class="box-body">
                <div id="app_div"></div>
                <ul class="list-group">
                <li class="list-group-item">
                  <span class="badge">14</span>
                  Cras justo odio
                </li>
                <li class="list-group-item">
                  <span class="badge">14</span>
                  Cras justo odio
                </li>
                <li class="list-group-item">
                  <span class="badge">14</span>
                  Cras justo odio
                </li>
                <li class="list-group-item">
                  <span class="badge">14</span>
                  Cras justo odio
                </li>
              </ul>
                <a href="{{ url('domain') }}/1">More info</a>
              </div>
            </div>
          </div><!--/col-md-3-->
          <div class="col-md-3">
            <div class="box box-danger">
              <div class="box-body">
                <div id="inf_div"></div>
                <a href="{{ url('domain') }}/2">More info</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box-danger">
              <div class="box-body">
                <div id="supp_div"></div>
                <a href="{{ url('domain') }}/3">More info</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box-danger">
              <div class="box-body">
                <div id="admin_div"></div>
                <a href="{{ url('domain') }}/4">More info</a>
              </div>
            </div>
          </div>
        </div>
 

        <div class="text-center">
            <!-- <h1>"For live"</h1> -->
            <button class="getLive">Get</button>
        </div>
    </div>


{!! $lava->render('DonutChart', 'Application', 'app_div') !!}
{!! $lava->render('DonutChart', 'Infrastructure', 'inf_div') !!}
{!! $lava->render('DonutChart', 'Support', 'supp_div') !!}
{!! $lava->render('DonutChart', 'Admin', 'admin_div') !!}
@endsection


@push('scripts')
  <script>
    $('.domain').on('change', function() {        
         window.location.href = "{{ url('dashboard/domain') }}/" + this.value;
    });
  </script>
@endpush


