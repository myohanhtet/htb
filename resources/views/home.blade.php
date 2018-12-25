@extends('layouts.app')

@section('content')
  <section class="content-header">
        <h1 class="pull-left"></h1>
        <div class="row">
        	<div class="col-md-12">
        		<div class="panel panel-default">
		           <div class="text-center">
		           		<h4>{{ isset($dname)? $dname[0] : "All Domain" }}</h4>
		           </div>
		           <div class="panel-body">
					<div class="row">
						<div class="col-md-5">
							<select class="domain_search form-control">
								<option value="" disabled selected>Select your Domain</option>
				           	@foreach($domain as $do)
				           	 	<option value="{{ $do->id }}">{{ $do->name }}</option>
				           	@endforeach        	 
				           </select>
						</div>
						<div class="col-md-5">
							<select class="subdomain_search form-control">
								<option value="" disabled selected>Select your Sub-Domain</option>
				           	@foreach($subdomain as $sdo)
				           	 	<option value="{{ $sdo->id }}">{{ $sdo->name }}</option>
				           	@endforeach        	 
				           </select>
						</div>
						<div class="col-md-2">
							<a class="btn btn-success flat btn-block" href="{!! route('projects.create') !!}"><i class="fa fa-plus"></i>    Add New</a>
						</div>
					</div>
				</div>        
		        </div><!-- panel --> 
        	</div>
        </div>     
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')

        <div class="clearfix"></div>
            <div class="box box-danger">
                <div class="box-body">
               <table id="domain" class="table table-striped table-condensed">
				<thead>
					<tr class="success">
						<th>Detail</th>
						<th>Priority Level</th>
						<th>Status</th>
						<th>Remark</th>						
						<th>Schedule Start Date</th>
						<th>Estimated End Date</th>
						<th>Estimated Duration</th>
						<th>Actual Start Date</th>
						<th>Actual End Date</th>
						<th>Actual Duration</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th width="10%">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($ho as $do)
					<tr>
						<td>{{ str_limit($do['detail'],$limit = 15, $end = '...') }}</td>
						<td>{{ $do['priority_level'] }}</td>
						<td>{{ $do['status'] }}</td>
						<td>{{ $do['remarks'] }}</td>
						<td>{{ \Carbon\Carbon::parse($do['schedule_start_date'])->toFormattedDateString() }}</td>
						<td>{{ \Carbon\Carbon::parse($do['estimated_end_date'])->toFormattedDateString() }}</td>
						<td>{{ $do['estimated_uration'] }}</td>
						<td>{{ \Carbon\Carbon::parse($do['actual_start_date'])->toFormattedDateString() }}</td>
						<td>{{ \Carbon\Carbon::parse($do['actual_end_date'])->toFormattedDateString() }}</td>	
						<td>{{ $do['actual_duration'] }}</td>
						<td>{{ $do['updated_at'] }}</td>
						<td>{{ $do['created_at'] }}</td>
						<td>
							<div class='btn-group'>
								<a type="button" class="btn btn-default" data-toggle="modal" data-target="#showProject" data-whatever="{{ $do['id'] }}" data-backdrop="static" data-keyboard="false">
	        							<i class="glyphicon glyphicon-eye-open"></i>
	    						</a>
	    						<a href="{{ route('projects.edit', $do['id']) }}" class='btn btn-default'>
							        <i class="glyphicon glyphicon-edit"></i>
							    </a>
	    					</div>
						</td>
					</tr>
					@endforeach

					
				</tbody>
			</table>
	                </div>
	            </div>
        <div class="text-center">
            
        </div>
    </div>
@include('projects.models')
@endsection

@push('scripts')
	<script>
	
	// $(document).ready(function() {
	//     $('#domain').DataTable();
	// });
	$(document).ready(function() {
		$('#domain').DataTable( {
    	lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
        initComplete: function () {
            this.api().columns([1,2]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });

	});


	$('#showProject').on('show.bs.modal', function (event) {
            $.LoadingOverlay("show");
              var button = $(event.relatedTarget)
              var recipient = button.data('whatever') 
              var modal = $(this)
              // modal.find('.modal-title').text(data.subdomains[0].name)
              // modal.find('.modal-body input').val(recipient)
              
              $.get( "{{ route('projects.index') }}/" + recipient, function( data ) {
                  modal.find('.modal-title').text(data.domains[0].name + " > " + data.subdomains[0].name);
                  console.log(data);
                  // first table
                  $( ".detail" ).append( "<span class='project_se'>"+ data.detail + "</span>" );
                  $( ".actionName" ).append( "<span class='project_se'>"+ data.action_by.name + "</span>" );
                  $( ".priority_level" ).append( "<span class='project_se'>"+ data.priority_level + "</span>");
                  $( ".status" ).append( "<span class='project_se'>"+ data.status +"</span>" );
                  $( ".dependency" ).append( "<span class='project_se'>"+ data.dependency + "</span>" );

                  //secont table
                  $( ".schedule_start_date" ).append( "<span class='project_se'>"+ data.schedule_start_date + "</span>" );
                  $( ".estimated_end_date" ).append( "<span class='project_se'>"+ data.estimated_end_date + "</span>" );
                  $( ".estimated_dration" ).append( "<span class='project_se'>"+ data.estimated_uration + "</span>");

                  //third table
                  $( ".actual_start_date" ).append( "<span class='project_se'>"+ data.actual_start_date + "</span>" );
                  $( ".actual_end_date" ).append( "<span class='project_se'>"+ data.actual_end_date + "</span>" );
                  $( ".actual_dration" ).append( "<span class='project_se'>"+ data.actual_duration + "</span>");

              });
              $.LoadingOverlay("hide");
        });

        $( ".project_close" ).click(function() {
          $( ".project_se" ).remove();
        });

        $('.domain_search').on('change', function() {  			 
  			 window.location.href = "{{ url('domain') }}/" + this.value;
		});

		$('.subdomain_search').on('change', function() {  			 
  			 window.location.href = "{{ url('subdomain') }}/" + this.value;
		});

	</script>
@endpush
