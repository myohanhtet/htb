<!-- Lucky No Field -->
<div class="form-group col-sm-4">
        {!! Form::label('lucky_no', 'မဲနံပါတ်') !!}
        {!! Form::text('lucky_no', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Amount Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'ငွေပဒေသာ') !!}
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Mtl Vaule Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('mtl_vaule', 'လှူဖွယ်ပစ္စည်းတန်ဖိုး') !!}
        {!! Form::text('mtl_vaule', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Mtl Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('mtl', 'လှူဖွယ်ပစ္စည်း') !!}
        {!! Form::textarea('mtl', null, ['class' => 'form-control','rows'=>'2']) !!}
    </div>
    
    
    <!-- Donar Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('donar', 'အလှူရှင်အမည်') !!}
        {!! Form::textarea('donar', null, ['class' => 'form-control','rows'=>'2','id'=>'donor']) !!}
    </div>
    
    <!-- Address Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('address', 'နေရပ်လိပ်စာ') !!}
        {!! Form::textarea('address', null, ['class' => 'form-control','rows'=>'2']) !!}
    </div>
    
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-info flat']) !!}
        <a href="{!! route('htbs.index') !!}" class="btn btn-default">Cancel</a>
    </div>

    @push('scripts')
    <script>
        $( function() {
            var donor = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
            ];

            // var vvv = "http://htb.test/donerlist";
            
            // $( "#donor" ).autocomplete({


            //     source: donor
            // });
        } );


        // $.get( "http://htb.test/donerlist", function( data ) {
        //     alert(data);
        // }, "json" );

        $('#donor').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                    console.log(data);
                });
            }
        });


      </script>
        
    @endpush