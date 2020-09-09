@extends('layouts.admin')
@section('title')
    Job || Create
@endsection

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('job.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Job</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Job</a></div>
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
              <form action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Name</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control @error('job_name') is-invalid @enderror" name="job_name" value="{{ old('job_name') }}" required placeholder="Laravel...">
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
                  <select class="form-control custom-select selectric @error('company_id') is-invalid @enderror" name="company_id" required>
                    <option value="" selected disabled>~ Choose Company ~</option>
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
                      <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}" class="selectgroup-input" {{ $tag->id === 1 ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ $tag->tag_name }}</span>
                    </label>
                  @empty
                    <label class="selectgroup-item">
                      <input type="checkbox" name="tag_name" value="1" class="selectgroup-input">
                      <span class="selectgroup-button">NULL</span>
                    </label>
                  @endforelse
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioFree" name="status" class="custom-control-input @error('status') is-invalid @enderror" value="{{ 'READY' }}" required>
                    <label class="custom-control-label" for="customRadioFree">READY</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioPremium" class="custom-control-input @error('status') is-invalid @enderror" name="status" value="{{ 'CLOSED' }}" required>
                    <label class="custom-control-label" for="customRadioPremium">CLOSED</label>
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
                  <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id" required>
                    <option value="" selected disabled>~ Choose Category ~</option>
                    @foreach ($category as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="location" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Requirement</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="requirement" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Require Skills</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="required_skill" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                <div class="col-sm-12 col-md-7">
                  <textarea class="summernote-simple" name="description" required></textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7 d-flex justify-content-between">
                  <a href="{{ route('job.index') }}" class="btn btn-info">Back</a>
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