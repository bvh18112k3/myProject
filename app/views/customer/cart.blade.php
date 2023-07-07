@extends('layout_web.main')
@section('content')
    <table class="table table-striped">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Màu sắc</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền phải thanh toán</th>
            <th>Góp ý</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Người nhận hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        @foreach($carts as $c)
            <td>{{$c->product_name}}</td>
            <td>{{$c->color}}</td>
            <td>{{$c->price}}</td>
            <td>{{$c->quantity}}</td>
            <td>{{$c->total_money}}</td>
            <td>{{$c->note}}</td>
            <td>{{$c->address_customer}}</td>
            <td>{{$c->customer_name}}</td>
            <td>{{$c->day}}</td>
            @if($c->status == '0')
                <td>Chờ xác nhận</td>
            @endif
        @endforeach
    </table>
@endsection