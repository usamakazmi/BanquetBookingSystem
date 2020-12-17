@if (Auth::guard('web')->check())
  <p class="text-success">
    You are Logged In as a <strong>Customer</strong>
  </p>
@endif


@if (Auth::guard('owner')->check())
  <p class="text-success">
    You are Logged In as a <strong>Owner</strong>
  </p>
@endif