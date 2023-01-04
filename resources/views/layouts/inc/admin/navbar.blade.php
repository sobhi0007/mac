<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
      <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        <a class="navbar-brand brand-logo" href="{{url('/dashboard')}}">MAC Dashboard</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-sort-variant"></span>
        </button>
      </div>  
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <ul class="navbar-nav mr-lg-4 w-100">
        <li class="nav-item nav-search d-none d-lg-block w-100">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="search">
                <i class="mdi mdi-magnify"></i>
              </span>
            </div>
            <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown me-4">
          <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="mdi mdi-bell mx-0"></i> 
            <span class="count text-light {{auth()->user()->unreadNotifications->count()!=0?'':'d-none'}}">{{auth()->user()->unreadNotifications->count()}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
            
            <div class="row container">
              <div class="col-6 ">Notifications  {{auth()->user()->unreadNotifications? '('.auth()->user()->unreadNotifications->count().')':'' }} </div>
              <div class="col-6 text-end">
                <a href="{{url('dashboard/mark-all-as-read')}}" class="text-decoration-none">Mark all as read </a>
              </div>
            </div>
           @forelse (auth()->user()->unreadNotifications->take(5) as $notification)   
            <a class="dropdown-item">
              <div class="item-thumbnail">
                <div class="item-icon {{$notification->data['bg_color']}}">
                  <i class="mdi {{$notification->data['icon']}} mx-0"></i>
                </div>
              </div>
              <div class="item-content">
                <h6 class="font-weight-normal">{{$notification->data['title']}}</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  {{$notification->created_at->diffForHumans()}}
                </p>
              </div>
            </a>
            @empty
            <div class="text-center my-3"><span>No Notifications Yet</span></div>
            @endforelse
            <div class="bg-light text-primary text-center"><a href="{{url('dashboard/notifications')}}" class="text-decoration-none">See All </a> </div>
          </div>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="{{asset('admin/images/faces/face5.jpg')}}" alt="profile"/>
            <span class="nav-profile-name">
              {{auth()->guard('employee')->user()->name}}
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item">
              <i class="mdi mdi-settings text-primary"></i>
              Settings
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="mdi mdi-logout text-primary"></i>   {{ __('Logout') }}
           </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>
       
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>