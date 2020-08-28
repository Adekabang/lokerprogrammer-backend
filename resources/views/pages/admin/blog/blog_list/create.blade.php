@extends('layouts.admin')
@section('title')
    Blog || Create
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Blog</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Blog</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Fill the form</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Judul Blog</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('judul_blog') is-invalid @enderror" name="judul_blog" value="{{ old('judul_blog') }}" id="judulBlog" placeholder="masukan judul blog" required>
                        @error('judul_blog')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Category Blog</label>
                        <div class="col-sm-10">
                            <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id" required>
                                <option value="{{ old('category_id') }}" selected disabled>~ Choose Category ~</option>
                                @foreach ($categories as $cat)
                                  <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach
                              </select>
                              @error('category_id')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                              @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">upload image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" placeholder="add name category" name="image" value="{{ old('image') }}"> 
                          </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="summernote-simple" name="content_blog"></textarea>
                            @error('content_blog')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                          <a href="{{ route('blog.index') }}" class="btn btn-info">Back</a>
                          <button class="btn btn-primary" type="submit">Create a New Blog</button>
                        </div>
                      </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@include('vendor.lara-izitoast.toast')
@push('addon-script')
  <script src="{{ url('backend') }}/assets/js/page/features-post-create.js"></script>
@endpush