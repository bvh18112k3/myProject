@extends('layout.main')
@section('content')
<form action="{{route('addRomPost')}}" method="POST">
    RAM <input type="text" name="rom"><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection
