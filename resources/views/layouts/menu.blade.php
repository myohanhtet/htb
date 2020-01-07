<li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-tachometer" aria-hidden="true"></i><span>Dashboard</span></a>
</li>
<li class="{{ Request::is('htbs*') ? 'active' : '' }}">
    <a href="{!! route('htbs.index') !!}"><i class="fa fa-edit"></i><span>Htbs</span></a>
</li>
<li class="{{ Request::is('lucky*') ? 'active' : '' }}">
    <a href="{!! route('lucky.index') !!}"><i class="fa fa-tags" aria-hidden="true"></i> <span>Lucky No</span></a>
</li>
<li class="{{ Request::is('doners*') ? 'active' : '' }}">
    <a href="{!! route('doners.index') !!}"><i class="fa fa-slideshare"></i><span>Donars</span></a>
</li>
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-info-circle"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-shield"></i><span>Permissions</span></a>
</li>
<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-cogs"></i><span>Settings</span></a>
</li>




