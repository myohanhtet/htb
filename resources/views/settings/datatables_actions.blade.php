{!! Form::open(['route' => ['settings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('settings.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('edit-setting')
    <a href="{{ route('settings.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan

    @can('delete-setting')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
