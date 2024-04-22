@extends('layout.master')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{asset($data->photo)}}" style="width:100%;"/>
        </div>
        <div class="col-md-8">
            <h3>{{ $data->name }}</h3>
            <p>
                {{ $data->motto }}
            </p>
        </div>
    </div>

</div>
@stop