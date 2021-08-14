<li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
    <a href="{{ route('doctor.dashboard') }}" class="nav-link d-flex align-items-center justify-content-between">
      <span>
        <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
          </svg></span>
        <span class="sidebar-text">Dashboard</span>
      </span>
    </a>
</li>

<li class="nav-item">
  <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
    data-bs-target="#submenu-dashboard">
    <span>
      <span class="sidebar-icon"><svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
        <path fill-rule="evenodd"
          d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
          clip-rule="evenodd"></path>
      </svg></span>
      <span class="sidebar-text">Appointments</span>
    </span>
    <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
          clip-rule="evenodd"></path>
      </svg></span></span>
  </span>
  <div
    class="multi-level collapse {{ Request::segment(1) == 'calendar' || Request::segment(1) == 'traffic-sources' || Request::segment(1) == 'app-analysis' ? 'show' : '' }}"
    role="list" id="submenu-dashboard" aria-expanded="false">
    <ul class="flex-column nav">
      <li class="nav-item {{ Request::segment(1) == 'calendar' ? 'active' : '' }}">
        <a href="{{ route('calendar') }}" class="nav-link">
          <span class="sidebar-text-contracted">O</span>
          <span class="sidebar-text">Appointments</span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'traffic-sources' ? 'active' : '' }}">
        <a href="{{ route('traffic-sources') }}" class="nav-link">
          <span class="sidebar-text-contracted">T</span>
          <span class="sidebar-text">View past appointments</span>
        </a>
      </li>
    </ul>
  </div>
</li>
<li class="nav-item {{ Request::segment(2) == 'messages' ? 'active' : '' }}">
  <a href="{{ route('patient.dashboard') }}" class="nav-link d-flex align-items-center justify-content-between">
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
  </a>
</li>