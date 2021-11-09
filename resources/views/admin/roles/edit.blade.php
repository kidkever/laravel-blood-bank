@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
          <h1>Edit Role</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample" action="{{ route('role.update', [$role->id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="row justify-content-center">
                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $role->name }}"
                      class="form-control @error('name') is-invalid @enderror" placeholder="name of role">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="row justify-content-center">
                    @foreach (App\Models\Permission::get() as $permission)
                      <div class="col-lg-3">
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="formCheck{{ $permission->id }}"
                            name="permission_list[]" value="{{ $permission->id }}" {{-- @if ($role->permissions->contains($permission->id))
                            checked
                           @endif --}} @if ($role->hasPermission($permission->name))
                          checked
                    @endif
                    />
                    <label class="form-check-label"
                      for="formCheck{{ $permission->id }}">{{ $permission->name }}</label>
                  </div>
                </div>
                @endforeach
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

          </div>
        </div>
        </form>
      </div>
    </div>
    </div>

    </div>

  </section>
  <!-- /.content -->
@endsection
