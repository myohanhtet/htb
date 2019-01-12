@extends('layouts.app')

@section('content')
    <section class="content-header">

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="row">
          <div class="col-md-6">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ေငြပေဒသာစုစုေပါင္း</span>
                <span class="info-box-number">
                  
                    {!! $sumData['value'] !!}
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">လွဴဖြယ္ပစၥည္းတန္ဖိုး</span>
                <span class="info-box-number">{!! $sumData['mtlvalue'] !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        

        <div class="clearfix"></div>
    </div> 
        
@endsection



