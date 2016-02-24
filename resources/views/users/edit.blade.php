@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <!--<h1>{{{ $showlist or 'My List' }}}</h1>-->
      <!--<h1>{{ Auth::user()->name }}'s List</h1>-->
      <p class="lead">Edit Your Profile. </br>
                      Then Return to Home.</p>
      <p class="lead">

      </p>
    </div>
    <div class="container">

    </div>
    <div class="modal" id="editName">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Enter your new Username.</h4>
          </div>
          <div class="modal-body">
            {!! Form::model($newname, [ 'route' => [ 'users.update', $newname->id, ], 'method' => 'put', 'class' => 'edit-name' ]) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('name', null, array('class' => 'form-control input-lg', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('Update', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      {{ link_to_route('users.edit', 'Edit UserName', [Auth::user()->id], ['class' => 'btn btn-default btn-sm']) }}
      <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
    </div>
  </div>

@endsection