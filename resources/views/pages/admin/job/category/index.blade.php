@extends('layouts.admin')

@section('title')
    Job || Category
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
                <a href="{{ route('jobCategory.create') }}" class="modal-show btn btn-primary">Add Category</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Category Name</th>
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
@endsection

@push('sweetalert-script')
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@push('addon-script')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.jobCategory') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'category_name', name: 'category_name'},
                {data: 'Action', name: 'Action'}
            ]
        });
    </script>
    {{-- To handle event on b --}}
    <script src="{{ url('js/app.js') }}"></script>
@endpush