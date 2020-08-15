@extends('layouts.admin')

@section('title')
    Course || Package Feature
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Package Feature</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Package Feature List</h4>
              <div>
                <a id="launch-modal-create" href="#" class="btn btn-primary">Add Feature</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Package Name</th>
                      <th>Package Features Name</th>
                      <th>Created At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($features as $feat)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $feat->coursePackge ? $feat->coursePackge->package_name : '' }}</td>
                      <td>{{ $feat->feature_name }}</td>
                      <td>{{ Carbon::parse($feat->created_at)->diffForHumans() }}</td>
                      <td class="text-center">
                        <a data-toggle="modal" data-target="#editModal{{ $feat->id }}" href="#editModal{{ $feat->id }}" class="btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <form id="delete-form-{{ $feat->id }}" class="d-inline" action="{{ route('coursePackageFeature.destroy', $feat->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button class="delete-confirm btn btn-sm btn-round btn-icon icon-left btn-danger" data-id="{{ $feat->id }}"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center">There's no package feature yet</td>
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
@include('pages.admin.course.course-package-feature.modals-course-package.edit')
@include('pages.admin.course.course-package-feature.modals-course-package.create')
@endsection

@push('sweetalert-script')
{{-- Pushed Script --}}
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ url('vendor') }}/modal-js/create.js"></script>
  <script src="{{ url('vendor') }}/modal-js/delete.js"></script>
@endpush