@extends('layout')
  
@section('body') 	





  <form method="POST" action="">

    @csrf
    
  <div class="form-group">
      <label >Task name :  </label>
      {{ $task->name }}

    <p>start time :
    <input type="date" name="start_time">
	</p>

	<p>end time :	
    <input type="date" name="end_time">
	</p>

  </div>

   <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  @if (session('timeUpdate'))
    <div class="alert alert-success">
        {{ session('timeUpdate') }}
    </div>
  @endif




@stop