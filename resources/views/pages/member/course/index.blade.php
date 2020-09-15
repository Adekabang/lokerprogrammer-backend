@extends('layouts.admin')

@section('title')
    Course || List
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-button">
        <a href="{{ route('show-course') }}" class="btn btn-sm btn-round btn-icon icon-left btn-info"><i class="far fa-eye"></i> View Course</a>
      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Courses</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Courses List</h4>
              <div>
                <a href="{{ route('course.create') }}" class="btn btn-primary">Add Course</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Nama Course</th>
                      <th>Kategori</th>
                      <th>Status</th>
                      <th>Mentor Course</th>
                      <th class="text-center">Thumbnail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($courses as $course)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $course->course_name }}</td>
                      <td>
                        {{ $course->category ? $course->category->category_name : '' }}
                      </td>
                      <td>{{ $course->status }}</td>
                      <td class="align-middle text-center">
                        <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $course->course_author }}">
                      </td>
                      <td class="text-center" style="width: 200px;"><img src="{{ Storage::url($course->thumbnail) }}" class="w-50"></td>
                      <td>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <button type="button" onclick="deleteData({{ $course->id }})" class="btn btn-sm btn-round btn-icon icon-left btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                        </button>
                        <form id="delete-form-{{ $course->id }}"
                              action="{{ route('course.destroy',$course->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('delete')
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
@endsection

@push('sweetalert-script')
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ url('backend') }}/assets/js/page/modules-sweetalert.js"></script>
@endpush