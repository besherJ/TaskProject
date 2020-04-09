
@extends('layout')

  @section('body') 	
    
  <form method="POST" action="" enctype="multipart/form-data">

  @csrf 
    
  <div class="form-group">
    <label for="name">Full Name</label>
    <input type="name" name="name" value="{{ $user->name }}" class="form-control" id="exampleInputname" aria-describedby="nameHelp" placeholder="Enter name">
  </div>

  <div class="form-group" >
    <label for="email">Email address</label>
    <input type="email" name="email" value="{{ $user->email }} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" >
  </div>

  <div class="form-group">
    <label for="Role">Role: {{ $user->role }} </label>
    <select class="form-control" selected="" name="role" id="role">
      <option {{ $user->role == 'admin' ? 'selected' : '' }}>admin</option>
      <option {{ $user->role == 'employee' ? 'selected' : '' }}>employee</option>
    </select>
  </div>

  <div class="form-group">
    <label for="photo">Old Image: <img name="photo" width="60" height="60" src="{{url('storage/'. $user->image)}}"></label>
   <input type="file" id="photo" name="photo" height="30px" width="30px">
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