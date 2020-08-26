<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Jr Comp</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <div class="dropdown-divider"></div>
              <form class="dropdown-item form-inline" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="has-icon text-danger btn btn-block my-2" type="submit"><i class="fas fa-fw fa-sign-out-alt mx-2"></i> Logout</button>
              </form>
            </div>
          </li>
        </ul>
      </nav>