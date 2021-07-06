<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="side-header" style="border: none;">
    <a class="header-brand1" href="{{ route('dashboard') }}">
      <img src="{{ asset('images/logo-brand.png') }}" class="header-brand-img desktop-logo" alt="logo">
      <img src="{{ asset('images/logo-brand.png') }}" class="header-brand-img toggle-logo" alt="logo">
      <img src="{{ asset('images/logo-brand.png') }}" class="header-brand-img light-logo" alt="logo">
      <img src="{{ asset('images/logo-brand.png') }}" style="width: 240px; height: auto !important;" class="header-brand-img light-logo1" alt="logo">
    </a><!-- LOGO -->
    <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a>
    <!-- sidebar-toggle-->
  </div>
  <div class="app-sidebar__user">
    <div class="dropdown user-pro-body text-center">
      <div class="user-pic">
        <img
          src="{{ asset(auth()->user()->profile_photo_path ? auth()->user()->profile_photo_path : "images/logo.png") }}"
          alt="" class="avatar-xl rounded-circle">
      </div>
      <div class="user-info">
        <h6 class=" mb-0 text-dark">{{ auth()->user()->name }}</h6>
        <span class="text-muted app-sidebar__user-name text-sm">{{ auth()->user()->email }}</span>
      </div>
    </div>
  </div>
  <div class="sidebar-navs">
    <ul class="nav  nav-pills-circle">
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Home">
        <a href="{{ route('dashboard') }}" target="_blank" class="nav-link text-center m-2">
          <i class="fe fe-navigation"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Users">
        <a href="{{ route('dashboard') }}" class="nav-link text-center m-2">
          <i class="fe fe-users"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Home Page">
        <a href="{{ route('dashboard') }}" class="nav-link text-center m-2">
          <i class="fa fa-server"></i>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="top" title="LogOff">
        <a class="nav-link text-center m-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form2').submit();">
          <i class="fe fe-power"></i>
        </a>
        <!-- <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form> -->
      </li>
    </ul>
  </div>
  <ul class="side-menu">
    <li>
      <h3>Dashboard</h3>
    </li>
    <li class="slide" data-step="1" data-intro="This is the first feature">
      <a class="side-menu__item" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-users"></i><span
          class="side-menu__label">
          Users</span>
      </a>
    </li>
    @if (auth()->user()->role == 2)
    <li>
      <h3 class="mt-2">Admin</h3>
    </li>
    <li class="slide" data-step="1" data-intro="This is the first feature">
      <a class="side-menu__item" href="{{ route('admin') }}"><i class="side-menu__icon fa fa-user-secret"
          aria-hidden="true"></i><span class="side-menu__label">
          Admins</span>
      </a>
    </li>
    @endif
    <hr />
    <li class="slide">
      <a class="side-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form2').submit();">
        <i class="side-menu__icon ti-lock"></i><span class="side-menu__label">
          Sign Out</span>
      </a>
      <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
  </ul>
</aside>
