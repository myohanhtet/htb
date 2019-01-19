@php 
  $en_mya = ['0' => '၀', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄', '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉',]; 
@endphp
@extends('layouts.app')

@section('content')
    <section class="content-header">
      <div class="text-center">
        <h4>
          ကမာရြတ္ၿမိဳ႕နယ္၊ ထန္းတပင္ေက်ာင္းတိုက္၊ ဆုေတာင္းျပည့္ ကိုးန၀င္းကပ္ေက်ာ္သိမ္ဦးေစတီေတာ္
        </h4>
        <h4>
          (၁၀၃)ႀကိမ္ေျမာက္ ဗုဒၶပူဇနိယပြဲေတာ္
        </h4>
        <h3>
          စာေရးတံမဲေလာင္းလွဴပူေဇာ္ပြဲ
        </h3>
        <h3>
           ေငြပေဒသာပင္ႏွင့္ပစၥည္းတန္ဖိုး စာရင္းခ်ဳပ္
        </h3>
      </div>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="row">          
          <div class="col-md-4">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-yellow"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ေငြပေဒသာစုစုေပါင္း</span>
                <span class="info-box-number">                   
                    
                    {!! strtr($sumData['value'],$en_mya) !!}
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-red"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">လွဴဖြယ္ပစၥည္းတန္ဖိုး</span>
                <span class="info-box-number">{!! strtr($sumData['mtlvalue'],$en_mya) !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-4">
            <div class="info-box">
              <!-- Apply any bg-* class to to the icon to color it -->
              <span class="info-box-icon bg-green"><i class="fa fa-usd" aria-hidden="true"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ႏွစ္ရပ္ေပါင္း တန္ဖိုး</span>
                <span class="info-box-number">{!! strtr($sumData['totalvalue'],$en_mya) !!}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        

        <div class="clearfix"></div>
    </div> 
        
@endsection



