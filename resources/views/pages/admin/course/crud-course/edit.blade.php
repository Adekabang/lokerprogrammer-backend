@extends('layouts.admin')

@section('title')
    Course || Edit
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Course</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Course</a></div>
        <div class="breadcrumb-item">Edit</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Fill the form</h4>
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif
            </div>
            <div class="card-body">
              <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ old('course_name') ?? $course->course_name }}" required>
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
                  <input type="text" class="form-control @error('course_author') is-invalid @enderror" name="course_author" value="{{ old('course_author') ?? $course->course_author }}" required>
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
                    <input type="radio" id="customRadioFree" name="label" class="custom-control-input @error('label') is-invalid @enderror" value="FREE" required {{ $course->label == 'FREE' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadioFree">FREE</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioPremium" class="custom-control-input @error('label') is-invalid @enderror" name="label" value="PREMIUM" required {{ $course->label == 'PREMIUM' ? 'checked' : '' }}>
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
                  <select class="form-control custom-select selectric @error('category_course') is-invalid @enderror" name="category_course">
                    <option disabled value="{{ $course->category_id }}" selected>Prev. Category: {{ $course->category->category_name }}</option>
                    @foreach ($category as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('sub_category_course') is-invalid @enderror" name="sub_category_course">
                    <option disabled value="{{ $course->sub_category_id }}" selected>Prev. Sub Category: {{ $course->subCategory->subcategory_name }}</option>
                    @foreach ($subCategories as $sub)
                      <option value="{{ $sub->id }}">{{ $sub->subcategory_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4 d-flex">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                <div class="col-sm-12 col-md-4">
                  <div id="image-preview" class="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="thumbnail" id="image-upload"/>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <img src="{{ Storage::url($course->thumbnail) }}" class="w-75 img-thumbnail">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description">{{ $course->description }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status">
                    <option value="{{ $course->status }}" selected>Prev. Status: {{ $course->status }}</option>
                    <option value="PUBLISH">Publish</option>
                    <option value="PENDING">Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary" type="submit">Edit</button>
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

@push('addon-script')
  <script src="{{ url('backend') }}/assets/js/page/features-post-create.js"></script>
@endpush