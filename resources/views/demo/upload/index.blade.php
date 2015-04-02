@extends('layouts.bootstrap')
@section('content')
<div class="page-header">
    <h1>Upload Example</h1>
</div>
<div class="row">
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile" name="userfile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
swww
@stop
