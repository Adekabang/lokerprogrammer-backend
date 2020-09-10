@extends('layouts.admin')

@section('title')
    Job || Edit
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('job.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Job</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Job</a></div>
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
              <form action="{{ route('job.update', $job->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('job_name') is-invalid @enderror" name="job_name" value="{{ old('job_name') ?? $job->name }}" required>
                  @error('job_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('company_id') is-invalid @enderror" name="company_id">
                    <option value="{{ $job->category_id }}" selected>Prev. Company: {{ $job->companies->first()->company_name }}</option>
                    @foreach ($company as $comp)
                      <option value="{{ $comp->id }}">{{ $comp->company_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                <div class="col-sm-12 col-md-7 selectgroup selectgroup-pills">
                  @forelse ($tags as $tag)
                    <label class="selectgroup-item">
                      <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}" class="selectgroup-input">
                      <span class="selectgroup-button">{{ $tag->tag_name }}</span>
                    </label>
                  @empty
                  <label class="selectgroup-item">
                    <input type="checkbox" name="tag_id[]" value="" class="selectgroup-input">
                    <span class="selectgroup-button">{{ 'Isi Tag dulu' }}</span>
                  </label>
                  @endforelse
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioFree" name="status" class="custom-control-input @error('status') is-invalid @enderror" value="READY" required {{ $job->status == 'READY' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadioFree">READY</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioPremium" class="custom-control-input @error('status') is-invalid @enderror" name="status" value="CLOSED" required {{ $job->status == 'CLOSED' ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customRadioPremium">CLOSED</label>
                  </div>
                  @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="{{ $job->category_id }}" selected>Prev. Category: {{ $job->category->category_name }}</option>
                    @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="location">{{ $job->location }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Requirement</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="requirement">{{ $job->requirement }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Require Skills</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="required_skill">{{ $job->required_skill }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description">{{ $job->description }}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 d-flex justify-content-center">
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