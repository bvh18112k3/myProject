<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.0-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    @include('layout_web.style')
    @include('layout_web.script')
    <title>{{ $title }}</title>
    <style>
    </style>
</head>
<body>
<div class="container" style="padding-top: 30px">
    <header class="row">
        @if(isset($_SESSION['user']))
            <div class="login">
                <div id='gach'>
                    <label>Xin chào {{$_SESSION['user']->username}}</label>  <i class="bi bi-caret-down-fill" id="swap"></i>
                </div>
                <div class="menucategory">
                    <ul>
                        <li><a href="{{route('myCart')}}">Giỏ hàng cửa bạn</a></li>
                        <li><a id="logOut" href="{{route('signOut')}}">Đăng xuất</a></li>
                        <li><a href="{{route('updateUserCus')}}">Cập nhật tài khoản</a></li>
                        @if ($_SESSION['user']->role == 0)
                            <li><a id="logIn_admin" href="admin/index.php">Đăng nhập admin</a></li>
                        @endif
                    </ul>
                </div>
            </div>
{{--            <div class="d-flex justify-content-end grid gap-2">--}}
{{--                <h4>Xin chào {{$_SESSION['user']->username}}</h4>--}}
{{--                <button class="btn btn-danger"><a href="{{route('signOut')}}">Sign Out</a></button>--}}
{{--            </div>--}}
        @else
            <div class="d-flex justify-content-end grid gap-1">
                <button class="btn btn-danger"><a href="{{route('signIn')}}">Sign In</a></button>
                <button class="btn btn-primary"><a href="{{route('addUserCus')}}">Sign Up</a></button>
            </div>
        @endif
        <div class="col-4">
            <img src="{{BASE_IMG}}/logo.png" alt="" style="height: 250px ; width: 250px">
        </div>
        <nav class="navbar navbar-expand-lg row col-8">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sản phẩm</a>
                        </li>
                    </ul>
                    <form class="d-flex search" role="search" method="post">
                        <input type="text" placeholder="Search Product Here..." name="search">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <section class="content row">
        @yield('content')
    </section>
    <footer>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{BASE_IMG}}/SubBanner-01.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Limited offer for speakers</h5>
                        <h2>Get Extra $10 only speakers</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="{{BASE_IMG}}/logo.png" alt="" style="height: 250px ; width: 250px">
            </div>
            <div class="col-8 row">
                <div class="col-4">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Giới thiệu về công ty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Chính sách bảo mật</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Quy chế hoạt động</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Hệ thống cửa hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Chính sách đổi trả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Hệ thống bảo hành</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="navbar-nav">
                        <li class="nav-item nav-link">Kết nối với chúng tôi</li>
                        <li class="nav-item nav-link">Facebook: <a
                                    href="https://www.facebook.com/profile.php?id=100053770459042"><i
                                        class="bi bi-facebook"></i></a></li>
                        <li class="nav-item nav-link">Email: bvh18112003@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
<script>
    $(document).ready(function(){
        $("#gach").mouseenter(function(){
            $(".menucategory").css("display", "block");
        });
        $("#swap").mouseenter(function(){
            $(".menucategory").css("display", "none");
        });
    });

</script>
</html>