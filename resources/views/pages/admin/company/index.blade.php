@extends('layouts.admin')

@section('title')
    Company || List
@endsection

@section('content')
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-button">
        <a href="{{ route('show-company') }}" class="btn btn-sm btn-round btn-icon icon-left btn-info"><i class="far fa-eye"></i> View Company</a>
      </div>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Companys</a></div>
        <div class="breadcrumb-item">List</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Companys List</h4>
              <div>
                <a href="{{ route('company.create') }}" class="btn btn-primary">Add Company</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th>Nama Company</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Mentor Company</th>
                      <th class="text-center">Thumbnail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($companies as $company)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $company->company_name }}</td>
                      <td>
                        {{ $company->category ? $company->category->category_name : '' }}
                      </td>
                      <td>@currency($company->price)</td>
                      <td class="align-middle text-center">
                        <img alt="image" src="{{ url('backend') }}/assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $company->company_author }}">
                      </td>
                      <td class="text-center" style="width: 200px;"><img src="{{ Storage::url($company->thumbnail) }}" class="w-50"></td>
                      <td>
                        <a href="{{ route('company.edit', $company->id) }}" class="btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>
                        <button type="button" onclick="deleteData({{ $company->id }})" class="btn btn-sm btn-round btn-icon icon-left btn-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
                        </button>
                        <form id="delete-form-{{ $company->id }}"
                              action="{{ route('company.destroy',$company->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center">There's no company yet</td>
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