@extends('layouts.bootstrap')

@section('content')

@if (session()->has('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif

@foreach ($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach

<form method="post">
    <input type="hidden" name="_token" value="{{ Session::token() }}">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@stop