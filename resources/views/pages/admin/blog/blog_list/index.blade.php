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
        <div class="breadcrumb-item"><a href="#">Blog</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Data Blog</h4>
              <div>
                <a href="{{route('blog.create')}}" class="btn btn-primary">Add Blogs</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered data-table" id="table"">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul Blog</th>
                      <th>category</th>
                      <th>Image</th>
                      <th>Content Blog</th>
                      <th class="text-center">Action</th>
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
          ajax: "{{ route('blog.index') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'judul_blog', name: 'judul_blog'},
              {data: 'category_id', name: 'category_id'},
              {data: 'image', name: 'image'},
              {data: 'content_blog', name: 'content_blog'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
          
      });
      
      $('body').on('click', '.deleteItem', function () {
              
        if(confirm("Are You sure want to delete !")){
          var category_id = $(this).data("id");
          $.ajax({
              type: "DELETE",
              url: "{{ route('blog.store') }}"+'/'+category_id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
          
        }
      });
    });
</script>
@endpush

@endsection

