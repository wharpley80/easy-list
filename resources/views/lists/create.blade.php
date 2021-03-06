@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">Create a List</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="#createList" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List
        </a>
    </div> 
    <div class="modal" id="createList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter the name of your new list.</h4>
          </div>
          <div class="modal-body">
            {!! Form::open( array('route' => 'lists.store', 'class' => 'create-list') ) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'form-control input-lg', 'placeholder' => 'List Name', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('Create', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div class="paper">
    </div>
  </div>

@endsection