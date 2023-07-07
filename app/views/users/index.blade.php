@extends('layout.main')
@section('content')
    <table border="1" class="table">
        <thead>
        <th>ID</th>
        <th>Email</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->password}}</td>
                @if($u->role==0)<td>Admin</td>@endif
                @if($u->role==1) <td>{{"Khách hàng"}}</td>@endif
                <td><button class="btn btn-success"><a href="{{route('updateUser/'.$u->id)}}">Sửa</a></button></td>
                <td><button class="btn btn-danger"><a href="{{route('deleteUser/'.$u->id)}}">Xóa</a></button></td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="{{route('addUser')}}"><button class="b">Thêm mới</button></a>
@endsection
