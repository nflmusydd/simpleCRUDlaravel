<!DOCTYPE html>
<html>
    <head>
        <title>CRUD List Dosen</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
<body>
 {{-- <h1>CRUD List Mahasiswa</h1> --}}
 <br>

 @if(Auth::check())
<div class="container">
    <ul class="nav nav-pills">
        {{-- <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('home') }}">My CRUD Website</a></li> --}}
        <li class="{{ Request::is('data/mahasiswa') ? 'active' : '' }}"><a href="{{url('data/mahasiswa')}}">List Mahasiswa</a></li>
        <li class="{{ Request::is('data/dosen') ? 'active' : '' }}"><a href="{{url('data/dosen')}}">List Dosen</a></li>
        <form class="form-inline my-2 my-lg-0 item-right" style="float: right;">
            {{-- <span>{{Auth::user()->email }}</span> --}}
            <a href="{{ url('logout') }}"
            class = "btn btn-outline-success my-2 my-sm-0">Logout </a>
        </form>  
        @yield('content')
          
    </ul>
</div>
@endif

</body>
</html>