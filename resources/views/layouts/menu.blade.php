<li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
    <a href="{!! route('dashboard.index') !!}"><i class="fa fa-tachometer" aria-hidden="true"></i><span>{{ __('menu.dashboard') }}</span></a>
</li>

@can('view-pathan')
<li class="{{ Request::is('admin/pathans*') ? 'active' : '' }}">
    <a href="{!! route('pathans.index') !!}"><i class="fa fa-address-card" aria-hidden="true"></i><span>{{ __('menu.pathan') }}</span></a>
</li>
@endcan
<li class="{{ Request::is('admin/htbs*') ? 'active' : '' }}">
    <a href="{!! route('htbs.index') !!}"><i class="fa fa-edit"></i><span>{{ __('menu.master data') }}</span></a>
</li>
<li class="{{ Request::is('admin/lucky*') ? 'active' : '' }}">
    <a href="{!! route('lucky.index') !!}"><i class="fa fa-tags" aria-hidden="true"></i> <span>{{ __('menu.lucky number') }}</span></a>
</li>
<li class="{{ Request::is('doners*') ? 'active' : '' }}">
    <a href="{!! route('doners.index') !!}"><i class="fa fa-slideshare"></i><span>{{ __('menu.donars') }}</span></a>
</li>
<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>{{ __('menu.users') }}</span></a>
</li>

@can('view-role')
<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-info-circle"></i><span>{{ __('menu.roles') }}</span></a>
</li>
@endcan

@can('view-permission')
<li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-shield"></i><span>{{ __('menu.permissions') }}</span></a>
</li>
@endcan

@can('view-setting')
<li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-cogs"></i><span>{{ __('menu.settings') }}</span></a>
</li>
@endcan



