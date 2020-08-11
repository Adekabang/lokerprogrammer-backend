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
        <li class="nav-item dropdown {{ (request()->segment(2) == 'course') || (request()->segment(2) == 'category') || (request()->segment(2) == 'lesson') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Course</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'category') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category.index') }}">Course Categories </a></li>
            
            <li class="{{ (request()->segment(2) == 'course') ? 'active' : ''}}"><a class="nav-link" href="{{ route('course.index') }}">Courses List </a></li>

            <li class="{{ (request()->segment(2) == 'lesson') ? 'active' : ''}}"><a class="nav-link" href="{{ route('lesson.index') }}">Course Lessons</a></li>
          </ul>
        </li>
        <li class="menu-header">Company</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Company List</span></a>
        </li>
        <li class="menu-header">Jobs</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Jobs List</span></a>
        </li>
        <li class="menu-header">Blog</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Blog List </span></a>
          <ul class="dropdown-menu">
            {{-- <li class="{{ (request()->segment(2) == 'BlogCategory') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blogCategories.index') }}">Course Categories </a></li> --}}
            
            <li class="{{ (request()->segment(2) == 'category_Blog') ? 'active' : ''}}""><a class="nav-link" href="{{ route('category_Blog.index') }}">Category Blog </a></li>
            <li class="{{ (request()->segment(2) == 'blog') ? 'active' : ''}}""><a class="nav-link" href="{{ route('blog.index') }}">Blog List </a></li>
          </ul>
        </li>
      </ul>
  </aside>
</div>