@extends('layout.main')
@section('content')
        <table border="1" class="table">
            <thead>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Độ phân giải</th>
            <th>Kích thước màn hình</th>
            <th>Độ sáng tối đa</th>
            <th>Camera sau</th>
            <th>Camera trước</th>
            <th>Hệ điều hành </th>
            <th>Chip xử lý (CPU)</th>
            <th>Chip đồ họa</th>
            <th>Pin Sạc</th>
            <th>Mô tả</th>
            <th colspan="2">Action</th>
            </thead>
            <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{ $p->product_name }}</td>
                    <td>{{ $p->screen_resolution }}</td>
                    <td>{{ $p->screen_width}}</td>
                    <td>{{ $p->maximum_brightness }}</td>
                    <td>{{ $p->rear_camera }}</td>
                    <td>{{$p->front_camera}}</td>
                    <td>{{$p->HDH}}</td>
                    <td>{{$p->CPU}}</td>
                    <td>{{$p->GPU}}</td>
                    <td>{{$p->pin_sac}}</td>
                    <td>{{$p->description}}</td>
                    <th>
                        <a href="{{route('updateProduct/'.$p->id)}}">Sửa</a><br>
                    </th>
                    <th><a href="{{route('deleteProduct/'.$p->id)}}">Xóa</a></th>
                </tr>
            @endforeach
            </tbody>

        </table>
        <a href="{{route('addProduct')}}"><button>Thêm mới</button></a>
@endsection
