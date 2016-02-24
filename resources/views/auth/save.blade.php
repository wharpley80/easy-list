            {!! Form::open( array('route' => 'home.store', 'class' => 'signin-form') ) !!}
              {!! csrf_field() !!}
              <div class="form-group">
                {!! Form::text('list', null, array('class' => 'list', 'class' => 'list', 'placeholder' => 'List Name', 'autofocus' => 'autofocus') ) !!}
              </div>
              {!! Form::submit('submit', array('class' => 'btn btn-primary') ) !!}
            {!! Form::close() !!}


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

        <div class="modal" id="selectList">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Select a List!</h4>
          </div>
          <div class="modal-body">
          {!! Form::open( array('route' => array('lists.show', '1' ), 'class' => 'item-form') ) !!}
            <select id="return" name="show-list" class="form-control input-lg">Select</option>
              <option selected disabled>Select</option>
                @foreach ($mylists as $lists)
                  <option value="{{ $lists->list }}">{{ $lists->list }}</option>
                @endforeach
            </select>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary btn-sm" value="Select">
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>


