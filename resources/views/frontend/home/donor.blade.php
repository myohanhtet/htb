@php
    $en_mya = ['0' => 'ဝ', '1' => '၁', '2' => '၂', '3' => '၃', '4' => '၄', '5' => '၅', '6' => '၆', '7' => '၇', '8' => '၈', '9' => '၉',];
@endphp
@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="text-center m-4">
        <h3 class="p-1">
            {!! ($ui_config['dash-title-three'] == null ? "Dashboard Title Three" : $ui_config['dash-title-three']) !!}
        </h3>
    </div>

    <form action="{{ route('frontend.donors.search') }}" method="GET">
        <div class="row">
            <div class="pb-2 col-3">
                <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Donor Name" aria-label="Donor Name" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search-plus"></i> Search</button>
                </div>
            </div>
            <div class="col-2">
                <button onClick="window.location.reload();" class="btn btn-outline-success"><i class="fas fa-sync"></i> Refresh Page</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead class="table-dark">
        <tr>
            <th>နာမည်</th>
            <th>အလှူငွေ</th>
            <th>လှူဖွယ်ပစ္စည်း</th>
            <th>နေ့စွဲ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($donors as $donor)
        <tr>
            <td>{{ $donor->donar }}</td>
            <td>{{ strtr(number_format($donor->amount),$en_mya) }}</td>
            <td>{{ $donor->mtl }}</td>
            <td>{{ $donor->created_at->toFormattedDateString() }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $donors->links() }}
</div>
@endsection
