<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
            alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, Jane</h2>
          <a href="{{ route('sign-in') }}" class="btn btn-secondary btn-sm d-inline-flex align-items-center"><svg
              class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>Sign Out</a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
          aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-3">
            <img src="/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">
            Volt Pro Laravel
          </span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-dashboard">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
              </svg></span>
            <span class="sidebar-text">Dashboard</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span></span>
        </span>
        <div
          class="multi-level collapse {{ Request::segment(1) == 'dashboard' || Request::segment(1) == 'traffic-sources' || Request::segment(1) == 'app-analysis' ? 'show' : '' }}"
          role="list" id="submenu-dashboard" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="sidebar-text-contracted">O</span>
                <span class="sidebar-text">Overview</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'traffic-sources' ? 'active' : '' }}">
              <a href="{{ route('traffic-sources') }}" class="nav-link">
                <span class="sidebar-text-contracted">T</span>
                <span class="sidebar-text">All Traffic</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'app-analysis' ? 'active' : '' }}">
              <a href="{{ route('app-analysis') }}" class="nav-link">
                <span class="sidebar-text-contracted">P</span>
                <span class="sidebar-text">Product Analysis</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-laravel" aria-expanded="true">
          <span>
            <span class="sidebar-icon"><i class="fab fa-laravel me-2" style="color: #fb503b;"></i></span>
            <span class="sidebar-text" style="color: #fb503b;">Laravel Examples</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse show" role="list" id="submenu-laravel" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
              <a href="{{ route('profile') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-cog"></span></span> --}}
                <span class="sidebar-text-contracted">P</span>
                <span class="sidebar-text">Profile</span>
              </a>
            </li>
            @can('manage-users', auth()->user())
            <li class="nav-item {{ Request::segment(1) == 'user-management' ? 'active' : '' }}">
              <a href="{{ route('user-management') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-user-check"></span></span> --}}
                <span class="sidebar-text-contracted">U</span>
                <span class="sidebar-text">User Management</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'role-management' ? 'active' : '' }}">
              <a href="{{ route('role-management') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-user-check"></span></span> --}}
                <span class="sidebar-text-contracted">R</span>
                <span class="sidebar-text">Role Management</span>
              </a>
            </li>
            @endcan
            @can('manage-items', App\Models\User::class)
            <li class="nav-item {{ Request::segment(1) == 'category-management' ? 'active' : '' }}">
              <a href="{{ route('category-management') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-cog"></span></span> --}}
                <span class="sidebar-text-contracted">C</span>
                <span class="sidebar-text">Category Management</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'tag-management' ? 'active' : '' }}">
              <a href="{{ route('tag-management') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-cog"></span></span> --}}
                <span class="sidebar-text-contracted">T</span>
                <span class="sidebar-text">Tag Management</span>
              </a>
            </li>
            @endcan
            <li class="nav-item {{ Request::segment(1) == 'item-management' ? 'active' : '' }}">
              <a href="{{ route('item-management') }}" class="nav-link">
                {{-- <span class="sidebar-icon"><span class="fas fa-cog"></span></span> --}}
                <span class="sidebar-text-contracted">I</span>
                <span class="sidebar-text">Item Management</span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'kanban' ? 'active' : '' }}">
        <a href="{{ route('kanban') }}" class="nav-link d-flex align-items-center justify-content-between">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                </path>
              </svg></span>
            <span class="sidebar-text">Kanban</span>
          </span>
        </a>
      </li>
      <li
        class="nav-item {{ Request::segment(1) == 'messages' || Request::segment(1) == 'single-message' ? 'active' : '' }}">
        <a href="{{ route('messages') }}" class="nav-link d-flex align-items-center justify-content-between">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                </path>
                <path
                  d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                </path>
              </svg></span>
            <span class="sidebar-text">Messages</span>
          </span>
          <span class="badge badge-md bg-danger badge-pill notification-count">4</span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'transactions' ? 'active' : '' }}">
        <a href="{{ route('transactions') }}" class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
              <path fill-rule="evenodd"
                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                clip-rule="evenodd"></path>
            </svg></span>
          <span class="sidebar-text">Transactions</span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'tasks' ? 'active' : '' }}">
        <a href="{{ route('tasks') }}" class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
              <path fill-rule="evenodd"
                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                clip-rule="evenodd"></path>
            </svg></span>
          <span class="sidebar-text">Task List</span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'calendar' ? 'active' : '' }}">
        <a href="{{ route('calendar') }}" class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                clip-rule="evenodd"></path>
            </svg></span>
          <span class="sidebar-text">Calendar</span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'map' ? 'active' : '' }}">
        <a href="{{ route('map') }}" class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"></path>
            </svg></span>
          <span class="sidebar-text">Map</span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-app">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Tables</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div
          class="multi-level collapse {{ Request::segment(1) == 'bootstrap-tables' || Request::segment(1) == 'datatables' ? 'show' : '' }}"
          role="list" id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'datatables' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('datatables') }}">
                <span class="sidebar-text-contracted">D</span>
                <span class="sidebar-text">DataTables</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'bootstrap-tables' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('bootstrap-tables') }}">
                <span class="sidebar-text-contracted">B</span>
                <span class="sidebar-text">Bootstrap Tables</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-pages">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                  clip-rule="evenodd"></path>
                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
              </svg></span>
            <span class="sidebar-text">Page examples</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span></span>
        </span>
        <div
          class="multi-level collapse {{ Request::segment(2) == 'profile' || Request::segment(2) == 'pricing' || Request::segment(2) == 'billing' || Request::segment(2) == 'invoice' ? 'show' : '' }}"
          role="list" id="submenu-pages" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(2) == 'profile' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('profile-example') }}">
                <span class="sidebar-text-contracted">P</span>
                <span class="sidebar-text">Profile</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'pricing' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('pricing') }}">
                <span class="sidebar-text-contracted">P</span>
                <span class="sidebar-text">Pricing</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'billing' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('billing') }}">
                <span class="sidebar-text-contracted">B</span>
                <span class="sidebar-text">Billing</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'invoice' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('invoice') }}">
                <span class="sidebar-text-contracted">I</span>
                <span class="sidebar-text">Invoice</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sign-in-example') }}">
                <span class="sidebar-text-contracted">S</span>
                <span class="sidebar-text">Sign In</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sign-up-example') }}">
                <span class="sidebar-text-contracted">S</span>
                <span class="sidebar-text">Sign Up</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('forgot-password-example') }}">
                <span class="sidebar-text-contracted">F</span>
                <span class="sidebar-text">Forgot password</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('reset-password-example') }}">
                <span class="sidebar-text-contracted">R</span>
                <span class="sidebar-text">Reset password</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('lock') }}">
                <span class="sidebar-text-contracted">L</span>
                <span class="sidebar-text">Lock</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('404') }}">
                <span class="sidebar-text-contracted">4</span>
                <span class="sidebar-text">404 Not Found</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('500') }}">
                <span class="sidebar-text-contracted">5</span>
                <span class="sidebar-text">500 Not Found</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
          data-bs-target="#submenu-components">
          <span>
            <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                <path fill-rule="evenodd"
                  d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                  clip-rule="evenodd"></path>
              </svg></span>
            <span class="sidebar-text">Components</span>
          </span>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div
          class="multi-level collapse {{ Request::segment(2) == 'buttons' || Request::segment(2) == 'notifications' || Request::segment(2) == 'forms' || Request::segment(2) == 'modals' || Request::segment(2) == 'typography' ? 'show' : '' }}"
          role="list" id="submenu-components" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(2) == 'buttons' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('buttons') }}">
                <span class="sidebar-text-contracted">B</span>
                <span class="sidebar-text">Buttons</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'notifications' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('notifications') }}">
                <span class="sidebar-text-contracted">N</span>
                <span class="sidebar-text">Notifications</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'forms' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('forms') }}">
                <span class="sidebar-text-contracted">F</span>
                <span class="sidebar-text">Forms</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'modals' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('modals') }}">
                <span class="sidebar-text-contracted">M</span>
                <span class="sidebar-text">Modals</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'typography' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('typography') }}">
                <span class="sidebar-text-contracted">T</span>
                <span class="sidebar-text">Typography</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'widgets' ? 'active' : '' }}">
        <a href="{{ route('widgets') }}" class="nav-link">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
              </path>
            </svg></span>
          <span class="sidebar-text">Widgets</span>
        </a>
      </li>
      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
      <li class="nav-item">
        <a href="/documentation/getting-started/overview/index.html" target="_blank"
          class="nav-link d-flex align-items-center">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                clip-rule="evenodd"></path>
            </svg></span>
          <span class="sidebar-text">Documentation <span
              class="badge bg-secondary ms-1 text-gray-800 badge-sm">v1.0</span></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="https://themesberg.com/product/laravel/volt-pro-admin-dashboard-template" target="_blank"
          class="nav-link d-flex align-items-center">
          <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
              </path>
            </svg></span></span>
          <span class="sidebar-text">Buy now</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-2">
            <img class="me-2" src="/assets/img/themesberg.svg" height="20" width="20" alt="Themesberg Logo">
          </span>
          <span class="sidebar-text">Themesberg</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="https://updivision.com" target="_blank" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-2">
            <img class="me-2" src="/assets/img/updivision.png" height="20" width="20" alt="Themesberg Logo">
          </span>
          <span class="sidebar-text">Updivision</span>
        </a>
      </li>
    </ul>
  </div>
</nav>