<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard.admin') }}" class="brand-link">
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
                    <a href="{{ route('dashboard.admin') }}"
                        class="nav-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
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
                @endCan --}}

                <li class="nav-header">Fill</li>

                @Can('siswa')
                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}"
                            class="nav-link {{ request()->routeIs('siswa.index') ? 'active' : '' }}">
                            <i class="bi bi-laptop"></i>
                            <p>Siswa</p>
                        </a>
                    </li>
                @endCan

                @Can('quiz')
                    <li class="nav-item {{ request()->routeIs('category-quiz.index', 'quiz.index', 'quiz.create', 'quiz.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('category-quiz.index', 'quiz.index', 'quiz.create', 'quiz.edit') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                Quiz
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('category-quiz.index') }}"
                                    class="nav-link {{ request()->routeIs('category-quiz.index') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('quiz.index') }}"
                                    class="nav-link {{ request()->routeIs('quiz.index', 'quiz.create', 'quiz.edit') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Quiz</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endCan

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
