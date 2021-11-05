@extends('auth.layout')

@section('content')

  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Blood</b>Bank</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Please confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
          @csrf

          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
              name="password" required autocomplete="current-password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>


          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Confirm Password</button>
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  Forgot Your Password?
                </a>
              @endif
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
