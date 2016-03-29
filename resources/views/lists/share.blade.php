@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <h1>{{{ $list->list }}}</h1>
      <p class="lead">
        <a href="{{ URL::route('lists.share', [$list->id]) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-transfer"></span>Share List</a>
      </p>
    </div>
    <div class="modal" id="shareList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter the Email of the User you'd like to Share with.</h4>
          </div>
          <div class="modal-body">

            {!! Form::model($list, [ 'route' => [ 'lists.save', $list->id, ], 'method' => 'post', 'class' => 'share-email' ]) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::email('email', null, array('class' => 'form-control input-lg', 'placeholder' => 'Email', 'autofocus' => 'autofocus') ) !!}
              </div>
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'form-control input-lg', 'readonly' => 'readonly') ) !!}
              </div>
              {!! Form::submit('Share', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection