@extends('layouts.admin')
@section('title')
    Course || Create
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Course</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Course</a></div>
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
              <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') }}" required placeholder="Laravel...">
                  @error('course_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Author</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('course_author') is-invalid @enderror" name="course_author" value="{{ old('course_author') }}" required placeholder="Parsinta">
                  @error('course_author')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Label</label>
                <div class="col-sm-12 col-md-7">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioFree" name="label" class="custom-control-input @error('label') is-invalid @enderror" value="{{ 'FREE' }}" required>
                    <label class="custom-control-label" for="customRadioFree">FREE</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioPremium" class="custom-control-input @error('label') is-invalid @enderror" name="label" value="{{ 'PREMIUM' }}" required>
                    <label class="custom-control-label" for="customRadioPremium">PREMIUM</label>
                  </div>
                  @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('category_course') is-invalid @enderror" name="category_course" required>
                    <option value="" selected disabled>~ Choose Category ~</option>
                    @foreach ($category as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('sub_category_course') is-invalid @enderror" name="sub_category_course" required>
                    <option value="" selected disabled>~ Choose Sub Category ~</option>
                    @foreach ($subCategories as $sub)
                      <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-7">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload" required/>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status" required>
                    <option value="">~ Choose Status ~</option>
                    <option value="PUBLISH">Publish</option>
                    <option value="PENDING">Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                  <a href="{{ route('course.index') }}" class="btn btn-info">Back</a>
                  <button class="btn btn-primary" type="submit">Create</button>
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