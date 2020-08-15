@extends('layouts.admin')

@section('title')
    Blogs
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Categories</a></div>
            <div class="breadcrumb-item">List</div>
          </div>
        </div>
    
        <div class="section-body">
    
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between">
                  <h4>Category List</h4>
                  <div>
                    <a href="javascript:void(0)" id="createNewCategory" class="btn btn-primary">Add Category</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered data-table" id="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Category Name</th>
                          <th>slug</th>
                          <th>Action</th>
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
        </div>
      </section>
    </div>

   @include('pages.admin.blog.category_blog.modalCategory')

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
                ajax: "{{ route('category_Blog.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'category_name', name: 'category_name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            $('#createNewCategory').click(function () {
                $('#saveBtn').val("create-Category");
                $('#id').val('');
                $('#category_blogForm').trigger("reset");
                $('#modelHeading').html("Create New Category");
                $('#ajaxModel').modal('show');
            });
            $('body').on('click', '.editCategory', function () {
              var category_id = $(this).data('id');
              $.get("{{ route('category_Blog.index') }}" +'/' + category_id +'/edit', function (data) {
                  $('#modelHeading').html("Edit Category");
                  $('#saveBtn').val("edit-category");
                  $('#ajaxModel').modal('show');
                  $('#id').val(data.id);
                  $('#category_name').val(data.category_name);
                  $('#slug').val(data.slug);
              })
          });
            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');
            
                $.ajax({
                  data: $('#category_blogForm').serialize(),
                  url: "{{ route('category_Blog.store') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
            
                      $('#category_blogForm').trigger("reset");
                      $('#ajaxModel').modal('hide');
                      table.draw();
                
                  },
                  error: function (data) {
                      console.log('Error:', data);
                      $('#saveBtn').html('Save Changes');
                  }
              });
            });
            
            $('body').on('click', '.deleteCategory', function () {
              
              confirm("Are You sure want to delete !");
                var category_id = $(this).data("id");
              
              
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('category_Blog.store') }}"+'/'+category_id,
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

