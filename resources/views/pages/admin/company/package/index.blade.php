@extends('layouts.admin')

@section('title')
    Package || List
@endsection

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Company</a></div>
                    <div class="breadcrumb-item">Package</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Company Package</h4>
                                <div>
                                    <a href = "javascript:void(0)" id="createPackage" class="btn btn-primary">Add Package</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered data-table" id="table">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Package</th>
                                            <th>Price Package</th>
                                            <th>Package Expired</th>
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
    @include('pages.admin.company.package.modal-package')
@endsection

@push('addon-script')
    {{-- Pushed Script --}}
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('package.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'package_name', name: 'package_name'},
                    {data: 'price_package', name: 'price_package'},
                    {data: 'package_expired', name: 'package_expired'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createPackage').click(function () {
                $('#saveBtn').val("create-Package");
                $('#id').val('');
                $('#package_form').trigger("reset");
                $('#modelHeading').html("Create New Package");
                $('#ajaxModel').modal('show');
            });

            $('body').on('click', '.editPackage', function () {
                var package_id = $(this).data('id');
                $.get("{{ route('package.index') }}" +'/' + package_id +'/edit', function (data) {
                    $('#modelHeading').html("Edit Package");
                    $('#saveBtn').val("edit-package");
                    $('#ajaxModel').modal('show');
                    $('#id').val(data.id);
                    $('#package_name').val(data.package_name);
                    $('#price_package').val(data.price_package);
                    $('#package_expired').val(data.package_expired);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Save');

                $.ajax({
                    data: $('#package_form').serialize(),
                    url: "{{ route('package.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        $('#package_form').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.deletePackage', function () {

                confirm("Are You sure want to delete !");
                var package_id = $(this).data("id");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('package.store') }}"+'/'+package_id,
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
