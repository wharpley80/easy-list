@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">Select or Create a List</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="#createList" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List
        </a>
    </div> 
    <div class="modal" id="editList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit your list name.</h4>
          </div>
          <div class="modal-body">
            {!! Form::model($list, [ 'route' => [ 'lists.update', $list->id, ], 'method' => 'put', 'class' => 'signin-form' ]) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'form-control input-lg', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('Update', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div class="paper">
    </div>
  </div>

@endsection