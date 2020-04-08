
@extends('layout')

  @section('body') 	

  <form method="POST" action="">

    @csrf
    
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="name" name="name" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter name">
  </div>

  <div class="form-group" >
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Role</label>
    <select class="form-control" name="role" id="exampleFormControlSelect1">
      <option>admin</option>
      <option>employee</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


</div>


@stop