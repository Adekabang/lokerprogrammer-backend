<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}" class="text-white">COURSES</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">PC</a>
    </div>
    <ul class="sidebar-menu">
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == '') ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-warehouse"></i><span>Dashboard</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'mycourse') ? 'active' : ''}}">
          <a href="{{ route('mycourse.index') }}" class="nav-link"><i class="fas fa-book-open"></i><span>My Course</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'resource') ? 'active' : ''}}">
          <a href="{{ route('resource.index') }}" class="nav-link"><i class="fas fa-layer-group"></i><span>Resources</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'certificate') ? 'active' : ''}}">
          <a href="{{ route('certificate.index') }}" class="nav-link"><i class="fas fa-certificate"></i><span>Certificate</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'message') ? 'active' : ''}}">
          <a href="{{ route('message.index') }}" class="nav-link"><i class="fas fa-envelope-open"></i><span>Messages</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'group') ? 'active' : ''}}">
          <a href="{{ route('group.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Groups</span></a>
        </li>
        <li class="my-3 nav-item dropdown {{ (request()->segment(2) == 'setting') ? 'active' : ''}}">
          <a href="{{ route('setting.index') }}" class="nav-link"><i class="fas fa-users-cog"></i><span>Settings</span></a>
        </li>
      </ul>
  </aside>
</div>
