@extends('layout_web.main')
@section('content')
    <?php $pr = $total[3][0]; $a = 1;?>
    <div>
        <hr>
        <h3>Điện thoại {{$pr->product_name}}</h3>
    </div>
    <div class="col-6 image">
        <img src="{{BASE_IMG.$pr->url}}" alt="" style="width: 80%" id="im">
        <div class="row grid gap-3 p-5">
            @foreach($total[3] as $p)
                <div class="card col-3">
                    <img class="" src=" {{BASE_IMG.$p->url}}" alt="" id="img{{$a}}">
                </div>
                <?php $a++?>
            @endforeach
        </div>
    </div>
    <div class="col-6">
        <form action="{{route('CartProductPost')}}" method="post" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <th>Ram</th>
                </tr>
                <tr>
                    @foreach($total[0] as $p)
                        <?php $a = 1; ?>
                        <td><input type="radio" class="ram" name="ram{{$a}}" value="{{$p->ram_id}}">
                            <label for="orange">{{$p->ram}}</label>
                            <?php $a++; ?></td>
                    @endforeach
                </tr>
                <tr>
                    <th>Rom</th>
                </tr>
                <tr>
                    @foreach($total[1] as $r)
                        <?php $a = 1; ?>
                        <td><input type="radio" class="rom" name="rom{{$a}}" value="{{$r->rom_id}}">
                            <label for="orange">{{$r->rom}}</label>
                            <?php $a++; ?></td>
                    @endforeach
                </tr>
                <tr>
                    <th>Màu sắc</th>
                </tr>
                <tr>
                    @foreach($total[2] as $c)
                        <?php $a = 1; ?>
                        <td><input type="radio" class="color" name="color{{$a}}" value="{{$c->color_id}}">
                            <label for="orange">{{$c->color}}</label>
                            <?php $a++; ?></td>
                    @endforeach
                </tr>
            </table>
            <h4 class="log"></h4>
            <input type="text" value="{{$pr->product_id}}" name="product_id" hidden>
            <input type="text" hidden id="hi" name="price">
            @if(isset($_SESSION['user']))
                <button type="submit" name="buy" class="btn btn-primary" style="display: none">MUA NGAY</button>
            @else
                <button name="buy" class="btn btn-primary"><a href="{{route('SignIn')}}">MUA NGAY</a></button>
            @endif
        </form>
        <div>
            <h3>Cấu hình điện thoại {{$pr->product_name}}</h3>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <th scope="row">Độ phân giải màn hình:</th>
                    <td>{{$pr->screen_resolution}}</td>
                </tr>
                <tr>
                    <th scope="row">Màn hình rộng:</th>
                    <td>{{$pr->screen_width}}</td>
                </tr>
                <tr>
                    <th scope="row">Độ sáng tối đa:</th>
                    <td>{{$pr->maximum_brightness}}</td>
                </tr>
                <tr>
                    <th scope="row">Camera sau:</th>
                    <td>{{$pr->rear_camera}}</td>
                </tr>
                <tr>
                    <th scope="row">Camera trước:</th>
                    <td>{{$pr->front_camera}}</td>
                </tr>
                <tr>
                    <th scope="row">Hệ điều hành:</th>
                    <td>{{$pr->HDH}}</td>
                </tr>
                <tr>
                    <th scope="row">Chip xử lý (CPU):</th>
                    <td>{{$pr->CPU}}</td>
                </tr>
                <tr>
                    <th scope="row">Chip đồ họa (GPU):</th>
                    <td>{{$pr->GPU}}</td>
                </tr>
                <tr>
                    <th scope="row">Pin, Sạc</th>
                    <td>{{$pr->pin_sac}}</td>
                </tr>

                </tbody>
            </table>
            <div>
                <h4>Mô tả</h4>
                <p>{{$pr->description}}</p>
            </div>
        </div>
    </div>
    <div>
        @if(isset($total[5]))
            <h2>Các điện thoại cùng hãng </h2>
            @if(isset($_GET['cate_id']))
                <div class="row grid gap-5">
                    @foreach($total[5] as $i)
                        <div class="card col-3 p-2" style="width: 18rem;">
                            <img src="{{BASE_IMG}}/{{$i->url}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{BASE_URL.'productdetail/'.$i->product_id}}." &&cate_id=".$i->cate_id">{{$i->product_name}}</a></h5>
                                @if($i->max == $i->min)
                                    <p class="card-text">{{$i->max}}₫</p>
                                @else
                                    <p class="card-text">{{$i->min}}₫ - {{$i->max}}₫</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
    <script type='text/javascript'>
        <?php
        $js_array = json_encode($total[4]);
        echo "var product = " . $js_array . ";\n";
        ?>
        console.log(product);
        $(".ram").on("click", function () {
            // $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
            $(".rom").on("click", function () {
                // $( "#log" ).html( $( "input:checked" ).val() + " is checked!" );
                $(".color").on("click", function () {
                    product.map((pro, index) => {
                        // if ($(".ram:checked").val() == pro.ram_id && $(".rom:checked").val() == pro.rom && $(".color:checked").val() == pro.color) {
                        let gia = product.filter(pro => pro.color_id == $(".color:checked").val()).filter(pro => pro.rom_id == $(".rom:checked").val()).filter(pro => pro.ram_id == $(".ram:checked").val()).map(pro => pro.price);
                        $(".log").text(gia[0] + '₫');
                        var hi = document.querySelector("#hi");
                        hi.setAttribute("value", gia[0]);
                        $(".btn-primary").show();
                        console.log(gia);
                        // }
                    })
                })
            });
        });
        var im = document.querySelector("#im");
        var img1 = document.querySelector("#img1");
        var img2 = document.querySelector("#img2");
        var img3 = document.querySelector("#img3");
        var img4 = document.querySelector("#img4");
        img1.addEventListener("click", function () {
            im.src = img1.src;
        });
        img2.addEventListener("click", function () {
            im.src = img2.src;
        });
        img3.addEventListener("click", function () {
            im.src = img3.src;
        });
        img4.addEventListener("click", function () {
            im.src = img4.src;
        });

    </script>
@endsection