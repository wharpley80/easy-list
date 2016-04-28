@extends('layouts.app')



@section('content')

  <div class="list-page">
    <div class="container">
      <p class="lead">First select or create a new list. </br>
                      Then build it up.
      </p>
      <p class="lead">
        <a class="btn btn-default btn-sm" href="{{ URL::route('lists.create') }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List
        </a>
        <a class="btn btn-default btn-sm" href="{{ URL::route('shares.index') }}"><span class="glyphicon glyphicon-transfer"></span>Shared Lists
        </a>
      </p>
    </div>
    <div class="container">
      <div class="row">
        @foreach ($user->mylisting as $my)
          <h2>{{ link_to_route('lists.show',$my->list, [$my->id], ['class' => 'list-link']) }}</h2>
        @endforeach
      </div>
    </div>
  </div>

@endsection
