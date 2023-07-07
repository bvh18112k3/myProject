@extends('layout_web.main')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{BASE_IMG}}/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{BASE_IMG}}/banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{BASE_IMG}}/banner3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="ss">
        <h1>SAMSUNG</h1>
        <div class="row grid gap-5">
            @foreach($sm[0] as $i)
                <div class="card col-3 p-2" style="width: 18rem;">
                    <img src="{{BASE_IMG}}/{{$i->url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{BASE_URL.'productdetail/'.$i->product_id."&&cate_id=".$i->cate_id}}">{{$i->product_name}}</a></h5>
                        @if($i->max == $i->min)
                            <p class="card-text">{{$i->max}}₫</p>
                        @else
                            <p class="card-text">{{$i->min}}₫ - {{$i->max}}₫</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="vv">
        <h1>VIVO</h1>
        <div class="row grid gap-5">
            @foreach($sm[1] as $i)
                <div class="card col-3 p-2" style="width: 18rem;">
                    <img src="{{BASE_IMG}}/{{$i->url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{BASE_URL.'productdetail/'.$i->product_id}}."&&cate_id=".$i->cate_id">{{$i->product_name}}</a></h5>
                        @if($i->max == $i->min)
                            <p class="card-text">{{$i->max}}₫</p>
                        @else
                            <p class="card-text">{{$i->min}}₫ - {{$i->max}}₫</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="ip">
        <h1>IPHONE</h1>
        <div class="row grid gap-4">
            @foreach($sm[2] as $i)
                <div class="card col-3 p-2" style="width: 18rem;">
                    <img src="{{BASE_IMG}}/{{$i->url}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{BASE_URL.'productdetail/'.$i->product_id."&&cate_id=".$i->cate_id}}">{{$i->product_name}}</a></h5>
                        @if($i->max == $i->min)
                        <p class="card-text">{{$i->max}}₫</p>
                        @else
                            <p class="card-text">{{$i->min}}₫ - {{$i->max}}₫</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
