@foreach ($features as $feature)
<div class="modal fade" id="editModal{{ $feature->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Fill this form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('coursePackageFeature.update', $feature->id) }}">
          @method('PUT')
          @csrf
          <div class="form-group row">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
            <div class="input-group">
              <div class="col-sm-12 col-md-12">
                <select class="form-control custom-select selectric @error('course_packages_id') is-invalid @enderror" name="course_packages_id" required>
                  <option value="{{ $feature->coursePackage ? $feature->coursePackage->course_id  : 'null' }}" {{ $feature->coursePackage ? $feature->coursePackage->course_id  : 'disabled' }} selected>Prev. Status: {{ $feature->coursePackage ? $feature->coursePackage->course_name  : 'Course Null'}}</option>
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
              <input type="text" class="form-control" name="feature_name" value="{{ $feature->feature_name }}">
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="submit" class="btn btn-primary btn-shadow">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach