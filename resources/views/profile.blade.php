@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
    	<p class="lead">Make Profile Adjustments.</p>

    	<a href="{{ URL::route('users.edit', [Auth::user()->id]) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span>Edit UserName</a>

    	{!! Form::model(Auth::user(), [ 'route' => [ 'users.destroy', Auth::user()->id ], 'method' => 'delete', 'class' => 'delete-form' ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Delete My Account', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'deleteName']) !!}
      {!! Form::close() !!}
      
    </div>
  </div>

@endsection