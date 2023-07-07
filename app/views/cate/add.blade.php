@extends('layout.main')
@section('content')
<form action="{{route('addCatePost')}}" method="POST">
    Danh mục <input type="text" name="cate_name"><br>
    <input type="submit" name="them" value="Thêm">
</form>
@endsection
