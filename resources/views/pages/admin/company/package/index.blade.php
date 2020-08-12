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
                                    <a id="modal-create" href="{{ route('package.index') }}" class="btn btn-primary">Add Package</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Package</th>
                                            <th>Price Package</th>
                                            <th>Package Expired</th>
                                            {{--                                            <th class="text-center">Thumbnail</th>--}}
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($package as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->package_name }}</td>
                                                <td>
                                                    {{ $data->price_package }}
                                                </td>
                                                <td>{{ $data->package_expired }}</td>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#editModal{{ $data->id }}" href="#editModal{{ $data->id }}" class="btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>
                                                    <form id="delete-form-{{ $data->id }}" class="d-inline" action="{{ route('package.destroy', $data->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="delete-confirm btn btn-sm btn-round btn-icon icon-left btn-danger" data-id="{{ $data->id }}"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">There's no course yet</td>
                                            </tr>
                                        @endforelse
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
    @include('pages.admin.company.package.modal-package.edit')
    @include('pages.admin.company.package.modal-package.create')
@endsection

@push('sweetalert-script')
    {{-- Pushed Script --}}
    <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ url('vendor') }}/modal-js/create-category.js"></script>
    <script src="{{ url('vendor') }}/modal-js/delete-category.js"></script>
@endpush
