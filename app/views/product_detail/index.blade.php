@extends('layout.main')
@section('content')
    <table border="1" class="table">
        <thead>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>RAM</th>
        <th>ROM</th>
        <th>Giá</th>
        <th colspan="2">Action</th>
        </thead>
        <tbody>
        @foreach($pd as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->product_name }}</td>
                <td>{{ $p->ram }}</td>
                <td>{{ $p->rom }}</td>
                <td>{{ $p->price}}</td>
                <td><button class="btn btn-success"><a href="{{route('updateProductDetail/'.$p->id)}}">Sửa</a></button></td>
                <td><button class="btn btn-danger"><a href="{{route('deleteProductDetail/'.$p->id)}}">Xóa</a></button></td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="{{route('addProductDetail')}}"><button class="btn btn-success">Thêm mới</button></a>
@endsection
