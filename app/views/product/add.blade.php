@extends('layout.main')
@section('content')
<div class="col-8">
    <form action="{{route('addProductPost')}}" method="POST">
        Tên điện thoại <input class="form-control" type="text" name="product_name"><br>
        Màu sắc
        <div class="row">
        @foreach($p[2] as $color)
                 <div class="col-2">{{$color->color}}     <input type="checkbox" value="{{$color->id}}" name="color{{$color->id}}"></div>
        @endforeach
        </div>
        Ram
        <div class="row">
            @foreach($p[0] as $ra)
               <div class="col-2">
                   {{$ra->ram}}    <input type="checkbox" value="{{$ra->id}}" name="ram{{$ra->id}}">
               </div>
            @endforeach
        </div>
        Ram
        <div class="row">
        @foreach($p[1] as $ro)
           <div class="col-2"> {{$ro->rom}}    <input type="checkbox" value="{{$ro->id}}" name="rom{{$ro->id}}"></div>
        @endforeach
        </div>
        <br>Độ phân giải  <input class="form-control" type="text" name="screen_resolution"><br>
        Màn hình rộng <input class="form-control" type="text" name="screen_width"><br>
        Độ sáng tối đa <input class="form-control" type="text" name="maximum_brightness"><br>
        Camera sau <input class="form-control" type="text" name="rear_camera"><br>
        Camera trước <input class="form-control" type="text" name="front_camera"><br>
        Hệ điều hành <input class="form-control" type="text" name="HDH"><br>
        Chip xử lý (CPU) <input class="form-control" type="text" name="CPU"><br>
        Chip đồ họa <input class="form-control" type="text" name="GPU"><br>
        Pin Sạc <input class="form-control" type="text" name="pin_sac"><br>
        Mô tả <input class="form-control" type="text" name="description"><br>
        <select name="cate_id" class="form-select" >
            @foreach($p[3] as $c)
                <option value="{{$c->id}}">{{$c->cate_name}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" class="btn btn-success" name="them" value="Thêm">


    </form>
</div>
@endsection
