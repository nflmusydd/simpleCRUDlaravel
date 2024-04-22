<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Personal CRUD Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@if(Auth::check())
<div class="container">
  <ul class="nav nav-pills">
    <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('home') }}">My CRUD Website</a></li>
    <li class="{{ Request::is('profile/daniel') ? 'active' : '' }}"><a href="{{url('profile/daniel')}}">Page 1</a></li>
    <li class="{{ Request::is('profile/marvin') ? 'active' : '' }}"><a href="{{url('profile/marvin')}}">Page 2</a></li>
    <li class="{{ Request::is('profile/musyaddad') ? 'active' : '' }}"><a href="{{url('profile/musyaddad')}}">Page 3</a></li>
    <li class="{{ Request::is('profile/alex') ? 'active' : '' }}"><a href="{{url('profile/alex')}}">Page 4</a></li>
    <li class="{{ Request::is('profile/fawzil') ? 'active' : '' }}"><a href="{{url('profile/fawzil')}}">Page 5</a></li>
  </ul>
</div>
@endif
<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('home') }}">My CRUD Website</a>
    </div>
    <ul class="nav navbar-nav">
      
      <li class="active"><a href="#">Home</a></li> 
      <li><a href="{{url('profile/daniel')}}">daniel</a></li>
      <li><a href="{{url('profile/marvin')}}">marvin</a></li>
      <li><a href="{{url('profile/musyaddad')}}">musyadad</a></li>
      <li><a href="{{url('profile/alex')}}">alex</a></li>
      <li><a href="{{url('profile/fawzil')}}">fawzil</a></li>
    </ul>
  </div>
</nav> -->

<!-- @yield('tab-content') -->
@yield('container') 

</body>
</html>
