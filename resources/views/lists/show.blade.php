@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <h1>{{{ $list->list }}}</h1>
      <!--<h1>{{ Auth::user()->name }}'s List</h1>-->
      <p class="lead">Add Items to Your List!</p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="{{ URL::route('lists.create') }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List</a>
        <a class="btn btn-default btn-sm" id="clear" href=""><span class="glyphicon glyphicon-erase"></span>Clear List</a>
      </p>
    </div>
    <div class="paper">
    </div>

    {{ link_to_route('lists.share', 'Share List', [$list->id], ['class' => 'btn btn-default btn-sm']) }}

    {{ link_to_route('lists.edit', 'Edit ListName', [$list->id], ['class' => 'btn btn-default btn-sm']) }}

    {!! Form::model($list, [ 'route' => [ 'lists.destroy', $list->id ], 'method' => 'delete', 'class' => 'delete-form' ]) !!}
      {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Delete List', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'deleteList']) !!}
    {!! Form::close() !!}
  </div>

@endsection