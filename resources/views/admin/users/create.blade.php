@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
          <h1>Add New User</h1>
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
            <form class="forms-sample" action="{{ route('user.store') }}" method="post">
              @csrf
              <div class="row justify-content-center">
                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ old('name') }}" id="name" name="name"
                      class="form-control @error('name') is-invalid @enderror">
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
                    <input type="email" id="email" value="{{ old('email') }}" name="email"
                      class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                      class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Password Confirmation</label>
                    <input type="password" id="password-confirm" name="password_confirmation"
                      class="form-control @error('password-confirm') is-invalid @enderror">
                    @error('password-confirm')
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
                            name="role_list[]"
                            {{ is_array(old('role_list')) && in_array($role->id, old('role_list')) ? ' checked' : '' }}
                            value="{{ $role->id }}">
                          <label class="form-check-label" for="formCheck{{ $role->id }}">{{ $role->name }}</label>
                        </div>
                      </div>
                    @endforeach
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
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
