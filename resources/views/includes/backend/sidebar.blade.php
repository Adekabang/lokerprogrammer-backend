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
        <li class="nav-item dropdown {{ (request()->segment(2) == 'course') || (request()->segment(2) == 'courseCategory') || (request()->segment(2) == 'lesson') || (request()->segment(2) == 'coursePackage') || (request()->segment(2) == 'coursePackageFeature') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Course</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'courseCategory') ? 'active' : ''}}"><a class="nav-link" href="{{ route('courseCategory.index') }}">Course Categories </a></li>
            
            <li class="{{ (request()->segment(2) == 'coursePackage') ? 'active' : ''}}"><a class="nav-link" href="{{ route('coursePackage.index') }}">Course Packages </a></li>
            <li class="{{ (request()->segment(2) == 'coursePackageFeature') ? 'active' : ''}}"><a class="nav-link" href="{{ route('coursePackageFeature.index') }}">Course Package Features </a></li>
            
            <li class="{{ (request()->segment(2) == 'course') ? 'active' : ''}}"><a class="nav-link" href="{{ route('course.index') }}">Course Lists </a></li>
            <li class="{{ (request()->segment(2) == 'lesson') ? 'active' : ''}}"><a class="nav-link" href="{{ route('lesson.index') }}">Course Lessons</a></li>
          </ul>
        </li>
        <li class="menu-header">Companies</li>
        <li class="nav-item dropdown {{ (request()->segment(2) == 'company') || (request()->segment(2) == 'companyCategory') || (request()->segment(2) == 'companyPackage') || (request()->segment(2) == 'companyPackageFeature') ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Company</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'companyCategory') ? 'active' : ''}}"><a class="nav-link" href="{{ route('companyCategory.index') }}">Company Categories </a></li>
            
            <li class="{{ (request()->segment(2) == 'companyPackage') ? 'active' : ''}}"><a class="nav-link" href="{{ route('companyPackage.index') }}">Company Packages </a></li>
            <li class="{{ (request()->segment(2) == 'companyPackageFeature') ? 'active' : ''}}"><a class="nav-link" href="{{ route('companyPackageFeature.index') }}">Comp. Package Features </a></li>
            
            <li class="{{ (request()->segment(2) == 'company') ? 'active' : ''}}"><a class="nav-link" href="{{ route('company.index') }}">Company Lists </a></li>
          </ul>
        </li>
        
        <li class="menu-header">Jobs</li>
        <li class="nav-item dropdown {{ (request()->segment(2) == 'joblist') || (request()->segment(2) == 'category-job')  ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Job</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'joblist') ? 'active' : ''}}"><a class="nav-link" href="{{ route('joblist.index') }}">Job List</a></li>
            
            <li class="{{ (request()->segment(2) == 'category-job') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category-job.index') }}">Category Job</a></li>          
          </ul>
        </li>
        <li class="menu-header">Blogs</li>
        <li class="nav-item dropdown {{ (request()->segment(2) == 'category-blog') || (request()->segment(2) == 'blog')  ? 'active' : ''}}">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Blog</span></a>
          <ul class="dropdown-menu">
            <li class="{{ (request()->segment(2) == 'category-blog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('category-blog.index') }}">Blog Categories</a></li>
            <li class="{{ (request()->segment(2) == 'blog') ? 'active' : ''}}"><a class="nav-link" href="{{ route('blog.index') }}">Blog List</a></li>
          </ul>
        </li>
      </ul>
  </aside>
</div>
