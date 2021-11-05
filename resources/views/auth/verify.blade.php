@extends('auth.layout')

@section('content')

  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Blood</b>Bank</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Verify Your Email Address</p>

        @if (session('resent'))
          <div class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
          </div>
        @endif

        <p>Before proceeding, please check your email for a verification link.</p>
        <p>If you did not receive the email.</p>

        <form method="POST" class="d-inline" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
