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
                    <a id="modal-create" href="" class="btn btn-primary">Add Category</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Category Name</th>
                          <th>Created At</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($categories as $cat)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $cat->category_name }}</td>
                          <td>{{ Carbon::parse($cat->created_at)->diffForHumans() }}</td>
                          <td class="text-center">
                            <a data-toggle="modal" data-target="#editModal{{ $cat->id }}" href="#editModal{{ $cat->id }}" class="btn btn-sm btn-round btn-icon icon-left btn-success"><i class="far fa-fw fa-edit"></i> Edit</a>

                            <form id="delete-form-{{ $cat->id }}" class="d-inline" action="{{ route('category_Blog.destroy', $cat->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="delete-confirm btn btn-sm btn-round btn-icon icon-left btn-danger" data-id="{{ $cat->id }}"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
                            </form>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="4" class="text-center">There's no category yet</td>
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
{{-- @include('pages.admin.blog.category_blog.modals-blog.edit') --}}
@include('pages.admin.blog.category_blog.modals-blog.create')
@endsection

@push('sweetalert-script')
{{-- Pushed Script --}}
  <script src="{{ url('backend') }}/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ url('vendor') }}/modal-js/create-category.js"></script>
  <script src="{{ url('vendor') }}/modal-js/delete-category.js"></script>
@endpush