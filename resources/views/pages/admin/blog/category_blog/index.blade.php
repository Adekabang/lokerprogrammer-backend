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
                    <a href="{{ route('category_Blog.create') }}" class="modal-show btn btn-primary">Add Category</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered data-table" id="datatable">
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

   {{-- @include('pages.admin.blog.category_blog.modalCategory') --}}

   @push('sweetalert-script')
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  @endpush
    @push('addon-script')
      <script type="text/javascript">
          $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.category_blog') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'category_name', name: 'category_name'},
                {data: 'slug', name: 'slug'},
                {data: 'Action', name: 'Action'}
            ]
        });
      </script>
       <script src="{{ url('js/app.js') }}"></script>
    @endpush
@endsection

