@extends('layout.main')
@section('content')
<div class="col-8">
    <form action="{{route('updateColorPost/'.$colors->id)}}" method="POST">
        Màu sắc <input type="text" name="color" value="{{$colors->color}}"><br>
        <input type="submit" name="them" value="Sửa">
    </form>
</div>
@endsection
