@extends('admin.admintemplate')

@section('content')
    <div class="row">
        <div class="col-md-12 margin-tb">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Edit data tag <span class="font-weight-bolder text-uppercase"></span></h5>
            </div>
 
            <div class="card-body">
              <form action="{{ route('tags.update', $tags->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama tag</label>
                          <input type="text" name="tag_name" value="{{ $tags->tag_name }}" class="form-control" required>
                        </div>
                        @error('tag_name')
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