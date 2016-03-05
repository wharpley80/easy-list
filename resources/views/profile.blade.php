@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
    	<p class="lead">Make Profile Adjustments.</p>

    	{{ link_to_route('users.edit', 'Edit UserName', [Auth::user()->id], ['class' => 'btn btn-default btn-sm']) }}

    	{!! Form::model(Auth::user(), [ 'route' => [ 'users.destroy', Auth::user()->id ], 'method' => 'delete', 'class' => 'delete-form' ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Delete My Account', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'deleteName']) !!}
      {!! Form::close() !!}
      
    </div>
  </div>

@endsection