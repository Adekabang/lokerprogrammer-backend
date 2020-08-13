@extends('layouts.admin')

@section('title')
    Company || List
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Company</a></div>
                    <div class="breadcrumb-item">List</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Company List</h4>
                                <div>
                                    <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered data-table" id="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Company</th>
                                            <th>location</th>
                                            <th>Contact</th>
                                            <th>Description</th>
                                            <th>expired date</th>
                                            <th>Package</th>
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
                ajax: "{{ route('company.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'company_name', name: 'company_name'},
                    {data: 'location', name: 'location'},
                    {data: 'contact', name: 'contact'},
                    {data: 'description', name: 'description'},
                    {data: 'expired_date', name: 'expired_date'},
                    {data: 'package_id', name: 'package_id'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('body').on('click', '.deleteItem', function () {
                confirm("Are You sure want to delete !");
                var company_id = $(this).data("id");
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('company.store') }}"+'/'+company_id,
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
