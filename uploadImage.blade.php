@extends('layout')

@section('body')


<form action="" method="POST">
  <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
  <input type="submit">
</form>



@stop