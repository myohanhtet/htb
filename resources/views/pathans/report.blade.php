@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Pathans</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pathans.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                <table class="table">
					<thead>
						<tr>
							<th>doner</th>
							<th>amount</th>
							<th>material</th>
							<th>amount_mtl</th>
							<th>address</th>
						</tr>
					</thead>
					<tbody>
						@foreach($pathans as $pathan)
						<tr>
			            	<td>{{ $pathan->doner }}</td>
			            	<td>{{ $pathan->amount }}</td>
			            	<td>{{ $pathan->material }}</td>
			            	<td>{{ $pathan->amount_mtl }}</td>
			            	<td>{{ $pathan->address }}</td>
			        	</tr>
			        	@endforeach	
					</tbody>
				</table>
            </div>
            
            Total Amount : {!! $pathans->sum('amount') !!}
            Total amount_mtl : {!! $pathans->sum('amount_mtl') !!}

        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection
