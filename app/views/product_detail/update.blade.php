@extends('layout.main')
@section('content')
    <form action="{{route('updateProductDetailPost')}}" method="POST">
            Tên sản phẩm : {{$pd->product_name}}
            Ram <input type="text"  value="{{$pd->ram}}" disabled>
            Rom <input type="text"  value="{{$pd->rom}}" disabled>
            Màu sắc <input type="text" value="{{$pd->color}}" disabled>
            Giá <input type="text" name="price" value="{{$pd->price}}">
            Danh mục <select disabled>
            <option value="{{$pd->product_id}}">{{$pd->product_name}}</option>
        </select>
        <input type="submit" name="them" values="Sửa">
    </form>
@endsection
