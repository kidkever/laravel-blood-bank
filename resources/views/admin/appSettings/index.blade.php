@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>App Settings</h1>
        </div>
        @include('sweetalert::alert')
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content pb-3">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">App Settings</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <tbody>
            <tr>
              <td style="width:150px;" class="text-muted">About App</td>
              <td>{{ $appSettings->about_app }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Notification Settings Text</td>
              <td>{{ $appSettings->notification_setting_text }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Phone</td>
              <td>{{ $appSettings->phone }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Email</td>
              <td>{{ $appSettings->email }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Facebook Link</td>
              <td>{{ $appSettings->fb_link }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Twitter Link</td>
              <td>{{ $appSettings->tw_link }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Instagram Link</td>
              <td>{{ $appSettings->insta_link }}</td>
            </tr>
            <tr>
              <td style="width:150px;" class="text-muted">Youtube Link</td>
              <td>{{ $appSettings->yt_link }}</td>
            </tr>

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="text-center">
      <a class="btn btn-lg btn-primary" href="{{ route('appSettings.edit') }}">Edit App Settings
        <i class="fas fa-edit"></i>
      </a>
    </div>
  </section>
  <!-- /.content -->
@endsection
