<form class="modal-part" id="modal-create" method="POST" action="{{ route('coursePackageFeature.store') }}">
  @csrf
  <div class="form-group row">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
    <div class="input-group">
      <div class="col-sm-12 col-md-12">
        <select class="form-control custom-select selectric @error('course_packages_id') is-invalid @enderror" name="course_packages_id" required>
          <option value="" selected disabled>~ Choose Package ~</option>
          @foreach ($packages as $package)
            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Package Features Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Feature name" name="feature_name" value="{{ old('feature_name') }}">
    </div>
  </div>
</form>