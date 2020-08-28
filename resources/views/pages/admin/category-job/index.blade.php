@extends('layouts.admin')

@section('title')
    Course || Category
@endsection
@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Job</a></div>
        <div class="breadcrumb-item">Category</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Category Job</h4>
              <div>
                <a href="javascript:void(0)" id="createNewItem" class="btn btn-primary">Add Category</a>
              </div>
            </div>
              <div class="table-responsive">
                <table class="table table-bordered data-table">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Name</th>
                          <th width="15%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" tabindex="-1" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="modelHeading"></h4>
              </div>
              <div class="modal-body">
                  <form id="ItemForm" name="ItemForm" class="form-horizontal">
                      <input type="hidden" name="Item_id" id="Item_id">
                      <div class="form-group">
                          <label for="name" class="col-sm-2 control-label">Name</label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
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
</div>
@push('addon-script')
<script type="text/javascript">
    $(function () {
      
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('category-job.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });


      $('#createNewItem').click(function(){
        $('#saveBtn').val("create-Item");
        $('#Item_id').val('');
        $('#ItemForm').trigger("reset");
        $('#modelHeading').html("Create New Item");    
        $('#ajaxModel').modal('show');
      });
      
      $('#ajaxModel').on('shown.bs.modal', function () {
        $('#name').focus()
        })

      $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#ItemForm').serialize(),
          url: "{{ route('category-job.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#ItemForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });

    $('body').on('click', '.editItem', function () {
      var Item_id = $(this).data('id');
      $.get("{{ route('category-job.index') }}" +'/' + Item_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Item");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Item_id').val(data.id);
          $('#name').val(data.name);
      });
   });

   $('body').on('click', '.deleteItem', function () {
     
     var Item_id = $(this).data("id");
    $crm = confirm("Are You sure want to delete !");
   
    if ($crm) {
      $.ajax({
         type: "DELETE",
         url: "{{ route('category-job.store') }}"+'/'+Item_id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     }); 
    } else {
      console.log('tidak jadi menghapus');
    }
 });  
    });
  </script>
@endpush
@endsection