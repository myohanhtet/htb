@php 
  $en_mya = ['0' => 'ဝ', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄', '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉',]; 
@endphp
@extends('layouts.app')

@section('content')
    <section class="content-header">
      <div class="text-center">
        <h4>
          {!! ($ui_config['dash-title-one'] == null ? "Dashboard Title One" : $us_config['dash-title-one']) !!}
        </h4>
        <h4>
          {!! ($ui_config['dash-title-two'] == null ? "Dashboard Title Two" : $ui_config['dash-title-two']) !!}
        </h4>
        <h3>
          {!! ($ui_config['dash-title-three'] == null ? "Dashboard Title Three" : $ui_config['dash-title-three']) !!}
        </h3>
        <h3>
          {!! ($ui_config['dash-title-four'] == null ? "Dashboard Title Four" : $ui_config['dash-title-four'] ) !!}
        </h3>
      </div>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="row">          

          <div class="col-md-3">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-yellow"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ငွေပဒေသာစုစုပေါင်း</span>
                <span class="info-box-number">                   
                    
                    {!! strtr($sumData['value'],$en_mya) !!}
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">လှူဖွယ်ပစ္စည်းတန်ဖိုး</span>
                <span class="info-box-number">{!! strtr($sumData['mtlvalue'],$en_mya) !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-green"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">နှစ်ရပ်ပေါင်း တန်ဖိုး</span>
                <span class="info-box-number">{!! strtr($sumData['totalvalue'],$en_mya) !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-aqua"><i class="fa fa-users" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">အလှူရှင်ပေါင်း</span>
                <span class="info-box-number">{!! strtr($sumData['totaldonar'],$en_mya) !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        </div>
        

        <div class="clearfix"></div>
    </div> 
        
@endsection



