<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">LOKER</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">LP</a>
    </div>
    <ul class="sidebar-menu">
        <li class="nav-item dropdown {{ (request()->segment(2) == '') ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-warehouse"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Courses</li>
        <li class="nav-item dropdown {{ (request()->segment(2) == 'course') || (request()->segment(2) == 'category') || (request()->segment(2) == 'lesson') || (request()->segment(2) == 'coursePackage') || (request()->segment(2) == 'coursePackageFeature') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Course</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'category') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category.index') }}">Course Categories </a></li>
            
            <li class="{{ (request()->segment(2) == 'coursePackage') ? 'active' : ''}}"><a class="nav-link" href="{{ route('coursePackage.index') }}">Course Packages </a></li>
            <li class="{{ (request()->segment(2) == 'coursePackageFeature') ? 'active' : ''}}"><a class="nav-link" href="{{ route('coursePackageFeature.index') }}">Course Package Features </a></li>
            
            <li class="{{ (request()->segment(2) == 'course') ? 'active' : ''}}"><a class="nav-link" href="{{ route('course.index') }}">Course Lists </a></li>
            <li class="{{ (request()->segment(2) == 'lesson') ? 'active' : ''}}"><a class="nav-link" href="{{ route('lesson.index') }}">Course Lessons</a></li>
          </ul>
        </li>
        <li class="menu-header">Company</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Company List</span></a>
            <ul class="dropdown-menu">
                <li class="{{ (request()->segment(2) == 'package') ? 'active' : ''}}"><a class="nav-link" href="{{ route('package.index') }}">Company Package </a></li>

                <li class="{{ (request()->segment(2) == 'company') ? 'active' : ''}}"><a class="nav-link" href="{{ route('company.index') }}">Company List </a></li>

            </ul>
        </li>
        <li class="menu-header">Jobs</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Jobs List</span></a>
        </li>
        <li class="menu-header">Blog</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Blog List</span></a>
        </li>
      </ul>
  </aside>
</div>
