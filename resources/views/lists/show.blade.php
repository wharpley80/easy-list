@extends('layouts.app')

@section('content')

  <div class="list-page">
    <div class="button-container pull-left">
      <a class="btn btn-default btn-sm" href="{{ URL::route('lists.create') }}" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>New List
      </a>
      {!! Form::model($list, [ 'route' => [ 'lists.clear', $list->id ], 'method' => 'delete', 'class' => 'clear-form' ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-erase"></span>Clear List', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'clearList']) !!}
      {!! Form::close() !!}

      <a href="{{ URL::route('lists.share', [$list->id]) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-transfer"></span>Share List</a>

      <a href="{{ URL::route('lists.edit', [$list->id]) }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span>Edit List</a>

      {!! Form::model($list, [ 'route' => [ 'lists.destroy', $list->id ], 'method' => 'delete', 'class' => 'delete-form' ]) !!}
        {!! Form::button('<span class="glyphicon glyphicon-trash"></span>Delete List', ['type' => 'submit', 'class' => 'btn btn-default btn-sm', 'id' => 'deleteList']) !!}
      {!! Form::close() !!}
    </div>
    <div class="list-container">
      <div class="lead-container">
        <h1>{{{ $list->list }}}</h1>
        {!! Form::open( array('route' => ['lists.items.store', $list->id], 'class' => 'item-form') ) !!}
          {!! csrf_field() !!}
          <div>
            {!! Form::label('item', 'Add Item') !!}
          </div>
          <div class="form-group">
            {!! Form::text('item', null, array( 'placeholder' => 'Enter Item', 'autofocus' => 'autofocus') ) !!}
          </div>
          {!! Form::submit('Add Item', array('class' => 'btn btn-primary btn-sm', 'id' => 'submit') ) !!}
        {!! Form::close() !!}
      </div>
      <div class="paper">
        <ol>
          @foreach ($items as $item)
            <li class="list-items">
              {{ $item->item }}        

              {!! Form::model($item, [ 'route' => [ 'lists.items.destroy', $list->id, $item->id ], 'method' => 'delete', 'class' => 'delete-form pull-right' ]) !!}
                {!! Form::button('Remove', ['type' => 'submit', 'class' => 'byebye']) !!}
              {!! Form::close() !!}

              {{ link_to_route('lists.items.edit', 'Edit', [$list->id, $item->id], [ 'class' => 'pull-right']) }}
            </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>

@endsection