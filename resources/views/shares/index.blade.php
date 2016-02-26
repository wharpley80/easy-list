@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">First Select or Create a New List. </br>
                      Then Build It Up!</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="{{ URL::route('lists.create') }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List</a>
        <a class="btn btn-default btn-sm" href="{{ URL('/home') }}">My Lists
        </a>
        <!--
        <a class="btn btn-default btn-sm" id="clear" href=""><span class="glyphicon glyphicon-erase"></span>Clear List</a>

        <a class="btn btn-default btn-sm" id="deletelist" href=""><span class="glyphicon glyphicon-trash"></span>Delete List</a>
      -->
      </p>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($mysharelists as $mysharelist)
          <h2>{{ link_to_route('shares.show',$mysharelist->list, [$mysharelist->id], ['class' => 'list-link']) }}</h2>
        @endforeach
      </div>
    </div>
    <div class="container">
      {{ link_to_route('users.edit', 'Edit UserName', [Auth::user()->id], ['class' => 'btn btn-default btn-sm']) }}

      {!! Form::model(Auth::user(), [ 'route' => [ 'users.destroy', Auth::user()->id ], 'method' => 'delete', 'class' => 'delete-form' ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Delete My Account', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'deleteName']) !!}
      {!! Form::close() !!}
      <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
    </div>
  </div>

@endsection