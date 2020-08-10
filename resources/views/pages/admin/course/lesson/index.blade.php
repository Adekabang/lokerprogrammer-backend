@extends('layouts.admin')

@section('title')
    Course || Lesson
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Lessons</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Lesson List</h4>
              <div>
                <a href="{{ route('lesson.create') }}" class="btn btn-primary">Add Lesson</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Lesson Name</th>
                      <th>Video</th>
                      <th>Episode</th>
                      <th>Status</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($lessons as $lesson)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $lesson->lesson_name }}</td>
                      <td><iframe width="320" height="180" src="https://www.youtube.com/embed/{!! $lesson->video !!}?controls=1">
                      </iframe></td>
                      <td>{{ $lesson->episode }}</td>
                      <td>{{ $lesson->status }}</td>
                      <td>{{ Carbon::parse($lesson->created_at)->diffForHumans() }}</td>
                      <td class="text-center">
                        <a href="{{ route('lesson.edit', $lesson->id) }}" class="btn btn-sm btn-round btn-icon icon-left btn-success my-1"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <button type="button" onclick="deleteData({{ $lesson->id }})" class="btn btn-sm btn-round btn-icon icon-left btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                        </button>
                        <form id="delete-form-{{ $lesson->id }}"
                              action="{{ route('lesson.destroy',$lesson->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">There's no lessson yet</td>
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
{{-- <script src="{{ url('vendor') }}/modal-js/create-lesson.js"></script>
<script src="{{ url('vendor') }}/modal-js/delete-lesson.js"></script> --}}
@endpush