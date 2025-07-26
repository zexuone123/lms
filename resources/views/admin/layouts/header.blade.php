 <nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
         <!--begin::End Navbar Links-->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                     <i class="bi bi-list"></i>
                 </a>
             </li>
         </ul>
         <ul class="navbar-nav ms-auto">
             <!--begin::Fullscreen Toggle-->
             <li class="nav-item">
                 <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                     <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                     <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                 </a>
             </li>
             <!--end::Fullscreen Toggle-->
             <!--begin::User Menu Dropdown-->
             <!--end::User Menu Dropdown-->
             <li class="nav-item dropdown user-menu">
                 <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                     data-bs-toggle="dropdown">
                     @if (Auth::user()->avatar)
                         <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle shadow" alt="User Image"
                             style="width: 32px; height: 32px; object-fit: cover;" />
                     @else
                         <i class="bi bi-person-circle fs-3 text-secondary"></i>
                     @endif
                     <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                 </a>

                 <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                     <!--begin::User Image-->
                     <li class="user-header bg-primary text-white text-center py-3">
                         @if (Auth::user()->avatar)
                             <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle shadow mb-2"
                                 alt="User Image" style="width: 80px; height: 80px; object-fit: cover;" />
                         @else
                             <i class="bi bi-person-circle fs-1 text-white mb-2"></i>
                         @endif
                         <p class="mb-0 fw-bold">{{ Auth::user()->name }}</p>
                     </li>

                     <!--end::User Image-->

                     <!--begin::Menu Footer-->
                     <li class="user-footer d-flex justify-content-end px-3 py-2">
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>

                         <!-- Tombol Logout -->
                         <a href="#" class="btn btn-default btn-flat" id="logout-button">
                             <i class="fas fa-sign-out-alt"></i> Sign out
                         </a>
                     </li>
                     <!--end::Menu Footer-->
                 </ul>
             </li>

         </ul>
         <!--end::End Navbar Links-->
     </div>
     <!--end::Container-->
 </nav>
