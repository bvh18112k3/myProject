@extends('layout.main')
@section('content')
<form action="{{route('addColorPost')}}" method="POST">
    Màu sắc <input type="text" name="color"><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection
