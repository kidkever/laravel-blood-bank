@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
          <h1>Edit App Settings</h1>
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
            <form class="forms-sample" action="{{ route('appSettings.update') }}" method="post">
              @csrf
              @method('PUT')
              <div class="row justify-content-center">
                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="about_app">About App</label>
                    <textarea class="summernote form-control @error('about_app') is-invalid @enderror" name='about_app'
                      rows="5">{{ $appSettings->about_app }}</textarea>
                    @error('about_app')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="notification_setting_text">Notification Settings Text</label>
                    <textarea class="summernote form-control @error('notification_setting_text') is-invalid @enderror"
                      name='notification_setting_text' rows="5">{{ $appSettings->notification_setting_text }}</textarea>
                    @error('notification_setting_text')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ $appSettings->phone }}"
                      class="form-control @error('phone') is-invalid @enderror" placeholder="phone number">
                    @error('phone')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="phone">Email</label>
                    <input type="email" name="email" value="{{ $appSettings->email }}"
                      class="form-control @error('email') is-invalid @enderror" placeholder="email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="fb_link">Facebook Link</label>
                    <input type="text" name="fb_link" value="{{ $appSettings->fb_link }}"
                      class="form-control @error('fb_link') is-invalid @enderror" placeholder="Facebook Link">
                    @error('fb_link')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="tw_link">Twitter Link</label>
                    <input type="text" name="tw_link" value="{{ $appSettings->tw_link }}"
                      class="form-control @error('tw_link') is-invalid @enderror" placeholder="Twitter Link">
                    @error('tw_link')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="insta_link">Instagram Link</label>
                    <input type="text" name="insta_link" value="{{ $appSettings->insta_link }}"
                      class="form-control @error('insta_link') is-invalid @enderror" placeholder="Instagram Link">
                    @error('insta_link')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="yt_link">Youtube Link</label>
                    <input type="text" name="yt_link" value="{{ $appSettings->yt_link }}"
                      class="form-control @error('yt_link') is-invalid @enderror" placeholder="Youtube Link">
                    @error('yt_link')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
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
