@extends('layouts.app')

@section('content')

@include('layouts.partials.welcome_head');

<div class="modal" id="register">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Create a Username and Password</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
          {!! csrf_field() !!}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" placeholder="Password" name="password">
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <!--
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <input type="password" placeholder="Password Confirm" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
            @endif
          </div>
          -->
          <div class="form-group">
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-btn fa-user"></i>Sign Up
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('layouts.partials.welcome_foot');

@endsection
