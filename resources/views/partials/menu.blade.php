<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/actions*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/mods*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('action_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.actions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/actions") || request()->is("admin/actions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-adjust c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.action.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('mod_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.mods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/mods") || request()->is("admin/mods/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.mod.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.task.title') }}
                </a>
            </li>
        @endcan
        @can('library_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/searches*") ? "c-show" : "" }} {{ request()->is("admin/to-dos*") ? "c-show" : "" }} {{ request()->is("admin/reminders*") ? "c-show" : "" }} {{ request()->is("admin/drafts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.library.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('search_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.searches.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/searches") || request()->is("admin/searches/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-search c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.search.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('to_do_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.to-dos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/to-dos") || request()->is("admin/to-dos/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-check c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.toDo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reminder_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reminders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reminders") || request()->is("admin/reminders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reminder.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('draft_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.drafts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/drafts") || request()->is("admin/drafts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.draft.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>