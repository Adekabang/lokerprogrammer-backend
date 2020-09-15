{!! Form::model($model, [
  'route' => $model->exists ? ['coursePackageFeature.update', $model->id] : 'coursePackageFeature.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group row">
  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
  <div class="input-group">
    <div class="col-sm-12 col-md-12">
      <select class="form-control custom-select selectric @error('course_packages_id') is-invalid @enderror" name="course_packages_id" id="course_packages_id">
        @if ($model->exists)
        <option value="{{ $model->coursePackage ? $model->coursePackage->id  : 'null' }}" {{ $model->coursePackage ? 'disabled'  : '' }} selected>Prev. Status: {{ $model->coursePackage ? $model->coursePackage->package_name  : 'Course Null'}}</option>
        @else
          <option value="" selected disabled>~ Choose Package ~</option>
        @endif
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
    <input type="text" class="form-control" placeholder="Feature name" name="feature_name" id="feature_name" value="{{ old('feature_name') ?? $model->feature_name}}">
  </div>
</div>

{!! Form::close() !!}
