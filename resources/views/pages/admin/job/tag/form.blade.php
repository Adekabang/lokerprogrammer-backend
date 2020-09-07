{!! Form::model($model, [
  'route' => $model->exists ? ['jobTag.update', $model->id] : 'jobTag.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

  <div class="form-group">
    <label>Tag Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="tag_name" id="tag_name" value="{{ old('tag_name') ?? $model->tag_name }}">
    </div>
  </div>

{!! Form::close() !!}
