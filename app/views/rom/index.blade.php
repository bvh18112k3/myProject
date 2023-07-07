@extends('layout.main')
@section('content')
<table border="1" class="table">
    <thead>
        <th>ID</th>
        <th>Rom</th>
        <th colspan="2">Action</th>
    </thead>
    <tbody>
         @foreach($roms as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->rom }}</td>
                <td><button class="btn btn-success"><a href="{{route('updateRom/'.$r->id)}}">Sửa</a></button></td>
                <td><buttton class="btn btn-danger"><a href="{{route('deleteRom/'.$r->id)}}">Xóa</a></buttton></td>
            </tr>
        @endforeach
    </tbody>

</table>
<a href="{{route('addRom')}}"><button class=" btn btn-success">Thêm mới</button></a>
@endsection
