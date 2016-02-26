


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




