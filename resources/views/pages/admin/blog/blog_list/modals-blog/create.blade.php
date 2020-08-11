
<form class="modal-part bd-example-modal-lg" id="modal-create-category" method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
  @csrf
  
  <div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Blog</label>
    <div class="col-sm-12 col-md-7">
      <input type="text" class="form-control" placeholder="add name category" name="judul_blog" value="{{ old('judul_blog') }}">
    </div>
  </div>

  <div class="form-group">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Blog</label>
    <div class="col-sm-12 col-md-7">
      <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id" required>
        <option value="" selected disabled>~ Choose Category ~</option>
        @foreach ($categories as $cat)
          <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
        @endforeach
      </select>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">upload Image</label>
    <div class="col-sm-12 col-md-7">
      <input type="file" class="form-control" placeholder="add name category" name="image" value="{{ old('image') }}"> 
    </div>
    </div>

    <div class="form-group">
      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
    <div class="col-sm-12 col-md-7">
      <textarea class="summernote-simple" name="content_blog"></textarea>
    </div>
  </div>
</form>