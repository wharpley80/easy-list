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
      </p>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($mysharelists as $mysharelist)
          <h2>
            {{ link_to_route('shares.show',$mysharelist->list, [$mysharelist->id], ['class' => 'list-link']) }}
          </h2>
        @endforeach
      </div>
    </div>
  </div>

@endsection