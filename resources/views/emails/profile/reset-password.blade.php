@component('mail::message')

  # Reset your password.

  <p>Your reset code is: {{ $code }}</p>

  Thanks,<br>
  {{ config('app.name') }}
@endcomponent
