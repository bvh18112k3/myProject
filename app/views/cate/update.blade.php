@extends('layout.main')
@section('content')
<div class="col-8">
    <form action="{{route('updateCatePost/'.$cates->id)}}" method="POST">
        Danh mục <input type="text" name="cate_name" value="{{$cates->cate_name}}"><br>
        <input type="submit" name="them" value="Sửa">
    </form>
</div>
@endsection
