@extends('layouts.admin')

@section('title')
    Course || Exercise
@endsection

@section('content')

    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Courses</a></div>
            <div class="breadcrumb-item">Exercise</div>
          </div>
        </div>
    
        <div class="section-body">
          <div class="row">
            @forelse ($courses as $course)
            <div class="col-12 col-md-4 col-lg-4">
              <article class="article article-style-c">
                <div class="article-header">
                  <div class="article-image" data-background="{{ Storage::url($course->thumbnail) }}">
                  </div>
                </div>
                <div class="article-details">
                  <div class="article-category">
                    <a class="{{ ($course->status == 'PENDING' ? 'badge badge-secondary' : 'badge badge-success') }}" href="#">{{ $course->status }}</a> 
                    <div class="bullet"></div> 
                    <a class="{{ ($course->label == 'FREE' ? 'badge badge-info' : 'badge badge-warning') }}" href="#">
                      {{ $course->label }}
                    </a>
                  </div>
                  <div class="article-title mt-3">
                    <h2><a href="{{ route('showCourse', $course->id) }}">{{ $course->course_name }}</a></h2>
                  </div>
                  <div class="article-user">
                    <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-1.png">
                    <div class="article-user-details">
                      <div class="user-detail-name">
                        <a href="#">{{ $course->course_author }}</a>
                      </div>
                      <div class="text-job">{{ $course->category->category_name }}</div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            @empty
              <div class="col-12 d-flex justify-content-center">
                <p>There's no course</p>
              </div>
            @endforelse
          </div>
        </div>
      </section>
    </div>
@endsection