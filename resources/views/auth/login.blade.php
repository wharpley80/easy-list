@extends('layouts.app')

@section('content')

@include('layouts.partials.welcome_head');

<div class="modal" id="authorize">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Sign In with your Username and Password</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {!! csrf_field() !!}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" placeholder="Password">
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-sign-in"></i>Login
            </button>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.welcome_foot');

@endsection
