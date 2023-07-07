@extends('layout.main')
@section('content')
    <table border="1" class="table " >
        <thead>
        <th>ID</th>
        <th>Danh mục</th>
        <th colspan="2">Action</th>
        </thead>
        <tbody>
        @foreach($cates as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->cate_name }}</td>
                <td><button type="button" class="btn btn-success"><a href="{{route('updateCate/'.$c->id)}}">Sửa</a></button></td>
                 <td><button type="button" class="btn btn-danger"><a href="{{route('deleteCate/'.$c->id)}}">Xóa</a></button></td>

            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="{{route('addCate')}}"><button>Thêm mới</button></a>
@endsection
