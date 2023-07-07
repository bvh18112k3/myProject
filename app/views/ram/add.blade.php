@extends('layout.main')
@section('content')
<form action="{{route('addRamPost')}}" method="POST">
    <label for="" class="form-label">RAM </label><input class="form-control" type="text" name="ram"><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection
