@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <h1>{{{ $lis or 'My List' }}}</h1>

      <p class="lead">First select or create a list. Then start adding items.</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="#createList" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List</a>
        <a class="btn btn-default btn-sm" id="clear" href=""><span class="glyphicon glyphicon-erase"></span>Clear List</a>
        <a class="btn btn-default btn-sm" id="deletelist" href=""><span class="glyphicon glyphicon-trash"></span>Delete List</a>
      </p>
    </div>
    <div class="modal fade modal" id="createList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter the name of your new List!</h4>
          </div>
          <div class="modal-body">
            {!! Form::open( array('route' => 'home.store', 'class' => 'signin-form') ) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'list', 'class' => 'list', 'placeholder' => 'List Name', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('submit', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade modal" id="editName">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter your new Username.</h4>
          </div>
          <div class="modal-body">
            <form class="signin-form" method="POST">
              <div class="form-group">
                <input type="text" class="form-control-sm" name="rename" id="rename" autofocus="autofocus" placeholder="New Username">
              </div>
              <input type="submit" name="signin" class="btn btn-primary" value="Rename">
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="info">
      {!! Form::open( array('route' => 'lists.showcase', 'class' => 'item-form') ) !!}
        <select id="return" name="list">Select</option>
          <option selected disabled>Select</option>
            @foreach ($mylists as $lists)
              <option value="{{ $lists->list }}">{{ $lists->list }}</option>
            @endforeach
        </select>
      {!! Form::close() !!}
    </div>
    <div class="paper">
    </div>
    <a class="btn btn-default btn-sm" href="#editName" data-toggle="modal">Edit Username</a>
    <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
  </div>

@endsection