@extends('layout_web.main')
@section('content')

    <div class="col-2"></div>
    <div class="col-8">
        @if(isset($_SESSION['success'])&& isset($_GET['msg']))
            <p style="color: green">{{$_SESSION['success']}}</p>
        @endif
        @if(isset($_SESSION['errors'])&&isset($_GET['msg']))
            <p style="color:red;">{{$_SESSION['errors']}}</p>
        @endif
        <h2>Đăng nhập</h2>
        <form action="{{route('signInPost')}}" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
            </div>
            <input type="text" name="role" value="1" hidden>
            <button class="btn btn-primary" type="submit" name="signin">Đăng nhập</button>
        </form>
        <p>Bạn chưa có tài khoản vui lòng <a href="{{route('signUp')}}">đăng kí</a></p>
    </div>
    <div class="col-2"></div>
@endsection
