{!! Form::model($model, [
  'route' => $model->exists ? ['courseExercise.update', $model->id] : 'courseExercise.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

  <div class="form-group">
    <label>Question</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="What is Laravel Sanctum?" name="question" id="question" value="{{ old('question') ?? $model->question }}">
      <input type="hidden" class="form-control" name="course_id" id="course_id">
      @if ($model->exists)
        {!! Form::hidden('course_id', $model->course_id) !!}
      @endif
    </div>
  </div>

{!! Form::close() !!}
