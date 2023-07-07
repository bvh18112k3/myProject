@extends('layout.main')
@section('content')
    <form action="{{route('addUserPost')}}" method="POST">
        Email <input type="text" name="email"><br>
        Username <input type="text" name="username"><br>
        Password <input type="text" name="password"><br>
        Role <select name="role" id="">
            <option value="0">Admin</option>
            <option value="1">Khách hàng</option>
        </select>
        <input type="submit" name="them" value="Thêm">
    </form>
@endsection
