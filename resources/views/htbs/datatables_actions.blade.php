{!! Form::open(['route' => ['htbs.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>

    <!-- <a type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#showProject" data-whatever="{{ $id }}" data-backdrop="static" data-keyboard="false">
        Del
    </a> -->

    <a href="{{ route('htbs.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('edit-master-data')
    <a href="{{ route('htbs.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan

    @can('delete-master-data')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
