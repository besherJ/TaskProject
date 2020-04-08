@extends('layout')
     
   

  @section('body') 	



  <form method="POST" action="">

  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Task Name</label>
    <input type="name" name="name" class="form-control" aria-describedby="nameHelp" placeholder="Task Name">
  </div>

    <div class="form-group">
      <label >Employee Id</label>
      <select class="form-control" name="emp_id">

       @foreach($employees as $emp)
          <option> {{ $emp->id }}</option>
       @endforeach

      </select>
    </div>



  <button type="submit" class="btn btn-primary">Submit</button>



  </form>

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

@stop