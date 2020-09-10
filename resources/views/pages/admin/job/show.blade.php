@extends('layouts.admin')

@section('title')
    Job || Show
@endsection

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ route('job.index') }}" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i> Back to List</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Job</a></div>
          <div class="breadcrumb-item">View</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">All Job</h2>
        <div class="row">
          @forelse ($jobs as $job)
          <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article">
              <div class="article-header">
                <div class="article-image" data-background="https://dummyimage.com/670x480/6777ef/6777ef.jpg">
                </div>
                <div class="article-title">
                  <h2><a href="#">{{ $job->name }}</a></h2>
                </div>
              </div>
              <div class="article-details">
              <p>{!! Str::limit($job->description, 50) !!}</p>
                <div class="article-cta">
                  <a href="#" class="btn btn-primary">Read More</a>
                </div>
              </div>
            </article>
          </div>
          @empty
            <div class="col-12 d-flex justify-content-center">
              <p>There's no job</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
@endsection