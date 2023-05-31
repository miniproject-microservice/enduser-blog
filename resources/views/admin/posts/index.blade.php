@extends('admin.admintemplate')

@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="btn-group d-flex justify-content-between">
                              <div class="d-flex justify-content-start mt-2">
                                  <h5>Data Post</h5>
                              </div>

                              <div class="d-flex justify-content-end mb-3">
                                  <div class="mb-n3">
                                  <a href="{{ route('posts.create') }}">
                                      <button class="btn btn-primary">
                                          Tambah Data
                                      </button>
                                  </a>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Tag</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 0; @endphp
                                        @foreach($posts as $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->category->cat_name }}</td>
                                                <td>{{ $item->tags }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>
                                                    <a href="{{ route('posts.edit', ['id' => $item->id]) }}" class="btn btn-success btn-sm">Edit</a>
                                                    <a href="{{ route('posts.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
