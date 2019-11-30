<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-tachometer" aria-hidden="true"></i><span>Dashboard</span></a>
</li>
<li class="{{ Request::is('htbs*') ? 'active' : '' }}">
    <a href="{!! route('htbs.index') !!}"><i class="fa fa-edit"></i><span>Htbs</span></a>
</li>
<li class="{{ Request::is('lucky*') ? 'active' : '' }}">
    <a href="{!! route('lucky.index') !!}"><i class="fa fa-tags" aria-hidden="true"></i> <span>Lucky No</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-wrench"></i><span>Settings</span></a>
</li>