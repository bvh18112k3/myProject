@extends('layout.main')
@section('content')
    <form action="{{route('updateProductPost')}}" method="POST">
        Tên điện thoại <input type="text" name="product_name" value="{{$products[1]->product_name}}"><br>
        Độ phân giải  <input type="text" name="screen_resolution" value="{{$products[1]->screen_resolution}}"><br>
        Màn hình rộng <input type="text" name="screen_width" value="{{$products[1]->screen_width}}"><br>
        Độ sáng tối đa <input type="text" name="maximum_brightness" value="{{$products[1]->maximum_brightness}}"><br>
        Camera sau <input type="text" name="rear_camera" value="{{$products[1]->rear_camera}}"><br>
        Camera trước <input type="text" name="front_camera" value="{{$products[1]->front_camera}}"><br>
        Hệ điều hành <input type="text" name="HDH" value="{{$products[1]->HDH}}"><br>
        Chip xử lý (CPU) <input type="text" name="CPU" value="{{$products[1]->CPU}}"><br>
        Chip đồ họa <input type="text" name="pin_sac" value="{{$products[1]->pin_sac}}"><br>
        Mô tả <input type="text" name="description" value="{{$products[1]->description}}"><br>
        <select name="cate_id">
            <option value="{{$products[0]->cate_id}}">{{$products[0]->cate_name}}</option>
        </select>

        <input type="submit" name="them" values="Thêm">
    </form>
@endsection