@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">First select or create a list. Then start adding items.</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="#createList" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List</a>
        <a class="btn btn-default btn-sm" id="clear" href=""><span class="glyphicon glyphicon-erase"></span>Clear List</a>
        <a class="btn btn-default btn-sm" id="deletelist" href=""><span class="glyphicon glyphicon-trash"></span>Delete List</a>
      </p>
    </div> 
    <div class="info">
    	{!! Form::open( array('route' => 'lists.showcase', 'class' => 'item-form') ) !!}
        {!! Form::label('show-list', 'Select List', array('class' => 'my-label')) !!}
        {!! Form::select('show-list', $mylists) !!}       
        {!! Form::submit('submit', array('class' => 'btn btn-primary btn-sm', 'value' => 'Select', 'id' => 'submit', 'name' => 'submit') ) !!}
      {!! Form::close() !!}
    </div>
    <div class="paper">
    </div>
    <a class="btn btn-default btn-sm" href="#editName" data-toggle="modal">Edit Username</a>
    <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
  </div>

@endsection




