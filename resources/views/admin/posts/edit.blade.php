@extends('admin.admintemplate')

@section('content')
    <div class="row">
        <div class="col-md-12 margin-tb">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Edit data tag <span class="font-weight-bolder text-uppercase"></span></h5>
            </div>
 
            <div class="card-body">
              <form action="{{ route('posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Judul post</label>
                          <input type="text" name="title" class="form-control" value="{{ $posts->title }}" required>
                        </div>
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Deskripsi</label>
                          <textarea class="form-control" name="desc" rows="3" required>{{ $posts->desc }}</textarea>
                        </div>
                        @error('desc')
                              <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori post</label>
                          <select class="form-control" name="category_id">
                            <option disabled selected>-- Pilih jenis kategori --</option>
                              @foreach($category as $item) 
                                @if($posts->category_id == $item->id)
                                  <option value="{{ $item->id }}" selected> {{ $item->cat_name }} </option>
                                @else
                                  <option value="{{ $item->id }}"> {{ $item->cat_name }} </option>
                                @endif
                              @endforeach
                          </select>
                        </div>
                        @error('category_id')
                              <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Tag post</label>
                          <br>
                          @foreach ($tags as $item)
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $item->tag_name }}">
                              <label class="form-check-label">{{ $item->tag_name }}</label>
                            </div>
                          @endforeach
                        </div>
                        @error('category_id')
                              <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                  <div class="mt-5 mb-n4">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection