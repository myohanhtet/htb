<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', 'web', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    @foreach ($permissions as $permission)
    <label class="checkbox-inline" for="{{ $permission }}">
            <input type="checkbox" class="custom-control-input"  name="permissions[{{ $permission }}]"
            @php
                if(isset($role)){
                    foreach ($role->permissions as $pname) {
                        if($pname->name === $permission){
                            echo 'checked';
                        }
                    }
                }
            @endphp
             id="{{ $permission }}">
            {{ ucfirst($permission) }}</label>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
