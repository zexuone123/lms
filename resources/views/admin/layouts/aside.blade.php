<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('dashboard/assets/img/AdminLTELogo.png') }}" alt="Admin Lte"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin Lte</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- @Can('blog')
                    <li class="nav-header">Blog</li>
                @endCan

                @Can('blog')
                    <li class="nav-item">
                        <a href="{{ route('blogs.index') }}"
                            class="nav-link {{ request()->routeIs('blogs.index', 'blogs.create', 'blogs.edit') ? 'active' : '' }}">
                            <i class="bi bi-newspaper"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                @endCan

                <li class="nav-header">Fill</li>

                @Can('configuration')
                    <li class="nav-item">
                        <a href="{{ route('configuration.create') }}"
                            class="nav-link {{ request()->routeIs('configuration.create') ? 'active' : '' }}">
                            <i class="bi bi-gear"></i>
                            <p>Configuration</p>
                        </a>
                    </li>
                @endCan

                @Can('slider')
                    <li class="nav-item">
                        <a href="{{ route('sliders.index') }}"
                            class="nav-link {{ request()->routeIs('sliders.index', 'sliders.create', 'sliders.edit') ? 'active' : '' }}">
                            <i class="bi bi-layout-three-columns"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                @endCan

                @Can('about')
                    <li class="nav-item">
                        <a href="{{ route('abouts.create') }}"
                            class="nav-link {{ request()->routeIs('abouts.create') ? 'active' : '' }}">
                            <i class="bi bi-person-lines-fill"></i>
                            <p>About</p>
                        </a>
                    </li>
                @endCan

                @Can('superiority')
                    <li class="nav-item">
                        <a href="{{ route('superioritys.index') }}"
                            class="nav-link {{ request()->routeIs('superioritys.index', 'superioritys.create', 'superioritys.edit') ? 'active' : '' }}">
                            <i class="bi bi-star-fill"></i>
                            <p>Superiority</p>
                        </a>
                    </li>
                @endCan

                @Can('team')
                    <li class="nav-item">
                        <a href="{{ route('teams.index') }}"
                            class="nav-link {{ request()->routeIs('teams.index', 'teams.create', 'teams.edit') ? 'active' : '' }}">
                            <i class="bi bi-person-badge-fill"></i>
                            <p>Team</p>
                        </a>
                    </li>
                @endCan

                @Can('service')
                    <li class="nav-item">
                        <a href="{{ route('services.index') }}"
                            class="nav-link {{ request()->routeIs('services.index', 'services.create', 'services.edit') ? 'active' : '' }}">
                            <i class="bi bi-tools"></i>
                            <p>Service</p>
                        </a>
                    </li>
                @endCan

                @Can('tenant')
                    <li class="nav-item">
                        <a href="{{ route('tenants.index') }}"
                            class="nav-link {{ request()->routeIs('tenants.index', 'tenants.create', 'tenants.edit') ? 'active' : '' }}">
                            <i class="bi bi-person"></i>
                            <p>Tenant</p>
                        </a>
                    </li>
                @endCan

                @Can('paid')
                    <li class="nav-item">
                        <a href="{{ route('paids.index') }}"
                            class="nav-link {{ request()->routeIs('paids.index') ? 'active' : '' }}">
                            <i class="bi bi-calendar-check text-success"></i>
                            <p>Payment</p>
                        </a>
                    </li>
                @endCan --}}

                @role('super_admin')
                    <li class="nav-header">User</li>
                @endrole

                @role('super_admin')
                    <li
                        class="nav-item {{ request()->routeIs('users.index', 'users.create', 'users.edit', 'users.trash.list', 'roles.index', 'roles.create', 'roles.edit', 'roles.trash.list', 'permissions.index', 'permissions.create', 'permissions.edit', 'permissions.trash.list') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                User
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->routeIs('users.index', 'users.create', 'users.edit', 'users.trash.list') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}"
                                    class="nav-link {{ request()->routeIs('permissions.index', 'permissions.create', 'permissions.edit', 'permissions.trash.list') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="nav-link {{ request()->routeIs('roles.index', 'roles.create', 'roles.edit', 'roles.trash.list') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @if (session()->has('impersonated_by'))
                    <a href="{{ route('impersonate.leave') }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-box-arrow-left"></i> Leave Impersonation
                    </a>
                @endif

        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
