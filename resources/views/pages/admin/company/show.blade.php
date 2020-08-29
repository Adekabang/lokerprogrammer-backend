@extends('layouts.admin')

@section('title')
    Company || Show
@endsection

@section('content')
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ route('company.index') }}" class="btn btn-icon btn-primary"><i class="fas fa-arrow-left"></i> Back to List</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Company</a></div>
          <div class="breadcrumb-item">View</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">All Company</h2>
        <div class="row">
          @forelse ($companies as $company)
          <div class="col-12 col-md-4 col-lg-4">
            <article class="article article-style-c">
              <div class="article-header">
                <div class="article-image" data-background="{{ Storage::url($company->logo) }}">
                </div>
              </div>
              <div class="article-details">
                <div class="article-category"><a href="#">{{ $company->status }}</a> <div class="bullet"></div> <a href="#">@currency($company->price)</a></div>
                <div class="article-title">
                  <h2><a href="#">{{ $company->company_name }}</a></h2>
                </div>
                <p>{!! $company->description !!}</p>
                <div class="article-user">
                  <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-1.png">
                  <div class="article-user-details">
                    <div class="user-detail-name">
                      <a href="#">{{ $company->company_author }}</a>
                    </div>
                    <div class="text-job">{{ $company->category->category_name }}</div>
                  </div>
                </div>
              </div>
            </article>
          </div>
          @empty
            <div class="col-12 d-flex justify-content-center">
              <p>There's no company</p>
            </div>
          @endforelse
        </div>
      </div>
    </section>
  </div>
@endsection