@foreach ($packages as $pack)
<div class="modal fade" id="editModal{{ $pack->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Fill this form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('coursePackage.update', $pack->id) }}">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label>Package Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-clipboard-list"></i>
                </div>
              </div>
              <input type="text" class="form-control" name="package_name" value="{{ $pack->package_name}}">
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
              <input type="text" class="form-control" name="price" value="{{ $pack->price}}">
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="submit" class="btn btn-primary btn-shadow">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach