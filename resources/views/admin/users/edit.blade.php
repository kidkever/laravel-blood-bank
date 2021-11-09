@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
          <h1>Edit User</h1>
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
            <form class="forms-sample" action="{{ route('user.update', [$user->id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="row justify-content-center">
                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                      class="form-control @error('name') is-invalid @enderror" placeholder="name of user">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                      class="form-control @error('email') is-invalid @enderror" placeholder="email of user">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="row justify-content-center">
                    @foreach (App\Models\Role::get() as $role)
                      <div class="col-lg-3">
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="formCheck{{ $role->id }}"
                            name="role_list[]" value="{{ $role->id }}" @if ($user->hasRole($role->name))
                          checked
                    @endif
                    />
                    <label class="form-check-label" for="formCheck{{ $role->id }}">{{ $role->name }}</label>
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
