@extends('layouts.member')

@section('title')
    Setting
@endsection

@section('content')
    
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h5>Setting</h5>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item">Setting</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-md-6">
                        <h6>Edit My Profil</h6>
                        <div class="card shadow rounded">
                            <div class="card-header d-flex justify-content-center">
                                <div>
                                    <img src="{{ asset('backend/assets/img/avatar/'.$user->images) }}" width="100px"
                                        class="rounded-circle mr-1">
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <form enctype="multipart/form-data" method="post" action="/setting/{{ $user->id }}">
                                    @method('patch')
                                    @csrf
                                    {{-- <div class="form-group">
                                        <input type="file" class="form-control-file" name="images"
                                            value="{{ $user->images }}">
                                    </div> --}}

                                    {{-- thubnil --}}
                                    <div class="form-group row mb-4 d-flex">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Images</label>
                                        <div class="col-sm-12 col-md-4">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="images" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /thubnil --}}

                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                            name="email" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="password" value="{{ $user->password }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6>Manage My Course</h6>
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-center">
                                <div>

                                </div>
                            </div>
                            <div class="card-body">

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

@push('addon-script')
  <script src="{{ url('backend') }}/assets/js/page/features-post-create.js"></script>
@endpush
