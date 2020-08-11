<form class="modal-part" id="modal-create-category" method="POST" action="{{ route('category_Blog.store') }}">
  @csrf
  <div class="form-group">
    <label>Category Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="add name category" name="category_name" value="{{ old('category_name') }}">
    </div>
  </div>
</form>