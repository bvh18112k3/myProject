@extends('layout_web.main')
@section('content')
    <div class="col-2"></div>
    <div class="col-8">
        <h1>Bạn vui lòng điền thông tin nhận hàng</h1>
        <form action="{{route("CartView")}}" method="post">
            <table class="table table-striped">
                <tr>
                    <th>Tên sản phẩm</th>
                    <td>{{$pd->product_name}}</td>
                </tr>
                <tr>
                    <th>Ram</th>
                    <td>{{$pd->ram}}</td>
                </tr>
                <tr>
                    <th>Rom</th>
                    <td>{{$pd->rom}}</td>
                </tr>
                <tr>
                    <th>Màu sắc</th>
                    <td>{{$pd->color}}</td>
                </tr>
                <tr>
                    <th>Giá</th>
                    <td>{{$pd->price}}₫</td>
                </tr>
            </table>
            <input type="text" value="{{$pd->price}}" name="price" hidden>
            <input type="text" value="{{$pd->id}}" name="pdid" hidden>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên người nhận hàng</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="customer_name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Số điện thoại người nhận hàng</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="phone_number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ nhận hàng</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="address_customer">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity" min="1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Góp ý</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
            </div>
            <input type="date" value="{{date('Y-m-d')}}" hidden name="day">
            <div>
                <button class="btn btn-success" type="submit" name="them">Xác nhận</button>
                <button class="btn btn-danger"><a href="">Hủy</a></button>
            </div>
        </form>
    </div>
    <div class="col-2"></div>
@endsection