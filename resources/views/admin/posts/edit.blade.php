@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center mb-2">
        <div class="col-lg-10">
          <h1>Edit Post</h1>
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
            <form class="forms-sample" action="{{ route('post.update', [$post->id]) }}" enctype="multipart/form-data"
              method="post">
              @csrf
              @method('PUT')
              <div class="row justify-content-center">
                <div class="col-lg-8">

                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}"
                      class="form-control @error('title') is-invalid @enderror" placeholder="title of the post">
                    @error('title')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" style="height:100%" class="form-control @error('image') is-invalid @enderror"
                      name="image">
                    @error('image')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="summernote form-control @error('content') is-invalid @enderror" name='content'
                      rows="5">{{ $post->content }}</textarea>
                    @error('content')
                      <span class="invalid-feedback" role="alert">
                        <strong>
                          {{ $message }}
                        </strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="category_id">Choose a category</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                      <option value="">Select a category</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ $post->category_id == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}</option>
                      @endforeach
                    </select>
                    @error('category_id')
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
