<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      @can('branch-list')
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/branches')}}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-earth  menu-icon"></i>
          <span class="menu-title">Branches</span>
        </a>
      </li>
      @endcan 
      @can('employee-list') 
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/employees')}}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Employees</span>
        </a>
      </li>
      @endcan 

      @can('client-list') 
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/clients')}}">
          <i class="mdi mdi-folder-account menu-icon"></i>
          <span class="menu-title">Clients</span>
        </a>
      </li>
      @endcan

      @can('role-list') 
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/roles')}}" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-lock menu-icon"></i>
          <span class="menu-title">Roles & Permissions</span>
        </a>
      </li>
      @endcan 
    </ul>
  </nav>