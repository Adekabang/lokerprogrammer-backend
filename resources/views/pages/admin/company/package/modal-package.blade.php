<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="package_form" name="category_name" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="Category" class="col-sm-4 control-label">Package Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package name" value=""required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Category" class="col-sm-4 control-label">Price Package</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="price_package" name="price_package" placeholder="Enter Price Package" value=""required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Category" class="col-sm-4 control-label">Package Expired</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="package_expired" name="package_expired" placeholder="Enter Package Expired" value=""required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
