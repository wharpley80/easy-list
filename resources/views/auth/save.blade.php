 <div class="modal" id="editItem">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit this Item!</h4>
      </div>
      <div class="modal-body">
        {!! Form::model($list_item, [ 'route' => [ 'lists.items.update', $list->id, $list_item->id ], 'method' => 'put', 'class' => 'signin-form' ]) !!}
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

        @foreach ($mysharelists as $mysharelist)
          <h2>{{ link_to_route('shares.show',$mysharelist->list, [$mysharelist->id], ['class' => 'list-link']) }}</h2>
        @endforeach

<h3> {{{ var_dump($user->listid) }}} </h3>
    <!-- home.blade
    <div class="info">
      {!! Form::open( array('route' => 'lists.showcase', 'class' => 'item-form') ) !!}
        {!! Form::label('show-list', 'Select List', array('class' => 'my-label')) !!}-->
       <!-- {!! Form::select('show-list', $mylists ) !!} -->  
       <!-- 
        <select name="show-list">Select</option>
          <option selected disabled>Select</option>
          @foreach( $mylists as $list )
            <option value="{{ $list }}">{{ $list }}</option>
          @endforeach
        </select>   
        {!! Form::submit('submit', array('class' => 'btn btn-primary btn-sm', 'value' => 'Select', 'id' => 'submit') ) !!}
      {!! Form::close() !!}
    </div>
  -->

      <!-- index.blade
    <div class="info">
      {!! Form::open( array('route' => 'lists.showcase', 'class' => 'item-form') ) !!}
        <select id="return" name="list">Select</option>
          <option selected disabled>Select</option>
            @foreach ($mylists as $lists)
              <option value="{{ $lists->list }}">{{ $lists->list }}</option>
            @endforeach
        </select>
      {!! Form::close() !!}
    </div>
  -->

<!--
      <h1>{{{ $mylists }}} </h1>
      
      @foreach ($mylists as $lists)
      {!! Form::open( array('route' => 'lists.show', [$lists->id], 'class' => 'item-form') ) !!}
        <select id="return" name="list">Select</option>
          <option selected disabled>Select</option>
            
              <option value="{{ $lists->list }}">{{ $lists->list }}</option>
            
        </select>
      {!! Form::close() !!}
      @endforeach
    </div>-->




