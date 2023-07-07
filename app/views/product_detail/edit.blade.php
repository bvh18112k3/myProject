@extends('layout.main')
@section('content')
    <form action="{{route('editProductDetailPost')}}" method="POST" enctype="multipart/form-data">
        <?php $a = 1; ?>
        @foreach($pr[0] as $p)
            Tên sản phẩm : {{$p->product_name}}<br>
            Ram <input type="text" disabled value="{{$p->ram}}"><br>
            Rom <input type="text" disabled value="{{$p->rom}}"><br>
            Màu sắc <input type="text" disabled value="{{$p->color}}"><br>
            Giá <input type="text" name="price{{$a}}"><br>
            <input type="text" value="{{$p->id}}" name="id{{$a}}" hidden>
            <input type="text" value="{{$p->pid}}" name="pid" hidden>
            <?php $a++?>
        @endforeach
        <?php $b = 1; ?>
        @foreach($pr[1] as $c)
            Ảnh sản phẩm màu {{$c->color}}
            <input type="file" name="img{{$b}}"><br>
            <input type="text" value="{{$c->color_id}}" name="color_id{{$b}}">
            <?php $b++?>
            <br>
        @endforeach
        <input type="submit" name="them" values="Thêm">
    </form>
@endsection
