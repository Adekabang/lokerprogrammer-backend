{!! Form::model($model, [
  'route' => $model->exists ? ['companyPackage.update', $model->id] : 'companyPackage.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
  <label>Package Name</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fas fa-clipboard-list"></i>
      </div>
    </div>
    <input type="text" class="form-control" placeholder="Silver, Gold, Platinum etc" name="package_name" id="package_name" value="{{ old('package_name') ?? $model->package_name }}">
  </div>
</div>
<div class="form-group">
  <label>Package Price</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <i class="fas fa-dollar-sign"></i>
      </div>
    </div>
    <input type="number" class="form-control" placeholder="Rp. 115000" name="price" id="price" value="{{ old('price') ?? $model->price}}">
  </div>
</div>

{!! Form::close() !!}
