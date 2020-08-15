@extends('layouts.admin')
@section('title')
    Company || Edit
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('course.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Company</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Company</a></div>
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
                                <form action="{{ route('company.update', $company->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Company
                                            Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Enter Company Name"
                                                   class="form-control @error('company_name') is-invalid @enderror"
                                                   name="company_name" value="{{ old('company_name') ?? $company->company_name }}" required>
                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" placeholder="Enter Location"
                                                   class="form-control @error('location') is-invalid @enderror"
                                                   name="location" value="{{ old('location') ?? $company->location }}" required>
                                            @error('location')
                                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="number" placeholder="Enter Contact"
                                                   class="form-control @error('contact') is-invalid @enderror"
                                                   name="contact" value="{{ old('contact') ?? $company->contact }}" required>
                                            @error('contact')
                                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Expired
                                            Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date"
                                                   class="form-control @error('expired_date') is-invalid @enderror"
                                                   name="expired_date" value="{{ old('expired_date') ?? $company->expired_date }}" required>
                                            @error('expired_date')
                                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select
                                                class="form-control custom-select selectric @error('package_id') is-invalid @enderror"
                                                name="package_id" required>
                                                <option value="{{ $company->package_id }}" selected>Prev. Package: {{ $company->package->package_name }}</option>
                                                @foreach ($package as $data)
                                                    <option value="{{ $data->id }}">{{ $data->package_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="description" required>{{ $company->description }}</textarea>
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
