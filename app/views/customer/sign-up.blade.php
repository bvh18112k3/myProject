@extends('layout_web.main')
@section('content')
    <div class="col-2"></div>
    <div class="col-8">
        <h2>Đăng ký tài khoản</h2>
        <form action="{{route('signUpPost')}}" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
            </div>
            <input type="text" name="role" value="1" hidden>
            <button class="btn btn-success" type="submit">Đăng ký</button>
            <p>Bạn đã có tài khoản <a href="{{route("signIn")}}">đăng nhập</a> ngay</p>
        </form>
    </div>
    <div class="col-2"></div>
@endsection
