{!! Form::model($model, [
  'route' => $model->exists ? ['category_Blog.update', $model->id] : 'category_Blog.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

  <div class="form-group">
      <label for="category_name" class="control-label">Category Name</label>
      {!! Form::text('category_name', null, ['class' => 'form-control', 'id' => 'category_name', 'placeholder' => 'HTML, CSS, Javascript etc']) !!}
  </div>

{!! Form::close() !!}
