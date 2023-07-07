@extends('layout.main')
@section('content')
<table border="1" class="table">
    <thead>
        <th>ID</th>
        <th>Ram</th>
        <th colspan="2">Action</th>
    </thead>
    <tbody>
         @foreach($rams as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->ram }}</td>
                <td><button class="btn btn-success"><a href="{{route('updateRam/'.$r->id)}}">Sửa</a></button></td>
                <td><button class="btn btn-danger"><a href="{{route('deleteRam/'.$r->id)}}">Xóa</a></button></td>

            </tr>
        @endforeach
    </tbody>

</table>
<a href="{{route('addRam')}}"><button class="btn btn-success">Thêm mới</button></a>
@endsection
