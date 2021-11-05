@if (Session::has('message'))
  <div class="alert alert-success ml-auto">
    {{ Session::get('message') }}
  </div>
@endif
