{!! Form::model($model, [
  'route' => $model->exists ? ['courseSubCategory.update', $model->id] : 'courseSubCategory.store',
  'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
  <label>Category Name</label>
  <div class="input-group">
      <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
        @if ($model->exists)
        <option value="{{ $model->category ? $model->category->id  : 'null' }}" {{ $model->category ? 'disabled'  : '' }} selected>Prev. Status: {{ $model->category ? $model->category->category_name  : 'Course Null'}}</option>
        @else
          <option value="" selected disabled>~ Choose Category ~</option>
        @endif
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
  </div>
</div>

  <div class="form-group">
    <label>Sub Category Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="subcategory_name" id="subcategory_name" value="{{ old('subcategory_name') ?? $model->subcategory_name }}">
    </div>
  </div>

{!! Form::close() !!}
