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
        <div class="breadcrumb-item">list</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Job List</h4>
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
                          <th>category</th>
                          <th>Requirement</th>
                          <th>Required Skill</th>
                          <th>Description</th>
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
      <div class="modal-dialog modal-lg">
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
                      <div class="form-group">
                        <div class="col-sm-12">
                          <label for="category_id" class="col-sm-4 control-label">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                                                  
                            </select>                                 
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="requirement" class="col-sm-2 control-label">Requirement</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="requirement" id="requirement"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="required_skill" class="col-sm-2 control-label">Required Skill</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="required_skill" id="required_skill"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="description" id="description"></textarea>
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
      var optionData = '';

    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('joblist.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'categories.category_name', name: 'category_name'},
              {data: 'requirement', name: 'requirement'},
              {data: 'required_skill', name: 'required_skill'},
              {data: 'description', name: 'description'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });


      $.ajax({
        url:"{{ route('category-job.getCategory') }}",
        type:"POST",
        cache:false,
        dataType:'json',
        success: function(dataResult){          
          console.log('sukses : ', dataResult);
          var resultData = dataResult.data;
          optionData += '<option disabled selected>Pilih..</option>'
          $.each(resultData, function(index, row){
            optionData += '<option class="['+row.id+']" value='+row.id+'>'+row.name+'</option>'
          });
          $('#category_id').append(optionData)
        },
        error: function(e){
          console.log('error : ', e);
        }
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
          url: "{{ route('joblist.store') }}",
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
      $.get("{{ route('joblist.index') }}" +'/' + Item_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Item");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Item_id').val(data.id);
          $('#name').val(data.name);
      });
   });

   $('body').on('click', '.deleteItem', function () {
     
     var Item_id = $(this).data("id");
     confirm("Are You sure want to delete !");
   
     $.ajax({
         type: "DELETE",
         url: "{{ route('joblist.store') }}"+'/'+Item_id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
 });  
    });
  </script>
@endpush
@endsection