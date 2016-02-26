@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <h1>{{{ $list->list }}}</h1>
      <p class="lead">Add Items to this Shared List!</p>
      <p class="lead">

      </p>
    </div>
    <div class="paper">
    </div>
    <a class="btn btn-default btn-sm" id="clear" href=""><span class="glyphicon glyphicon-erase"></span>  Clear List
    </a>
  </div>

@endsection