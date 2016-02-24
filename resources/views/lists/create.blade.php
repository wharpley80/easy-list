@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">Select or create a list</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="{{ url('/home') }}" data-toggle="modal"><span class="glyphicon glyphicon-chevron-down"></span>Select List</a>
        <a class="btn btn-default btn-sm" href="#createList" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List</a>
    </div> 
    <div class="modal" id="createList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter the name of your new List!</h4>
          </div>
          <div class="modal-body">
            {!! Form::open( array('route' => 'lists.store', 'class' => 'signin-form') ) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'form-control input-lg', 'placeholder' => 'List Name', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('submit', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div class="paper">
    </div>
    <a class="btn btn-default btn-sm" href="#editName" data-toggle="modal">Edit Username</a>
    <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
  </div>

@endsection