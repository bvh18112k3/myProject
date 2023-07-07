<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @include('layout.style')
    @include('layout.script')
    <title>{{ $title }}</title>
    <style>
        .dropdown-menu{
            display: none;
            position: absolute;
        }
        .dropdown>a{
            position: relative;
        }
        .dropdown a:hover ul.dropdown-menu{
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
   <header>

   </header>
    <section class="content row" >
        <ul class="list-group col-2">
            <a class="list-group-item" aria-current="true" href="{{route('/')}}"> Bảng tin</a>
            <a class="list-group-item" aria-current="true" href="{{route('cate')}}"> Danh mục</a>
            <a href="##" class="list-group-item">Sản phẩm</a>
            <div class="dropdown">
                <a href="{{route('product')}}" class="list-group-item" aria-expanded="false">
                    Dropdown button
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <a href="{{route('ram')}}" class="list-group-item">A second item</a>
            <a href="##" class="list-group-item">A second item</a>
            <a href="##" class="list-group-item">A second item</a>
        </ul>
        <div class="col-10   row">
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tổng doanh thu</font></font></h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$12099</font></font></h1>
                    </div>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Doanh thu tháng trước</font></font></h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$12099</font></font></h1>
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5,86%</font></font></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-4">
                <div class="card-body">
                    <h5 class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Doanh thu tháng này</font></font></h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$12099</font></font></h1>
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5,86%</font></font></span>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </section>
    <footer>
        <span>FPT POLYTECHNIC</span>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>
</body>
</html>