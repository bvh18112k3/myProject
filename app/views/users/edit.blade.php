@extends('layout.main')
@section('content')
    <form action="{{route('editUserPost')}}" method="POST">
        Email <input type="text" name="email" value="{{$users->email}}"><br>
        Username <input type="text" name="username" value="{{$users->email}}"><br>
        Password <input type="text" name="password" value="{{$users->email}}"><br>
        Email <select name="role" id="">
            <option value="0">Admin</option>
            <option value="1">Khách hàng</option>
        </select>
        <input type="submit" name="them" value="Thêm">
    </form>
@endsection
