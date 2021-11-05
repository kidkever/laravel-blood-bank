@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Posts</h1>
        </div>
        @include('sweetalert::alert')
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of All Posts</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Title</th>
              <th>Image</th>
              <th>Related Categories</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td><img src="{{ Storage::url($post->image) }}" width="50"></td>
                <td>{{ $post->category->name }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('post.edit', [$post->id]) }}"><i
                      class="fas fa-edit"></i></a>
                </td>
                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModal{{ $post->id }}">
                    <i class="fas fa-trash-alt"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{ route('post.destroy', $post->id) }}" method="post">@csrf
                        @method('DELETE')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete
                              confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p> Are you sure you want to delete this item?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes Delete it</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- End Modal -->
                </td>
              </tr>
            @empty
              <p>No cities found.</p>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>




  </section>
  <!-- /.content -->
@endsection
