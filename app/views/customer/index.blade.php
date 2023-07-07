@extends('layout.main')
@section('content')
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Note</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($customers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->phone }}</td>
                <td>{{ $c->address }}</td>
                <td>{{ $c->note }}</td>
                <th>
                    <a href="">Sửa</a>
                    <a href="{{route('deleteCustomer/'.$c->id)}}">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
<a href="{{route('addCustomer')}}"><button>Thêm mới</button></a>
@endsection
