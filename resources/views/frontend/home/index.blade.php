@php
    $en_mya = ['0' => 'ဝ', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄', '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉',];
@endphp
@extends('frontend.layouts.app')

@section('content')
    <div class="text-center m-4">
        <h4 class="p-1">
            {!! ($ui_config['dash-title-one'] == null ? "Dashboard Title One" : $ui_config['dash-title-one']) !!}
        </h4>
        <h4 class="p-1">
            {!! ($ui_config['dash-title-two'] == null ? "Dashboard Title Two" : $ui_config['dash-title-two']) !!}
        </h4>
        <h3 class="p-1">
            {!! ($ui_config['dash-title-three'] == null ? "Dashboard Title Three" : $ui_config['dash-title-three']) !!}
        </h3>
        <h3 class="p-1">
            {!! ($ui_config['dash-title-four'] == null ? "Dashboard Title Four" : $ui_config['dash-title-four'] ) !!}
        </h3>
    </div>
    <div class="row gx-4 gx-lg-5 m-5">
        <div class="col-md-3 mb-5">
            <div class="card h-100 l-bg-orange">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">{{ __('field.total amount') }}</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex p-2">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {!! strtr(number_format($sumData['value']),$en_mya) !!} ကျပ်
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card h-100 l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">{{ __('field.material value') }}</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex p-2">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {!! strtr(number_format($sumData['mtlvalue']),$en_mya) !!} ကျပ်
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card h-100 l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">{{ __('field.all total') }}</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex p-2">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {!! strtr(number_format($sumData['totalvalue']),$en_mya) !!} ကျပ်
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card h-100 l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">{{ __('field.donars total') }}</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex p-2">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {!! strtr($sumData['totaldonar'],$en_mya) !!}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
        }
        .l-bg-cherry {
            background: linear-gradient(to right, #493240, #f09) !important;
            color: #fff;
        }

        .l-bg-blue-dark {
            background: linear-gradient(to right, #373b44, #4286f4) !important;
            color: #fff;
        }

        .l-bg-green-dark {
            background: linear-gradient(to right, #0a504a, #38ef7d) !important;
            color: #fff;
        }

        .l-bg-orange-dark {
            background: linear-gradient(to right, #a86008, #ffba56) !important;
            color: #fff;
        }

        .card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
            font-size: 110px;
        }

        .card .card-statistic-3 .card-icon {
            text-align: center;
            line-height: 50px;
            margin-left: 15px;
            color: #000;
            position: absolute;
            right: 61px;
            top: 20px;
            opacity: 0.1;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }

        .l-bg-green {
            background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
            color: #fff;
        }

        .l-bg-orange {
            background: linear-gradient(to right, #f9900e, #ffba56) !important;
            color: #fff;
        }

        .l-bg-cyan {
            background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
            color: #fff;
        }
    </style>
@endsection
