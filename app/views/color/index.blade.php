@extends('layout.main')
@section('content')
    <table border="1" class="table " >
        <thead>
        <th>ID</th>
        <th>Color</th>
        <th colspan="2">Action</th>
        </thead>
        <tbody>
        @foreach($colors as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->color }}</td>
                <td><button type="button" class="btn btn-success"><a href="{{route('updateColor/'.$c->id)}}">Sửa</a></button></td>
                 <td><button type="button" class="btn btn-danger"><a href="{{route('deleteColor/'.$c->id)}}">Xóa</a></button></td>

            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="{{route('addColor')}}"><button>Thêm mới</button></a>
@endsection
