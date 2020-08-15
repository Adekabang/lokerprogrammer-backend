<form class="modal-part" id="modal-create" method="POST" action="{{ route('coursePackage.store') }}">
  @csrf
  <div class="form-group">
    <label>Package Name</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="text" class="form-control" placeholder="Silver, Gold, Platinum etc" name="package_name" value="{{ old('package_name') }}">
    </div>
  </div>
  <div class="form-group">
    <label>Package Price</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-clipboard-list"></i>
        </div>
      </div>
      <input type="number" class="form-control" placeholder="Rp. 115000" name="price" value="{{ old('price') }}">
    </div>
  </div>
</form>