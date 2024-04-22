@extends('layout.master')

@section('container')

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    {{ $errors->first() }}
</div>
@endif
<br>
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Halaman Login Admin</h2>
        </div>
    </div>
</div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form action="{{ url('authenticate') }}" method="POST" class="col-lg-12">
        @csrf
        <div class="form-group ">
            <label for="exampleInputEmail1">Email</label>
            {{-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" style="max-width: 300px;"> --}}
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" style="width: 100%;">
            <small id="emailHelp" class="form-text text-muted">Only admin email can login</small>
        </div>
        <div class="form-group ">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" style="width: 100%;">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

@endsection
