@foreach ($data_blog as $blog)
<div class="modal fade bd-example-modal-lg" id="editModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Fill this form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('blog.update', $blog->id) }}"  enctype="multipart/form-data">
          @method('PUT')
          @csrf
        
        <div class="form-group">
          <label>Judul Blog</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-clipboard-list"></i>
              </div>
            </div>
            <input type="text" class="form-control" placeholder="add name category" name="judul_blog" value="{{ old('judul_blog') ?? $blog->judul_blog }}">
          </div>  
        </div>
      
        <div class="form-group">
          <label>Category Blog</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-clipboard-list"></i>
              </div>
            </div>
            <select class="form-control custom-select selectric @error('category_id') is-invalid @enderror" name="category_id" required>
              @foreach ($categories as $cate)
                <option value="{{ $cate->id }}" 
                  @if ( $blog->categoy_id == $cate->id)
                    selected
                  @endif
                  >{{ $cate->category_name }}</option>
              @endforeach
            </select>
          </div>
        </div> 

          <div class="form-group">
            <label>upload Image</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-clipboard-list"></i>
                </div>
              </div>
              <input type="file" class="form-control" placeholder="" name="image" value="{{ old('image') ?? $blog->image }}"> 
            </div> 
            {{$blog->image }} <img src="{{asset('backend/assets/img/blog/'.$blog->image)}}" alt="" width="75px" srcset=""> 
          </div>
         

          <div class="form-group">
            <label>Content</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-clipboard-list"></i>
                </div>
              </div>
              <textarea class="summernote-simple" name="content_blog" id="" cols="30" rows="5" value="{{old("content_blog") ?? $blog->content_blog}}">{{$blog->content_blog}}</textarea>
              {{-- <input type="text" class="form-control" placeholder="add name category" name="category_name" value="{{ old('category_name') }}"> --}}
            </div>  
          </div>
       
        <div class="modal-footer bg-whitesmoke">
          <button type="submit" class="btn btn-primary btn-shadow">Save changes</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach