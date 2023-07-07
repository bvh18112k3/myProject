@extends('layout.main')
@section('content')
<form action="{{route('updateRamPost/'.$rams->id)}}" method="POST">
    <label for="" class="form-label"> RAM </label><input type="text" class="form-control" name="ram" value="{{$rams->ram}}"><br>
    <input type="submit" name="them" value="Sửa" class="btn btn-success">
</form>
@endsection
