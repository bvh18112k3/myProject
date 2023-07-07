@extends('layout.main')
@section('content')
<form action="{{route('updateRomPost/'.$roms->id)}}" method="POST">
    Màu sắc <input type="text" name="rom" value="{{$roms->rom}}"><br>
    <input type="submit" name="them" value="Sửa">
</form>
@endsection
