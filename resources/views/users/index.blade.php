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
      <div class="row">
        @foreach ($mylists as $lists)
          <h2>{{ link_to_route('lists.show',$lists->list, [$lists->id], ['class' => 'list-link']) }}</h2>
        @endforeach
      </div>
    </div>
    <div class="container">
      {{ link_to_route('user.edit', 'Edit UserName', [Auth::user()->id], ['class' => 'btn btn-default btn-sm']) }}
      <a href="#" class="btn btn-default btn-md" id="deletename">Delete My Account</a>
    </div>
  </div>

@endsection