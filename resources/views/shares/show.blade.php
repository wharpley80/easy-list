@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="container">
      <h1>{{{ $list->list }}}</h1>
      <p class="lead" id="mylead">Add Items to this Shared List!</p>
      {!! Form::open( array('route' => ['shares.shareitems.store', $list->id], 'class' => 'item-form') ) !!}
        {!! csrf_field() !!}
          {!! Form::label('item', 'Add Item', array('class' => 'my-label')) !!}
          {!! Form::text('item', null, array( 'placeholder' => 'Enter Item', 'autofocus' => 'autofocus') ) !!}
        {!! Form::submit('submit', array('class' => 'btn btn-primary btn-sm', 'id' => 'submit') ) !!}
      {!! Form::close() !!}
    </div>
    <div class="paper">
      <ol>
        @foreach ($items as $item)
          <li class="list-items">
            {{ $item->item }}

            {!! Form::model($item, [ 'route' => [ 'shares.shareitems.destroy', $list->id, $item->id ], 'method' => 'delete', 'class' => 'delete-form pull-right' ]) !!}
              {!! Form::button('Remove', ['type' => 'submit', 'class' => 'byebye']) !!}
            {!! Form::close() !!}

            {{ link_to_route('shares.shareitems.edit', 'Edit', [$list->id, $item->id], [ 'class' => 'pull-right']) }}
          </li>
        @endforeach
      </ol>
    </div>
    {!! Form::model($list, [ 'route' => [ 'shares.clear', $list->id ], 'method' => 'delete', 'class' => 'clear-form' ]) !!}
      {!! Form::button('<span class="glyphicon glyphicon-erase"></span>Clear List', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'clearList']) !!}
    {!! Form::close() !!}
  </div>

@endsection