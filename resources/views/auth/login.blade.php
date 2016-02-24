@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h1>Easy List Maker</h1>
        <p class="lead">
          The quickest and easiest list making app you will ever use. Don't struggle with pen and paper anymore. Make 
          your list here and then it's with you anywhere you go. As long as you have your phone or tablet you will never 
          lose your list again.
        </p>
        <p class="lead">
          <a class="btn btn-default btn-md" href="{{ url('/login') }}" data-toggle="modal"><span class="glyphicon glyphicon-user"></span>Sign In</a>
          <a class="btn btn-default btn-md"  href="{{ url('/register') }}" data-toggle="modal"><span class="glyphicon glyphicon-road"></span>Sign Up</a>
        </p>
      </div>
      <div class="col-sm-6 hidden-xs">
        <div class="device">
        </div>
      </div>
    </div>
  </div>
</div>
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
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <b class="glyphicon glyphicon-road"></b>
      <h2>Get Started</h2>
      <p>
        Create an account with a Username and Password. Then make as many lists as you want. It's quick, easy, and FREE!! Takes 
        less than a minute to get started and have your first list on it's way.
      </p>
    </div>
    <div class="col-sm-4">
      <b class="glyphicon glyphicon-duplicate"></b>
      <h2>Make Multiple Lists</h2>
      <p>
        Once you get started you can make as many lists as you want. Shopping, To Do, Goals, Christmas, Packing, Grocery, or
        any other list that you can think of.
      </p>
    </div>
    <div class="col-sm-4">
      <b class="glyphicon glyphicon-edit"></b>
      <h2>Edit With Ease</h2>
      <p>
        Editing your list is quick and easy. Remove single items with 1 click or touch, and clear your entire list and 
        start over with only 2 clicks.
      </p>
    </div>
  </div>
</div>

@endsection
