
<!-- Lucky No Field -->
<div class="form-group col-sm-4">
        {!! Form::label('lucky_no',__('field.lucky no')) !!}
        {!! Form::text('lucky_no', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', __('field.amount')) !!}
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Mtl Vaule Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('mtl_vaule', __('field.material amount')) !!}
        {!! Form::text('mtl_vaule', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Mtl Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('mtl', __('field.material')) !!}
        {!! Form::textarea('mtl', null, ['class' => 'form-control','rows'=>'2', 'id' =>'mtl']) !!}
    </div>
    
    
    <!-- Donar Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('donar', __('field.donar name')) !!}
        {!! Form::textarea('donar', null, ['class' => 'form-control','rows'=>'2','id'=>'donar']) !!}
    </div>
    
    <!-- Address Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('address', __('field.address')) !!}
        {!! Form::textarea('address', null, ['class' => 'form-control','rows'=>'2','id'=> 'address']) !!}
    </div>
    
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('field.save'), ['class' => 'btn btn-info flat']) !!}
        <a href="{!! route('htbs.index') !!}" class="btn btn-default">{{ __('field.cancel') }}</a>
    </div>
    
    @push('scripts')

   <script type="text/javascript">

    var mtlPath = "{{ route('mtlautocomplete') }}";
    var donarPath = "{{ route('donarautocomplete') }}";
    var addressPath = "{{ route('addressautocomplete') }}"

        
    $( "#mtl" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: mtlPath,
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.mtl;
               }); 
 
               response(resp);
                }
            });
        },
        minLength: 1
     });

    $( "#donar" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: donarPath,
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.name;
               }); 
 
               response(resp);
                }
            });
        },
        minLength: 1
     });

    $( "#address" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: addressPath,
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.address;
               }); 
 
               response(resp);
                }
            });
        },
        minLength: 1
     });


</script>
    @endpush