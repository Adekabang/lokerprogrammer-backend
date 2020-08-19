{!! Form::model($model, [
  'route' => $model->exists ? ['category.update', $model->id] : 'category.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

  <div class="form-group">
    <label>Category Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="category_name" id="category_name" value="{{ old('category_name') ?? $model->category_name }}">
    </div>
  </div>

{!! Form::close() !!}
