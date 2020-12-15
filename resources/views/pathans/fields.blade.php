<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('doner', __('field.donar name')) !!}
    {!! Form::text('doner', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-3">
    {!! Form::label('amount', __('field.value')) !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
    {!! Form::label('material', __('field.material')) !!}
    {!! Form::text('material', null, ['class' => 'form-control']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-3">
    {!! Form::label('amount_mtl', __('field.material amount')) !!}
    {!! Form::number('amount_mtl', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', __('field.address')) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('field.save'), ['class' => 'btn btn-success']) !!}
    <a href="{!! route('pathans.index') !!}" class="btn btn-default">{{ __('field.cancel') }}</a>
</div>
