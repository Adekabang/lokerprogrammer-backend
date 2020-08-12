<form class="modal-part" id="modal-create-category" method="POST" action="{{ route('package.store') }}">
    @csrf
    <div class="form-group">
        <label>Package Name</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="package_name" value="{{ old('package_name') }}">
        </div>
        <label>Price Package</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="price_package" value="{{ old('price_package') }}">
        </div>
        <label>Package Expired</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="HTML, CSS, Javascript etc" name="package_expired" value="{{ old('package_expired') }}">
        </div>
    </div>
</form>
