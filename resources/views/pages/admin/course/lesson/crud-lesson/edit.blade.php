@extends('layouts.admin')
@section('title')
    Lesson || Edit
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('lesson.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Lesson</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Lesson</a></div>
        <div class="breadcrumb-item">Edit</div>
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
              <form action="{{ route('lesson.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control custom-select selectric @error('course_id') is-invalid @enderror" name="course_id" required>
                      <option value="{{ $lesson->courses->course_name }}" selected>Prev. Status: {{ $lesson->courses->course_name }}</option>
                      @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lesson Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('lesson_name') is-invalid @enderror" name="lesson_name" value="{{ old('lesson_name') ?? $lesson->lesson_name }}" required>
                  @error('lesson_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Episode Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('episode') is-invalid @enderror" name="episode" value="{{ old('episode') ?? $lesson->episode}}" required>
                  @error('episode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="basic-url">Video Youtube URL</label>
                  <div class="input-group col-sm-12 col-md-7">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">https://www.youtube.com/embed/</span>
                    </div>
                    <input type="text" class="form-control @error('video') is-invalid @enderror" id="basic-url" aria-describedby="basic-addon3" name="video" value="{{ old('video') ?? $lesson->video }}" required>
                    @error('video')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Duration</label>
                <div class="col-sm-12 col-md-7">
                  <input type="time" class="form-control" name="duration" value="{{ old('duration') ?? $lesson->duration }}" required>
                  @error('duration')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description" required>{{ old('description') ?? $lesson->description }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="status" required>
                    <option value="{{ $lesson->status }}" selected>Prev. Status: {{ $lesson->status }}</option>
                    <option value="PUBLISH">Publish</option>
                    <option value="PENDING">Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                  <a href="{{ route('lesson.index') }}" class="btn btn-info">Back</a>
                  <button class="btn btn-primary" type="submit">Edit</button>
                </div>
              </div>
            </form>
          </div>
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