<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    @foreach ($roles as $role)
    <label class="checkbox-inline" for="{{ $role }}">
            <input type="checkbox" class="custom-control-input"  name="roles[{{ $role }}]"
            @php
                if(isset($permission)){
                    foreach ($permission->role as $rname) {
                        if($rname->name === $role){
                            echo 'checked';
                        }
                    }
                }
            @endphp
             id="{{ $role }}">
            {{ ucfirst($role) }}</label>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permissions.index') !!}" class="btn btn-default">Cancel</a>
</div>
