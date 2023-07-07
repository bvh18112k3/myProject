@extends('layout.main')
@section('content')
<form action="{{route('addProductDetailPost')}}" method="POST">
    Tên sản phẩm
    <select name="product" id="">
        @foreach($total[3]  as $p)
            <option value="{{$p->id}}">{{$p->product_name}}</option>
        @endforeach
    </select> <br>
    Ram <select name="ram" id="">
        @foreach($total[0] as $ra)
            <option value="{{$ra->id}}">{{$ra->ram}}</option>
        @endforeach
    </select> <br>
    Rom
    <select name="rom" id="">
        @foreach($total[1]  as $ro)
            <option value="{{$ro->id}}">{{$ro->rom}}</option>
        @endforeach
    </select> <br>
    Màu sắc <select name="color" id="">
        @foreach($total[2]  as $c)
            <option value="{{$c->id}}">{{$c->color}}</option>
        @endforeach
    </select> <br>
    <input type="submit" name="them" values="Thêm">
</form>
@endsection
