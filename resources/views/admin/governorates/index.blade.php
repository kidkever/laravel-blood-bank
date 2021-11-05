@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Manage Governorates</h1>
        </div>
        @include('sweetalert::alert')
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List Of All Governorates</h3>
        <form class="forms-sample" action="{{ route('governorate.index') }}" method="get">
          <div class="input-group input-group-sm ml-auto" style="width: 200px;">
            @csrf
            <input type="text" id="search" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
        </form>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($governorates as $governorate)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $governorate->name }}</td>
              <td>
                <a class="btn btn-primary" href="{{ route('governorate.edit', [$governorate->id]) }}"><i
                    class="fas fa-edit"></i></a>
              </td>
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal"
                  data-target="#exampleModal{{ $governorate->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $governorate->id }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="{{ route('governorate.destroy', $governorate->id) }}" method="post">@csrf
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
            <p>No categries found.</p>
          @endforelse


        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    </div>
    {{ $governorates->links() }}




  </section>
  <!-- /.content -->
@endsection
