@extends('base')

@section('content')
<div class="loginContainer">
  <form class="pure-form pure-form-stacked" action="{{ url('login') }}" method="post">
      <fieldset>
          <h1>Login</h1>

          <label for="email">Email / Username</label>
          <input id="email" name="email" type="text" placeholder="Email / Username">

          <label for="password">Password</label>
          <input id="password" name="password" type="password" placeholder="Password">

          <label for="remember" class="pure-checkbox">
              <input id="remember" type="checkbox"> Remember me
          </label>

          <button type="submit" class="pure-button pure-button-primary">Sign in</button>
      </fieldset>
      {{ csrf_field() }}
  </form>

  @if($errors->count() > 0)
      <div class="">
        <span class="error_msg"> <i class="fa fa-exclamation-circle"></i> {{ $errors->first() }}</span>
      </div>
  @endif
</div>
@endsection
