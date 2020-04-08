<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


<nav  class="navbar navbar-expand-md navbar-light bg-light">
    <a href="#" class="navbar-brand">Brand</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarCollapse">

    	@if(Auth::user()->role == 'admin')
        <div class="navbar-nav">
            <a href="/signup" class="nav-item nav-link ">Add New Employee</a>
            <a href="/employees" class="nav-item nav-link">Show Employees</a>
            <a href="/tasks/create" class="nav-item nav-link">New Task</a>
            <a href="/employees/rating" class="nav-item nav-link">Employess Ratings</a>
        </div>

        @else
        <div class="navbar-nav">
            <a href="/tasks/edit" class="nav-item nav-link">Tasks</a>
        </div>	
        
        @endif


        @if(!Auth::check())
        <div class="navbar-nav ml-auto">
            <a href="/login" class="nav-item nav-link">Login</a>
        </div>
        @endif

        @if(Auth::check())
            <div class="navbar-nav ml-auto">

                @if(Auth::user()->role == 'employee' && Auth::user()->image != null)
                    <img name="photo" width="60" height="60"
                     src="{{url('storage/'. Auth::user()->image)}}">
                @endif

                <a href="/logout" class="nav-item nav-link">logout</a>
                   
             </div>
        @endif

    </div>
</nav>


<div class="container">


@yield('body')

