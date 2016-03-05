@extends('layouts.app')

@section('content')

<div class="list-page">
  <div class="container">
  	<p class="lead">Back to Your List.</p>
    <p class="lead">
			{{ link_to_route('shares.show', 'Back', [$my_list_id], ['class' => 'btn btn-default btn-sm']) }} 
		</p>
		 <div class="modal" id="editItem">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Edit this Item!</h4>
		      </div>
		      <div class="modal-body">
		        {!! Form::model($list_item, [ 'route' => [ 'shares.shareitems.update', $my_list_id, $list_item->id ], 'method' => 'put', 'class' => 'signin-form' ]) !!}
		          {!! csrf_field() !!}
		          <div class="form-group">
		            {!! Form::text('item', null, array('class' => 'form-control input-lg', 'autofocus' => 'autofocus') ) !!}
		          </div>
		          {!! Form::submit('Update', array('class' => 'btn btn-primary') ) !!}
		        {!! Form::close() !!}
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection