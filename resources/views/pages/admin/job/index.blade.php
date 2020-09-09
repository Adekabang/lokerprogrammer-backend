@extends('layouts.admin')

@section('title')
    Job || List
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-button">
        <a href="{{ route('show-job') }}" class="btn btn-sm btn-round btn-icon icon-left btn-info"><i class="far fa-eye"></i> View Job</a>
      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Jobs</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Jobs List</h4>
              <div>
                <a href="{{ route('job.create') }}" class="btn btn-primary">Add Job</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Nama Job</th>
                      <th>Company</th>
                      <th>Kategori</th>
                      <th>Requirement</th>
                      <th>Req. Skill</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($jobs as $job)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $job->name }}</td>
                      <td>{{ $job->companies->first()->company_name }}</td>
                      <td>
                        {{ $job->category ? $job->category->category_name : '' }}
                      </td>
                      <td>{!! Str::limit($job->requirement, 20) !!}</td>
                      <td>{!! Str::limit($job->required_skill, 20) !!}</td>
                      <td class="text-center">
                        <a href="{{ route('job.edit', $job->id) }}" class="mb-2 btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <button type="button" onclick="deleteData({{ $job->id }})" class="btn btn-sm btn-round btn-icon icon-left btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                        </button>
                        <form id="delete-form-{{ $job->id }}"
                              action="{{ route('job.destroy',$job->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">There's no job yet</td>
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